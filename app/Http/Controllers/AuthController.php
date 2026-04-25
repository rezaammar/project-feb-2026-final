<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    // FORM REGISTER
    public function register()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function registerProcess(Request $request)
    {
        $otp = rand(100000, 999999);
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        //buat kirim data ke page verify (perhitungan mundur)
        // $otpExpiresAt = Carbon::now()->addMinutes(1);

        $user = User::create([
            // 'username' => $validated['username'],
            // 'email'    => $validated['email'],
            // 'password' => Hash::make($validated['password']),
            // 'role_id' => 1, //1 = user
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addSeconds(120)
        ]);
        // $user->status()->create([
        //     'username' => $validated['username'],
        //     'email'    => $validated['email'],
        //     'status'   => 'Not-Active',
        // ]);

        session([
            'register_data' => [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp,
                'otp_expires_at' => Carbon::now()->addSeconds(120)
            ]
        ]);

        Mail::raw("Kode OTP kamu: $otp (berlaku 2 menit)", function ($msg) use ($request) {
        $msg->to($request->email)->subject('Verifikasi Email');
        });
        
        // return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
        return redirect('/verify-otp');
        // return redirect()->route('verify.page', ['data' => $otpExpiresAt]);
    }

    // FORM LOGIN
    public function login()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            // return redirect('/dashboard2');
            $user = Auth::user();
            $status = $user->status;

            // if($status->status === 'Active')
            // {

            //     if($status->end_date && Carbon::today()->gt($status->end_date))
            //     {

            //         $status->update([
            //             'status' => 'Not-active'
            //         ]);

            //         $request->session()->regenerate();
            //         return redirect('/dashboard/free')
            //         ->with('expired','masa aktif kamu sudah habis, silahkan diperpanjang lagi');

            //     }

            //     $request->session()->regenerate();
            //     return redirect('/dashboard/premium');
            // }


            if ($status->status === 'Active' && $status->end_date >= Carbon::now()) {
                $request->session()->regenerate();
                //penentuan admin bukan
                if ($user->role_id === 2 || $user->role_id === 3) {
                    return redirect('/admin');
                }
                return redirect('/dashboard/premium');
            } else {
                $request->session()->regenerate();
                return redirect('/dashboard/free');
            }



        }

        return back()->with('error', 'Email atau password salah');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
