<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('nohp');
            $table->string('address');
            $table->string('class')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_guru')->default(false);
            $table->boolean('is_siswa')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
