<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(ProvinceSeeder::class);
        // $this->call(BloodtypeSeeder::class);
        // $this->call(EthnicitySeeder::class);
        // $this->call(GenderSeeder::class);
        // $this->call(MaritalstatusSeeder::class);
        // $this->call(NationalitySeeder::class);
        // $this->call(ReligionSeeder::class);
        // $this->call(SchoolbreakSeeder::class);
        // $this->call(TyperesidenceSeeder::class);
        // $this->call(TypetitleSeeder::class);
        // $this->call(OccupationSeeder::class);
        // $this->call(ClassLevelSeeder::class);
        // $this->call(HighSchoolSeeder::class);
        // $this->call(SecondarySchoolSeeder::class);
        // $this->call(AdminSeeder::class);

        $this->call([
            ProvinceSeeder::class,
            BloodtypeSeeder::class,
            EthnicitySeeder::class,
            GenderSeeder::class,
            MaritalstatusSeeder::class,
            NationalitySeeder::class,
            ReligionSeeder::class,
            SchoolbreakSeeder::class,
            TyperesidenceSeeder::class,
            TypetitleSeeder::class,
            OccupationSeeder::class,
            ClassLevelSeeder::class,
            HighSchoolSeeder::class,
            SecondarySchoolSeeder::class,
            AdminSeeder::class
        ]);
    }
}
