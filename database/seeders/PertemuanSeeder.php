<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pertemuan;

class PertemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertemuan::factory()->count(20)->create();
    }
}
