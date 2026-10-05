<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio['profile']['full_name'] }} - Portofolio Pribadi</title>
    <meta name="description" content="{{ $portfolio['profile']['short_bio'] }}">
    <meta name="author" content="{{ $portfolio['profile']['full_name'] }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="portfolio-page min-h-screen flex flex-col bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased">
    <header class="portfolio-header sticky top-0 z-40 w-full border-b">
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">
            <a href="#beranda" class="flex items-center gap-3 font-semibold text-slate-900 dark:text-white">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-blue-600 text-white">
                    {{ substr($portfolio['profile']['full_name'], 0, 1) }}
                </span>
                <span>{{ $portfolio['profile']['nickname'] }}</span>
            </a>

            <nav class="hidden items-center gap-6 md:flex" aria-label="Navigasi utama">
                <a href="#beranda" class="nav-link text-sm font-medium text-slate-600 hover:text-blue-600 dark:text-slate-300">Beranda</a>
                <a href="#tentang" class="nav-link text-sm font-medium text-slate-600 hover:text-blue-600 dark:text-slate-300">Tentang Saya</a>
                <a href="#pendidikan" class="nav-link text-sm font-medium text-slate-600 hover:text-blue-600 dark:text-slate-300">Pendidikan</a>
                <a href="#sertifikat" class="nav-link text-sm font-medium text-slate-600 hover:text-blue-600 dark:text-slate-300">Sertifikat</a>
                <a href="{{ route('admin.login') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-blue-700">Login Admin</a>
            </nav>

            <div class="flex items-center gap-2">
                <button id="theme-toggle" type="button" aria-label="Ganti tema" class="rounded-xl p-2 text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                    <i data-lucide="sun" class="theme-icon-sun hidden h-5 w-5"></i>
                    <i data-lucide="moon" class="theme-icon-moon h-5 w-5"></i>
                </button>
                <button id="mobile-menu-btn" type="button" aria-label="Buka menu" aria-expanded="false" class="rounded-xl p-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 md:hidden">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
            </div>
        </div>

        <nav id="mobile-menu" class="hidden space-y-1 border-t border-slate-200 bg-white px-4 py-3 dark:border-slate-800 dark:bg-slate-950 md:hidden" aria-label="Navigasi seluler">
            <a href="#beranda" class="mobile-nav-link block rounded-lg px-3 py-2 text-slate-700 dark:text-slate-200">Beranda</a>
            <a href="#tentang" class="mobile-nav-link block rounded-lg px-3 py-2 text-slate-700 dark:text-slate-200">Tentang Saya</a>
            <a href="#pendidikan" class="mobile-nav-link block rounded-lg px-3 py-2 text-slate-700 dark:text-slate-200">Pendidikan</a>
            <a href="#sertifikat" class="mobile-nav-link block rounded-lg px-3 py-2 text-slate-700 dark:text-slate-200">Sertifikat</a>
            <a href="{{ route('admin.login') }}" class="block rounded-lg px-3 py-2 font-semibold text-blue-700 dark:text-blue-300">Login Admin</a>
        </nav>
    </header>

    <main class="flex-grow">
        <section id="beranda" class="portfolio-hero py-16 sm:py-24">
            <div class="mx-auto grid max-w-6xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-5">
                <div class="space-y-6 lg:col-span-3">
                    <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3 py-1.5 text-sm font-medium text-blue-700 dark:border-blue-800 dark:bg-blue-950 dark:text-blue-300">
                        <span class="profile-status-dot"></span>
                        {{ $portfolio['profile']['status_badge'] }}
                    </span>

                    <div>
                        <p class="mb-2 text-lg text-slate-600 dark:text-slate-300">Halo, saya</p>
                        <h1 class="hero-heading hero-name text-4xl sm:text-5xl lg:text-6xl">
                            {{ $portfolio['profile']['full_name'] }}
                        </h1>
                    </div>

                    <p class="text-lg font-medium text-slate-700 dark:text-slate-200">
                        {{ $portfolio['profile']['role'] }} di {{ $portfolio['profile']['school'] }}
                    </p>
                    <p class="max-w-xl text-base leading-relaxed text-slate-600 dark:text-slate-400">
                        {{ $portfolio['profile']['short_bio'] }}
                    </p>

                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="#tentang" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-blue-700">
                            Tentang Saya
                            <i data-lucide="arrow-down" class="h-4 w-4"></i>
                        </a>
                        <a href="#pendidikan" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                            Sekolah Saya
                        </a>
                    </div>
                </div>

                <aside class="profile-sheet mx-auto w-full max-w-md lg:col-span-2" aria-label="Ringkasan profil">
                    <div class="profile-sheet-top">
                        <span>Kenalan Singkat</span>
                        <span>01</span>
                    </div>
                    <img
                        src="{{ asset('images/muhammad-danish-profile.png') }}"
                        alt="Foto Muhammad Danish El Shirazy saat berada di alam terbuka"
                        class="profile-photo"
                        fetchpriority="high"
                    >
                    <div class="profile-sheet-name">
                        <span>Nama</span>
                        <h2>{{ $portfolio['profile']['full_name'] }}</h2>
                    </div>
                    <div class="profile-sheet-details">
                        <div>
                            <span>Sekolah</span>
                            <strong>{{ $portfolio['profile']['school'] }}</strong>
                        </div>
                        <div>
                            <span>Hobi</span>
                            <strong>{{ $portfolio['profile']['hobby'] }}</strong>
                        </div>
                    </div>
                    <div class="profile-sheet-foot">
                        <span class="profile-status-dot"></span>
                        <span>{{ $portfolio['profile']['status_badge'] }}</span>
                    </div>
                </aside>
            </div>
        </section>

        <section id="tentang" class="border-y border-slate-200 bg-slate-100/60 py-16 dark:border-slate-800 dark:bg-slate-900/40 sm:py-20">
            <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 md:grid-cols-2">
                <div>
                    <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">Tentang Saya</p>
                    <h2 class="hero-heading text-3xl text-slate-900 dark:text-white sm:text-4xl">Sedikit tentang saya</h2>
                    <div class="mt-5 space-y-3 leading-relaxed text-slate-600 dark:text-slate-300">
                        <p>{{ $portfolio['about']['story_p1'] }}</p>
                        <p>{{ $portfolio['about']['story_p2'] }}</p>
                        <p>{{ $portfolio['about']['story_p3'] }}</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-950">
                    <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">Informasi Singkat</h3>
                    <dl class="divide-y divide-slate-100 dark:divide-slate-800">
                        @foreach($portfolio['about']['details'] as $detail)
                        <div class="flex flex-col gap-1 py-3 sm:flex-row sm:justify-between">
                            <dt class="text-sm text-slate-500 dark:text-slate-400">{{ $detail['label'] }}</dt>
                            <dd class="text-sm font-semibold text-slate-800 dark:text-slate-200 sm:text-right">{{ $detail['value'] }}</dd>
                        </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </section>

        <section id="pendidikan" class="py-16 sm:py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">Pendidikan</p>
                <h2 class="hero-heading text-3xl text-slate-900 dark:text-white sm:text-4xl">Sekolah Saya</h2>
                <div class="mt-8 max-w-2xl border-l-4 border-blue-600 bg-white p-6 shadow-sm dark:bg-slate-900">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Saat ini</p>
                    <h3 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">{{ $portfolio['profile']['school'] }}</h3>
                </div>
            </div>
        </section>

        <section id="sertifikat" class="border-y border-slate-200 bg-slate-100/60 py-16 dark:border-slate-800 dark:bg-slate-900/40 sm:py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">Pencapaian</p>
                        <h2 class="hero-heading text-3xl text-slate-900 dark:text-white sm:text-4xl">Sertifikat</h2>
                    </div>
                    <a href="{{ route('admin.login') }}" class="text-sm font-semibold text-blue-700 hover:underline dark:text-blue-300">Kelola sertifikat</a>
                </div>

                @forelse($portfolio['certificates'] as $certificate)
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950">
                    @if($certificate['image'])
                    <img src="{{ $certificate['image'] }}" alt="Sertifikat {{ $certificate['title'] }}" class="h-56 w-full object-cover sm:h-72">
                    @endif
                    <div class="p-5 sm:p-6">
                        <div class="mb-3 flex flex-wrap items-center gap-2">
                            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-950 dark:text-blue-300">{{ $certificate['badge'] }}</span>
                            <span class="text-sm text-slate-500 dark:text-slate-400">{{ $certificate['date'] }}</span>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $certificate['title'] }}</h3>
                        <p class="mt-1 text-sm font-medium text-slate-600 dark:text-slate-300">{{ $certificate['issuer'] }}</p>
                        @if($certificate['description'])
                        <p class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $certificate['description'] }}</p>
                        @endif
                    </div>
                </article>
                @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-10 text-center dark:border-slate-700 dark:bg-slate-950">
                    <i data-lucide="award" class="mx-auto h-8 w-8 text-slate-400"></i>
                    <p class="mt-3 font-medium text-slate-700 dark:text-slate-200">Belum ada sertifikat yang ditambahkan.</p>
                    <a href="{{ route('admin.login') }}" class="mt-3 inline-block text-sm font-semibold text-blue-700 hover:underline dark:text-blue-300">Masuk untuk menambahkan</a>
                </div>
                @endforelse
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-white py-6 dark:border-slate-800 dark:bg-slate-950">
        <div class="mx-auto flex max-w-6xl flex-col gap-2 px-4 text-sm text-slate-500 dark:text-slate-400 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <span>{{ $portfolio['profile']['full_name'] }}</span>
            <span>{{ $portfolio['profile']['school'] }}</span>
        </div>
    </footer>
</body>
</html>
