<?php

use App\User;
use Illuminate\Database\Seeder;
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
        // $this->call(UsersTableSeeder::class);
        User::factory()->create([
            'email' => 'ngizeh@gmail.com',
            'name' => 'Ngizeh Mwas',
            'password' => Hash::make('password')
        ]);
    }
}
