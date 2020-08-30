<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\Transaction;
use Hashids\Hashids;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    public function index(){
        $adminRoles = Role::with('user')->whereIn('name', ['admin', 'super-admin'])->get();
        return view('admin.index', compact('adminRoles'))
            ->with('i', (\request('page', 1)-1)*10);
    }

    public function show($id){
        $hashId = new Hashids('Rocking_hard_067', 10);
        $deposits = Transaction::where([
            ['depositor_id', $hashId->decode($id)[0]],
            ['depositor_status', 1],
        ])->latest()->get();

        $withdrawals = Transaction::where([
            ['recipient_id', $hashId->decode($id)[0]],
            ['recipient_status', 1]
        ])->latest()->get();
        return view('admin.show', compact('deposits', 'withdrawals'));
    }
}
