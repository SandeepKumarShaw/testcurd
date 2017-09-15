<?php

use Illuminate\Database\Seeder;

class StaffItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_items')->insert([
            'name' => 'tables',
            'quantity' => 100,
            'user_id' => 1,
            
        ]);
    }
}
