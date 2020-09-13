<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestRequest;
use App\Investment;
use App\Package;
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
        $investments = Investment::all();
        if(!auth()->user()->hasRole('admin')){
            $investments = auth()->user()->investment;
        }
        return view('investment.index', compact('investments'));
    }

    /**
     * @param InvestRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(InvestRequest $request)
    {
        $package = Package::where([
            ['mini_price', '<=', $request->amount],
            ['max_price', '>=', $request->amount]
        ])->first();
        if($package !== null){
            $message = ['success' => 'Your request for the '.$package->name .' was successful. Proceed with payment'];
            $amount = $request->amount.'00';
            return view('payment.create', compact('message', 'package', 'amount'));
        }
        return redirect()->route('home')->withErrors('Package not available');
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



//    public function store(InvestRequest $request)
//    {
//        $message = ['success' => 'Investment successful'];
//        $package = Package::where([
//            ['mini_price', '<=', $request->amount],
//            ['max_price', '>=', $request->amount]
//        ])->first();
//
//        if($package !== null){
//            $investment = auth()->user()->investment()->create([
//                'package_id' => $package->id,
//                'percentage' => $package->percentage,
//                'duration' => $package->duration,
//                'capital' => $request->amount
//            ]);
////            $this->create($package->id, $investment->id, $package->price);
//            return redirect()->route('home')->with($message);
//        }
//        return redirect()->route('home')->withErrors('Package not available');
//    }


}
