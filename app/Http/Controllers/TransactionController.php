<?php

namespace App\Http\Controllers;

use App\Account;
use App\Traits\ShowInfo;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    use ShowInfo;

    public function history(){

        $deposits = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 1],
            ['recipient_status', 1]
        ])->latest()->get();

        $withdrawals = Transaction::where([
            ['recipient_id', auth()->user()->id],
            ['depositor_status', 1],
            ['recipient_status', 1]
        ])->latest()->get();
        return view('transaction.history', compact('deposits', 'withdrawals'));
    }
}
