<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('Volunteer Desa Tegalgondo');
            $table->string('sub_judul')->default('Membangun Desa, Menginspirasi Bangsa');
            $table->text('deskripsi');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable(); // Disimpan dalam format baris/list
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_profiles');
    }
};