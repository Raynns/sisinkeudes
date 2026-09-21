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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->enum('type', [' pemasukan', 'pengeluaran']); // Jenis transaksi
        $table->string('category'); // Contoh: Dana Desa, BUMDes, Belanja Fisik, dll.
        $table->decimal('amount', 15, 2); // Jumlah nominal (mendukung hingga miliaran rupiah)
        $table->date('transaction_date'); // Tanggal transaksi
        $table->text('description')->nullable(); // Keterangan atau uraian
        $table->string('proof_file')->nullable(); // Untuk unggah foto nota/kwitansi (opsional)
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pihak/Operator yang menginput
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
