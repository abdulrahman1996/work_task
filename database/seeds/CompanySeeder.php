<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('companies')->insert([
            'name'   => 'Femto15',
            'email'  => 'mail@mail.com',
            'address' =>'cairo',
            'tel' =>'01122372765',

        ]);
    }
}
