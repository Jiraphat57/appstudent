<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Servicearea;

class ServiceareaSeeder extends Seeder
{
    public function run(): void
    {
        $serviceareas = [
            'ในเขต(ม.1)', 'นอกเขต(ม.1)','โรงเรียนเดิม(ม.4) ',
            'โรงเรียนอื่นในจังหวัดเชียงราย(ม.4)','โรงเรียนอื่นต่างจังหวัด(ม.4)'
        ];
        foreach ($serviceareas as $name) {
            Servicearea::factory()->create([
                'name' => $name,
            ]);
        }
    }

}
