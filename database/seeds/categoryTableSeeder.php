<?php

use App\category;
use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'name'=>'Category1',
            'url'=>'Category1'
        ]);
        category::create([
            'name'=>'Category2',
            'url'=>'Category2'
        ]);
        category::create([
            'name'=>'Category3',
            'url'=>'Category3'
        ]);
    }
}
