<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawalRequest;
use App\Traits\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    use Withdrawal;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $withdrawals = \App\Withdrawal::with('user')->get();
        if(!auth()->user()->hasRole('admin')){
            $withdrawals = auth()->user()->withdrawal;
        }
        return view('withdrawal.index', compact('withdrawals'));
    }


    public function withdrawToBalance()
    {

    }


    public function actualWithdrawal(WithdrawalRequest $request)
    {
        $request->validated();
        if ($request->amount > auth()->user()->account_balance) {
            return redirect()->back()->withErrors('You can not withdraw more than your available balance');
        }
        $message = ['success' => 'Your withdrawal request was successfully placed'];
        $this->createWithdrawal($request->amount);
        return redirect()->route('withdrawal.index')->with($message);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        return view('withdrawal.request');
    }

}
