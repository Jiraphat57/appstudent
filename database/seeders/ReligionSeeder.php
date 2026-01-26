<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religion;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            'พุทธ', 'อิสลาม', 'คริสต์', 'ซิกส์', 
            'พราหมณ์/ฮินดู', 'อื่นๆ'
        ];
        foreach ($religions as $religion) {
            Religion::factory()->create([
                'religion' => $religion,
            ]);
        }
    }
}
