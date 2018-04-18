<?php

use Illuminate\Database\Seeder;

class UsersAlvinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

    		'lastname'	=>	'Buenaventura',
    		'firstname'	=>	'Alvin',
    		'middlename'	=>	'R.',
    		'username'	=>	'vino',
    		'email'		=>	'alvin@admin.com',
    		'password'	=>	bcrypt('nakalimutanko'),
    		'user_level'	=>	'Administrator',
    		'user_group'	=>	'1',
    		'center'	=>	'1',

    		]);

    }
}
