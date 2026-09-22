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
    Schema::create('suppliers', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh: TB. Bangunan Maju
        $table->string('owner_name')->nullable(); // Nama Pemilik
        $table->string('phone')->nullable(); // No HP/Telepon
        $table->text('address')->nullable(); // Alamat Toko
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
