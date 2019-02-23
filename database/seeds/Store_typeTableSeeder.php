<?php

use Illuminate\Database\Seeder;

class Store_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_types')->insert([
            'type' => 'copper',
            'amount' => 5,
        ]);
        DB::table('store_types')->insert([
            'type' => 'silver',
            'amount' => 25,
        ]);
        DB::table('store_types')->insert([
            'type' => 'gold',
            'amount' => 50,
        ]);
    }
}
