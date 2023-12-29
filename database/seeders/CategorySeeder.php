<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
                'title' => 'كمبيوتر',
                'description' => 'جميع انواع الكمبيوتر',
                'image'     => 'categories/1.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('categories')->insert([
            'title' => 'موبايل',
            'description' => 'جميع انواع المحمول',
            'image'     => 'categories/2.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('categories')->insert([
            'title' => 'ادوات',
            'description' => 'جميع انواع ادوات الموبايل والكمبيوتر',
            'image'     => 'categories/2.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);



    }
}
