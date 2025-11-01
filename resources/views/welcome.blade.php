<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BEM TEL-U - Sistem Manajemen Organisasi</title>
        <link rel="icon" href="{{ asset('images/U.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .gradient-red-black {
                background: linear-gradient(135deg, #B71C1C 0%, #1a1a1a 50%, #000000 100%);
            }
            .gradient-overlay {
                background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            .float-animation {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes pulse-glow {
                0%, 100% { box-shadow: 0 0 20px rgba(183, 28, 28, 0.3); }
                50% { box-shadow: 0 0 40px rgba(183, 28, 28, 0.6); }
            }
            .glow-effect {
                animation: pulse-glow 3s ease-in-out infinite;
            }
        </style>
    </head>
    <body class="bg-black text-white antialiased overflow-x-hidden">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 bg-black/90 backdrop-blur-lg border-b border-red-900/20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/TelU.png') }}" alt="Telkom University" class="h-12 w-auto">
                        <div>
                            <h1 class="text-2xl font-bold text-white">BEM TEL-U</h1>
                            <p class="text-xs text-gray-400">Badan Eksekutif Mahasiswa</p>
                        </div>
                    </div>
                    @auth
                        <a href="{{ url('/admin') }}" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-red-900/50 transform hover:scale-105">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </span>
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-red-900/50 transform hover:scale-105">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                Masuk
                            </span>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative gradient-red-black min-h-screen flex items-center justify-center overflow-hidden pt-20">
            <!-- Animated Background Patterns -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-20 left-10 w-72 h-72 bg-red-600 rounded-full blur-3xl opacity-40 float-animation"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-800 rounded-full blur-3xl opacity-30 float-animation" style="animation-delay: 2s;"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-red-900 rounded-full blur-3xl opacity-20"></div>
            </div>
            
            <!-- Grid Pattern Overlay -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGgydjJ oMzZ6TTAgMThoMnYyaDB6bTAgMThoMnYyaDB6bTM2IDE4aDJ2MmgzNnoiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-10"></div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 text-center">
                <div class="mb-8">
                    <span class="inline-block px-4 py-2 bg-red-600/20 border border-red-600/30 rounded-full text-red-400 text-sm font-semibold mb-8">
                        Sistem Manajemen Organisasi Terintegrasi
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white via-gray-100 to-gray-300 bg-clip-text text-transparent">
                        Badan Eksekutif
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-red-500 via-red-600 to-red-700 bg-clip-text text-transparent">
                        Mahasiswa
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-light">
                    Platform Digital Modern untuk Mengelola Proposal, Program Kerja, dan Struktur Organisasi BEM Telkom University dengan Efisien dan Profesional
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                    @auth
                        <a href="{{ url('/admin') }}" class="group px-10 py-5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all duration-300 font-bold text-lg shadow-2xl hover:shadow-red-900/50 transform hover:scale-105 glow-effect">
                            <span class="flex items-center gap-3">
                                <span>Masuk Dashboard</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="group px-10 py-5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all duration-300 font-bold text-lg shadow-2xl hover:shadow-red-900/50 transform hover:scale-105 glow-effect">
                            <span class="flex items-center gap-3">
                                <span>Mulai Sekarang</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                    @endauth
                    
                    <a href="#features" class="px-10 py-5 bg-transparent border-2 border-white/20 hover:border-white/40 text-white hover:bg-white/5 rounded-xl transition-all duration-300 font-bold text-lg backdrop-blur-sm transform hover:scale-105">
                        <span class="flex items-center gap-3">
                            <span>Jelajahi Fitur</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </a>
                </div>

                <!-- Stats Mini -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10">
                        <div class="text-4xl font-bold text-red-500 mb-2">5+</div>
                        <div class="text-gray-400 text-sm">Kementerian</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10">
                        <div class="text-4xl font-bold text-red-500 mb-2">40+</div>
                        <div class="text-gray-400 text-sm">Anggota Aktif</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10">
                        <div class="text-4xl font-bold text-red-500 mb-2">100%</div>
                        <div class="text-gray-400 text-sm">Digital</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10">
                        <div class="text-4xl font-bold text-red-500 mb-2">24/7</div>
                        <div class="text-gray-400 text-sm">Akses</div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="bg-black py-24 relative">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 class="text-5xl md:text-6xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                            Fitur Unggulan
                        </span>
                    </h2>
                    <p class="text-xl text-gray-400 max-w-3xl mx-auto font-light">
                        Sistem yang dirancang khusus untuk mendukung kegiatan dan manajemen organisasi BEM TEL-U secara modern dan efisien
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <!-- Feature 1 -->
                    <div class="group relative bg-gradient-to-br from-gray-900 to-black border border-red-900/20 rounded-2xl p-8 hover:border-red-600/40 transition-all duration-500 hover:transform hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/10 rounded-full blur-3xl group-hover:bg-red-600/20 transition-all duration-500"></div>
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-white">Manajemen Proposal</h3>
                            <p class="text-gray-400 leading-relaxed">
                                Kelola proposal dengan workflow terstruktur, mulai dari pengajuan, review menteri, hingga persetujuan final dengan sistem tracking status yang transparan dan real-time.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative bg-gradient-to-br from-gray-900 to-black border border-red-900/20 rounded-2xl p-8 hover:border-red-600/40 transition-all duration-500 hover:transform hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/10 rounded-full blur-3xl group-hover:bg-red-600/20 transition-all duration-500"></div>
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-white">Program Kerja</h3>
                            <p class="text-gray-400 leading-relaxed">
                                Rencanakan dan pantau program kerja setiap kementerian dengan sistem tracking progress yang real-time, terintegrasi, dan mudah dipantau oleh seluruh pihak.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative bg-gradient-to-br from-gray-900 to-black border border-red-900/20 rounded-2xl p-8 hover:border-red-600/40 transition-all duration-500 hover:transform hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/10 rounded-full blur-3xl group-hover:bg-red-600/20 transition-all duration-500"></div>
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-white">Struktur Organisasi</h3>
                            <p class="text-gray-400 leading-relaxed">
                                Kelola struktur organisasi, kementerian, dan anggota dengan sistem role-based access control yang aman, terorganisir, dan mudah dikelola oleh admin.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Additional Features -->
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <div class="bg-gradient-to-br from-gray-900/50 to-black/50 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                        <div class="flex items-start gap-6">
                            <div class="w-14 h-14 bg-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-2">Keamanan Terjamin</h4>
                                <p class="text-gray-400">Sistem autentikasi dan autorisasi berbasis role untuk menjaga keamanan data organisasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-900/50 to-black/50 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                        <div class="flex items-start gap-6">
                            <div class="w-14 h-14 bg-red-600/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-2">Laporan & Statistik</h4>
                                <p class="text-gray-400">Dashboard interaktif dengan visualisasi data dan laporan lengkap untuk monitoring kinerja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="relative py-24 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-red-900/20 via-black to-black"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGgydjJoMzZ6TTAgMThoMnYyaDB6bTAgMThoMnYyaDB6bTM2IDE4aDJ2MmgzNnoiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-5"></div>
            
            <div class="relative max-w-5xl mx-auto px-6 lg:px-8 text-center">
                <div class="bg-gradient-to-br from-gray-900/80 to-black/80 backdrop-blur-xl border border-red-900/30 rounded-3xl p-12 lg:p-16 shadow-2xl">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                            Siap Bergabung?
                        </span>
                    </h2>
                    <p class="text-xl md:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
                        Akses sistem manajemen BEM TEL-U sekarang dan rasakan kemudahan dalam mengelola seluruh aktivitas organisasi
                    </p>
                    @auth
                        <a href="{{ url('/admin') }}" class="inline-block px-12 py-5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all duration-300 font-bold text-lg shadow-2xl hover:shadow-red-900/50 transform hover:scale-105">
                            <span class="flex items-center gap-3">
                                <span>Buka Dashboard</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="inline-block px-12 py-5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all duration-300 font-bold text-lg shadow-2xl hover:shadow-red-900/50 transform hover:scale-105">
                            <span class="flex items-center gap-3">
                                <span>Login Sekarang</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black border-t border-red-900/20 py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-12 mb-8">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ asset('images/TelU.png') }}" alt="Telkom University" class="h-12 w-auto">
                            <div>
                                <h3 class="text-xl font-bold text-white">BEM TEL-U</h3>
                                <p class="text-xs text-gray-500">Telkom University</p>
                            </div>
                        </div>
                        <p class="text-gray-400 leading-relaxed">
                            Sistem Manajemen Organisasi untuk Badan Eksekutif Mahasiswa Telkom University
                        </p>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-bold mb-4 text-lg">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#features" class="text-gray-400 hover:text-red-500 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    Fitur
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ url('/admin') }}" class="text-gray-400 hover:text-red-500 transition-colors flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('/admin/login') }}" class="text-gray-400 hover:text-red-500 transition-colors flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Login
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-bold mb-4 text-lg">Kontak</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Telkom University<br>Bandung, Indonesia</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-red-900/20 pt-8 text-center">
                    <p class="text-gray-500">
                        &copy; {{ date('Y') }} <span class="text-red-500 font-semibold">BEM TEL-U</span>. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
