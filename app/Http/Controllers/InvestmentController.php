<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Package;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $investments = Investment::all();
        if (!auth()->user()->hasRole('Admin')) {
            $investments = auth()->user()->investment;
        }
        return view('investment.index', compact('investments'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $package = Package::where('id', $request->package_id)->firstOrFail();
        $investment = auth()->user()->investment()->create([
            'package_id' => $package->id,
            'percentage' => $package->percentage,
            'duration' => $package->duration,
            'profit' => round($package->price * ($package->percentage / 100))
        ]);
        //Matches investor to matured withdrawers
        $this->matchMaker($package->id, $package->price, $investment->id);

        return redirect()->route('transaction.deposit');
    }

    public function invest()
    {
        if (auth()->user()->account === null) {
            return redirect()->route('settings.account')->with('success', 'Enter Your Bank Account Information for payment before investing');
        }

        $totalWithdrawable = Withdrawal::where([['status', 0], ['match', 0], ['user_id', '!=', auth()->user()->id]])->pluck('amount')->sum();
        $availablePackages = Package::where([
            ['price', '<=', $totalWithdrawable],
            ['id', '!=', 1]
        ])->get();
        return view('investment.invest', compact('availablePackages'));
    }

    public function reinvest(Request $request)
    {
        $message = ['success' => 'Reinvestment Successful'];
        $investment = Investment::findorFail($request->id);
//        Create a new investment cycle
        $reinvestment = auth()->user()->investment()->create([
            'package_id' => $investment->package_id,
            'percentage' => $investment->percentage,
            'duration' => $investment->duration,
            'profit' => round($investment->package->price * ($investment->percentage / 100)),
            'previous_investment_id' => $investment->id
        ]);
        //        Matches investor to matured withdrawers
        $this->matchMaker($reinvestment->package->id, $reinvestment->package->price, $reinvestment->id);

        $result = $investment->update(['reinvest_btn' => 1]);
        if (!$result) {
            $message = ['error' => 'Reinvestment failed'];
        }
        return response()->json($message);
    }

    public function withdraw(Request $request)
    {
        $message = ['success' => 'Withdrawal request was successful, You will be Matched soon...'];
        $investment = Investment::findorFail($request->id);
        auth()->user()->withdrawal()->create([
            'investment_id' => $investment->id,
            'amount' => $investment->profit,
        ]);
        $result = $investment->update([
            'reinvest' => 2
        ]);
        if (!$result) {
            $message = ['error' => 'Withdrawal request failed'];
        }
        return response()->json($message);
    }

    protected function matchMaker($packageId, $price, $depositorInvestmentId)
    {
        /**
         * ptbp => people to be paid
         * mtbp => money to be paid
         * pdfp => people due for payment
         */
        $pdfp = [];
        $mismatch = [];
        $mtbp = $price;
        $withdrawals = Withdrawal::where([
            ['user_id', '!=', auth()->user()->id],
            ['status', 0],
            ['match', 0]
        ])->get();
        $recipients = [];
        foreach ($withdrawals as $withdrawal) {
            $recipients[] = [
                'id' => $withdrawal->id,
                'investment_id' => $withdrawal->investment_id,
                'recipient_id' => $withdrawal->user_id,
                'maturityAge' => Carbon::now()->dayOfYear() - Carbon::parse($withdrawal->created_at)->dayOfYear,
                'amount' => $withdrawal->amount
            ];
        }
        $maturityAgeArray = array_column($recipients, 'maturityAge');
        array_multisort($maturityAgeArray, SORT_DESC, $recipients);
        foreach ($recipients as $recipient) {
            $temp = $mtbp - $recipient['amount'];
            if ($temp < 0) {
                array_push($mismatch, [
                    'id' => $recipient['id'],
                    'amount' => $recipient['amount'],
                    'recipient_id' => $recipient['recipient_id'],
                    'investment_id' => $recipient['investment_id']
                ]);
                continue;
            }
            $mtbp = $mtbp - $recipient['amount'];
            array_push($pdfp, [
                'id' => $recipient['id'],
                'amount' => $recipient['amount'],
                'recipient_id' => $recipient['recipient_id'],
                'investment_id' => $recipient['investment_id']
            ]);
        }

        if ($mtbp !== 0) {
            array_push($pdfp, [
                'id' => $mismatch[0]['id'],
                'amount' => $mtbp,
                'recipient_id' => $mismatch[0]['recipient_id'],
                'investment_id' => $mismatch[0]['investment_id']
            ]);
//            $createBalanceWithdrawal = Withdrawal::findOrFail($mismatch[0]['recipient_id']);
            Withdrawal::create([
                'user_id' => $mismatch[0]['recipient_id'],
                'investment_id' => $mismatch[0]['investment_id'],
                'amount' => $mismatch[0]['amount'] - $mtbp,
            ]);
        }

//        what to do if investment > withdrawal

        foreach ($pdfp as $transaction) {
            auth()->user()->transaction()->create([
                'package_id' => $packageId,
                'recipient_investment_id' => $transaction['investment_id'],
                'depositor_investment_id' => $depositorInvestmentId,
                'depositor_id' => auth()->user()->id,
                'recipient_id' => $transaction['recipient_id'],
                'withdrawal_id' => $transaction['id'],
                'amount' => $transaction['amount'],
                'deadline' => Carbon::now()->addDay()->addHour(),
            ]);

            $updateWithdrawal = Withdrawal::findOrFail($transaction['id']);
            $updateWithdrawal->update(['match' => 1]);
        }
    }
}
