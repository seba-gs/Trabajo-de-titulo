<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next){
        
        if (Auth::user()->rol_id != 1){
            return view('general.index');
        }
        return $next($request);
    }
}
