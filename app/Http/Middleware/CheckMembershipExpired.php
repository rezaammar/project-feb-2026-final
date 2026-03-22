<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckMembershipExpired
{

    public function handle(Request $request, Closure $next)
    {

        if(Auth::check())
        {

            $status = Auth::user()->status;

            if($status && $status->status == 'Active')
            { 
                //alternatif manual sebaiknya pilih yg bawah agar sesama objek carbon
                // if($status->end_date && $status->end_date < Carbon::today())
                if(( $status->end_date && Carbon::today()->gt($status->end_date) ) || ( $status->end_date && $status->end_date < Carbon::today() ) )
                {

                    $status->update([
                        'status' => 'Not-active'
                    ]);

                    return redirect('/dashboard/free')
                    ->with('expired','masa aktif kamu sudah habis, silahkan diperpanjang lagi');

                }
                if(!$status->end_date) {
                    $status->update([
                        'status' => 'Not-active'
                    ]);
                    return redirect('/dashboard/free')
                    ->with('expired','masa aktif kamu sudah habis, silahkan diperpanjang lagi');
                }

            }

        }

        return $next($request);
    }

}