<?php

namespace App\Http\Controllers;

use App\Account;
use App\Referral;
use App\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $referrals = auth()->user()->referred;
        return view('referral.referral', compact('referrals'));
    }

    public function storeReferral(Request $request)
    {
        $input = $this->validate($request, [
            'referrer_code' => 'required|string'
        ]);
        $message = ['error' => 'Referrer code does not exist'];
        $user = User::where('referral_code', $input['referrer_code'])->first();
        if ($user !== null) {
            Referral::create([
                'user_id' => $user->id,
                'referral_code' => $user->referral_code,
                'amount' => (auth()->user()->investment()->where('commitment', 1)->first()->package->price * 5) / 100,
                'referred_id' => auth()->user()->id
            ]);
            $message = ['success' => 'Congrats Your Referrer ' . $user->name . ' will receive the bonus'];
        }
        return response()->json($message);
    }

    public function withdrawReferralBonus($id)
    {
        $referred = Referral::find($id);
        $referred->update(['apply_for_withdrawal' => 1]);
        return redirect()->back()->with('success', 'Your application for referral bonus payment was successful,
         payment will be done within 24hrs.');
    }

    public function payment(){
        $referrerToPay = Referral::where('apply_for_withdrawal', 1)->latest()->get();
        return view('referral.payment', compact('referrerToPay'));
    }

    public function showReferrerInfo(Request $request){
        $account = Account::where('user_id', $request->referrerId)->first();
        $message = [
            'name' => $account->name,
            'number' => $account->number,
            'bank' => $account->bank,
            'phone' => $account->user->phone
        ];
        return response()->json($message);
    }

    public function confirmWithdrawal(Request $request){
        $referral = Referral::find($request->id);
        $message = ['success' => 'Payment confirmed'];
        $result = $referral->update(['withdrawn' => 1]);
        if(!$result){
            $message = ['success' => 'Unable to confirmed Payment' ];
        }
        return response()->json($message);
    }
}
