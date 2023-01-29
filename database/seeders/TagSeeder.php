<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
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
        DB::table('tags')->truncate();
        for ($i = 0, $ii = 50; $i < $ii; $i++) {
            Tag::create([
                'name' => $faker->name(),
                'status' => $faker->randomElement(['active','notActive']),
                'admin_id' => Admin::all()->random()->id,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
