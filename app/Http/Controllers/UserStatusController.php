<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\UserStatus;


class UserStatusController extends Controller
{
    public function index()
    {
        // Mengambil user yang sedang login beserta datanya di tabel user_status
        $user = User::with('status')->find(auth()->id());
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        // Mengambil user yang sedang login beserta datanya di tabel user_status
        $user = User::with('status')->find(auth()->id());
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $setting = UserStatus::where('user_id', $id)->firstOrFail();
        $user = User::where('id', $id)->firstOrFail();

        $request->validate([
            'bio' => 'nullable|string|max:500',

            'phone' => 'required|numeric|digits_between:10,15',

            'username' => 'required|string|min:3|max:20|unique:users,username'
        ]);

        $setting->update([
            'bio' => $request->bio,
            'phone' => $request->phone,
            'username' => $request->username,
        ]);
        $user->update([
            'username' => $request->username,
        ]);

        // $user->status()->create([
        //     'status'   => 'Not-Active',
        // ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function editfoto()
    {
        // Mengambil user yang sedang login beserta datanya di tabel user_status
        $user = User::with('status')->find(auth()->id());
        return view('profile.fotoprofile', compact('user'));
    }
    public function updatePhoto(Request $request, $id)
    {
        $setting = UserStatus::where('user_id', $id)->firstOrFail();

        // VALIDASI
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048' //2mb
        ]);

        // HAPUS FOTO LAMA
        if ($setting->avatar) {
            // CEK DI STORAGE
            if (Storage::disk('public')->exists($setting->avatar)) {
                Storage::disk('public')->delete($setting->avatar);
            }

            // CEK DI PUBLIC (images/)
            // $publicPath = public_path('images/' . $setting->avatar);

            // if (File::exists($publicPath)) {
            //     File::delete($publicPath);
            // }
        }

        // UPLOAD FOTO BARU
        $path = $request->file('photo')->store('profile', 'public');

        // SIMPAN KE DATABASE
        $setting->update([
            'avatar' => $path
        ]);

        return back()->with('success', 'Foto berhasil diupdate');
    }
    // public function updateAddress(Request $request, User $user)
    // {
    //     $user = auth()->user();

    //     $user = User::with('status')->update([
    //         'address' => $request->address
    //     ]);

    //     return back()->with('success', 'Alamat berhasil diperbarui!');
    // }
}
