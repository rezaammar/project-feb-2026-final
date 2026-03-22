<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class UserStatusController extends Controller
{
    public function index()
    {
        // Mengambil user yang sedang login beserta datanya di tabel user_status
        $user = User::with('status')->find(auth()->id());
        return view('profile.index', compact('user'));
    }

    public function updateAddress(Request $request, User $user)
    {
        $user = auth()->user();

        $user = User::with('status')->update([
            'address' => $request->address
        ]);

        return back()->with('success', 'Alamat berhasil diperbarui!');
    }
}
