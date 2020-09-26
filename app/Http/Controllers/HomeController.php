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
        if(!auth()->user()->hasRole('admin')){
            return view('home');
        }
        return view('admin.home');
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
