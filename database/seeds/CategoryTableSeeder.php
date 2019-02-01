<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Comic',
        ]);
        DB::table('categories')->insert([
            'category' => 'Bussiness',
        ]);
        DB::table('categories')->insert([
            'category' => 'Art',
        ]);
    }
}
