<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        'name'=>'Kẹo dẻo',
        'category_id'=>1,
        'price'=>'5000',
        'description'=>'123123',
    ]);
    }
}
