<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Activity; // Tambahkan ini!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create()
    {
        // Ambil semua data kegiatan untuk opsi dropdown
        $activities = Activity::orderBy('code', 'asc')->get();
        return view('transactions.create', compact('activities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:pemasukan,pengeluaran',
            'activity_id' => 'required|exists:activities,id', // Validasi relasi
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        Transaction::create($validated);

        return redirect()->route('dashboard')->with('success', 'Data transaksi berhasil disimpan!');
    }
}