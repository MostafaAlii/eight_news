<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};

class SectionSeeder extends Seeder
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
        DB::table('sections')->truncate();
        for ($i = 0, $ii = 50; $i < $ii; $i++) {
            Section::create([
                'name' => $faker->name(),
                'description'=> $faker->paragraph(),
                'status' => $faker->randomElement([true,false]),
                'admin_id' => Admin::all()->random()->id,
                'category_id' => Category::all()->random()->id,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}