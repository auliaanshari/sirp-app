<?php

namespace Database\Factories;

use App\Models\Absensi;
use App\Models\KRS;
use App\Models\Pertemuan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class AbsensiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Absensi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $krs = KRS::all()->random(1);
        $pertemuan = Pertemuan::all()->random(1);
        $status = array(0,1,2);
        foreach($krs as $kr):
            foreach($pertemuan as $pe):
                return [
                    'krs_id' => $kr->id,
                    'pertemuan_id' => $pe->id,
                    'status_kehadiran' => $faker->randomElement($status),
                    'jam_masuk' => $faker->time($format = 'H:i:s'),
                    'jam_keluar' => $faker->time($format = 'H:i:s'),
                    'durasi' => $faker-> randomNumber(),
                ];
            endforeach;
        endforeach;
    }
}
