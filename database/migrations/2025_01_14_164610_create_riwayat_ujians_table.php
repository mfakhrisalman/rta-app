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
        Schema::create('riwayat_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('id_student');
            $table->string('name_student');
            $table->string('name_class');
            $table->string('class');
            $table->string('year');
            $table->string('tabi');
            $table->string('qty_juz');
            $table->string('score')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_ujians');
    }
};
