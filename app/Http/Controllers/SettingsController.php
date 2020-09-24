<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\SettingsRequest;
use App\User;

class SettingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $investmentPriceList = [];
        foreach (auth()->user()->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));
        return view('settings.index', compact('totalInvestment'));
    }


    public function createAccount()
    {
        return view('settings.account');
    }

    public function storeAccount(AccountRequest $request)
    {
        $input = $request->validated();
        $input['user_id'] = auth()->user()->id;
        Account::create($input);
        if(auth()->user()->hasAnyRole(['admin', 'super-admin'])){
            return redirect()->route('home')->with('success', 'Account successfully created.');
        }
        return redirect()->route('investment.invest')->with('success', 'Account successfully created, Invest now!');
    }

    public function update(SettingsRequest $request)
    {
        auth()->user()->update($request->all());
        auth()->user()->account()->update([
            'name' => $request->account_name,
            'number' => $request->account_number,
            'bank' => $request->bank,
        ]);
        return redirect()->route('settings.index')->with('success', 'Contact successfully updated');

    }

}
