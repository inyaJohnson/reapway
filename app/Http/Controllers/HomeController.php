<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Investment;
use App\Traits\ShowInfo;
use App\Withdrawal;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    use ShowInfo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'])->except(['welcome', 'setup']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalWithdrawn = auth()->user()->withdrawal()->where('confirmation_status', 1)->count();
        $pendingWithdrawal = auth()->user()->withdrawal()->where('confirmation_status', 0)->count();
        $totalNumberInvestment = auth()->user()->investment->count();
        $investmentPriceList = [];
        foreach (auth()->user()->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));

        $deposits = Deposit::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        $withdrawals = Withdrawal::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        return view('home', compact('totalWithdrawn', 'pendingWithdrawal', 'totalNumberInvestment',
            'totalInvestment', 'deposits', 'withdrawals'));
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
