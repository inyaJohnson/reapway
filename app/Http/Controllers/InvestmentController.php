<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Package;
use App\Referral;
use App\Traits\DepositTransaction;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    use DepositTransaction;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $investments = auth()->user()->investment;
        return view('investment.index', compact('investments'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $message = ['success' => 'Investment successful, You have been matched'];
        $package = Package::where('id', $request->package_id)->firstOrFail();
        $referral = Referral::where('referred_id', auth()->user()->id)->first();
            $investment = auth()->user()->investment()->create([
                'package_id' => $package->id,
                'percentage' => $package->percentage,
                'duration' => $package->duration,
                'profit' => round($package->price * ($package->percentage / 100))
            ]);
            $this->create($package->id, $investment->id, $package->price);
            if (auth()->user()->investment->count() == 1 && $referral !== null) {
                $referral->update(['amount' => ($package->price * 5) / 100, 'investment_id' => $investment->id]);
            }

        return redirect()->route('home')->with($message);
    }

    public function invest()
    {
        if (auth()->user()->account === null) {
            return redirect()->route('settings.account')->with('success', 'Enter Your Bank Account Information for payment before investing');
        }
        $packages = Package::all();
        return view('investment.invest', compact('packages'));
    }

    public function reinvest($id)
    {
        $message = ['success' => 'Reinvestment Successful, Make payment to the investor(s) listed'];
        $investment = Investment::findorFail($id);
            auth()->user()->investment()->create([
                'package_id' => $investment->package_id,
                'percentage' => $investment->percentage,
                'duration' => $investment->duration,
                'profit' => round($investment->package->price * ($investment->percentage / 100)),
                'previous_investment_id' => $investment->id
            ]);
        $result = $investment->update(['reinvest_btn' => 1]);
        if (!$result) {
            $message = ['error' => 'Reinvestment failed'];
        }
        return redirect()->route('home')->with($message);
    }

    public function withdraw($id)
    {
        $message = ['success' => 'Withdrawal request was successful, You will be Matched soon...'];
        $investment = Investment::findorFail($id);
        if ($investment->withdraw_btn == 1) {
            return redirect()->back()->with('custom_error', 'Already withdrawn');
        }

//        $this->with
        $result = $investment->update([
            'withdraw_btn' => 1
        ]);
        if (!$result) {
            $message = ['error' => 'Withdrawal request failed'];
        }
        return redirect()->route('home')->with($message);;
    }

}
