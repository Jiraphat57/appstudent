<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Occupation;
class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('occupations')->insert(
        //     array(
        //         ['occupation' => 'รับราชการ'],
        //         ['occupation' => 'พนักงานรัฐวิสาหกิจ'],
        //         ['occupation' => 'นักธุรกิจ-ค้าขาย'],
        //         ['occupation' => 'เกษตรกร'],
        //         ['occupation' => 'รับจ้าง'],
        //         ['occupation' => 'พระ/นักบวช'],
        //         ['occupation' => 'พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว'],
        //         ['occupation' => 'เกษียณ'],
        //         ['occupation' => 'ไม่ได้ประกอบอาชีพ'],
        //         ['occupation' => 'อื่นๆ']
        //     )
        // );
        $occupations = [
            'รับราชการ', 'พนักงานรัฐวิสาหกิจ', 'นักธุรกิจ-ค้าขาย', 'เกษตรกร', 
            'รับจ้าง', 'พระ/นักบวช','พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว', 'เกษียณ', 
            'ไม่ได้ประกอบอาชีพ', 'อื่นๆ'
        ];
        foreach ($occupations as $occupation) {
            Occupation::factory()->create([
                'occupation' => $occupation,
            ]);
        }
    }
}
