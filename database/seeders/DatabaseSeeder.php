<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'full_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'type' => 1,
            'avatar' => null,
        ]);
    }
}
