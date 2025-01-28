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
            'ห้องเรียนพิเศษ (วิทยาศาสตร์-คณิตศาสตร์) ISMP', 'ห้องเรียนวิทยาศาสตร์พลังสิบ TPSP', 'ห้องเรียนวิทยาศาสตร์–คณิตศาสตร์ SMEP ',
            'ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์–ภาษาอังกฤษ  EMEP', 'ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล  DTEP','ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP',
            'ห้องเน้นความเป็นเลิศทางด้านภาษาจีน  CEP','ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP','ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP',
            'ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP'
        ];
        foreach ($highschools as $curriculumhigh) {
            HighSchool::factory()->create([
                'curriculumhigh' => $curriculumhigh,
            ]);
        }
    }
}