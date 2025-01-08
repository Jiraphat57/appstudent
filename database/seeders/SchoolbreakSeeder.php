<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Schoolbreak;
class SchoolbreakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('schoolbreaks')->insert(
        //     array(
        //         ['schoolbreak' => 'อาศัยอยู่กับบิดา'],
        //         ['schoolbreak' => 'อาศัยอยู่ญาติ'],
        //         ['schoolbreak' => 'อาศัยอยู่พระ'],
        //         ['schoolbreak' => 'อาศัยอยู่ครู'],SchoolbreakFactory
        //         ['schoolbreak' => 'องค์กรการกุศล'],
        //         ['schoolbreak' => 'อื่นๆ']
        $schoolbreaks = [
            'อาศัยอยู่กับบิดา', 'อาศัยอยู่ญาติ', 'อาศัยอยู่พระ', 'อาศัยอยู่ครู', 
            'องค์กรการกุศล', 'อื่นๆ'
        ];
        foreach ($schoolbreaks as $schoolbreak) {
            Schoolbreak::factory()->create([
                'schoolbreak' => $schoolbreak,
            ]);
        }
    }
}
