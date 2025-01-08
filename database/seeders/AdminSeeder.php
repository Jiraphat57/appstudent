<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name' => 'ครูจิรภัทร  ตาบัง', 'email' => 'jiraphat@phanphit.ac.th', 'password' => Hash::make('@579932066'), 'role' => 'admin'],
            ['name' => 'ครูสมพล อัตถะเรือง', 'email' => 'sompon@phanphit.ac.th', 'password' => Hash::make('@sompon'), 'role' => 'admin'],
            ['name' => 'ครูโชติกา  มาลัย', 'email' => 'chotika@phanphit.ac.th', 'password' => Hash::make('@chotika'), 'role' => 'admin'],
            ['name' => 'ครูเสาวภา  มณีมูล', 'email' => 'saowapa@phanphit.ac.th', 'password' => Hash::make('@saowapa'), 'role' => 'admin'],
            ['name' => 'ครูกัลยา เตชะ', 'email' => 'kanlaya@phanphit.ac.th', 'password' => Hash::make('@kanlaya'), 'role' => 'admin'],
            ['name' => 'ลีลา จำมะเทวี', 'email' => 'leela@phanphit.ac.th', 'password' => Hash::make('@leela'), 'role' => 'admin'],
            ['name' => 'ชนากานต์ ทาก๋อง', 'email' => 'chanakarn@phanphit.ac.th', 'password' => Hash::make('@chanakarn'), 'role' => 'admin'],
            ['name' => 'Admin1', 'email' => 'admin5@example.com', 'password' => Hash::make('password5'), 'role' => 'admin'],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
