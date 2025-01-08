<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classlevel;

class ClasslevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $classLevels = [
        //     ['level' => 'ม 1'],
        //     ['level' => 'ม 4'],
        //     // เพิ่มข้อมูลตามที่ต้องการ
        // ];

        // foreach ($classLevels as $classLevel) {
        //     DB::table('class_levels')->insert($classLevel);
        // }
        $classlevels = [
            'ม.1', 'ม.4'
        ];

        foreach ($classlevels as $classlevel) {
            Classlevel::factory()->create([
                'classlevel' => $classlevel,
            ]);
        }
    }
}
