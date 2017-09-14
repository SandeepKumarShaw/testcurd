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
       DB::table('users')->insert([
            'lname' => 'sandeep',
            'fname' => 'kumar',
            'mname' => 'shaw',            
            'email' => 'sandy.shaw20@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin@123'),
        ]);
    }
}
