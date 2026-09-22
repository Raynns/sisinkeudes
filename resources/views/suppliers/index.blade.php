<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Navigasi Tab Sederhana (Kegiatan & Supplier) -->
            <div class="flex space-x-4 mb-6">
                <a href="{{ route('activities.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-slate-500 hover:bg-slate-100 transition-colors">Data Kegiatan</a>
                <a href="{{ route('suppliers.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium bg-slate-900 text-white shadow-sm">Data Supplier / Toko</a>
            </div>

            <div class="flex justify-between items-end mb-8 px-4 sm:px-0">
                <div>
                    <h1 class="text-3xl font-light text-slate-800">Data Supplier</h1>
                    <p class="text-slate-500 text-sm mt-1">Kelola daftar toko, mitra, atau vendor pengadaan desa.</p>
                </div>
                <a href="{{ route('suppliers.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm">
                    + Tambah Supplier
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-emerald-50 text-emerald-600 px-4 py-3 rounded-xl text-sm border border-emerald-100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100 bg-slate-50/50">
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider">Nama Toko/Supplier</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider">Pemilik</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider">No. Telepon</th>
                                <th class="px-6 py-4 text-xs font-medium text-slate-400 uppercase tracking-wider">Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($suppliers as $supplier)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-700">{{ $supplier->name }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-800">{{ $supplier->owner_name ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">{{ $supplier->phone ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">{{ $supplier->address ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-sm text-slate-400 text-center">Belum ada data supplier.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>