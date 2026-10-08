<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Dashboard Admin — {{ config('portfolio.profile.full_name', 'Muhammad Danish El Shirazy') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Editorial Typography Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Anti-FOUC Theme Script -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-[#fcfbfa] dark:bg-[#0c0d10] text-neutral-900 dark:text-neutral-100 font-sans selection:bg-neutral-900 selection:text-white dark:selection:bg-white dark:selection:text-neutral-900 transition-colors duration-300">
    <div class="min-h-screen flex flex-col justify-between">
        <!-- Top Editorial Ticker Bar -->
        <header class="border-b border-black/10 dark:border-white/10 px-4 sm:px-8 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <a href="{{ route('portfolio.home') }}" class="group flex items-center gap-2 text-xs font-mono uppercase tracking-widest text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-white transition-colors">
                    <span class="group-hover:-translate-x-1 transition-transform">←</span>
                    <span>Kembali ke Portofolio</span>
                </a>

                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 px-2.5 py-1 rounded border border-emerald-500/30 bg-emerald-50/50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-300 text-[11px] font-mono">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Private Gateway</span>
                    </div>

                    <button
                        id="login-theme-toggle"
                        type="button"
                        aria-label="Toggle theme"
                        class="p-2 rounded border border-black/10 dark:border-white/15 bg-white/70 dark:bg-neutral-900 text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                    >
                        <svg id="theme-sun" class="w-4 h-4 hidden dark:block text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg id="theme-moon" class="w-4 h-4 block dark:hidden text-neutral-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area: Split Editorial Layout -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl w-full grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left: Editorial Statement & Monogram (Desktop) -->
                <div class="hidden lg:block lg:col-span-5 space-y-6">
                    <span class="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400 block">
                        ADMINISTRATION // PORTAL
                    </span>
                    <h1 class="font-serif text-4xl xl:text-5xl font-normal text-neutral-900 dark:text-white leading-[1.1]">
                        Danish Studio Console
                    </h1>
                    <p className="text-sm font-sans font-light leading-relaxed text-neutral-600 dark:text-neutral-300">
                        Area otentikasi privat untuk mengelola sertifikat keahlian, akreditasi, dan pembaruan data kredensial publik.
                    </p>

                    <div class="pt-4 border-t border-black/10 dark:border-white/10 space-y-2 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                        <div class="flex items-center justify-between">
                            <span>Penerbit Sistem</span>
                            <strong class="text-neutral-900 dark:text-white">SMK Telkom Banjarbaru</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Protokol Keamanan</span>
                            <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Bcrypt + Session Guard</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Editorial Login Box -->
                <div class="lg:col-span-7">
                    <section class="border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 p-6 sm:p-10 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.06)] dark:shadow-[8px_8px_0px_0px_rgba(255,255,255,0.04)]">
                        <!-- Card Top Bar -->
                        <div class="flex items-center justify-between pb-4 border-b border-black/10 dark:border-white/10 mb-6 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                            <span class="uppercase tracking-widest">AUTHENTICATION</span>
                            <span>PLATE NO. 00 / AUTH</span>
                        </div>

                        <div class="mb-6">
                            <h2 class="font-serif text-2xl sm:text-3xl font-normal text-neutral-900 dark:text-white">
                                Masuk Dashboard
                            </h2>
                            <p class="text-xs font-mono text-neutral-500 dark:text-neutral-400 mt-1">
                                Masukkan kredensial administrator Anda di bawah ini.
                            </p>
                        </div>

                        <!-- Error Alert -->
                        @if($errors->any())
                            <div class="mb-6 p-3.5 border border-red-500/30 bg-red-50 dark:bg-red-950/40 text-red-700 dark:text-red-300 text-xs font-mono flex items-start gap-2.5" role="alert">
                                <svg class="w-4 h-4 flex-none mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="email" class="block text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 mb-2">
                                    Email Administrator
                                </label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    autocomplete="username"
                                    required
                                    autofocus
                                    placeholder="nama@domain.com"
                                    class="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-neutral-50/50 dark:bg-neutral-800/50 text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors"
                                >
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label for="password" class="text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300">
                                        Password
                                    </label>
                                    <button
                                        type="button"
                                        id="toggle-password-btn"
                                        class="text-[11px] font-mono text-neutral-500 hover:text-neutral-900 dark:hover:text-white underline cursor-pointer"
                                    >
                                        Tampilkan
                                    </button>
                                </div>
                                <div class="relative">
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="current-password"
                                        required
                                        placeholder="Masukkan password Anda..."
                                        class="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-neutral-50/50 dark:bg-neutral-800/50 text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors"
                                    >
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="w-full py-3.5 px-4 border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900 text-xs font-mono uppercase tracking-widest hover:bg-neutral-800 dark:hover:bg-neutral-100 transition-all font-semibold flex items-center justify-center gap-2 cursor-pointer shadow-sm"
                            >
                                <span>Masuk ke Dashboard</span>
                                <span>→</span>
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="border-t border-black/10 dark:border-white/10 px-4 py-4 text-center text-xs font-mono text-neutral-400">
            <span>© {{ date('Y') }} {{ config('portfolio.profile.full_name', 'Muhammad Danish El Shirazy') }} — All Rights Reserved.</span>
        </footer>
    </div>

    <!-- Theme & Password Toggle Script -->
    <script>
        // Password visibility toggle
        const toggleBtn = document.getElementById('toggle-password-btn');
        const passwordInput = document.getElementById('password');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                toggleBtn.textContent = isPassword ? 'Sembunyikan' : 'Tampilkan';
            });
        }

        // Theme Switcher for Login Page
        const themeBtn = document.getElementById('login-theme-toggle');
        if (themeBtn) {
            themeBtn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('color-theme', isDark ? 'dark' : 'light');
            });
        }
    </script>
</body>
</html>