<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('users')->insert([

    		'lastname'	=>	'de Vera',
    		'firstname'	=>	'John Ernest',
    		'middlename'	=>	'M.',
    		'username'	=>	'kamotengadmin',
    		'email'		=>	'malinawnausapan@gmail.com',
    		'password'	=>	bcrypt('P455w0rdadmin'),
    		'user_level'	=>	'Administrator',
    		'user_group'	=>	'1',
    		'center'	=>	'1',

    		]);

    }
}
