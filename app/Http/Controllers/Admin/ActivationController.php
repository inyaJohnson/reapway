<?php

namespace App\Http\Controllers\Admin;

use App\Activator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function index(){
        $users = User::where('activation', 0)->get();
        return view('activation.index', compact('users'));
    }

    public function store($id){
        $user = User::find($id);
        $message = ['error' =>'Unable to activate user'];
        if ($user !== null ){
            $user->update(['activation' => 1]);
            $message = ['success' => 'User activation successful'];
        }
        return response()->json($message);
    }

    public function deny(){
        $activatorId = auth()->user()->activator->id;
        return view('activation.deny', compact('activatorId'));
    }

    public function showActivator(Request $request){
        $activator = Activator::find($request->activatorId);
        $message = ['error' => 'Activator does not exits'];
        if($activator !== null){
            $message = [
                'name' => $activator->account_name,
                'number' => $activator->account_number,
                'bank' => $activator->bank,
                'phone' => $activator->phone
            ];
        }
        return response()->json($message);
    }
}
