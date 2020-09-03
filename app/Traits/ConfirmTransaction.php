<?php


namespace App\Traits;


use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ConfirmTransaction
{
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
                'success' => 'Upload Successful',
                'image' => '<embed src="/rocket_pay/public/store/'.$attachmentName.'" class="img-thumbnail" />'
            );
        }
        return response()->json($message);
    }

}
