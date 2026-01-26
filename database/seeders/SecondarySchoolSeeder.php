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
        $secondaryschools = [
            'ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP', 'ห้องวิทยาศาสตร์พลังสิบ TPSP','ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล  DTEP ',
            'ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP','ห้องเน้นความเป็นเลิศทางด้านภาษาจีน  CEP','ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP',
            'ห้องเรียนทั่วไป GP'
        ];
        foreach ($secondaryschools as $curriculumsec) {
            SecondarySchool::factory()->create([
                'curriculumsec' => $curriculumsec,
            ]);
        }
    }
}
