<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Dashboard | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page min-h-screen bg-slate-50 text-slate-800 antialiased">
    <main class="admin-login-wrap">
        <a href="{{ route('portfolio.home') }}" class="admin-back-link">Kembali ke portofolio</a>
        <section class="admin-login-panel">
            <div class="admin-kicker">Area privat</div>
            <h1>Masuk dashboard</h1>
            <p class="admin-intro">Kelola sertifikat yang tampil di portofolio.</p>

            @if($errors->any())
                <div class="admin-alert" role="alert">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST" class="admin-form">
                @csrf
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>

                <button type="submit" class="admin-primary-button">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>