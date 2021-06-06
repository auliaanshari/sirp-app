<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'nim' => '0000000000',
            'email' => 'admin@admin.com',
            'tipe' => 0,
            'password' => Hash::make('admin')

        ]);
        User::factory()->count(10)->create();
    }
}
