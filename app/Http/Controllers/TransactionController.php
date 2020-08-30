<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function deposit()
    {
        $transactions = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 0],
            ['recipient_status', 0]
        ])->get();

        $depositDeadline = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 0],
            ['recipient_status', 0]
        ])->first();
        return view('transaction.deposit', compact('transactions', 'depositDeadline'));
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
        $account = Account::where('user_id', $request->recipientId)->first();
        $message = [
            'userId' => $request->recipientId,
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }


    public function showDepositor(Request $request)
    {
        $account = Account::where('user_id', $request->depositorId)->first();

        $message = [
            'userId' => $request->depositorId,
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
            $message = ['error' => 'Unable to confirmed Payment' ];
        }
        return response()->json($message);
    }

    public function confirmDeposit(Request $request){
        $rules = array(
           'attachment' => 'file|max:2048',
            'transaction_id' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return response()->json(['error' => $error->errors()->all()]);
        }
        $message = ['error' => 'No file uploaded'];
        if(isset($request->attachment)) {
            $attachmentName = time(). '.' . $request->attachment->extension();
            $request->attachment->move(public_path('store'), $attachmentName);
            $transaction = Transaction::find($request->transaction_id);
            $transaction->update(['depositor_status' => 1, 'proof_of_payment' => $attachmentName]);
            $message = array(
                'success' => 'Payment confirmed',
                'image' => '<embed src="/rocket_pay/public/store/'.$attachmentName.'" class="img-thumbnail" />'
            );
        }
        return response()->json($message);
    }
}
