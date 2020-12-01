<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);

        factory(User::class, 5)->create();
        factory(Article::class, 5)->create();
        factory(Department::class, 5)->create();

    }
}
