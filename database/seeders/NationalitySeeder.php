<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nationality;
class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('nationalities')->insert(
            $nationalities = [
                'ไทย', 'อาข่า', 'ลั๊ว', 'ญี่ปุ่น', 
                'ลาว', 'พม่า', 
                'ลาหู่', 'ม้ง', 
                'จีนฮ่อ', 'จีน', 
                'ละว้า', 'มอญ','กะเหรี่ยง', 'ไทยใหญ่','เกาหลี','อื่นๆ'
            ];
    
            foreach ($nationalities as $nationalitie) {
                Nationality::factory()->create([
                    'nationalitie' => $nationalitie,
                ]);
            }
    }
}
