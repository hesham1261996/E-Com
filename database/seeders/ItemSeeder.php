<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'title'             => 'HP profitional',
            'description'       => 'جهاز جديد',
            'category_id'       => 1 , 
            'child_id'          => 1 ,
            'number_of_copies'  => 5 ,
            'made_year'         => 2021 ,
            'price'             =>15000 ,
            'image'             => 'items/1.jpg' ,
        ]);
        Item::create([
            'title'             => 'samsong',
            'description'       => 'جهاز جديد',
            'category_id'       => 2 , 
            'child_id'          => 2 ,
            'number_of_copies'  => 5 ,
            'made_year'         => 2021 ,
            'price'             => 9000 ,
            'image'             => 'items/2.jpg' ,
        ]);
        Item::create([
            'title'             => 'كيبورد',
            'description'       => 'جهاز جديد',
            'category_id'       => 3 , 
            'child_id'          => 1 ,
            'number_of_copies'  => 5 ,
            'made_year'         => 2021 ,
            'price'             => 500 ,
            'image'             => 'items/3.jpg' ,
        ]);
        Item::create([
            'title'             => 'dell profitional',
            'description'       => 'جهاز جديد',
            'category_id'       => 3 , 
            'child_id'          => 1 ,
            'number_of_copies'  => 5 ,
            'made_year'         => 2021 ,
            'price'             => 1800 ,
            'image'             => 'items/1.jpg' ,
        ]);
    }
}
