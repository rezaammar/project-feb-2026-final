<?php

namespace App\Http\Controllers;

// use App\Models\Product;
use App\Models\Teoritis;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeoritisController extends Controller
{
    public function index()
    {
        $products = Teoritis::where('user_id', Auth::id())->get();
        return view('fitur.teoritis.index', compact('products'));
    }


    // public function getChartData()
    // {

    //     $data = Teoritis::select(
    //         'recorded_date',
    //         'harga_awal',
    //         'harga_baru',
    //         DB::raw('
    //         ((harga_awal * jumlah_awal) + (harga_baru * jumlah_baru)) 
    //         / (jumlah_awal + jumlah_baru) 
    //         as average
    //         ')
    //     )
    //     ->orderBy('recorded_date')
    //     ->get();

    //     return response()->json($data);
    // }

    // public function create()
    // {
    //     return view('products.create');
    // }

    public function store(Request $request)
    {
        // Hitung jumlah data milik user
        $jumlahData = Teoritis::where('user_id', Auth::id())->count();

        // Jika sudah 5 data
        if ($jumlahData >= 5) {
            return redirect()->back()->with('error', 'Data maksimal hanya 5, mohon hapus sebagian jika ingin menambahkan lagi !');
        }

        $namaSaham = Str::upper($request->nama_saham);        
        $hargaCum = $request->harga_cum;
        $rasioKiri = $request->rasio_kiri;

        $hargaTebus = $request->harga_tebus;
        $rasioKanan = $request->rasio_kanan;

        // hitung teoritis
        $hargaTeoritis = (($hargaCum * $rasioKiri) + ($hargaTebus * $rasioKanan)) 
                    / ($rasioKiri + $rasioKanan);

        Teoritis::create([
            'user_id' => Auth::id(),
            'nama_saham' => $namaSaham,
            'harga_cum' => $hargaCum,
            'rasio_kiri' => $rasioKiri,
            'harga_tebus' => $hargaTebus,
            'rasio_kanan' => $rasioKanan,
            'harga_teoritis' => $hargaTeoritis,
            'recorded_date' => now()->toDateTimeString(),
        ]);

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ' harga teoritis sekarang saat expayed date adalah ' . $hargaTeoritis
        );
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

        public function destroy($id)
    {
        $teoritis = Teoritis::find($id);

        if (!$teoritis) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $teoritis->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }
}
