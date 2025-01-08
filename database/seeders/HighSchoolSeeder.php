<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HighSchool;

class HighSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $highschools = [
            'วิทย์พิเศษ', 'วิทย์พลังสิบ', 'วิทย์คณิต', 'ศิลป์-คำนวณ', 'ศิลป์-คอมพิวเตอร์','ศิลป์-จีน','ศิลป์-ญี่ปุ่น','ศิลป์-อังกฤษ',
            'ศิลป์-ทั่วไป','ทวิศึกษา-เทคโนโลยีดิจิตอล','ทวิศึกษา-ทั่วไป'
        ];
        foreach ($highschools as $curriculumhigh) {
            HighSchool::factory()->create([
                'curriculumhigh' => $curriculumhigh,
            ]);
        }
    }
}
