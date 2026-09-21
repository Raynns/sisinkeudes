<x-app-layout>
    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Minimalis -->
            <div class="flex justify-between items-end mb-8 px-4 sm:px-0">
                <div>
                    <h1 class="text-3xl font-light text-slate-800">Kas Desa</h1>
                    <p class="text-slate-500 text-sm mt-1">Pantau pergerakan arus kas harian.</p>
                </div>
                <a href="{{ route('transactions.create') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-full text-sm font-medium transition-colors shadow-sm">
                    + Catat Transaksi
                </a>
            </div>

            <!-- Alert Sukses yang lebih clean -->
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 text-emerald-600 px-4 py-3 rounded-xl text-sm border border-emerald-100">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Minimalis (Tanpa shadow tebal, border halus) -->
            <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider bg-slate-50/50">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider bg-slate-50/50">Kategori</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider bg-slate-50/50">Jenis</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider bg-slate-50/50">Nominal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($transactions as $transaction)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-800 font-medium">{{ $transaction->category }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">{{ $transaction->description ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($transaction->type === 'pemasukan')
                                            <span class="px-3 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-100">Pemasukan</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-[11px] font-medium bg-rose-50 text-rose-600 border border-rose-100">Pengeluaran</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                        Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-sm text-slate-400 text-center">
                                        Belum ada catatan transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>