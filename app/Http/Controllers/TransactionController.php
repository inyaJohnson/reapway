<?php

namespace App\Http\Controllers;

use App\Account;
use App\Deposit;
use App\Traits\ShowInfo;
use App\Transaction;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    use ShowInfo;

    public function history(){
        $deposits = Deposit::where([
            ['user_id', auth()->user()->id],
            ['deposit_status', 1],
            ['confirmation_status', 1]
        ])->latest()->get();

        $withdrawals = Withdrawal::where([
            ['user_id', auth()->user()->id],
            ['withdrawal_status', 1],
            ['confirmation_status', 1]
        ])->latest()->get();
        return view('transaction.history', compact('deposits', 'withdrawals'));
    }
}
