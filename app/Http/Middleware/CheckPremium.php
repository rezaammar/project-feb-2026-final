<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPremium
{

    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->status->status !== 'Active')
        {
            return redirect('/dashboard/free');
        }

        return $next($request);
    }
}