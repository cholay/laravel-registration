<?php

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
        DB::table('users')->delete();
 
        $users = array(
             [
                'id'=>1,
                'first_name' => 'Emily',
                'last_name' => 'Thorn',
                'email' => 'emily.thorn@gmail.com',
                'password' => Hash::make('emilythorn')
            ],
            [
                 'id'=>2,
                'first_name' => 'Fred',
                'last_name' => 'Jackson',
                'email' => 'fred.jackson@gmail.com',
                'password' => Hash::make('fredjackson')
            ],
            [
                 'id'=>3,
                'first_name' => 'Thinzar',
                'last_name' => 'Cho',
                'email' => 'coffeekharkharlay@gmail.com',
                'password' => Hash::make('coffee123')
            ],
           );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
