<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function showForgot()
    {
        return view('auth.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $token = Str::random(64);
        $exists = User::where('email', $request->email)->exists();

        //  Cek Email di Database
        if (!$exists) {
            return back()->with('error', 'Email belum terdaftar');
        }

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        $link = url('/reset-password/' . $token);

        Mail::raw("Reset password: $link", function ($msg) use ($request) {
            $msg->to($request->email)->subject('Reset Password');
        });

        return back()->with('success', 'Link reset dikirim');
    }

    public function showReset($token)
    {
        return view('auth.reset', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $data = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$data) {
            return back()->with('error', 'Token tidak valid');
        }

        User::where('email', $data->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
            ->where('email', $data->email)
            ->delete();

        return redirect('/login')->with('success', 'Password berhasil diubah');
    }
}