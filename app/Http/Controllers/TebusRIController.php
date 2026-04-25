<?php

namespace App\Http\Controllers;

use App\Models\Tebusri; 
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TebusRIController extends Controller
{
    public function index()
    {
        // $products = Tebusri::where('user_id', Auth::id())->get();
        // return view('fitur.tebusri.index', compact('products'));
        return view('fitur.tebusri.menutebus');
    }

    public function index1()
    {
        // $products = Tebusri::where('user_id', Auth::id())->get();
        // return view('fitur.tebusri.index', compact('products'));
        return view('fitur.tebusri.index1');
    }
    public function index2()
    {
        // $products = Tebusri::where('user_id', Auth::id())->get();
        // return view('fitur.tebusri.index', compact('products'));
        return view('fitur.tebusri.index2');
    }
    public function index3()
    {
        // $products = Tebusri::where('user_id', Auth::id())->get();
        // return view('fitur.tebusri.index', compact('products'));
        return view('fitur.tebusri.index3');
    }
    public function index4()
    {
        $products = Tebusri::where('user_id', Auth::id())->get();
        return view('fitur.tebusri.index4', compact('products'));
    }


        public function hitungLotTebus(Request $request)
    {
        $namaSaham = Str::upper($request->nama_saham);        
        $lotAwal = $request->lot_awal;

        $rasioKiri = $request->rasio_kiri;
        $rasioKanan = $request->rasio_kanan;

        // hitung average
        $lotTebus = ( $lotAwal/$rasioKiri) * $rasioKanan;
        $avg = number_format($lotTebus,2,",",".");

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ' lot siap baru siap tebus sejumlah ' . $avg . ' lot'
        );

    }
        public function hitungBiayaTebus(Request $request)
    {
        $namaSaham = Str::upper($request->nama_saham);        
        $hargaTebus = $request->harga_tebus;

        $lotTebus = $request->lot_tebus;
        $perkalian = 100;

        // hitung average
        $biayaTebus = $hargaTebus * $lotTebus * $perkalian;
        $biayaTebus = number_format($biayaTebus,2,",",".");

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ', biaya untuk tebus ' . $lotTebus . ' lot dengan harga tebus ' . $hargaTebus . ' adalah Rp. ' . $biayaTebus 
        );

    }

        public function hitungLotFinal(Request $request)
    {
        $namaSaham = Str::upper($request->nama_saham);        
        $lotAwal = $request->lot_awal;

        $lotTebus = $request->lot_tebus;

        // hitung average
        $totalLotFinal = $lotAwal + $lotTebus;
        $totalLotFinal = number_format($totalLotFinal,2,",",".");

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ', jumlah lot final setelah ditambah dengan lot baru yang ditebus adalah ' . $totalLotFinal . ' lot'
        );

    }

        public function hitungAverageFinal(Request $request)
    {

        // Hitung jumlah data milik user
        $jumlahData = Tebusri::where('user_id', Auth::id())->count();

        // Jika sudah 5 data
        if ($jumlahData >= 5) {
            return redirect()->back()->with('error', 'Data maksimal hanya 5, mohon hapus sebagian jika ingin menambahkan lagi !');
        }

        $namaSaham = Str::upper($request->nama_saham);      
        $hargaAvg = $request->harga_avg;  
        $lotAwal = $request->lot_awal;
        $hargaTebus = $request->harga_tebus;
        $lotTebus = $request->lot_tebus;

        // hitung average
        $harga_avg_final = (($hargaAvg * $lotAwal) + ($hargaTebus * $lotTebus)) 
                            / ($lotAwal + $lotTebus);

        Tebusri::create([
            'user_id' => Auth::id(),
            'nama_saham' => $namaSaham,
            'harga_avg' => $hargaAvg,
            'jumlah_lot' => $lotAwal,
            'harga_tebus' => $hargaTebus,
            'lot_tebus' => $lotTebus,
            'harga_avg_final' => $harga_avg_final,
            'recorded_date' => now(),
        ]);

        return redirect()->back()->with('success',
        'Saham ' . $namaSaham .  ', harga avg final setelah ditambah dengan hasil Right Issue adalah ' . $harga_avg_final
        );

    }

    public function store(Request $request)
    {
        // Hitung jumlah data milik user
        $jumlahData = Tebusri::where('user_id', Auth::id())->count();

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

        Tebusri::create([
            'user_id' => Auth::id(),
            'nama_saham' => $namaSaham,
            'harga_cum' => $hargaCum,
            'rasio_kiri' => $rasioKiri,
            'harga_tebus' => $hargaTebus,
            'rasio_kanan' => $rasioKanan,
            'harga_teoritis' => $hargaTeoritis,
            'recorded_date' => now()->toDateTimeString(),
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');
    }

        public function destroy($id)
    {
        $tebusri = Tebusri::find($id);

        if (!$tebusri) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $tebusri->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }
}
