<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function showOtp()
    {   
        $data = session('register_data');
        $otpExpiresAt = $data['otp_expires_at']->toIso8601String();
        // $otpExpiresAt = $data;
        // dd($otpExpiresAt);
        return view('auth.verify', compact('otpExpiresAt'));
    }

    public function verifyOtp(Request $request)
    {
        $data = session('register_data');
        $user = User::where('otp', $data['otp'])->first();
        $userStatus = UserStatus::where('email', $data['email'])->first();
         //cek ricek
        // dd($user);

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        //  CEK OTP EXPIRED
        if (Carbon::now()->gt($user->otp_expires_at)) {
            $user->delete();
            
            return redirect('/register')->with('error', 'OTP expired, silakan daftar ulang');
            
        }

        //  CEK OTP SALAH
        if ($user->otp != $request->otp) {
            return back()->with('error', 'OTP salah');
        }

        //  SUCCESS
        $user->update([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => $data['password'],
            'role_id' => 1, //1 = user
            'otp' => null,
            'otp_expires_at' => null,
            'email_verified_at' => now()
        ]);

        $user->status()->create([
            'username' => $data['username'],
            'email'    => $data['email'],
            'status'   => 'Not-Active',
        ]);

        // Auth::login($user);

        return redirect('/login')->with('success', 'Akunmu sudah diverifikasi dan silakan login');
    }
}