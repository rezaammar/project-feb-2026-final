<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->status()->create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'status'   => 'Not-Active',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
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
