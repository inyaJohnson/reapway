<?php


namespace App\Http\View\Composers;


use App\Role;
use Illuminate\View\View;

class Admin
{
    public function compose(View $view){
        $adminRoles = Role::with('user')->whereIn('name', ['admin', 'super-admin'])->get();
        $count = [];
        foreach ($adminRoles as $role){
            $count[] = $role->user()->count();
        }
        $adminCount = array_sum($count);
        return $view->with(['adminCount' => $adminCount]);
    }
}
