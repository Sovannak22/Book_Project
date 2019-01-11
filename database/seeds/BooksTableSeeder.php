<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Hello world!',
            'sub_cat_id' => '1',
            'author' => 'Svathna',
            'description' => 'This book is talk about first hello world in c++',
            'img' => 'Hello world book.jpg'
        ]);
    }
}
