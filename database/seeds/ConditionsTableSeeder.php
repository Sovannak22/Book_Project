<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('conditions')->insert([
            'condition' => 'New'
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Like new'
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Good'
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Acceptable'
        ]);
    }
}
