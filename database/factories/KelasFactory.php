<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $matkul = array('Pemrograman Web', 'Basis Data Lanjut', 'Bahasa Pemrograman Lanjut', 'Struktur Data dan Algoritma', 'Dasar-Dasar Pemrograman');
        $tahun = array(2019,2020,2021);
        $semester = array(1,2);
        $sks = array(2,3,4);
        return [
            'kode_kelas' => $faker->numerify('IT-###-#'),
            'kode_matkul' => $faker->numerify('IT-###'),
            'nama_matkul' => $faker->randomElement($matkul),
            'tahun' => $faker->randomElement($tahun),
            'semester' => $faker->randomElement($semester),
            'sks' => $faker->randomElement($sks),
        ];
    }
}
