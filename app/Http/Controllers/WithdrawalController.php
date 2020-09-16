<?php

namespace App\Http\Controllers;

use App\Investment;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $investments = auth()->user()->investment->where('withdrawn', 0);
        return view('withdrawal.index', compact('investments'));
    }


    public function withdrawToBalance(){

    }


    public function actualWithdrawal(){

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        return view('withdrawal.request');
    }

}
