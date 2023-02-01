<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('advertisments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('advertisments');
    }
};