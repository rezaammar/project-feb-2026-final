<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Subs;
// use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->username;
        $transactions = Subs::where('user_id', Auth::id())->get();
        return view('transactions/index', compact('transactions', 'userName'));
    }
}
