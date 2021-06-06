<?php

namespace Database\Factories;

use App\Models\Pertemuan;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PertemuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pertemuan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $kelas = Kelas::all()->random(1);
        $materi = array('Pengenalan', 'Pendalaman', 'Latihan', 'Quiz', 'Tugas');
        foreach($kelas as $kls):
            return [
                'kelas_id' => $kls->id,
                'pertemuan_ke' => $faker->randomDigitNotNull(),
                'tanggal' => $faker->dateTimeInInterval($startDate = '-1 years', $interval = '+ 7 days', $timezone = null),
                'materi' => $faker->randomElement($materi),
            ];
        endforeach;
    }
}
