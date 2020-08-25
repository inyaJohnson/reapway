<?php

namespace App\Http\Controllers;

use App\Account;
use App\Investment;
use App\Package;
use App\Referral;
use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $referrals = auth()->user()->referred;
        $totalWithdrawable = Withdrawal::where([['status', 0], ['match', 0], ['user_id', '!=', auth()->user()->id]])->pluck('amount')->sum();
        $availablePackages = Package::where([
            ['price', '<=', $totalWithdrawable],
            ['price', '<=', $referrals->where('withdrawn', 0)->pluck('amount')->sum()],
            ['id', '!=', 1]
        ])->get();
        return view('referral.referral', compact('referrals', 'availablePackages'));
    }

    public function storeReferral(Request $request)
    {
        $input = $this->validate($request, [
            'referrer_code' => 'required|string'
        ]);
        $message = ['error' => 'Referrer code does not exist'];
        $referrer = User::where('referral_code', $input['referrer_code'])->first();
        if ($referrer !== null) {
            if(auth()->user()->investment()->where('commitment', 1)->first() !== null){
                Referral::create([
                    'user_id' => $referrer->id,
                    'referral_code' => $referrer->referral_code,
                    'amount' => (auth()->user()->investment()->where('commitment', 1)->first()->package->price * 5) / 100,
                    'referred_id' => auth()->user()->id
                ]);
                $message = ['success' => 'Congrats Your Referrer ' . $referrer->name . ' will receive the bonus'];
                return response()->json($message);
            }
            $message = ['error' => 'Invest first, to enable your referrer he/her bonus'];
        }
        return response()->json($message);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function referralInvestmentStore(Request $request)
    {
        $package = Package::where('id', $request->package_id)->firstOrFail();
        Investment::create([
            'user_id' => auth()->user()->id,
            'package_id' => $package->id,
            'percentage' => $package->percentage,
            'duration' => $package->duration,
            'profit' => round($package->price * ($package->percentage / 100))
        ]);

        $referralBalance = auth()->user()->referred()->where('withdrawn', 0)->pluck('amount')->sum() - $package->price;
        auth()->user()->referred()->update([
            'withdrawn' => 1
        ]);

        $referral = auth()->user()->referred()->latest()->first();

        Referral::create([
            'user_id' => $referral->user_id,
            'referral_code' => $referral->referral_code,
            'amount' => $referralBalance,
            'referred_id' => auth()->user()->id
        ]);

        return redirect()->route('investment.index')->with('success', 'investment successful');
    }

}
