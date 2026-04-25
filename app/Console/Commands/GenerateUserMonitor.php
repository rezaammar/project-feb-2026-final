<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\UserMonitor;
use Carbon\Carbon;

class GenerateUserMonitor extends Command
{
    protected $signature = 'monitor:generate';
    protected $description = 'Generate daily user monitor data';

    public function handle()
    {
        $today = Carbon::today();

        // hitung data dari tabel user_statuses
        $summary = DB::table('user_statuses')
            ->select(
                DB::raw("COUNT(DISTINCT user_id) as total"),
                DB::raw("SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) as active"),
                DB::raw("SUM(CASE WHEN status = 'Not-active' THEN 1 ELSE 0 END) as non_active")
            )
            ->first();

        // cegah double insert (kalau scheduler jalan 2x)
        $exists = UserMonitor::whereDate('created_at', $today)->exists();

        if ($exists) {
            $this->info('Data hari ini sudah ada.');
            return;
        }

        // simpan ke tabel user_monitor
        UserMonitor::create([
            'active'     => $summary->active ?? 0,
            'non_active' => $summary->non_active ?? 0,
            'total_user' => $summary->total ?? 0,
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        $this->info('Data user_monitor berhasil disimpan.');
    }
}
