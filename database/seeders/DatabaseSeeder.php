<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            SectionSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
        ]);
    }
}