<?php

use Illuminate\Database\Seeder;

class Test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('test')->insert([
            'name' => str_random(10),
            'airline' => str_random(10).'@gmail.com',
        ]);
    }
}
