<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $portfolio['profile']['full_name'] ?? 'Muhammad Danish El Shirazy' }} — Editorial Portfolio</title>
    <meta name="description" content="{{ $portfolio['profile']['short_bio'] ?? 'Portofolio editorial Muhammad Danish El Shirazy - Pelajar di SMK Telkom Banjarbaru & Pengembang Web.' }}">
    <meta name="author" content="{{ $portfolio['profile']['full_name'] ?? 'Muhammad Danish El Shirazy' }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Editorial Typography Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Anti-FOUC Theme Script -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-[#fcfbfa] dark:bg-[#0c0d10] text-neutral-900 dark:text-neutral-100 antialiased selection:bg-neutral-900 selection:text-white dark:selection:bg-white dark:selection:text-neutral-900">
    <!-- React Application Mount Point -->
    <div
        id="portfolio-app"
        data-portfolio="{{ json_encode($portfolio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
        data-csrf="{{ csrf_token() }}"
    >
        <!-- Initial Skeleton / Graceful Fallback prior to React hydration -->
        <div class="min-h-screen flex items-center justify-center p-8 text-center font-mono text-xs uppercase tracking-widest text-neutral-400">
            <div class="space-y-3">
                <div class="w-8 h-8 mx-auto border-2 border-neutral-900 dark:border-white border-t-transparent animate-spin rounded-full"></div>
                <p>Loading Editorial Experience...</p>
            </div>
        </div>
    </div>

    <!-- Noscript Fallback for SEO & Accessibility -->
    <noscript>
        <div class="max-w-4xl mx-auto p-8 font-sans">
            <h1 class="text-3xl font-serif mb-4">{{ $portfolio['profile']['full_name'] }}</h1>
            <p class="text-lg mb-4">{{ $portfolio['profile']['role'] }} di {{ $portfolio['profile']['school'] }}</p>
            <p class="mb-6">{{ $portfolio['profile']['short_bio'] }}</p>
            <h2 class="text-xl font-serif mt-6 mb-2">Tentang</h2>
            <p>{{ $portfolio['about']['story_p1'] }}</p>
            <p>{{ $portfolio['about']['story_p2'] }}</p>
        </div>
    </noscript>
</body>
</html>
