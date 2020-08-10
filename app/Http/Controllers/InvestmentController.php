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
        //        Matches investor to matured withdrawers
        $this->matchMaker($investment->id, $package->id, $package->price);

        return redirect()->route('investment.index');
    }

    public function invest()
    {
        $totalWithdrawable  = Withdrawal::where([['status', 0], ['match', 0]])->pluck('amount')->sum();
        $availablePackages = Package::where('price', '<=', $totalWithdrawable)->get();
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
            'profit' => round($investment->package->price * ($investment->percentage / 100))
        ]);
        $result = $investment->update(['reinvest' => 1]);

        //        Matches investor to matured withdrawers
        $this->matchMaker($reinvestment->id, $reinvestment->package->id, $reinvestment->package->price);
        if (!$result) {
            $message = ['error' => 'Reinvestment failed'];
        }
        return response()->json($message);
    }

    public function withdraw(Request $request)
    {
        $message = ['success' => 'Withdrawal request was successful'];
        $investment = Investment::findorFail($request->id);
        auth()->user()->withdrawal()->create([
            'investment_id' => $investment->id,
            'amount' => $investment->profit,
        ]);
        $result = $investment->update([
            'maturity' => $investment->package_id,
            'reinvest' => 2
        ]);
        if (!$result) {
            $message = ['error' => 'Withdrawal request failed'];
        }
        return response()->json($message);
    }

    protected function matchMaker($investmentId, $packageId, $price)
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
            ['status', 0],
            ['match', 0]
        ])->get();
        $recipients = [];
        foreach ($withdrawals as $withdrawal) {
            $recipients[] = ['id' => $withdrawal->id, 'recipient_id' => $withdrawal->user_id, 'maturityAge' => Carbon::now()->dayOfYear() - Carbon::parse($withdrawal->created_at)->dayOfYear, 'amount' => $withdrawal->amount];
        }
        $maturityAgeArray = array_column($recipients, 'maturityAge');
        array_multisort($maturityAgeArray, SORT_DESC, $recipients);
        foreach ($recipients as $recipient) {
            $temp = $mtbp - $recipient['amount'];
            if ($temp < 0) {
                array_push($mismatch, ['id' => $recipient['id'], 'amount' => $recipient['amount'], 'recipient_id' => $recipient['recipient_id']]);
                continue;
            }
            $mtbp = $mtbp - $recipient['amount'];
            array_push($pdfp, ['id' => $recipient['id'], 'amount' => $recipient['amount'], 'recipient_id' => $recipient['recipient_id']]);
        }

        if ($mtbp !== 0) {
            array_push($pdfp, ['id' => $mismatch[0]['id'], 'amount' => $mtbp, 'recipient_id' => $mismatch[0]['recipient_id']]);
            $createBalanceWithdrawal = Withdrawal::findOrFail($mismatch[0]['recipient_id']);
            $createBalanceWithdrawal->create([
                'user_id' => $mismatch[0]['recipient_id'],
                'investment_id' => $investmentId,
                'amount' => $mismatch[0]['amount'] - $mtbp,
            ]);
        }

//        what to do if investment > withdrawal

        foreach ($pdfp as $transaction) {
            auth()->user()->transaction()->create([
                'package_id' => $packageId,
                'investment_id' => $investmentId,
                'depositor_id' => auth()->user()->id,
                'recipient_id' => $transaction['recipient_id'],
                'withdrawal_id' => $transaction['id'],
                'amount' => $transaction['amount'],
            ]);

            $updateWithdrawal = Withdrawal::findOrFail($transaction['id']);
            $updateWithdrawal->update(['match' => 1]);
        }
    }
}
