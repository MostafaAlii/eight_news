<?php
namespace Database\Seeders;
use App\Models\User;
use App\Enums\UserType;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Normal User',
            'email' => 'user@app.com',
            'type' => 'User',
            'status' => true,
            'password' => bcrypt('123123'), 
            
        ]);
        DB::table('users')->insert([
            'name' => 'PUBLISHER User',
            'email' => 'p_user@app.com',
            'type' => 'Publisher',
            'status' => true,
            'password' => bcrypt('123123'),
            'section_id' => Section::all()->random()->id,
        ]);
        
        Schema::enableForeignKeyConstraints();
        User::factory()->count(10)->create();
        
        
    }
}