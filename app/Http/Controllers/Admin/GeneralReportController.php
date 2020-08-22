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
        return view('general-report.index');
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
