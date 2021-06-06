<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KRS;

class KRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KRS::factory()->count(20)->create();
    }
}
