<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Rasio; 

class RasioRIController extends Controller
{
    public function index()
    {
        $products = Rasio::where('user_id', Auth::id())->get();
        return view('fitur.rasiori.index', compact('products'));
    }

    public function hitungRasio(Request $request)
    {

        // Hitung jumlah data milik user
        $jumlahData = Rasio::where('user_id', Auth::id())->count();

        // Jika sudah 5 data
        if ($jumlahData >= 5) {
            return redirect()->back()->with('error', 'Data maksimal hanya 5, mohon hapus sebagian jika ingin menambahkan lagi !');
        }

        $namaSaham = Str::upper($request->nama_saham);      
        $beredarAwal = $request->beredar_awal;
        $beredarTambahan = $request->beredar_tambahan;
        

        // hitung fbp
        $pembilang = $beredarAwal;
        $penyebut = $beredarTambahan;
        $beredarTotal = ($pembilang + $penyebut);

        function cariFPB($a, $b) {
            return ($b == 0) ? $a : cariFPB($b, $a % $b);
        }

        $fbp = cariFPB($pembilang, $penyebut);

        $rasioKiri = $pembilang/$fbp;
        $rasioKanan = $penyebut/$fbp;

        Rasio::create([
            'user_id' => Auth::id(),
            'nama_saham' => $namaSaham,
            'beredar_awal' => $beredarAwal,
            'beredar_tambahan' => $beredarTambahan,
            'beredar_total' => $beredarTotal,
            'rasio_kiri' => $rasioKiri,
            'rasio_kanan' => $rasioKanan,
        ]);

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ', rasionya adalah ' . $rasioKiri . ' : ' . $rasioKanan
        );

    }

    public function destroy($id)
    {
        $rasio = Rasio::find($id);

        if (!$rasio) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $rasio->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }
}
