<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        for ($i = 0, $ii = 50; $i < $ii; $i++) {
            Category::create([
                'name' => $faker->name(),
                'description'=> $faker->paragraph(),
                'status' => $faker->randomElement(['active','notActive']),
                'admin_id' => Admin::all()->random()->id,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}