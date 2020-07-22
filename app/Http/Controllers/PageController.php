<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

}
