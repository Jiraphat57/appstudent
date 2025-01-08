<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Maritalstatus;
class MaritalstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maritalstatuses = [
            'อยู่ด้วยกันจดทะเบียนสมรส','โสด','อย่าร้าง','อยู่ด้วยกันไม่จดทะเบียนสมรส', 
            'แยกกันอยู่','พม่า', 
            'มารดาถึงแก่กรรม','บิดาถึงแก่กรรม', 
            'บิดาและมารดาถึงแก่กรรม', 'บิดาถึงแก่กรรมมารดาแต่งงานใหม่', 
            'มารดาถึงแก่กรรมบิดาแต่งงานใหม่', 'อื่นๆ'
        ];
        foreach ($maritalstatuses as $maritalstatuse) {
            Maritalstatus::factory()->create([
                'maritalstatuse' => $maritalstatuse,
            ]);
        }
    }
}
