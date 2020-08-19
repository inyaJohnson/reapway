<?php

namespace App\Http\Controllers;

use App\Account;
use App\Investment;
use App\Transaction;
use Carbon\Carbon;
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
        ])->orWhere(function ($query){
            $query->where([
                ['recipient_id', auth()->user()->id],
                ['depositor_status', 1],
                ['recipient_status', 0]
            ]);
        })->get();

        return view('transaction.withdraw', compact('transactions'));
    }

    public function history(){

        $deposits = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 1],
        ])->latest()->get();

        $withdrawals = Transaction::where([
            ['recipient_id', auth()->user()->id],
            ['recipient_status', 1]
        ])->latest()->get();
        return view('transaction.history', compact('deposits', 'withdrawals'));
    }

    public function showRecipient(Request $request)
    {
        $account = Account::where('user_id', $request->recepientId)->first();
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
        $account = Account::where('user_id', $request->recepientId)->first();
        $message = [
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }

    public function confirmWithdrawal(Request $request){
        $transaction = Transaction::find($request->id);
        $message = ['success' => 'Payment confirmed'];
        $result = $transaction->update(['recipient_status' => 1]);
        if(!$result){
            $message = ['success' => 'Unable to confirmed Payment' ];
        }
        return response()->json($message);
    }

    public function confirmDeposit(Request $request){
        $input = $this->validate($request, [
           'attachment' => 'max:2048',
            'transaction_id' => 'required'
        ]);
        $message = ['error' => 'No file uploaded'];
        if(isset($input['attachment'])) {
            $attachmentName = $input['transaction_id'] . '.' . $input['attachment']->extension();
            $input['attachment']->move(public_path('store'), $attachmentName);
            $transaction = Transaction::find($input['transaction_id']);
            $message = ['success' => 'Payment confirmed'];
            $transaction->update(['depositor_status' => 1, 'proof_of_payment' => $attachmentName]);
        }
        return response()->json($message);
    }
}
