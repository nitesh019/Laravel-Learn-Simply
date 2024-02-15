<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'brand_name'=>'Adidas'
        ]);

        Brand::create([
           'brand_name'=>'Nike'
        ]);

        Brand::create([
            'brand_name'=>'Specs'
        ]);

        Brand::create([
           'brand_name'=>'Puma'
        ]);
    }
}
