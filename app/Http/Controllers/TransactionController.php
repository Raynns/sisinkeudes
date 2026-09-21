<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validated = $request->validate([
            'type' => 'required|in:pemasukan,pengeluaran',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // 2. Tambahkan ID User yang sedang login
        $validated['user_id'] = Auth::id();

        // 3. Simpan ke tabel transactions
        Transaction::create($validated);

        // 4. Kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data transaksi berhasil disimpan!');
    }
}