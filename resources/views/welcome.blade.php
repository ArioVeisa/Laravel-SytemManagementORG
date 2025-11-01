<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BEM TEL-U - Sistem Manajemen Organisasi</title>
        <link rel="icon" href="{{ asset('images/U.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Inter', sans-serif;
                background: #000;
                color: #fff;
                overflow-x: hidden;
            }
            
            .gradient-red {
                background: linear-gradient(135deg, #B71C1C 0%, #D32F2F 100%);
            }
            
            .gradient-dark {
                background: linear-gradient(180deg, #000 0%, #1a0a0a 100%);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
            
            .animate-delay-1 { animation-delay: 0.1s; opacity: 0; }
            .animate-delay-2 { animation-delay: 0.2s; opacity: 0; }
            .animate-delay-3 { animation-delay: 0.3s; opacity: 0; }
            
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-15px); }
            }
            
            .float { animation: float 3s ease-in-out infinite; }
            
            .glow-red {
                box-shadow: 0 0 30px rgba(183, 28, 28, 0.5);
            }
            
            .glow-red:hover {
                box-shadow: 0 0 40px rgba(183, 28, 28, 0.7);
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-black/95 backdrop-blur-lg border-b border-red-900/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/TelU.png') }}" alt="TEL-U" class="h-12 w-auto">
                        <div>
                            <h1 class="text-2xl font-bold text-white">BEM TEL-U</h1>
                            <p class="text-xs text-gray-400">Badan Eksekutif Mahasiswa</p>
                        </div>
                    </div>
                    @auth
                        <a href="{{ url('/admin') }}" class="px-6 py-3 gradient-red text-white rounded-lg font-semibold hover:opacity-90 transition-all duration-300 glow-red">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="px-6 py-3 gradient-red text-white rounded-lg font-semibold hover:opacity-90 transition-all duration-300 glow-red">
                            Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center justify-center pt-20 pb-16 px-4 sm:px-6 lg:px-8 gradient-dark overflow-hidden">
            <!-- Background Effects -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-red-900/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-red-900/20 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-red-900/10 rounded-full blur-3xl"></div>
            </div>
            
            <div class="relative max-w-7xl mx-auto text-center">
                <div class="mb-6 animate-fade-in-up">
                    <span class="inline-block px-4 py-2 bg-red-600/20 border border-red-600/40 rounded-full text-red-400 text-sm font-medium">
                        Sistem Manajemen Organisasi
                    </span>
                </div>
                
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold mb-6 animate-fade-in-up animate-delay-1">
                    <span class="block text-white mb-2">Badan Eksekutif</span>
                    <span class="block bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent">Mahasiswa TEL-U</span>
                </h1>
                
                <p class="text-lg sm:text-xl md:text-2xl text-gray-400 mb-10 max-w-4xl mx-auto leading-relaxed animate-fade-in-up animate-delay-2">
                    Platform Digital Modern untuk Mengelola Proposal, Program Kerja, dan Struktur Organisasi dengan Efisien
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16 animate-fade-in-up animate-delay-3">
                    @auth
                        <a href="{{ url('/admin') }}" class="px-10 py-4 gradient-red text-white rounded-lg font-bold text-lg hover:opacity-90 transition-all duration-300 glow-red w-full sm:w-auto">
                            Buka Dashboard →
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="px-10 py-4 gradient-red text-white rounded-lg font-bold text-lg hover:opacity-90 transition-all duration-300 glow-red w-full sm:w-auto">
                            Mulai Sekarang →
                        </a>
                    @endauth
                    <a href="#features" class="px-10 py-4 border-2 border-white/30 text-white rounded-lg font-bold text-lg hover:bg-white/10 transition-all duration-300 w-full sm:w-auto">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="text-4xl font-bold text-red-500 mb-2">5+</div>
                        <div class="text-gray-400 text-sm">Kementerian</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="text-4xl font-bold text-red-500 mb-2">40+</div>
                        <div class="text-gray-400 text-sm">Anggota Aktif</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="text-4xl font-bold text-red-500 mb-2">100%</div>
                        <div class="text-gray-400 text-sm">Digital</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="text-4xl font-bold text-red-500 mb-2">24/7</div>
                        <div class="text-gray-400 text-sm">Akses</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-24 px-4 sm:px-6 lg:px-8 bg-black">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 text-white">
                        Fitur Unggulan
                    </h2>
                    <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                        Sistem yang dirancang khusus untuk mendukung kegiatan dan manajemen organisasi BEM TEL-U secara modern dan efisien
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <!-- Feature 1 -->
                    <div class="bg-gradient-to-br from-gray-900 to-black border border-red-900/30 rounded-2xl p-8 hover:border-red-600/50 transition-all duration-300 hover:transform hover:scale-105">
                        <div class="w-16 h-16 gradient-red rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Manajemen Proposal</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Kelola proposal dengan workflow terstruktur, mulai dari pengajuan, review menteri, hingga persetujuan final dengan sistem tracking status yang transparan dan real-time.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gradient-to-br from-gray-900 to-black border border-red-900/30 rounded-2xl p-8 hover:border-red-600/50 transition-all duration-300 hover:transform hover:scale-105">
                        <div class="w-16 h-16 gradient-red rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Program Kerja</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Rencanakan dan pantau program kerja setiap kementerian dengan sistem tracking progress yang real-time, terintegrasi, dan mudah dipantau oleh seluruh pihak.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gradient-to-br from-gray-900 to-black border border-red-900/30 rounded-2xl p-8 hover:border-red-600/50 transition-all duration-300 hover:transform hover:scale-105">
                        <div class="w-16 h-16 gradient-red rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Struktur Organisasi</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Kelola struktur organisasi, kementerian, dan anggota dengan sistem role-based access control yang aman, terorganisir, dan mudah dikelola oleh admin.
                        </p>
                    </div>
                </div>

                <!-- Additional Features -->
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <div class="bg-gray-900/50 border border-white/10 rounded-xl p-8 hover:bg-gray-900/70 transition-all duration-300">
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

                    <div class="bg-gray-900/50 border border-white/10 rounded-xl p-8 hover:bg-gray-900/70 transition-all duration-300">
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
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-red-900/20 via-black to-black">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-gradient-to-br from-gray-900/80 to-black/80 border border-red-900/30 rounded-3xl p-12 lg:p-16">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white">
                        Siap Bergabung?
                    </h2>
                    <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                        Akses sistem manajemen BEM TEL-U sekarang dan rasakan kemudahan dalam mengelola seluruh aktivitas organisasi
                    </p>
                    @auth
                        <a href="{{ url('/admin') }}" class="inline-block px-12 py-5 gradient-red text-white rounded-xl font-bold text-lg hover:opacity-90 transition-all duration-300 glow-red">
                            Buka Dashboard →
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="inline-block px-12 py-5 gradient-red text-white rounded-xl font-bold text-lg hover:opacity-90 transition-all duration-300 glow-red">
                            Login Sekarang →
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black border-t border-red-900/20 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-3 gap-12 mb-8">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ asset('images/TelU.png') }}" alt="TEL-U" class="h-12 w-auto">
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
                        <h4 class="text-white font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#features" class="text-gray-400 hover:text-red-500 transition-colors">
                                    → Fitur
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ url('/admin') }}" class="text-gray-400 hover:text-red-500 transition-colors">
                                        → Dashboard
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('/admin/login') }}" class="text-gray-400 hover:text-red-500 transition-colors">
                                        → Login
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-bold mb-4">Kontak</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li>
                                📍 Telkom University<br>Bandung, Indonesia
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
