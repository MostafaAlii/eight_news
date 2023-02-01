<?php
namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
class ImageSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('images')->truncate();
        Schema::enableForeignKeyConstraints();
        Image::factory()->count(5)->create();
    }
}