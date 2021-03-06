<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawalRequest;
use App\Investment;
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
            return view('withdrawal.index');
    }


    /**
     * @param WithdrawalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function withdrawalRequest(WithdrawalRequest $request)
    {
        if ($request->amount > auth()->user()->actual_balance) {
            return redirect()->back()->withErrors('You can not withdraw more than your available balance');
        }
        $message = ['success' => 'Your withdrawal request was successfully placed'];
        $this->createWithdrawal($request->amount);
        $newBalance = auth()->user()->actual_balance - $request->amount;
        auth()->user()->update(['actual_balance' => $newBalance]);
        return redirect()->route('withdrawal.transaction')->with($message);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function transaction()
    {
        $withdrawals = \App\Withdrawal::with('user')->get();
        if(!auth()->user()->hasRole('admin')){
            $withdrawals = auth()->user()->withdrawal;
        }
        return view('withdrawal.transaction', compact('withdrawals'));
    }

}
