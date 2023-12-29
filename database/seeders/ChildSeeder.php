<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Child::create([
            'title'         => 'لاب توب',
            'desc'   => 'جميع انواع اللابتوب',
            'parent_id'     => 1
        ]);
        Child::create([
            'title'         => 'SAMSONG',
            'desc'   => 'جميع انواع شركه سامسونج',
            'parent_id'     => 2
        ]);

    }
}
