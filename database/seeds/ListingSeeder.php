<?php

use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //$this->call(UsersTableSeeder::class);
        DB::table('listings')->insert([

    		'businessname'	=>	'Alvin Paintings',
            'primaryphone'  =>  '(404) 429-9497',
            'email'         =>  'junkdone@gmail.com',
            'category'      =>  'Paintings Services',
            'keyword'       =>  'Wall Painting',
            'agent'         =>  'Chris Lawrence',
            'callcenter'    =>  'Sageone',
            'businesshour'  =>  'Mon-Sat : 8AM-6PM  Sun : Closed',
            'billingname'   =>  'Chris',
            'creditcardnumber'   =>  '1234 5678 9012 3456',
            'month'         =>  'January',
            'year'          =>  '2015',
            'cvv'           =>  '234',
            'prepaid'       =>  'No',
            'street'        =>  '8191 S DUPONT HWY',
            'city'          =>  'FELTON',
            'state'         =>  'DE',
            'zip'           =>  '19943',
            'subscriptiontype'  =>  'Trial',
            'agreementstatus'   =>  'yes',


    		]);
    }
}
