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
    Schema::create('activities', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // Contoh: 1.01.01 (Kode Standar APBDes)
        $table->string('name'); // Contoh: Pembangunan Jalan Desa
        $table->decimal('budget', 15, 2)->default(0); // Pagu Anggaran
        $table->year('year'); // Tahun Anggaran
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
