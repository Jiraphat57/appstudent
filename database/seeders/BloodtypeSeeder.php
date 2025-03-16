<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bloodtype;

class BloodtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodTypes = [
            'A', 'B', 'AB', 'O', 
            'ARh+', 'ARh-', 
            'BRh+', 'BRh-', 
            'ABRh+', 'ABRh-', 
            'ORh+', 'ORh-', 'ไม่ทราบ' 
        ];
        foreach ($bloodTypes as $bloodType) {
            Bloodtype::factory()->create([
                'bloodtype' => $bloodType,
            ]);
        }
    }
}
