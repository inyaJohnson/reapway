<?php

namespace App\Http\Controllers;

use App\Investment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
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
        $latestInvestment = auth()->user()->investment()->latest()->first();
        $totalWithdrawn = auth()->user()->withdrawal()->where('status', 1)->count();
        $pendingWithdrawal = auth()->user()->withdrawal()->where('status', 0)->count();
        $totalNumberInvestment = auth()->user()->investment->count();
        $investmentPriceList = [];
        foreach (auth()->user()->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));
        return view('home', compact('totalWithdrawn', 'pendingWithdrawal', 'totalNumberInvestment',
            'totalInvestment', 'latestInvestment'));
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
