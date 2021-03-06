<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class BlockUser
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
        if(Gate::denies('block_user')){
//            dd(auth()->user()->blocked);
            return redirect()->route('blocked');;
        }
        return $next($request);
    }
}
