<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // Cek dulu, jika kolom 'foto' BELUM ada, baru ditambahkan
            if (!Schema::hasColumn('members', 'foto')) {
                $table->string('foto')->nullable()->after('jabatan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            if (Schema::hasColumn('members', 'foto')) {
                $table->dropColumn('foto');
            }
        });
    }
};
