<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Http\Controllers\Controller;
use App\Investment;
use App\Package;
use App\Transaction;
use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;

class GeneralReportController extends Controller
{
    public function index(){

        $investments = Investment::with('package')->get();
        $investmentPriceList = [];
        foreach ($investments as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));
        $availableWithdrawal = number_format(Withdrawal::where('match', 0)->sum('amount'));
        $totalWithdrawal = number_format(Transaction::where('recipient_status', 1)->sum('amount'));
        $referralBonus = '';
        $totalNumberOfInvestment = Investment::all()->count();
        $investments = Investment::with('withdrawal', 'user', 'package')->latest()->get();
        return view('general-report.index', compact('investments', 'totalInvestment',
            'totalWithdrawal', 'availableWithdrawal', 'totalNumberOfInvestment'));
    }

    public function show($id){
        $investment = Investment::find($id);
        $deposits = Transaction::where([
            ['depositor_id', $investment->user->id],
            ['depositor_status', 1],
        ])->latest()->get();

        return view('general-report.show', compact('deposits', 'investment'));
    }

    public function showRecipient($id)
    {
        $user = User::find($id);
        $investmentPriceList = [];
        foreach ($user->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));
        return view('general-report.recipient-info', compact('user', 'totalInvestment'));
    }
}
