<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Sertifikat | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page min-h-screen bg-slate-50 text-slate-800 antialiased">
    <header class="admin-topbar">
        <div class="admin-topbar-inner">
            <a href="{{ route('portfolio.home') }}" class="admin-brand">
                <span class="admin-brand-mark">{{ substr(config('portfolio.profile.nickname'), 0, 1) }}</span>
                <span>{{ config('portfolio.profile.full_name') }} <small>Dashboard</small></span>
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="admin-quiet-button">Keluar</button>
            </form>
        </div>
    </header>

    <main class="admin-content">
        <div class="admin-page-heading">
            <div>
                <span class="admin-kicker">Konten portofolio</span>
                <h1>Sertifikat</h1>
                <p>Tambah dan perbarui sertifikat yang ditampilkan ke publik.</p>
            </div>
            <span class="admin-count">{{ $certificates->total() }} sertifikat</span>
        </div>

        @if(session('status'))
            <div class="admin-success" role="status">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="admin-alert" role="alert">Periksa kembali data yang dimasukkan.</div>
        @endif

        <div class="admin-layout">
            <section class="admin-panel">
                <div class="admin-panel-heading">
                    <div>
                        <span class="admin-kicker">{{ $editingCertificate ? 'Perbarui data' : 'Data baru' }}</span>
                        <h2>{{ $editingCertificate ? 'Edit sertifikat' : 'Tambah sertifikat' }}</h2>
                    </div>
                </div>

                <form action="{{ $editingCertificate ? route('admin.certificates.update', $editingCertificate) : route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                    @csrf
                    @if($editingCertificate)
                        @method('PUT')
                    @endif

                    <div>
                        <label for="title">Nama sertifikat</label>
                        <input id="title" name="title" value="{{ old('title', $editingCertificate?->title) }}" required maxlength="255">
                        @error('title')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label for="issuer">Penerbit</label>
                        <input id="issuer" name="issuer" value="{{ old('issuer', $editingCertificate?->issuer) }}" required maxlength="255">
                        @error('issuer')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="admin-form-row">
                        <div>
                            <label for="date">Tanggal / periode</label>
                            <input id="date" name="date" value="{{ old('date', $editingCertificate?->date) }}" placeholder="Oktober 2026" required maxlength="100">
                            @error('date')<span class="admin-field-error">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="badge">Label</label>
                            <input id="badge" name="badge" value="{{ old('badge', $editingCertificate?->badge) }}" placeholder="Terverifikasi" required maxlength="100">
                            @error('badge')<span class="admin-field-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="credential_id">ID kredensial <span>Opsional</span></label>
                        <input id="credential_id" name="credential_id" value="{{ old('credential_id', $editingCertificate?->credential_id) }}" maxlength="255">
                        @error('credential_id')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label for="image">Gambar sertifikat <span>Opsional, maks. 5 MB</span></label>
                        <input id="image" name="image" type="file" accept="image/*">
                        @if($editingCertificate?->image_path)
                            <img src="{{ asset('storage/'.$editingCertificate->image_path) }}" alt="Pratinjau sertifikat" class="admin-image-preview">
                        @endif
                        @error('image')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label for="image_url">Atau URL gambar <span>Opsional</span></label>
                        <input id="image_url" name="image_url" type="url" value="{{ old('image_url', $editingCertificate?->image_url) }}" placeholder="https://...">
                        @error('image_url')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" required maxlength="2000">{{ old('description', $editingCertificate?->description) }}</textarea>
                        @error('description')<span class="admin-field-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="admin-form-actions">
                        <button type="submit" class="admin-primary-button">{{ $editingCertificate ? 'Simpan perubahan' : 'Tambah sertifikat' }}</button>
                        @if($editingCertificate)
                            <a href="{{ route('admin.certificates.index') }}" class="admin-cancel-link">Batal</a>
                        @endif
                    </div>
                </form>
            </section>

            <section class="admin-list-section">
                <div class="admin-panel-heading">
                    <div>
                        <span class="admin-kicker">Database</span>
                        <h2>Semua sertifikat</h2>
                    </div>
                </div>

                @forelse($certificates as $certificate)
                    <article class="admin-certificate-row">
                        <div class="admin-certificate-copy">
                            <span class="admin-certificate-badge">{{ $certificate->badge }}</span>
                            <h3>{{ $certificate->title }}</h3>
                            <p>{{ $certificate->issuer }} <span aria-hidden="true">·</span> {{ $certificate->date }}</p>
                        </div>
                        <div class="admin-row-actions">
                            <a href="{{ route('admin.certificates.index', ['edit' => $certificate->id]) }}" class="admin-edit-link">Edit</a>
                            <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Hapus sertifikat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-delete-button">Hapus</button>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="admin-empty-state">Belum ada sertifikat. Tambahkan sertifikat pertama melalui formulir.</div>
                @endforelse

                @if($certificates->hasPages())
                    <div class="admin-pagination">{{ $certificates->links() }}</div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>