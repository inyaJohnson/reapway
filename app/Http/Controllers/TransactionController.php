<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function deposit()
    {
        $transactions = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 0],
            ['recipient_status', 0]
        ])->get();

        return view('transaction.deposit', compact('transactions'));
    }


    public function withdrawal()
    {
        $transactions = Transaction::where([
            ['recipient_id', auth()->user()->id],
            ['depositor_status', 0],
            ['recipient_status', 0]
        ])->get();

        return view('transaction.withdraw', compact('transactions'));
    }

    public function showRecipient(Request $request)
    {
        $account = Account::find($request->id);
        $message = [
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }


    public function showDepositor(Request $request)
    {
        $account = Account::find($request->id);
        $message = [
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }
}
