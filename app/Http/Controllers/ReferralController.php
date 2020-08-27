<?php

namespace App\Http\Controllers;

use App\Account;
use App\Activator;
use App\Http\Requests\ReferredRequest;
use App\Investment;
use App\Package;
use App\Referral;
use App\Role;
use App\User;
use App\Withdrawal;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReferralController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $uncommittedInvestments = Investment::where('commitment', 0)->pluck('id')->toArray();
        $referrals = auth()->user()->referred->where('withdrawn', 0);
//        dd($referrals);
        $maturedReferrals = [];
        foreach ($referrals as $referral){
            if(!in_array($referral->investment_id, $uncommittedInvestments)){
                $maturedReferrals[] = $referral->amount;
            }
        }
        $totalWithdrawable = Withdrawal::where([['status', 0], ['match', 0], ['user_id', '!=', auth()->user()->id]])->pluck('amount')->sum();
        $availablePackages = Package::where([
            ['price', '<=', $totalWithdrawable],
            ['price', '<=', array_sum($maturedReferrals)],
            ['id', '!=', 1]
        ])->get();
        return view('referral.referral', compact('referrals', 'availablePackages'));
    }


    public function referralLink($id)
    {
        $referrerId = $id;
        return view('referral.register', compact('referrerId'));
    }

    public function referredRegistration(ReferredRequest $request)
    {

        $input = $request->validated();
//        USER REGISTRATION
        $role = Role::where('name', 'user')->first();
        $activator = Activator::inRandomOrder()->first();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'referral_code' => substr(md5(time()), 0, 16),
            'activator_id' => $activator->id
        ]);
        $user->role()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
//        REFERRAL REGISTRATION
        $message = ['error' => 'Referrer code does not exist'];
        $hashIds = new Hashids('Rocking_hard_067', 10);
        $referrer = User::where('id', $hashIds->decode($input['referrer_id'])[0])->first();
        if ($referrer !== null) {
            Referral::create([
                'user_id' => $referrer->id,
                'referral_code' => $referrer->referral_code,
                'amount' => 0,
                'referred_id' => $user->id
            ]);
            $message = ['success' => 'Congrats Your Referrer ' . $referrer->name . ' will receive the 5% bonus on your first Investment'];
        }

        auth()->login($user);
        return redirect()->route('home')->with($message);
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



//Referral::create([
//    'user_id' => $referrer->id,
//    'referral_code' => $referrer->referral_code,
//    'amount' => (auth()->user()->investment()->where('commitment', 1)->first()->package->price * 5) / 100,
//    'referred_id' => auth()->user()->id
//]);
