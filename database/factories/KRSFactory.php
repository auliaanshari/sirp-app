<?php

namespace Database\Factories;

use App\Models\KRS;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KRSFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KRS::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random(1);
        $kelas = Kelas::all()->random(1);
        foreach($kelas as $kls):
            foreach($user as $u):
                return [
                    'kelas_id' => $kls->id,
                    'user_id' => $u->id,
                ];
            endforeach;
        endforeach;
    }
}
