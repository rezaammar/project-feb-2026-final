<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Paketnew;

// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function payment()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        
        return view('dashboard2', compact('packages', 'userName'));
    }
    
    // public function premium()
    // {
    //     $userName = Auth::user()->username;
    //     $packages = Paketnew::all();
    //     return view('premium', compact('packages', 'userName'));
        
    // }

    // public function free()
    // {
    //     $userName = Auth::user()->username;
    //     $packages = Paketnew::all();
    //     return view('dashboard2', compact('packages', 'userName'));
    // }

    public function premium()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        $jenisDashboard = "Premium";
        $isCollapsed = Book::getValue('user_section_collapse');
        $book = Book::find(1);
        return view('fitur.home.index', compact('packages', 'userName','jenisDashboard', 'isCollapsed', 'book'));
        
    }

    public function free()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        $jenisDashboard = "";
        $isCollapsed = Book::getValue('user_section_collapse');
        $book = Book::find(1);
        return view('fitur.home.index', compact('packages', 'userName','jenisDashboard', 'isCollapsed', 'book'));
    }
}
