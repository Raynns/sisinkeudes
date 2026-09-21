<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SISKEUDES - Sistem Keuangan Desa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 bg-slate-50">
        <div class="flex min-h-screen">
            
            <!-- SIDEBAR KIRI (Kontras Gelap) -->
            <aside class="w-64 fixed inset-y-0 left-0 bg-slate-900 flex flex-col z-50 shadow-2xl">
                
                <!-- Logo Area -->
                <div class="h-24 flex items-center px-8 border-b border-slate-800">
                    <span class="text-2xl font-bold tracking-widest text-white">SISKEUDES</span>
                </div>

                <!-- Menu Navigasi -->
                <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
                    
                    <!-- Menu Dashboard (Ikon Rumah) -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <!-- SVG Icon Home -->
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Beranda Kas
                    </a>
                    
                    <!-- Menu Input Transaksi (Ikon Plus/Dokumen) -->
                    <a href="{{ route('transactions.create') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-colors {{ request()->routeIs('transactions.create') ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <!-- SVG Icon Plus -->
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Input Transaksi
                    </a>
                </nav>

                <!-- Profil User & Tombol Keluar (Gelap) -->
                <div class="p-4 border-t border-slate-800">
                    <div class="px-4 py-3 mb-2 bg-slate-800/50 rounded-2xl border border-slate-700/50">
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Aparatur Desa</p>
                        <p class="text-sm font-medium text-slate-200 truncate mt-0.5">{{ Auth::user()->name }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium text-rose-400 rounded-2xl hover:bg-slate-800 hover:text-rose-300 transition-colors">
                            <!-- SVG Icon Logout -->
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar Aplikasi
                        </button>
                    </form>
                </div>
            </aside>

            <!-- KONTEN UTAMA -->
            <div class="flex-1 ml-64 flex flex-col min-h-screen">
                <main class="flex-1 p-8 sm:p-10">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>