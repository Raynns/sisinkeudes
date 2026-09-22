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
        
        <!-- Alpine.js untuk fitur dropdown profil -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased text-slate-900 bg-slate-50">
        <div class="flex min-h-screen">
            
            <!-- SIDEBAR KIRI -->
            <aside class="w-64 fixed inset-y-0 left-0 bg-slate-900 flex flex-col z-50 shadow-2xl">
                
                <!-- Logo Area -->
                <div class="h-16 flex shrink-0 items-center px-8 bg-slate-950">
                    <span class="text-xl font-bold tracking-widest text-white">SISKEUDES</span>
                </div>

                <!-- Menu Navigasi (Scrollable, Scrollbar disembunyikan) -->
                <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] pb-24">
                    
                    <!-- 1. DASHBOARD -->
                    <div class="space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                            Dashboard
                        </a>
                    </div>

                    <!-- 2. MASTER & ANGGARAN -->
                    <div>
                        <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Master & Anggaran</p>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                                Data Wilayah & Rekening
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                RPJM & RKP Desa
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>
                                Penyusunan APB Desa
                            </a>
                            <a href="{{ route('activities.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                Kegiatan & Supplier
                            </a>
                        </div>
                    </div>

                    <!-- 3. TRANSPARANSI & KEUANGAN -->
                    <div>
                        <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Transparansi & Keuangan</p>
                        <div class="space-y-1">
                            <a href="{{ route('transactions.create') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition-colors {{ request()->routeIs('transactions.*') ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Penerimaan & SPP
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                Mutasi Bank & Pajak
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                Buku Kas & Pembukuan
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                Laporan & LPJ
                            </a>
                        </div>
                    </div>

                    <!-- 4. PENGATURAN SISTEM -->
                    <div>
                        <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pengaturan Sistem</p>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                Manajemen Pengguna
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Log Aktivitas
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" /></svg>
                                Backup & Restore
                            </a>
                            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                Pengaturan Umum
                            </a>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- KONTEN UTAMA & NAVBAR ATAS -->
            <div class="flex-1 ml-64 flex flex-col min-h-screen">
                
                <!-- NAVBAR ATAS (Header) -->
                <header class="h-16 bg-white border-b border-slate-100 flex items-center justify-end px-8 sticky top-0 z-40">
                    
                    <!-- Area Profil User (Pojok Kanan) menggunakan Alpine.js -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 text-left focus:outline-none hover:bg-slate-50 p-2 rounded-xl transition-colors">
                            <!-- Foto/Inisial -->
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <!-- Teks Nama -->
                            <div class="hidden md:block">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider leading-none">Aparatur Desa</p>
                                <p class="text-sm font-medium text-slate-700 leading-tight">{{ Auth::user()->name }}</p>
                            </div>
                            <!-- Ikon Panah Bawah -->
                            <svg class="w-4 h-4 text-slate-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <!-- Dropdown Menu Keluar (Logout) -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-1 z-50" style="display: none;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors text-left">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

                <!-- AREA KONTEN (HALAMAN) -->
                <main class="flex-1 p-8 sm:p-10">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>