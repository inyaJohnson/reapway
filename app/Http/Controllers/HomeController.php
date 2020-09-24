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
        $this->middleware(['auth'])->only('index');
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

        //        $investments = Investment::all();
        if (!auth()->user()->hasRole('admin')) {
            $investments = auth()->user()->investment;
        }
        return view('home', compact('totalWithdrawn', 'pendingWithdrawal', 'totalNumberInvestment',
            'totalInvestment', 'deposits', 'withdrawals', 'investments'));
    }

    public function welcome(){
        return view('welcome');
    }

    public function about(){
        return view('other_pages.about');
    }

    public function setup(){
        Artisan::call('migrate');
        Artisan::call('db:seed');
        return 'Database setup successfully';
    }
}
