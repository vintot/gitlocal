<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        DB::table('listings')->insert([

    		'name'	=>	'Alvin',
    		'Address'	=>	'29502 Orchard Dr Lebanon MO 65536',
    		'primaryphone'	=>	'4175326758',
    		'email'		=>	'alvin@admin.com',
    		'status'	=>	'Trial',
    		'details'	=>	'Pools, Spas, & Saunas',
    		'categories'	=>	'Spas',
            'altemail'	=>	'plumbingbypowers@gmail.com',
            'additionalinfo' => 'Best In the City',
            'altphone' => '3524642858',
            'link' => 'headrushbarbershop.uslocaldirectory.com',
            'logo' => 'Anything',
            'businesshours' => 'Mon-Sat : 09:00 AM - 05:00 PM Sunday : Closed',
            'paymentmethod' => 'Cash',
            'year_started' => '2015',
            'customerusername' => 'Robert  Wynns',
            'addedby' => 'Alvin',
            'updated' => '2018-03-21 05:18:00',

    		]);


    }
}
