<?php


namespace App\Traits;


use App\Account;
use Hashids\Hashids;
use Illuminate\Http\Request;

trait ShowInfo
{
    public function showRecipient(Request $request)
    {
        $hashIds = new Hashids('Rocking_hard_067', 10);
        $account = Account::where('user_id', $request->recipientId)->first();
        $message = [
            'userId' => $hashIds->encode($request->recipientId),
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }


    public function showDepositor(Request $request)
    {
        $hashIds = new Hashids('Rocking_hard_067', 10);
        $account = Account::where('user_id', $request->depositorId)->first();
        $message = [
            'userId' => $hashIds->encode($request->depositorId),
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }

}
