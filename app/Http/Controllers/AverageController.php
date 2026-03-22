<?php

namespace App\Http\Controllers;

// use App\Models\Product;
use App\Models\Average;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AverageController extends Controller
{
    public function index()
    {
        $products = Average::all();
        return view('fitur.average.index', compact('products'));
    }

    public function indexpremium()
    {
        $products = Average::all();
        return view('fitur.average.indexpremium', compact('products'));
    }

    public function hitungAverage(Request $request)
    {
        $namaSaham = Str::upper($request->nama_saham);        
        $jenisAverage = $request->jenis_average;
        $hargaAwal = $request->harga_awal;
        $jumlahAwal = $request->jumlah_awal;

        $hargaBaru = $request->harga_baru;
        $jumlahBaru = $request->jumlah_baru;

        // hitung average
        $average = (($hargaAwal * $jumlahAwal) + ($hargaBaru * $jumlahBaru)) 
                    / ($jumlahAwal + $jumlahBaru);
        $avg = number_format($average,2,",",".");

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ' harga rata-ratanya sekarang adalah ' . $avg
        );

    }

    public function getChartData()
    {

        $data = average::select(
            'recorded_date',
            'harga_awal',
            'harga_baru',
            DB::raw('
            ((harga_awal * jumlah_awal) + (harga_baru * jumlah_baru)) 
            / (jumlah_awal + jumlah_baru) 
            as average
            ')
        )
        ->orderBy('recorded_date')
        ->get();

        return response()->json($data);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $namaSaham = Str::upper($request->nama_saham);        
        $jenisAverage = $request->jenis_average;
        $hargaAwal = $request->harga_awal;
        $jumlahAwal = $request->jumlah_awal;

        $hargaBaru = $request->harga_baru;
        $jumlahBaru = $request->jumlah_baru;

        // hitung average
        $average = (($hargaAwal * $jumlahAwal) + ($hargaBaru * $jumlahBaru)) 
                    / ($jumlahAwal + $jumlahBaru);

        Average::create([
            'user_id' => Auth::id(),
            'nama_saham' => $namaSaham,
            'jenis_average' => $jenisAverage,
            'harga_awal' => $hargaAwal,
            'jumlah_awal' => $jumlahAwal,
            'harga_baru' => $hargaBaru,
            'jumlah_baru' => $jumlahBaru,
            'average' => $average,
            'recorded_date' => now()->toDateTimeString(),
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    

    // public function edit(Product $product)
    // {
    //     return view('products.edit', compact('product'));
    // }

    // public function update(Request $request, Product $product)
    // {
    //     $product->update($request->all());
    //     return redirect()->route('products.index')->with('success', 'Data berhasil diupdate');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Data berhasil dihapus');
    // }
}
