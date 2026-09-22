<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4 sm:px-0">
                <a href="{{ route('suppliers.index') }}" class="text-sm text-slate-400 hover:text-slate-600 mb-2 inline-block">&larr; Kembali</a>
                <h1 class="text-3xl font-light text-slate-800">Tambah Supplier</h1>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 p-8 sm:p-10 shadow-sm">
                <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Nama Toko/Supplier <span class="text-red-500">*</span></label>
                            <input type="text" name="name" placeholder="Misal: TB. Bangunan Maju" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Nama Pemilik</label>
                            <input type="text" name="owner_name" placeholder="Misal: Bpk. Budi" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" placeholder="Misal: 081234567890" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Alamat Lengkap</label>
                        <textarea name="address" rows="3" placeholder="Misal: Jl. Raya Desa No. 12" class="w-full bg-slate-50 border-transparent focus:border-slate-300 focus:ring-0 rounded-xl px-4 py-3 text-sm text-slate-700"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-xl text-sm font-medium transition-colors">
                            Simpan Supplier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>