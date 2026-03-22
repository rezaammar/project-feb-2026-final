<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Package::create([
            'name' => 'Basic',
            'price' => 100000,
            'duration' => 'monthly'
        ]);

        \App\Models\Package::create([
            'name' => 'Pro',
            'price' => 250000,
            'duration' => 'monthly'
        ]);

        \App\Models\Package::create([
            'name' => 'Enterprise',
            'price' => 500000,
            'duration' => 'monthly'
        ]);
    }
}
