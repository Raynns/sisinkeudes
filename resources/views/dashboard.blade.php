<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="mb-8 px-4 sm:px-0 flex justify-between items-end">
                <div>
                    <h1 class="text-3xl font-light text-slate-800">Dashboard APBDes</h1>
                    <p class="text-slate-500 text-sm mt-1">Ringkasan statistik anggaran, grafik realisasi, dan kas.</p>
                </div>
            </div>

            <!-- 1. RINGKASAN: STATISTIK APBDES, REALISASI, & SISA KAS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 px-4 sm:px-0">
                
                <!-- Kartu Total APBDes -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 flex items-center shadow-sm">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-500 mr-4 shrink-0">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total APBDes (Anggaran)</p>
                        <h3 class="text-2xl font-bold text-slate-800">Rp {{ number_format($totalAPBDes, 0, ',', '.') }}</h3>
                    </div>
                </div>

                <!-- Kartu Realisasi Belanja (Lengkap dengan Garis Progres) -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 flex items-center shadow-sm relative overflow-hidden">
                    <div class="w-14 h-14 rounded-2xl bg-rose-50 flex items-center justify-center text-rose-500 mr-4 shrink-0">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" /></svg>
                    </div>
                    <div class="w-full">
                        <p class="text-sm font-medium text-slate-500 mb-1">Realisasi Belanja</p>
                        <h3 class="text-2xl font-bold text-slate-800">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
                    </div>
                    <!-- Progres Bar di Bawah Kartu -->
                    <div class="absolute bottom-0 left-0 h-1.5 bg-rose-500 transition-all duration-1000" style="width: {{ min($persentaseRealisasi, 100) }}%;"></div>
                </div>

                <!-- Kartu Sisa Kas Desa -->
                <div class="bg-slate-900 rounded-3xl p-6 border border-slate-800 flex items-center shadow-md relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full border-4 border-white/10"></div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-white mr-4 shrink-0 relative z-10">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" /></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-sm font-medium text-slate-400 mb-1">Sisa Kas Desa (Saldo)</p>
                        <h3 class="text-2xl font-bold text-white">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                
                <!-- 2. GRAFIK REALISASI ANGGARAN (Kolom Lebar) -->
                <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-medium text-slate-800 mb-4">Grafik Realisasi vs APBDes</h3>
                    <div class="relative h-72 w-full">
                        <!-- Tempat Chart.js dirender -->
                        <canvas id="realisasiChart"></canvas>
                    </div>
                </div>

                <!-- 3. NOTIFIKASI PENCAIRAN (Kolom Samping) -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-slate-800">Notifikasi Pencairan</h3>
                        <a href="{{ route('transactions.create') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 bg-indigo-50 px-3 py-1.5 rounded-lg">+ Buat SPP</a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($pencairanTerbaru as $pencairan)
                            <div class="flex items-start pb-4 border-b border-slate-50 last:border-0 last:pb-0">
                                <div class="w-10 h-10 rounded-full bg-rose-50 flex items-center justify-center text-rose-500 mr-3 shrink-0">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">{{ $pencairan->activity->name ?? 'Belanja Umum' }}</p>
                                    <p class="text-xs text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($pencairan->transaction_date)->translatedFormat('d M Y') }}</p>
                                </div>
                                <div class="text-right ml-2 shrink-0">
                                    <p class="text-sm font-bold text-rose-600">- Rp {{ number_format($pencairan->amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-sm text-slate-400">Belum ada aktivitas pencairan/pengeluaran.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SCRIPT PUSTAKA CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('realisasiChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Pagu APBDes', 'Realisasi Terserap', 'Sisa Anggaran'],
                    datasets: [{
                        label: 'Nominal Anggaran (Rp)',
                        data: [
                            {{ $chartData['pagu'] }},
                            {{ $chartData['realisasi'] }},
                            {{ $chartData['sisa'] }}
                        ],
                        backgroundColor: [
                            'rgba(99, 102, 241, 0.2)', // Indigo
                            'rgba(244, 63, 94, 0.2)',  // Rose
                            'rgba(16, 185, 129, 0.2)'  // Emerald
                        ],
                        borderColor: [
                            'rgb(99, 102, 241)',
                            'rgb(244, 63, 94)',
                            'rgb(16, 185, 129)'
                        ],
                        borderWidth: 2,
                        borderRadius: 12,
                        borderSkipped: false,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: { display: false },
                            grid: { color: 'rgba(241, 245, 249, 1)' }, // slate-100
                            ticks: {
                                font: { family: "'Figtree', sans-serif" },
                                color: '#64748b',
                                callback: function(value) {
                                    if(value >= 1000000){ return 'Rp ' + (value / 1000000) + ' Juta'; }
                                    return 'Rp ' + value;
                                }
                            }
                        },
                        x: {
                            border: { display: false },
                            grid: { display: false },
                            ticks: { font: { family: "'Figtree', sans-serif", weight: '500' }, color: '#475569' }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>