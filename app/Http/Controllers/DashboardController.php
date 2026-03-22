<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Paketnew;

// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $userName = Auth::user()->username;
    //     $packages = Paketnew::all();
    //     return view('dashboard2', compact('packages', 'userName'));
    // }
    public function premium()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        return view('premium', compact('packages', 'userName'));
        
    }

    public function free()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        return view('dashboard2', compact('packages', 'userName'));
    }
}
