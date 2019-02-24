<?php

use Illuminate\Database\Seeder;

class forTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fors')->insert([
            'for' => 'Borrow',
        ]);
        DB::table('fors')->insert([
            'for' => 'Sell',
        ]);
        DB::table('fors')->insert([
            'for' => 'Rent',
        ]);
    }
}
