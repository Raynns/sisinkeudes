<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4 sm:px-0">
                <a href="{{ route('activities.index') }}" class="text-sm text-slate-400 hover:text-slate-600 mb-2 inline-block">&larr; Kembali</a>
                <h1 class="text-3xl font-light text-slate-800">Tambah Kegiatan</h1>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 p-8 sm:p-10 shadow-sm">
                <form action="{{ route('activities.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Kode Kegiatan</label>
                            <input type="text" name="code" placeholder="Misal: 1.01.01" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Tahun Anggaran</label>
                            <input type="number" name="year" value="{{ date('Y') }}" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Nama Kegiatan</label>
                        <input type="text" name="name" placeholder="Misal: Pembangunan Gorong-Gorong RT 01" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700" required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Pagu Anggaran (Rp)</label>
                        <input type="number" name="budget" placeholder="0" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700" required>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-xl text-sm font-medium transition-colors">
                            Simpan Kegiatan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>