<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Travelschool1;

class Travelschool1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nametravelschools = [
            'เดินเท้า', 'จักรยานยืมเรียน', 'พาหนะไม่เสียค่าโดยสาร', 'พาหนะเสียค่าโดยสาร', 
            'อื่นๆ'
        ];
        foreach ($nametravelschools as $nametravelschool) {
            Travelschool1::factory()->create([
                'nametravelschool' => $nametravelschool,
            ]);
        }
    }
}
