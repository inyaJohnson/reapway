<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestRequest;
use App\Investment;
use App\Package;
use App\Traits\Deposit;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends Controller
{
    use Deposit;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!auth()->user()->hasRole('admin')) {
            $investments = auth()->user()->investment;
        }
        return view('investment.index', compact('investments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function invest()
    {
        if (auth()->user()->account === null) {
            return redirect()->route('settings.account')->with('success', 'Enter Your Bank Account Information for payment before investing');
        }
        $packages = Package::all();
        return view('investment.invest', compact('packages'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InvestRequest $request)
    {
        $package = Package::where([
            ['mini_price', '<=', $request->amount],
            ['max_price', '>=', $request->amount]
        ])->first();
        if ($package !== null) {
            $message = ['success' => 'Investment successful. Proceed with payment and Upload proof'];
            $investment = auth()->user()->investment()->create([
                'package_id' => $package->id,
                'capital' => $request->amount,
                'type' => 'deposit'
            ]);
            $this->createDeposit($investment);
            return redirect()->route('deposit.transaction')->with($message);
        }
        return redirect()->back()->withErrors('Package not available, Please check package list for available packages');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function reinvest()
    {
        if (auth()->user()->account === null) {
            return redirect()->route('settings.account')->with('success', 'Enter Your Bank Account Information for payment before investing');
        }
        $packages = Package::where('mini_price', '<=', auth()->user()->actual_balance)->get();
        return view('investment.reinvest', compact('packages'));
    }


    /**
     * @param InvestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReinvestment(InvestRequest $request)
    {
        $package = Package::where([
            ['mini_price', '<=', $request->amount],
            ['max_price', '>=', $request->amount]
        ])->first();
        if ($package !== null) {
            $message = ['success' => 'Investment successful. Proceed with payment and Upload proof'];
            auth()->user()->investment()->create([
                'package_id' => $package->id,
                'capital' => $request->amount,
                'status' => 1,
                'type' => 'reinvestment'
            ]);
            $newBalance = auth()->user()->actual_balance - $request->amount;
            auth()->user()->update(['actual_balance' => $newBalance]);
            return redirect()->route('home')->with($message);
        }
        return redirect()->back()->withErrors('Package not available, Please check package list for available packages');
    }

    public function withdraw($id)
    {
        $hashIds = new Hashids('ReapWay', 10);
        $message = ['success' => 'Withdrawal Successful'];
        $investment = Investment::findorFail($hashIds->decode($id)[0]);
        if ($investment->withdrawn == 1) {
            return redirect()->back()->with('custom_error', 'Already withdrawn');
        }
        $ROI = (($investment->capital * $investment->package->percentage) / 100) + $investment->capital;  //Return On Investment
        $newBalance = $investment->user->actual_balance + $ROI;
        $investment->user()->update(['actual_balance' => $newBalance]);
        $result = $investment->update(['withdrawn' => 1]);
        if (!$result) {
            $message = ['error' => 'Withdrawal request failed'];
        }
        return redirect()->route('home')->with($message);;
    }


//    Using paystack
//    public function store(InvestRequest $request)
//    {
//        $package = Package::where([
//            ['mini_price', '<=', $request->amount],
//            ['max_price', '>=', $request->amount]
//        ])->first();
//        if($package !== null){
//            $message = ['success' => 'Your request for the '.$package->name .' was successful. Proceed with payment'];
//            $amount = $request->amount.'00';
//            return view('payment.create', compact('message', 'package', 'amount'));
//        }
//        return redirect()->route('home')->withErrors('Package not available');
//    }

}
