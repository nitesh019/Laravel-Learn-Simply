<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::create([
            'brand_id'=>1,
            'title'=>'Adidas shoes',
            'price'=>'90'
        ]);

       Product::create([
          'brand_id'=>1,
          'title'=>'Adidas shoes 2',
          'price'=>'94'
        ]);

        Product::create([
            'brand_id'=>2,
            'title'=>'Nike shoes',
            'price'=>'90'
        ]);

        Product::create([
            'brand_id'=>2,
            'title'=>'Nike shoes 2',
            'price'=>'90'
        ]);

        Product::create([
            'brand_id'=>3,
            'title'=>'Specs shoes',
            'price'=>'100'
        ]);

        Product::create([
            'brand_id'=>4,
            'title'=>'Puma shoes',
            'price'=>'200'
        ]);
    }
}
