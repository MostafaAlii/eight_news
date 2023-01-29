<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
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
        DB::table('posts')->truncate();
        for ($i = 0, $ii = 2500; $i < $ii; $i++) {
            Post::create([
                'post_title' => $faker->name(),
                'post_content' => $faker->text(),
                'status' => $faker->randomElement(['published', 'Unpublished', 'draft']),
                'admin_id' => Admin::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'visitor' => $faker->numberBetween(1, 40),
                'is_shared' => $faker->numberBetween(1, 20),
                'is_comment' => $faker->numberBetween(1, 20),
            ]);
        }

        $category = Category::whereStatus(true)->get();
        $tages = Tag::whereStatus(true)->get();
        Post::all()->each(function ($post) use ($category, $tages) {
            $post->postCategories()->attach($category->random(rand(1, 4))->pluck('id')->toArray());
            $post->postsTages()->attach($tages->random(rand(1, 4))->pluck('id')->toArray());
        });

        Schema::enableForeignKeyConstraints();
    }
}
