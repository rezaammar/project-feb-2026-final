<?php

namespace App\Http\Controllers;

use App\Models\Average;

class PriceChartController extends Controller
{

    public function index()
    {
        return view('price.chart');
    }

    public function getChartData()
    {

        $data = Average::select(
            'tanggal',
            'harga_awal',
            'harga_baru',
            'average_price'
        )
        ->orderBy('tanggal')
        ->get();

        return response()->json($data);
    }

}