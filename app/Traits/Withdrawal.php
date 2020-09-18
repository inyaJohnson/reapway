<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Withdrawal
{
    public function createWithdrawal($amount){
        auth()->user()->withdrawal()->create([
            'amount' => $amount
        ]);
    }

    public function confirmWithdrawal(Request $request){
        $withdrawal = \App\Withdrawal::find($request->id);
        $message = ['success' => 'Payment confirmed'];
        $result = $withdrawal->update(['confirmation_status' => 1]);
        if(!$result){
            $message = ['error' => 'Unable to confirmed Payment' ];
        }
        return response()->json($message);
    }

    public function uploadWithdrawalProof(Request $request){
        $rules = array(
            'attachment' => 'file|max:5000',
            'withdrawal_id' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return response()->json(['error' => $error->errors()->all()]);
        }
        $message = ['error' => 'No file uploaded'];
        if(isset($request->attachment)) {
            $attachmentName = time(). '.' . $request->attachment->extension();
            $request->attachment->move(public_path('store'), $attachmentName);
            $withdrawal = \App\Withdrawal::find($request->deposit_id);
            $withdrawal->update(['withdrawal_status' => 1, 'proof_of_payment' => $attachmentName]);
            $message = array(
                'success' => 'Upload Successful',
                'image' => '<embed src="/reapway/public/store/'.$attachmentName.'" class="img-thumbnail" />'
            );
        }
        return response()->json($message);
    }

}
