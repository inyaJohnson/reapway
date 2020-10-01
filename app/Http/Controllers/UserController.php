<?php

namespace App\Http\Controllers;

use App\User;
use Hashids\Hashids;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('investment')->where('id', '!=', 1)->get();
        return view('users.index', compact('users'))
            ->with('i', (\request()->input('page', 1)-1)*10);
    }

    public function blocked(){
        $users = User::with('investment')
            ->where('blocked', 1)->get();
        return view('users.blocked', compact('users'))
            ->with('i', (\request()->input('page', 1)-1)*10);
    }

    public function unblock(Request $request){
        $user = User::find($request->id);
        $message = ['success' => $user->name. ' unblocked'];
        $result = $user->update(['blocked' => 0]);
        if(!$result){
            $message = ['error' => 'Unable to unblock '. $user->name  ];
        }
        return response()->json($message);
    }


    public function blockUser($id){
        $user = User::find($id);
        $message = ['success' => $user->name. ' unblocked'];
        $result = $user->update(['blocked' => 1]);
        if(!$result){
            $message = ['error' => 'Unable to block '. $user->name  ];
        }
        return response()->json($message);
    }

}
