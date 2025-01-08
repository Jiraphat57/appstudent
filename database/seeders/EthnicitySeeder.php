<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ethnicity;
class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $ethnicities = [
            'ไทย', 'อาข่า', 'ลั๊ว', 'ญี่ปุ่น', 
            'ลาว', 'พม่า', 
            'ลาหู่', 'ม้ง', 
            'จีนฮ่อ', 'จีน', 
            'ละว้า', 'มอญ','กะเหรี่ยง', 'ไทยใหญ่','เกาหลี','อื่นๆ'
        ];

        foreach ($ethnicities as $ethnicitie) {
            Ethnicity::factory()->create([
                'ethnicitie' => $ethnicitie,
            ]);
        }
    }
}
