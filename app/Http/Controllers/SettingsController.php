<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

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

    public function password()
    {
        return view('settings.password');
    }

    public function createAccount()
    {
        return view('settings.account');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('settings.edit', compact('user'));
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

    public function updateContactInfo(Request $request)
    {
        $input = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
//            'email' => Rule::unique('users')->ignore(auth()->user()->id, 'id'),
            'phone' => ['required', 'digits:11'],
        ]);
        auth()->user()->update($input);
        return redirect()->route('settings.index')->with('success', 'Contact successfully updated');

    }

    public function updateAccountInfo(AccountRequest $request)
    {
        $input = $request->validated();
        auth()->user()->account()->update($input);
        return redirect()->route('settings.index')->with('success', 'Account successfully updated');
    }

}
