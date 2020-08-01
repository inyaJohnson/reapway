<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if(!auth()->user()->hasRole('admin')){
//            return redirect()->route('home');
//        }
//        return $next($request);
        if(Gate::denies('admin-actions')){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
