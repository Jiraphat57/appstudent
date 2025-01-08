<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Typetitle;

class TypetitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typetitles = [
            'เด็กชาย', 'เด็กหญิง', 'นาย', 'นางสาว', 'นาง', 'อื่นๆ'
        ];
        foreach ($typetitles as $typetitle) {
            Typetitle::factory()->create([
                'typetitle' => $typetitle,
            ]);
        }
    }
}
