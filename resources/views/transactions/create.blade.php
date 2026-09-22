<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 px-4 sm:px-0">
                <a href="{{ route('dashboard') }}" class="text-sm text-slate-400 hover:text-slate-600 mb-2 inline-block">&larr; Kembali</a>
                <h1 class="text-3xl font-light text-slate-800">Input Transaksi</h1>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 p-8 sm:p-10">
                <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Grid 2 Kolom untuk Tanggal & Jenis -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Jenis Transaksi</label>
                            <select name="type" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700 transition-colors" required>
                                <option value="">-- Pilih --</option>
                                <option value="pemasukan">Pemasukan (+)</option>
                                <option value="pengeluaran">Pengeluaran (-)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Tanggal</label>
                            <input type="date" name="transaction_date" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700 transition-colors" required>
                        </div>
                    </div>

                   <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Pilih Kegiatan (Anggaran)</label>
                        <select name="activity_id" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700 transition-colors" required>
                            <option value="">-- Pilih Kegiatan / Program --</option>
                            @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">
                                    [{{ $activity->code }}] - {{ $activity->name }} (Pagu: Rp {{ number_format($activity->budget, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Nominal (Rp)</label>
                        <input type="number" name="amount" placeholder="0" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700 transition-colors" required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Keterangan Tambahan</label>
                        <textarea name="description" rows="3" placeholder="Opsional..." class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700 transition-colors"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white px-6 py-3.5 rounded-xl text-sm font-medium transition-colors">
                            Simpan Data Transaksi
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>