<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function deny(){
        if(auth()->user()->blocked == 0){
            return redirect()->route('home');
        }
        return view('block-user.deny');
    }
}
