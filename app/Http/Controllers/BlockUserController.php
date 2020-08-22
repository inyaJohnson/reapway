<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function deny(){
        return view('block-user.deny');
    }
}
