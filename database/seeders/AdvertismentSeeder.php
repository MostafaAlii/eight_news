<?php
namespace Database\Seeders;

use App\Models\Advertisment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
class AdvertismentSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('advertisments')->truncate();
        Schema::enableForeignKeyConstraints();
        Advertisment::factory()->count(10)->create();
    }
}