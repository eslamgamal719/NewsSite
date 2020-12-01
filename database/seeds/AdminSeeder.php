<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Department;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name'     => 'اسلام جمال',
            'email'    => 'eslamgamal719@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->attachRole('admin');

    }
}
