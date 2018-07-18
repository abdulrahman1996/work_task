<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'   => 'Admin',
            'email'  => 'a.awad96@hotmail.com',
            'password'       => bcrypt('123456'),
            'company_id'     => null,
            'phone' =>'01122372765',
            'type' => 1

        ]);
    }
}
