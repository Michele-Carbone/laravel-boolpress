<?php

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

        //tutto quello che sara' all interno di call() verra' chiamato ogni volta con il comando php artisan db:seed
        $this->call([
            UsersTableSeeder::class, //va inserito prima di post
            CategoriesTableSeeder::class,
            PostsTableSeeder::class
        ]);
    }
}
