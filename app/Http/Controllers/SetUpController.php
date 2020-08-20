<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SetUpController extends Controller
{
    public function index(){
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('migrate');
        Artisan::call('db:seed');
        return 'Database successfully setup';
    }
}
