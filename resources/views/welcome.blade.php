<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $portfolio['profile']['full_name'] }} - Portofolio Pelajar & Web Developer</title>
    <meta name="description" content="{{ $portfolio['profile']['short_bio'] }}">
    <meta name="keywords" content="portofolio pelajar, siswa smk, rpl, web developer pemula, junior web developer, danish pratama">
    <meta name="author" content="{{ $portfolio['profile']['full_name'] }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inline script to prevent theme flashing -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="portfolio-page bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased selection:bg-blue-500 selection:text-white transition-colors duration-300 min-h-screen flex flex-col justify-between">

    <!-- NAVBAR -->
    <header class="portfolio-header sticky top-0 z-40 w-full transition-all duration-300 border-b border-slate-200/80 dark:border-slate-800/80 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <!-- Brand / Logo -->
                <a href="#beranda" class="flex items-center gap-2 group">
                    <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 text-white font-bold flex items-center justify-center shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                        {{ substr($portfolio['profile']['nickname'], 0, 1) }}
                    </span>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg tracking-tight text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $portfolio['profile']['nickname'] }}<span class="text-blue-600 dark:text-blue-400">.dev</span>
                        </span>
                        <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400 -mt-1">
                            Portofolio Pelajar
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                    <a href="#beranda" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Beranda</a>
                    <a href="#tentang" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Tentang</a>
                    <a href="#pendidikan" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Pendidikan</a>
                    <a href="#keahlian" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Keahlian</a>
                    <a href="#proyek" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Proyek</a>
                    <a href="#sertifikat" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Sertifikat</a>
                    <a href="#kontak" class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-all">Kontak</a>
                </nav>

                <!-- Actions: Theme Toggle & WhatsApp CTA -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Dark/Light Theme Button -->
                    <button id="theme-toggle" type="button" aria-label="Toggle Mode" class="p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors focus:outline-none">
                        <i data-lucide="sun" class="theme-icon-sun w-5 h-5 hidden text-amber-400"></i>
                        <i data-lucide="moon" class="theme-icon-moon w-5 h-5 text-slate-600 dark:text-slate-300"></i>
                    </button>

                    <!-- Contact CTA Button -->
                    <a href="#kontak" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm shadow-blue-500/30 hover:shadow-blue-500/50 transition-all">
                        <span>Hubungi Saya</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <!-- Mobile Menu Hamburger Button -->
                    <button id="mobile-menu-btn" type="button" aria-label="Buka Menu" class="md:hidden p-2 rounded-xl text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 dark:border-slate-800 bg-white/95 dark:bg-slate-950/95 backdrop-blur-md px-4 pt-2 pb-6 space-y-2">
            <a href="#beranda" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Beranda</a>
            <a href="#tentang" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Tentang Saya</a>
            <a href="#pendidikan" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Pendidikan & Pengalaman</a>
            <a href="#keahlian" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Keahlian (Skills)</a>
            <a href="#proyek" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Proyek & Karya</a>
            <a href="#sertifikat" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Sertifikat</a>
            <a href="#kontak" class="mobile-nav-link block px-3 py-2 text-base font-medium rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Kontak</a>
            <div class="pt-2">
                <a href="#kontak" class="w-full inline-flex justify-center items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-md">
                    <span>Kirim Pesan / WhatsApp</span>
                    <i data-lucide="send" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow">

        <!-- 1. HERO SECTION -->
        <section id="beranda" class="portfolio-hero relative pt-10 pb-20 md:pt-20 md:pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="hero-copy lg:col-span-7 space-y-6 text-center lg:text-left">
                        <!-- Student Status Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-300 text-xs sm:text-sm font-medium shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                            <span class="w-2 h-2 rounded-full bg-emerald-500 -ml-3"></span>
                            <span>{{ $portfolio['profile']['status_badge'] }}</span>
                        </div>

                        <!-- Main Headline -->
                        <h1 class="hero-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.15]">
                            Halo, saya <span class="hero-name">{{ $portfolio['profile']['nickname'] }}</span>
                        </h1>

                        <p class="text-lg sm:text-xl font-medium text-slate-700 dark:text-slate-300">
                            {{ $portfolio['profile']['role'] }} di <span class="text-blue-600 dark:text-blue-400 font-semibold">{{ $portfolio['profile']['school'] }}</span>
                        </p>

                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-400 max-w-2xl leading-relaxed mx-auto lg:mx-0">
                            {{ $portfolio['profile']['short_bio'] }}
                        </p>

                        <!-- CTA Action Buttons -->
                        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                            <a href="#proyek" class="px-6 py-3 rounded-xl font-semibold text-sm sm:text-base text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all flex items-center gap-2">
                                <i data-lucide="briefcase" class="w-4 h-4"></i>
                                <span>Lihat Proyek Saya</span>
                            </a>

                            <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" class="px-6 py-3 rounded-xl font-semibold text-sm sm:text-base text-emerald-700 dark:text-emerald-300 bg-emerald-50 dark:bg-emerald-950/50 hover:bg-emerald-100 dark:hover:bg-emerald-900/60 border border-emerald-300 dark:border-emerald-800 transition-all flex items-center gap-2">
                                <i class="fa-brands fa-whatsapp text-lg text-emerald-600"></i>
                                <span>Chat WhatsApp</span>
                            </a>

                            <button onclick="document.getElementById('cv-modal').classList.remove('hidden')" class="px-5 py-3 rounded-xl font-semibold text-sm sm:text-base text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/80 border border-slate-300 dark:border-slate-700 transition-all flex items-center gap-2">
                                <i data-lucide="file-text" class="w-4 h-4 text-blue-500"></i>
                                <span>Biodata / CV</span>
                            </button>
                        </div>

                        <!-- Social Media Quick Links -->
                        <div class="flex items-center justify-center lg:justify-start gap-4 pt-4 text-slate-500 dark:text-slate-400">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Ikuti Saya:</span>
                            <a href="{{ $portfolio['socials']['github'] }}" target="_blank" aria-label="GitHub" class="hover:text-slate-900 dark:hover:text-white transition-colors">
                                <i class="fa-brands fa-github text-xl"></i>
                            </a>
                            <a href="{{ $portfolio['socials']['linkedin'] }}" target="_blank" aria-label="LinkedIn" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                <i class="fa-brands fa-linkedin text-xl"></i>
                            </a>
                            <a href="{{ $portfolio['socials']['instagram'] }}" target="_blank" aria-label="Instagram" class="hover:text-pink-600 dark:hover:text-pink-400 transition-colors">
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Profile Identity Sheet -->
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="profile-sheet w-full max-w-md">
                            <div class="profile-sheet-top">
                                <span>Profil / 01</span>
                                <span>{{ $portfolio['profile']['grade'] }}</span>
                            </div>
                            <div class="profile-initial" aria-hidden="true">{{ substr($portfolio['profile']['nickname'], 0, 1) }}</div>
                            <div class="profile-sheet-name">
                                <span>Nama</span>
                                <h2>{{ $portfolio['profile']['full_name'] }}</h2>
                            </div>
                            <div class="profile-sheet-details">
                                <div>
                                    <span>Fokus</span>
                                    <strong>Web Development</strong>
                                </div>
                                <div>
                                    <span>Pendidikan</span>
                                    <strong>{{ $portfolio['profile']['school'] }}</strong>
                                </div>
                                <div>
                                    <span>Domisili</span>
                                    <strong>{{ $portfolio['profile']['location'] }}</strong>
                                </div>
                            </div>
                            <div class="profile-sheet-foot">
                                <span class="profile-status-dot"></span>
                                <span>{{ $portfolio['profile']['status_badge'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Bar -->
                <div class="mt-16 sm:mt-24 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($portfolio['stats'] as $stat)
                    <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow text-center">
                        <div class="inline-flex p-3 rounded-xl bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 mb-3">
                            <i data-lucide="{{ $stat['icon'] }}" class="w-6 h-6"></i>
                        </div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">{{ $stat['value'] }}</div>
                        <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-1">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 2. TENTANG SAYA (ABOUT ME) -->
        <section id="tentang" class="py-20 bg-slate-100/60 dark:bg-slate-900/40 border-y border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Profil Saya</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Tentang Saya</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Mengenal lebih dekat motivasi, ketertarikan, dan semangat belajar saya di bidang teknologi informasi.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    
                    <!-- Bio Narrative -->
                    <div class="lg:col-span-7 space-y-5 text-slate-600 dark:text-slate-300 leading-relaxed text-base sm:text-lg">
                        <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                                <i data-lucide="book-open" class="w-5 h-5 text-blue-500"></i>
                                Perjalanan Belajar Saya
                            </h3>
                            <p>{{ $portfolio['about']['story_p1'] }}</p>
                            <p>{{ $portfolio['about']['story_p2'] }}</p>
                            <p class="font-medium text-slate-800 dark:text-slate-200 bg-blue-50/70 dark:bg-blue-950/40 p-4 rounded-xl border border-blue-100 dark:border-blue-900">
                                {{ $portfolio['about']['story_p3'] }}
                            </p>
                        </div>

                        <!-- 4 Strengths / Nilai Positif -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            @foreach($portfolio['about']['strengths'] as $strength)
                            <div class="p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:border-blue-300 dark:hover:border-blue-800 transition-colors">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-300">
                                        <i data-lucide="{{ $strength['icon'] }}" class="w-4 h-4"></i>
                                    </span>
                                    <h4 class="font-bold text-sm sm:text-base text-slate-900 dark:text-white">{{ $strength['title'] }}</h4>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 leading-normal">{{ $strength['desc'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Personal Information Grid -->
                    <div class="lg:col-span-5">
                        <div class="p-6 sm:p-7 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm sticky top-28">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-5 flex items-center justify-between">
                                <span>Informasi Pribadi</span>
                                <span class="px-2 py-0.5 text-xs font-semibold rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300">Aktif</span>
                            </h3>

                            <div class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                                @foreach($portfolio['about']['details'] as $detail)
                                <div class="py-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                    <span class="font-medium text-slate-500 dark:text-slate-400">{{ $detail['label'] }}</span>
                                    <span class="font-semibold text-slate-800 dark:text-slate-200 text-right">{{ $detail['value'] }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 flex flex-col gap-3">
                                <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" class="w-full py-2.5 px-4 rounded-xl text-center text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-all flex items-center justify-center gap-2">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <span>Konsultasi / Tanya Santai</span>
                                </a>
                                <button type="button" data-email="{{ $portfolio['profile']['email'] }}" class="copy-email-btn w-full py-2.5 px-4 rounded-xl text-center text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors flex items-center justify-center gap-2">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                    <span>Salin Email: {{ $portfolio['profile']['email'] }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 3. PENDIDIKAN & PENGALAMAN -->
        <section id="pendidikan" class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Jejak Langkah</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Pendidikan & Organisasi</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Riwayat pendidikan formal, kegiatan kesiswaan, dan kontribusi ekstrakurikuler yang membentuk karakter saya.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    
                    <!-- Kolom Pendidikan -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <span class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400">
                                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                            </span>
                            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white">Pendidikan Formal</h3>
                        </div>

                        <div class="relative pl-6 space-y-8 before:absolute before:left-2.5 before:top-3 before:bottom-3 before:w-0.5 before:bg-blue-200 dark:before:bg-blue-900">
                            @foreach($portfolio['education'] as $edu)
                            <div class="relative group">
                                <!-- Marker Dot -->
                                <div class="absolute -left-6 top-1.5 w-5 h-5 rounded-full border-4 border-white dark:border-slate-950 bg-blue-600 group-hover:scale-125 transition-transform"></div>
                                
                                <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-50 dark:bg-blue-950 text-blue-600 dark:text-blue-300 border border-blue-200 dark:border-blue-800 mb-2">
                                        {{ $edu['period'] }}
                                    </span>
                                    <h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ $edu['institution'] }}</h4>
                                    <p class="text-sm font-semibold text-blue-600 dark:text-blue-400 mb-2">{{ $edu['major'] }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">{{ $edu['description'] }}</p>
                                    
                                    @if(isset($edu['highlights']))
                                    <div class="space-y-1.5 pt-3 border-t border-slate-100 dark:border-slate-800">
                                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Capaian:</p>
                                        @foreach($edu['highlights'] as $highlight)
                                        <div class="flex items-center gap-2 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                            <span class="mt-1.5 h-1.5 w-1.5 flex-none rounded-full bg-blue-500" aria-hidden="true"></span>
                                            <span>{{ $highlight }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Kolom Organisasi & Pengalaman -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <span class="p-3 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400">
                                <i data-lucide="award" class="w-6 h-6"></i>
                            </span>
                            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white">Organisasi & Pengalaman</h3>
                        </div>

                        <div class="relative pl-6 space-y-8 before:absolute before:left-2.5 before:top-3 before:bottom-3 before:w-0.5 before:bg-indigo-200 dark:before:bg-indigo-900">
                            @foreach($portfolio['experiences'] as $exp)
                            <div class="relative group">
                                <!-- Marker Dot -->
                                <div class="absolute -left-6 top-1.5 w-5 h-5 rounded-full border-4 border-white dark:border-slate-950 bg-indigo-600 group-hover:scale-125 transition-transform"></div>
                                
                                <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between gap-2 mb-2">
                                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-indigo-50 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-800">
                                            {{ $exp['period'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">{{ $exp['badge'] }}</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ $exp['role'] }}</h4>
                                    <p class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 mb-2">{{ $exp['organization'] }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ $exp['description'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 4. KEAHLIAN & TECH STACK -->
        <section id="keahlian" class="py-20 bg-slate-100/60 dark:bg-slate-900/40 border-y border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Kompetensi</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Keahlian & Kemampuan</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Teknologi dan perangkat lunak yang saya kuasai dan terus kembangkan setiap hari.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Frontend Card -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800">
                                <span class="p-2.5 rounded-xl bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300">
                                    <i data-lucide="layout" class="w-5 h-5"></i>
                                </span>
                                <div>
                                    <h3 class="font-bold text-lg text-slate-900 dark:text-white">Frontend Web</h3>
                                    <p class="text-xs text-slate-500">Antarmuka & Styling</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                @foreach($portfolio['skills']['frontend'] as $skill)
                                <div>
                                    <div class="flex justify-between items-center mb-1 text-sm font-medium">
                                        <span class="text-slate-800 dark:text-slate-200 flex items-center gap-2">
                                            <i data-lucide="{{ $skill['icon'] }}" class="w-4 h-4 text-blue-500"></i>
                                            {{ $skill['name'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-500">{{ $skill['level'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                                        <div class="bg-blue-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Backend Card -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800">
                                <span class="p-2.5 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300">
                                    <i data-lucide="server" class="w-5 h-5"></i>
                                </span>
                                <div>
                                    <h3 class="font-bold text-lg text-slate-900 dark:text-white">Backend & Database</h3>
                                    <p class="text-xs text-slate-500">Logika & Penyimpanan Data</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                @foreach($portfolio['skills']['backend'] as $skill)
                                <div>
                                    <div class="flex justify-between items-center mb-1 text-sm font-medium">
                                        <span class="text-slate-800 dark:text-slate-200 flex items-center gap-2">
                                            <i data-lucide="{{ $skill['icon'] }}" class="w-4 h-4 text-indigo-500"></i>
                                            {{ $skill['name'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-500">{{ $skill['level'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                                        <div class="bg-indigo-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tools Card -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800">
                                <span class="p-2.5 rounded-xl bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300">
                                    <i data-lucide="wrench" class="w-5 h-5"></i>
                                </span>
                                <div>
                                    <h3 class="font-bold text-lg text-slate-900 dark:text-white">Tools & Software</h3>
                                    <p class="text-xs text-slate-500">Alat Kerja & Kolaborasi</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                @foreach($portfolio['skills']['tools'] as $skill)
                                <div>
                                    <div class="flex justify-between items-center mb-1 text-sm font-medium">
                                        <span class="text-slate-800 dark:text-slate-200 flex items-center gap-2">
                                            <i data-lucide="{{ $skill['icon'] }}" class="w-4 h-4 text-purple-500"></i>
                                            {{ $skill['name'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-500">{{ $skill['level'] }}%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                                        <div class="bg-purple-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Soft Skills Pill Badges -->
                <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm text-center">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 flex items-center justify-center gap-2">
                        <i data-lucide="heart-handshake" class="w-5 h-5 text-rose-500"></i>
                        Karakter & Soft Skills
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Sikap kerja dan komunikasi yang selalu saya jaga dalam setiap proyek.</p>
                    <div class="flex flex-wrap gap-2.5 justify-center">
                        @foreach($portfolio['skills']['soft_skills'] as $soft)
                        <span class="px-4 py-2 text-xs sm:text-sm font-semibold rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 hover:border-blue-400 transition-colors flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            {{ $soft }}
                        </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        <!-- 5. PROYEK & KARYA -->
        <section id="proyek" class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-10">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Portofolio</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Karya & Proyek Terpilih</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Kumpulan proyek mandiri, tugas sekolah, dan kegiatan yang telah saya kerjakan.</p>
                </div>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-12">
                    <button type="button" data-filter="all" class="project-filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-blue-600 text-white shadow-md transition-all">
                        Semua Proyek
                    </button>
                    <button type="button" data-filter="web" class="project-filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                        Web Development
                    </button>
                    <button type="button" data-filter="design" class="project-filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                        Desain & UI/UX
                    </button>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($portfolio['projects'] as $project)
                    <div class="project-card flex flex-col rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group" data-category="{{ $project['category'] }}">
                        
                        <!-- Image Container with Zoom effect -->
                        <div class="relative h-48 sm:h-52 overflow-hidden bg-slate-800">
                            <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                            
                            <!-- Badges over image -->
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-lg bg-black/60 backdrop-blur-md text-white border border-white/20">
                                    {{ $project['category_label'] }}
                                </span>
                            </div>
                            <span class="absolute bottom-3 right-3 text-xs font-medium text-slate-200 bg-black/50 backdrop-blur-md px-2 py-0.5 rounded">
                                {{ $project['date'] }}
                            </span>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ $project['title'] }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-4 line-clamp-2">
                                    {{ $project['summary'] }}
                                </p>

                                <!-- Tech Stack Badges -->
                                <div class="flex flex-wrap gap-1.5 mb-6">
                                    @foreach($project['tags'] as $tag)
                                    <span class="px-2 py-0.5 text-[11px] font-medium rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                        {{ $tag }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Card Action Buttons -->
                            <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                                <button type="button" class="open-project-modal text-xs sm:text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline flex items-center gap-1" data-project="{{ json_encode($project) }}">
                                    <span>Detail Lengkap</span>
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>

                                <div class="flex items-center gap-2">
                                    @if(isset($project['github_url']))
                                    <a href="{{ $project['github_url'] }}" target="_blank" aria-label="GitHub Repo" class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors" title="Lihat Kode di GitHub">
                                        <i class="fa-brands fa-github text-base"></i>
                                    </a>
                                    @endif
                                    @if(isset($project['demo_url']))
                                    <a href="{{ $project['demo_url'] }}" target="_blank" aria-label="Live Demo" class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" title="Buka Link Proyek">
                                        <i data-lucide="external-link" class="w-4 h-4"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 6. SERTIFIKAT & PRESTASI -->
        <section id="sertifikat" class="py-20 bg-slate-100/60 dark:bg-slate-900/40 border-y border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Prestasi</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Sertifikasi & Penghargaan</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Bukti dedikasi belajar melalui kursus terakreditasi dan keikutsertaan kompetisi siswa.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($portfolio['certificates'] as $cert)
                    <div class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                                    {{ $cert['badge'] }}
                                </span>
                                <span class="text-xs text-slate-400">{{ $cert['date'] }}</span>
                            </div>

                            <h3 class="font-bold text-base text-slate-900 dark:text-white mb-2 leading-snug">
                                {{ $cert['title'] }}
                            </h3>

                            <p class="text-xs font-medium text-blue-600 dark:text-blue-400 mb-2">
                                <i data-lucide="award" class="inline w-3.5 h-3.5 mr-1"></i>{{ $cert['issuer'] }}
                            </p>

                            <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-3 mb-4">
                                {{ $cert['description'] }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 dark:border-slate-800">
                            <button type="button" class="open-cert-modal w-full py-2 px-3 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors flex items-center justify-center gap-1.5" data-cert="{{ json_encode($cert) }}">
                                <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                <span>Lihat Sertifikat</span>
                            </button>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-full text-sm text-slate-500 dark:text-slate-400">Belum ada sertifikat yang ditampilkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 7. TESTIMONI / KATA GURU & REKAN -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Apresiasi</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Kata Guru & Rekan</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Ulasan dari guru pembimbing dan rekan organisasi mengenai etos kerja saya.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($portfolio['testimonials'] as $testimonial)
                    <div class="p-6 sm:p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col justify-between relative">
                        <div class="text-blue-500/20 text-5xl font-serif absolute top-4 right-6 select-none">“</div>
                        <p class="text-slate-600 dark:text-slate-300 text-base leading-relaxed italic mb-6 relative z-10">
                            "{{ $testimonial['quote'] }}"
                        </p>
                        <div class="flex items-center gap-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['author'] }}" class="w-12 h-12 rounded-full object-cover border-2 border-blue-500">
                            <div>
                                <h4 class="font-bold text-slate-900 dark:text-white text-base">{{ $testimonial['author'] }}</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 8. KONTAK SAYA -->
        <section id="kontak" class="py-20 bg-slate-100/60 dark:bg-slate-900/40 border-t border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Hubungi Saya</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Mari Terhubung!</h2>
                    <p class="text-base text-slate-600 dark:text-slate-400 mt-3">Tertarik berkolaborasi, memiliki pertanyaan seputar proyek, atau menawarkan kesempatan magang/PKL? Kirimkan pesan sekarang!</p>
                </div>

                @if(session('success'))
                <div class="max-w-3xl mx-auto mb-8 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-300 dark:border-emerald-800 text-emerald-800 dark:text-emerald-200 text-sm font-medium flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500 flex-shrink-0"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    
                    <!-- Info Kontak -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="p-6 sm:p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-6">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Informasi Kontak</h3>
                            
                            <div class="space-y-4">
                                <!-- WhatsApp Card -->
                                <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 dark:bg-slate-800/60 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 border border-slate-200/80 dark:border-slate-700/60 transition-colors group">
                                    <span class="p-3 rounded-xl bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 group-hover:scale-110 transition-transform">
                                        <i class="fa-brands fa-whatsapp text-xl"></i>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-400 uppercase">WhatsApp</p>
                                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ $portfolio['profile']['phone'] }}</p>
                                        <span class="text-xs text-emerald-600 dark:text-emerald-400 font-medium">Klik untuk chat langsung</span>
                                    </div>
                                </a>

                                <!-- Email Card -->
                                <div class="flex items-center justify-between p-4 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/60">
                                    <div class="flex items-center gap-4">
                                        <span class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/50 text-blue-600">
                                            <i data-lucide="mail" class="w-5 h-5"></i>
                                        </span>
                                        <div>
                                            <p class="text-xs font-semibold text-slate-400 uppercase">Email</p>
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ $portfolio['profile']['email'] }}</p>
                                        </div>
                                    </div>
                                    <button type="button" data-email="{{ $portfolio['profile']['email'] }}" class="copy-email-btn text-xs font-medium text-blue-600 hover:underline">
                                        Salin
                                    </button>
                                </div>

                                <!-- Lokasi Card -->
                                <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/60">
                                    <span class="p-3 rounded-xl bg-purple-100 dark:bg-purple-900/50 text-purple-600">
                                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-400 uppercase">Lokasi Domisili</p>
                                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ $portfolio['profile']['location'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links Badges -->
                            <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Sosial Media:</p>
                                <div class="flex gap-3">
                                    <a href="{{ $portfolio['socials']['github'] }}" target="_blank" aria-label="GitHub" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-slate-900 hover:text-white dark:hover:bg-slate-700 transition-colors">
                                        <i class="fa-brands fa-github text-lg"></i>
                                    </a>
                                    <a href="{{ $portfolio['socials']['linkedin'] }}" target="_blank" aria-label="LinkedIn" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-blue-600 hover:text-white transition-colors">
                                        <i class="fa-brands fa-linkedin text-lg"></i>
                                    </a>
                                    <a href="{{ $portfolio['socials']['instagram'] }}" target="_blank" aria-label="Instagram" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-pink-600 hover:text-white transition-colors">
                                        <i class="fa-brands fa-instagram text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulir Pesan -->
                    <div class="lg:col-span-7">
                        <div class="p-6 sm:p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Kirim Pesan Langsung</h3>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mb-6">Pesan ini dapat langsung dikirim ke WhatsApp saya atau dikirim melalui form ini.</p>

                            <form id="contact-form" action="{{ route('portfolio.contact') }}" method="POST" data-whatsapp="{{ $portfolio['profile']['whatsapp'] }}" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="contact-name" class="block text-xs font-semibold text-slate-600 dark:text-slate-300 uppercase mb-1">Nama Lengkap *</label>
                                        <input type="text" id="contact-name" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                    </div>
                                    <div>
                                        <label for="contact-email" class="block text-xs font-semibold text-slate-600 dark:text-slate-300 uppercase mb-1">Alamat Email *</label>
                                        <input type="email" id="contact-email" name="email" required placeholder="nama@perusahaan.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="contact-subject" class="block text-xs font-semibold text-slate-600 dark:text-slate-300 uppercase mb-1">Subjek / Keperluan</label>
                                    <input type="text" id="contact-subject" name="subject" placeholder="Contoh: Tawaran Magang / Diskusi Proyek" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                </div>

                                <div>
                                    <label for="contact-message" class="block text-xs font-semibold text-slate-600 dark:text-slate-300 uppercase mb-1">Pesan Anda *</label>
                                    <textarea id="contact-message" name="message" rows="4" required placeholder="Tuliskan pesan atau penawaran Anda di sini..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"></textarea>
                                </div>

                                <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                                    <button type="button" id="send-whatsapp-btn" class="w-full sm:w-auto px-6 py-3 rounded-xl font-semibold text-sm text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition-all flex items-center justify-center gap-2">
                                        <i class="fa-brands fa-whatsapp text-lg"></i>
                                        <span>Kirim via WhatsApp (Instan)</span>
                                    </button>

                                    <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl font-semibold text-sm text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-all flex items-center justify-center gap-2">
                                        <i data-lucide="send" class="w-4 h-4"></i>
                                        <span>Kirim Formulir</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 py-10 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-sm">
                        {{ substr($portfolio['profile']['nickname'], 0, 1) }}
                    </span>
                    <span class="font-bold text-slate-900 dark:text-white text-base">
                        {{ $portfolio['profile']['full_name'] }}
                    </span>
                    <span class="text-xs text-slate-400">• {{ $portfolio['profile']['school'] }}</span>
                </div>

                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                    &copy; {{ date('Y') }} {{ $portfolio['profile']['nickname'] }}. Dibuat dengan cinta, dedikasi, dan semangat belajar.
                </p>

                <div class="flex items-center gap-4 text-xs font-semibold text-slate-600 dark:text-slate-400">
                    <a href="#beranda" class="hover:text-blue-600 dark:hover:text-blue-400">Kembali ke Atas</a>
                    <span>•</span>
                    <a href="{{ $portfolio['socials']['github'] }}" target="_blank" class="hover:text-blue-600 dark:hover:text-blue-400">GitHub</a>
                    <span>•</span>
                    <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" class="hover:text-blue-600 dark:hover:text-blue-400">WhatsApp</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING ACTIONS (Back to Top & Quick WhatsApp) -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3">
        <!-- Back to Top Button -->
        <button id="back-to-top" type="button" aria-label="Kembali ke atas" class="opacity-0 pointer-events-none w-11 h-11 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 shadow-lg flex items-center justify-center hover:scale-110 transition-all duration-300 focus:outline-none">
            <i data-lucide="arrow-up" class="w-5 h-5"></i>
        </button>

        <!-- Floating WhatsApp Button -->
        <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" aria-label="Chat WhatsApp" class="w-12 h-12 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white shadow-xl shadow-emerald-500/30 flex items-center justify-center hover:scale-110 transition-all duration-300">
            <i class="fa-brands fa-whatsapp text-2xl"></i>
        </a>
    </div>

    <!-- MODAL 1: DETAIL PROYEK -->
    <div id="project-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div id="project-modal-overlay" class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity"></div>
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-200 dark:border-slate-800">
                
                <!-- Close Button -->
                <button id="close-project-modal" type="button" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <!-- Project Preview Image -->
                <div class="relative h-60 sm:h-72 w-full overflow-hidden bg-slate-800">
                    <img id="modal-project-img" src="" alt="" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-6 right-6">
                        <span id="modal-project-category" class="px-2.5 py-1 text-xs font-semibold rounded-lg bg-blue-600 text-white"></span>
                        <h3 id="modal-project-title" class="text-xl sm:text-2xl font-bold text-white mt-2"></h3>
                        <p id="modal-project-date" class="text-xs text-slate-300 mt-1"></p>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 sm:p-8 space-y-6">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Deskripsi Proyek</h4>
                        <p id="modal-project-desc" class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed"></p>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Fitur Utama</h4>
                        <ul id="modal-project-features" class="space-y-2"></ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Teknologi Digunakan</h4>
                        <div id="modal-project-tags" class="flex flex-wrap gap-2"></div>
                    </div>

                    <!-- Action Links -->
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex flex-wrap gap-3 justify-end">
                        <a id="modal-project-github" href="#" target="_blank" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors flex items-center gap-2">
                            <i class="fa-brands fa-github text-base"></i>
                            <span>Lihat Kode (GitHub)</span>
                        </a>
                        <a id="modal-project-demo" href="#" target="_blank" class="px-5 py-2 rounded-xl text-xs sm:text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-md transition-colors flex items-center gap-2">
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                            <span>Buka Live Demo</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: SERTIFIKAT PREVIEW -->
    <div id="cert-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div id="cert-modal-overlay" class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity"></div>
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-200 dark:border-slate-800">
                <button id="close-cert-modal" type="button" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div class="relative h-56 w-full overflow-hidden bg-slate-800">
                    <img id="modal-cert-img" src="" alt="" class="w-full h-full object-cover">
                </div>

                <div class="p-6 space-y-4">
                    <div>
                        <span id="modal-cert-issuer" class="text-xs font-semibold text-blue-600 dark:text-blue-400"></span>
                        <h3 id="modal-cert-title" class="text-lg font-bold text-slate-900 dark:text-white mt-1"></h3>
                    </div>

                    <p id="modal-cert-desc" class="text-sm text-slate-600 dark:text-slate-300"></p>

                    <div class="p-3 rounded-xl bg-slate-100 dark:bg-slate-800/80 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <span class="text-slate-400">Credential ID: </span>
                        <span id="modal-cert-id" class="font-bold text-slate-800 dark:text-slate-200"></span>
                    </div>

                    <div class="text-right">
                        <span id="modal-cert-date" class="text-xs text-slate-400 font-medium"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 3: CV / BIODATA PELAJAR -->
    <div id="cv-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div onclick="document.getElementById('cv-modal').classList.add('hidden')" class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity"></div>
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border border-slate-200 dark:border-slate-800 p-6 sm:p-8 space-y-6">
                
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Curriculum Vitae / Biodata</h3>
                        <p class="text-xs text-slate-500">{{ $portfolio['profile']['full_name'] }} • Pelajar</p>
                    </div>
                    <button onclick="document.getElementById('cv-modal').classList.add('hidden')" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-900 dark:hover:text-white flex items-center justify-center">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>

                <div class="p-4 rounded-2xl bg-blue-50/60 dark:bg-blue-950/40 border border-blue-100 dark:border-blue-900 text-sm text-slate-700 dark:text-slate-300 space-y-2">
                    <p class="font-semibold text-blue-900 dark:text-blue-300">Format Ringkasan Siswa:</p>
                    <ul class="list-disc list-inside text-xs sm:text-sm space-y-1">
                        <li>Nama: <strong>{{ $portfolio['profile']['full_name'] }}</strong></li>
                        <li>Sekolah: <strong>{{ $portfolio['profile']['school'] }}</strong></li>
                        <li>Tingkat: <strong>{{ $portfolio['profile']['grade'] }}</strong></li>
                        <li>Fokus: Web Development, Frontend, UI/UX Design</li>
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="javascript:window.print()" class="flex-1 py-3 px-4 rounded-xl text-center text-sm font-semibold text-slate-800 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors flex items-center justify-center gap-2">
                        <i data-lucide="printer" class="w-4 h-4"></i>
                        <span>Cetak / Simpan PDF</span>
                    </a>
                    <a href="{{ $portfolio['socials']['whatsapp'] }}" target="_blank" class="flex-1 py-3 px-4 rounded-xl text-center text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>Minta CV Lengkap via WA</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Script to ensure Lucide icons initialize immediately on load -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>
</body>
</html>
