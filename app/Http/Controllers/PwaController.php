<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PwaController extends Controller
{
    public function install()
    {
        return view('pwa.install');
    }
}
