<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


trait Deposit
{
    public function  createDeposit($investment){
        auth()->user()->deposit()->create([
            'package_id' => $investment->package_id,
            'investment_id' => $investment->id,
            'amount' => $investment->capital,
        ]);
    }

    public function confirmDeposit(Request $request){
        $deposit = \App\Deposit::find($request->id);
        $message = ['success' => 'Payment confirmed'];
        $deposit->update(['confirmation_status' => 1]);
        $result = $deposit->investment()->update(['status' => 1]);
        if(!$result){
            $message = ['error' => 'Unable to confirmed Payment' ];
        }
        return response()->json($message);
    }

    public function uploadDepositProof(Request $request){
        $rules = array(
            'attachment' => 'file|max:5000',
            'deposit_id' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return response()->json(['error' => $error->errors()->all()]);
        }
        $message = ['error' => 'No file uploaded'];
        if(isset($request->attachment)) {
            $attachmentName = time(). '.' . $request->attachment->extension();
            $request->attachment->move(public_path('store'), $attachmentName);
            $deposit = \App\Deposit::find($request->deposit_id);
            $deposit->update(['deposit_status' => 1, 'proof_of_payment' => $attachmentName]);
            $message = array(
                'success' => 'Upload Successful',
                'image' => '<embed src="/reapway/public/store/'.$attachmentName.'" class="img-thumbnail" />'
            );
        }
        return response()->json($message);
    }

}
