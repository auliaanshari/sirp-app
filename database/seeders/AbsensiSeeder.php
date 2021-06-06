<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Absensi::factory()->count(50)->create();
    }
}
