<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SupplierController;
use App\Models\Transaction;
use App\Models\Activity;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard APBDes
    Route::get('/dashboard', function () {
        $totalPemasukan = Transaction::where('type', 'pemasukan')->sum('amount');
        $totalPengeluaran = Transaction::where('type', 'pengeluaran')->sum('amount');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        $totalAPBDes = Activity::sum('budget');
        $persentaseRealisasi = $totalAPBDes > 0 ? ($totalPengeluaran / $totalAPBDes) * 100 : 0;

        $pencairanTerbaru = Transaction::with('activity')
                            ->where('type', 'pengeluaran')
                            ->latest()
                            ->take(5)
                            ->get();

        $chartData = [
            'pagu' => $totalAPBDes,
            'realisasi' => $totalPengeluaran,
            'sisa' => max(0, $totalAPBDes - $totalPengeluaran)
        ];

        return view('dashboard', compact(
            'totalPemasukan', 'totalPengeluaran', 'saldoAkhir', 
            'totalAPBDes', 'persentaseRealisasi', 'pencairanTerbaru', 'chartData'
        ));
    })->name('dashboard');

    // Transaksi Keuangan
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // Master Data Kegiatan & Supplier
    Route::resource('activities', ActivityController::class);
    Route::resource('suppliers', SupplierController::class);

});

require __DIR__.'/auth.php';