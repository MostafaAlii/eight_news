<?php
namespace Database\Seeders;
use App\Models\Admin;
use App\Enums\AdminType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
class AdminSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'super admin',
            'email' => 'super_admin@app.com',
            'type' => 'Super Admin',
            'status' => true,
            'password' => bcrypt('123123'),
        ]);
        DB::table('admins')->insert([
            'name' => 'supervisor admin',
            'email' => 'supervisor@app.com',
            'type' => 'Supervisor',
            'status' => true,
            'password' => bcrypt('123123'),
        ]);
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'type' => 'admin',
            'status' => true,
            'password' => bcrypt('123123'),
        ]);
        
        Schema::enableForeignKeyConstraints();
        Admin::factory()->count(10)->create();
    }
}