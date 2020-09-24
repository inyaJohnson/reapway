<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    use \App\Traits\Deposit;

    public function transaction(){
        $deposits = Deposit::latest()->get();
        return view('deposit.transaction', compact('deposits'));
    }
}
