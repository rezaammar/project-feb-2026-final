<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserStatusController3 extends Controller
{
 /**
     * Display user profile
     */
public function profile()
{
    $user = auth()->user();

    return view('profile', compact('user'));
}
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Show form edit profile
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('profile_edit', compact('user'));
    }

    /**
     * Update profile
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload avatar baru
        if ($request->hasFile('avatar')) {

            if ($user->avatar && Storage::disk('public')->exists(str_replace('/storage/', '', $user->avatar))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->avatar));
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = '/storage/' . $path;
        }

        $user->name    = $request->name;
        $user->bio     = $request->bio;
        $user->phone   = $request->phone;
        $user->address = $request->address;

        // $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated!');
    }
}
