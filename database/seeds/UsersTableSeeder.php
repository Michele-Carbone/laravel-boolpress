<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Creo uno user randomizzandolo
        $user = new User();
        $user->name = 'michele';
        $user->email = 'mickycarb@hotmail.it';
        $user->password = bcrypt('password'); //laravel usa le funzioni bcrypt per criptare la password

        $user->save();

        //FAKER creaiamo 9 utenti
        for ($i = 0; $i < 9; $i++) {
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = bcrypt($faker->word());

            $newUser->save();
        }
    }
}
