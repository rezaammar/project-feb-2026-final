<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EnsurePremiumMember
{

    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();

        if(!$user){
            return redirect('/login');
        }

        // jika user tidak punya status
        if(!$user->status->status){
            return redirect('/dashboard/free')
                ->with('error','Akun anda belum premium');
        }

        $status = $user->status->status;
        $end_date = $user->status->end_date;

        // cek apakah premium masih aktif
        if($status == 'Active' && $end_date >= Carbon::today()){
            return $next($request);
        }

        // jika expired
        return redirect('/dashboard/free')
            ->with('error','Akun premium anda sudah expired');

    }

}