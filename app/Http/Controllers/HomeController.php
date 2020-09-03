<?php

namespace App\Http\Controllers;

use App\Account;
use App\Investment;
use App\Traits\ConfirmTransaction;
use App\Traits\ShowInfo;
use App\Transaction;
use App\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use ShowInfo, ConfirmTransaction;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' =>'verified'])->except(['welcome', 'setup']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalWithdrawn = auth()->user()->withdrawal()->where('status', 1)->count();
        $pendingWithdrawal = auth()->user()->withdrawal()->where('status', 0)->count();
        $totalNumberInvestment = auth()->user()->investment->count();
        $investmentPriceList = [];
        foreach (auth()->user()->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));

        $deposits = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['recipient_status', 0]
        ])->get();

        $withdrawals = Transaction::where([
            ['recipient_id', auth()->user()->id],
            ['recipient_status', 0]
        ])->get();

        $depositDeadline = Transaction::where([
            ['depositor_id', auth()->user()->id],
            ['depositor_status', 0],
            ['recipient_status', 0]
        ])->first();

        return view('home', compact('totalWithdrawn', 'pendingWithdrawal', 'totalNumberInvestment',
            'totalInvestment', 'deposits', 'depositDeadline', 'withdrawals'));
    }

    public function welcome(){
        return view('welcome');
    }

    public function setup(){
        Artisan::call('migrate');
        Artisan::call('db:seed');
        return 'Database setup successfully';
    }
}
