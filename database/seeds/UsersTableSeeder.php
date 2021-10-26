<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creo uno user randomizzandolo
        $user = new User();
        $user->name = 'michele';
        $user->email = 'mickycarb@hotmail.it';
        $user->password = bcrypt('password'); //laravel usa le funzioni bcrypt per criptare la password

        $user->save();
    }
}
