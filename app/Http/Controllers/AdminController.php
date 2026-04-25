<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Paketnew;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\UserMonitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->username;
        $packages = Paketnew::all();
        
        return view('/admin/dashboard', compact('packages', 'userName'));
        
    }

    public function dashboard(Request $request)
    {   

        $year  = (int) $request->input('year', date('Y'));
        $month = (int) $request->input('month', date('m'));

        $start = Carbon::create($year, $month, 1)->startOfMonth();
        $end   = Carbon::create($year, $month, 1)->endOfMonth();
        $today = Carbon::today();

        // =========================
        // 🔹 CHART 1 (user_statuses)
        // =========================

        $allData = DB::table('user_statuses')
            ->selectRaw('DATE(created_at) as tanggal, COUNT(DISTINCT user_id) as total')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $activeData = DB::table('user_statuses')
            ->selectRaw('DATE(created_at) as tanggal, COUNT(DISTINCT user_id) as total')
            ->where('status', 'Active')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $notActiveData = DB::table('user_statuses')
            ->selectRaw('DATE(created_at) as tanggal, COUNT(DISTINCT user_id) as total')
            ->where('status', 'Not-active')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $labels = [];
        $allValues = [];
        $activeValues = [];
        $notActiveValues = [];

        $daysInMonth = $start->daysInMonth;

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = Carbon::create($year, $month, $i)->format('Y-m-d');

            $labels[] = $i;

            if ($year == $today->year && $month == $today->month) {
                $allValues[]       = $i <= $today->day ? ($allData[$date] ?? 0) : null;
                $activeValues[]    = $i <= $today->day ? ($activeData[$date] ?? 0) : null;
                $notActiveValues[] = $i <= $today->day ? ($notActiveData[$date] ?? 0) : null;
            } else {
                $allValues[]       = $allData[$date] ?? 0;
                $activeValues[]    = $activeData[$date] ?? 0;
                $notActiveValues[] = $notActiveData[$date] ?? 0;
            }
        }

        // =========================
        // 🔹 CHART 2 (user_monitor)
        // =========================

        $monitorData = UserMonitor::selectRaw('
                DATE(created_at) as tgl,
                SUM(active) as jml_active,
                SUM(non_active) as jml_non_active,
                SUM(total_user) as jml_total
            ')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('tgl')
            ->get()
            ->keyBy('tgl');

        $chartDays = [];
        $seriesActive = [];
        $seriesNonActive = [];
        $seriesTotal = [];

        for ($d = 1; $d <= $daysInMonth; $d++) {
            $fullDate = Carbon::create($year, $month, $d)->format('Y-m-d');

            $chartDays[] = $d;

            if ($year == $today->year && $month == $today->month) {
                $seriesActive[]     = $d <= $today->day ? ($monitorData[$fullDate]->jml_active ?? 0) : null;
                $seriesNonActive[]  = $d <= $today->day ? ($monitorData[$fullDate]->jml_non_active ?? 0) : null;
                $seriesTotal[]      = $d <= $today->day ? ($monitorData[$fullDate]->jml_total ?? 0) : null;
            } else {
                $seriesActive[]     = $monitorData[$fullDate]->jml_active ?? 0;
                $seriesNonActive[]  = $monitorData[$fullDate]->jml_non_active ?? 0;
                $seriesTotal[]      = $monitorData[$fullDate]->jml_total ?? 0;
            }
        }

        // =========================
        // 🔹 SUMMARY
        // =========================

        $summary = DB::table('users')
            ->join('user_statuses', 'users.id', '=', 'user_statuses.user_id')
            ->selectRaw('
                COUNT(users.id) as total,
                SUM(CASE WHEN user_statuses.status = "Active" THEN 1 ELSE 0 END) as active,
                SUM(CASE WHEN user_statuses.status = "Not-active" THEN 1 ELSE 0 END) as not_active
            ')
            ->first();

        $totalUsers     = $summary->total ?? 0;
        $activeUsers    = $summary->active ?? 0;
        $notActiveUsers = $summary->not_active ?? 0;

        // =========================
        // 🔹 FILTER DATA
        // =========================

        $years = range(date('Y') - 5, date('Y'));
        $months = [
            1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
            5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
            9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
        ];

        return view('admin.laporan', compact(
            // chart lama
            'labels',
            'allValues',
            'activeValues',
            'notActiveValues',

            // chart baru
            'chartDays',
            'seriesActive',
            'seriesNonActive',
            'seriesTotal',

            // summary
            'totalUsers',
            'activeUsers',
            'notActiveUsers',

            // filter
            'year',
            'month',
            'years',
            'months'
        ));
        // $year  = (int) $request->input('year', date('Y'));
        // $month = (int) $request->input('month', date('m'));

        // $start = Carbon::create($year, $month, 1)->startOfMonth();
        // $end   = Carbon::create($year, $month, 1)->endOfMonth();

        // $today = Carbon::today();

        // // 🔹 Semua user
        // $allData = DB::table('user_statuses')
        //     ->select(
        //         DB::raw('DATE(created_at) as tanggal'),
        //         DB::raw('COUNT(user_id) as total')
        //     )
        //     ->whereBetween('created_at', [$start, $end])
        //     ->groupBy('tanggal')
        //     ->pluck('total', 'tanggal');

        // // 🔹 Active
        // $activeData = DB::table('user_statuses')
        //     ->select(
        //         DB::raw('DATE(created_at) as tanggal'),
        //         DB::raw('COUNT(user_id) as total')
        //     )
        //     ->where('status', 'Active')
        //     ->whereBetween('created_at', [$start, $end])
        //     ->groupBy('tanggal')
        //     ->pluck('total', 'tanggal');

        // // 🔹 Not Active
        // $notActiveData = DB::table('user_statuses')
        //     ->select(
        //         DB::raw('DATE(created_at) as tanggal'),
        //         DB::raw('COUNT(user_id) as total')
        //     )
        //     ->where('status', 'Not-active') // sesuaikan dengan DB kamu
        //     ->whereBetween('created_at', [$start, $end])
        //     ->groupBy('tanggal')
        //     ->pluck('total', 'tanggal');

        // $labels = [];
        // $allValues = [];
        // $activeValues = [];
        // $notActiveValues = [];

        // $daysInMonth = $start->daysInMonth;

        // for ($i = 1; $i <= $daysInMonth; $i++) {
        //     $date = Carbon::create($year, $month, $i)->format('Y-m-d');

        //     $labels[] = $i;

        //     if ($year == $today->year && $month == $today->month) {
        //         $allValues[]       = $i <= $today->day ? ($allData[$date] ?? 0) : null;
        //         $activeValues[]    = $i <= $today->day ? ($activeData[$date] ?? 0) : null;
        //         $notActiveValues[] = $i <= $today->day ? ($notActiveData[$date] ?? 0) : null;
        //     } else {
        //         $allValues[]       = $allData[$date] ?? 0;
        //         $activeValues[]    = $activeData[$date] ?? 0;
        //         $notActiveValues[] = $notActiveData[$date] ?? 0;
        //     }
        // }


        // // =========================
        // // SUMMARY HARI INI
        // // =========================

        // $summary = DB::table('users')
        //     ->join('user_statuses', 'users.id', '=', 'user_statuses.user_id')
        //     ->select(
        //         DB::raw('COUNT(users.id) as total'),
        //         DB::raw("SUM(CASE WHEN user_statuses.status = 'Active' THEN 1 ELSE 0 END) as active"),
        //         DB::raw("SUM(CASE WHEN user_statuses.status = 'Not-active' THEN 1 ELSE 0 END) as not_active")
        //     )
        //     ->first();

        // $totalUsers     = $summary->total ?? 0;
        // $activeUsers    = $summary->active ?? 0;
        // $notActiveUsers = $summary->not_active ?? 0;

        // //////
        // $years = range(date('Y') - 5, date('Y'));
        // $months = [
        //     1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
        //     5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
        //     9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
        // ];

        // return view('admin.laporan', compact(
        //     'labels',
        //     'allValues',
        //     'activeValues',
        //     'notActiveValues',
        //     'totalUsers',
        //     'activeUsers',
        //     'notActiveUsers',
        //     'year',
        //     'month',
        //     'years',
        //     'months'
        // ));
    }

    // public function tampilGrafik(Request $request)
    // {
    //     $filterYear  = (int) $request->input('tahun_filter', date('Y'));
    //     $filterMonth = (int) $request->input('bulan_filter', date('m'));

    //     $dateStart = Carbon::create($filterYear, $filterMonth, 1)->startOfMonth();
    //     $dateEnd   = Carbon::create($filterYear, $filterMonth, 1)->endOfMonth();
    //     $todayNow  = Carbon::today();

    //     $monitorData = UserMonitor::selectRaw('
    //             DATE(created_at) as tgl,
    //             SUM(active) as jml_active,
    //             SUM(non_active) as jml_non_active,
    //             SUM(total_user) as jml_total
    //         ')
    //         ->whereBetween('created_at', [$dateStart, $dateEnd])
    //         ->groupBy('tgl')
    //         ->get()
    //         ->keyBy('tgl');

    //     $chartDays = [];
    //     $seriesActive = [];
    //     $seriesNonActive = [];
    //     $seriesTotal = [];

    //     $totalDays = $dateStart->daysInMonth;

    //     for ($d = 1; $d <= $totalDays; $d++) {
    //         $fullDate = Carbon::create($filterYear, $filterMonth, $d)->format('Y-m-d');

    //         $chartDays[] = $d;

    //         if ($filterYear == $todayNow->year && $filterMonth == $todayNow->month) {
    //             $seriesActive[]     = $d <= $todayNow->day ? ($monitorData[$fullDate]->jml_active ?? 0) : null;
    //             $seriesNonActive[]  = $d <= $todayNow->day ? ($monitorData[$fullDate]->jml_non_active ?? 0) : null;
    //             $seriesTotal[]      = $d <= $todayNow->day ? ($monitorData[$fullDate]->jml_total ?? 0) : null;
    //         } else {
    //             $seriesActive[]     = $monitorData[$fullDate]->jml_active ?? 0;
    //             $seriesNonActive[]  = $monitorData[$fullDate]->jml_non_active ?? 0;
    //             $seriesTotal[]      = $monitorData[$fullDate]->jml_total ?? 0;
    //         }
    //     }

    //     $listTahun = range(date('Y') - 5, date('Y'));
    //     $listBulan = [
    //         1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
    //         5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
    //         9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
    //     ];

    //     return view('admin.laporan', compact(
    //         'chartDays',
    //         'seriesActive',
    //         'seriesNonActive',
    //         'seriesTotal',
    //         'filterYear',
    //         'filterMonth',
    //         'listTahun',
    //         'listBulan'
    //     ));
    // }

    public function buku()
    {
        $isCollapsed = Book::getValue('user_section_collapse');
        $book = Book::find(1);
        return view('/admin/buku', compact('isCollapsed', 'book'));
    }
    public function toggleCollapse(Request $request)
    {
        $newValue = $request->has('collapse') ? '1' : '0';

        Book::setValue('user_section_collapse', $newValue);

        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function updateLink(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $setting = Book::findOrFail($id);
        $setting->link = $request->link;
        $setting->save();

        return redirect()->back()->with('link', 'Link berhasil disimpan');
    }

    public function tabelUser(Request $request)
    {
        $search = $request->search;

        $users = User::with('status') // anti N+1
            ->whereNotIn('role_id', [2, 3])
            ->when($search, function ($query, $search) {
                $query->where('email', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);
            

        return view('admin.datauser', compact('users', 'search'));
    }

    public function edit($id)
    {
        // Mengambil user yang sedang login beserta datanya di tabel user_status
        $status = UserStatus::where('user_id', $id)->firstOrFail();
        return view('admin.datauseredit', compact('status'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = UserStatus::where('user_id', $id)->firstOrFail();
        
        $request->validate([
            'tanggal' => ['required', 'date', 'after:today'], // harus tanggal ke depan
            'status' => ['required', 'string', 'in:Active,Non-active'], // hanya 2 pilihan
        ], [
            'tanggal.after' => 'Tanggal harus lebih dari hari ini',
            'status.in' => 'Status hanya boleh Active atau Non-active',
        ]);

        $expayed_date = Carbon::parse($request->tanggal);

        $status = $request->status;

        $user->update([
            'end_date' => $expayed_date,
            'status' => $status,
        ]);



        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }
}
