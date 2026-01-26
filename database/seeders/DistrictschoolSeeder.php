<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Districtschool;

class DistrictschoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districtschools = [
            '1 ต.สันมะเค็ด', '2 ต.แม่อ้อ','3 ต.ธารทอง','4 ต.สันติสุข','5 ต.ดอยงาม','6. ต.หัวง้ม','7 ต.เจริญเมือง','8 ต.ป่าหุ่ง','9 ต.ม่วงคำ',
            '10 ต.ทรายขาว','11 ต.สันกลาง','12 ต.แม่เย็น','13 ต.เมืองพาน',
            '14 ต.ทานตะวัน','15 ต.และเวียงห้าว','16 ต.ป่าแงะ อ.ป่าแดด','17 ต.ป่าแดด อ.ป่าแดด','18 ต.ป่าแฝก อ.แม่ใจ','19 อื่นๆ'
        ];
        foreach ($districtschools as $namedistric) {
            Districtschool::factory()->create([
                'namedistric' => $namedistric,
            ]);
        }
    }
}
