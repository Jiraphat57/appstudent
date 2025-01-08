<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SecondarySchool;

class SecondarySchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('highschools')->insert(
        //     array(
        //         ['curriculumsec' => 'วิทย์พิเศษ'],
        //         ['curriculumsec' => 'วิทย์พลังสิบ'],
        //         ['curriculumsec' => 'วิทย์คณิต'],
        //         ['curriculumsec' => 'ศิลป์-คำนวณ'],
        //         ['curriculumsec' => 'ศิลป์-คอมพิวเตอร์'],
        //         ['curriculumsec' => 'ศิลป์-จีน'],
        //         ['curriculumsec' => 'ศิลป์-ญี่ปุ่น'],
        //         ['curriculumsec' => 'ศิลป์-อังกฤษ'],
        //         ['curriculumsec' => 'ศิลป์-ทั่วไป'],
        //         ['curriculumsec' => 'ทวิศึกษา-ทั่วไป'],
        //         ['curriculumsec' => 'ทวิศึกษา-เทคโนดิจิตอล']
        //     )
        // );
        $secondaryschools = [
            'วิทย์พิเศษ', 'วิทย์พลังสิบ', 'ทั่วไป'
        ];
        foreach ($secondaryschools as $curriculumsec) {
            SecondarySchool::factory()->create([
                'curriculumsec' => $curriculumsec,
            ]);
        }
    }
}
