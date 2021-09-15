<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'title' => 'Iphone 11',
                'price' => 300,
                'description' => 'APPLE iPhone 11 128GB Black' ,
                'image' => 'iphone11.jpg' ,
            ]);
        DB::table('products')->insert(
            [
                'title' => 'Iphone 10',
                'price' => 435,
                'description' => 'APPLE iPhone 10 128GB white' ,
                'image' => 'iphone10.jpg' ,
            ]);
        DB::table('products')->insert(
            [
                'title' => 'Iphone 12',
                'price' => 555,
                'description' => 'APPLE iPhone 12 128GB red' ,
                'image' => 'iphone12.jpg' ,
            ]);
    }
}
