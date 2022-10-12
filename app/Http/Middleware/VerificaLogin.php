<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificaLogin
{
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('user')){
            return redirect()->route('home');
        }
        
        return $next($request);
    }
}
