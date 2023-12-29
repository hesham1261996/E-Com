<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'id' => 1,
            'name' => 'add-item',
            'desc' => 'اضافه العناصر',
        ]);
        Permission::create([
            'id' => 2,
            'name' => 'edit-item',
            'desc' => 'تعديل العناصر',
        ]);
        Permission::create([
            'id' => 3,
            'name' => 'delete-item',
            'desc' => 'حذف العناصر',
        ]);
        Permission::create([
            'id' => 4,
            'name' => 'add-user',
            'desc' => 'اضافه مستخدمين',
        ]);
        Permission::create([
            'id' => 5,
            'name' => 'edit-user',
            'desc' => 'تعديل مستخدمين',
        ]);
        Permission::create([
            'id' => 6,
            'name' => 'delete-user',
            'desc' => 'حذف مستخدمين',
        ]);
    }
}
