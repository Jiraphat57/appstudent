<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Typeresidence;

class TyperesidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('typeresidences')->insert(
        //     array(
        //         ['typeresidence' => 'บ้านตัวเอง'],
        //         ['typeresidence' => 'อาศัยอยู่กับญาติ'],
        //         ['typeresidence' => 'บ้านเช่า'],
        //         ['typeresidence' => 'วัด'],
        //         ['typeresidence' => 'อื่นๆ']
        //     )
        // );
        $typeresidences = [
            'บ้านตัวเอง', 'อาศัยอยู่กับญาติ', 'บ้านเช่า', 'วัด', 'อื่นๆ'
        ];
        foreach ($typeresidences as $typeresidence) {
            Typeresidence::factory()->create([
                'typeresidence' => $typeresidence,
            ]);
        }
    }
}
