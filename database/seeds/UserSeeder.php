<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insertGetId(array(
			'username' 	=> 'demsy@gmail.com', 
			'password' 	=> bcrypt('demsy'), 
			'name' 		=> 'Demsy Iman Mustasyar'
		));

    }
}
