<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data Portofolio Pelajar
    |--------------------------------------------------------------------------
    | File ini berisi seluruh data portofolio. Anda dapat mengubah isi teks,
    | foto, link media sosial, proyek, dan keahlian dengan sangat mudah di sini.
    */

    'profile' => [
        'nickname' => 'Danish',
        'full_name' => 'Danish Pratama',
        'role' => 'Pelajar & Web Development Enthusiast',
        'status_badge' => 'Pelajar Aktif • Terbuka untuk Magang (PKL)',
        'school' => 'SMK Negeri 1 (Jurusan Rekayasa Perangkat Lunak)', // Bisa diganti SMA / SMK / SMP
        'grade' => 'Kelas XI (11)',
        'location' => 'Jakarta, Indonesia',
        'email' => 'danish.pratama@example.com',
        'phone' => '+62 812-3456-7890',
        'whatsapp' => '6281234567890',
        'avatar' => null, // null akan menggunakan avatar SVG ilustrasi keren bawaan
        'cv_filename' => 'CV_Danish_Pratama.pdf',
        'headline' => 'Membangun karya digital lewat kode dan kreativitas sejak bangku sekolah.',
        'short_bio' => 'Saya seorang pelajar yang memiliki ketertarikan tinggi pada pemrograman web, antarmuka pengguna (UI/UX), dan teknologi informasi. Selalu haus belajar hal baru, suka memecahkan masalah, dan berambisi menciptakan karya bermanfaat.',
    ],

    'socials' => [
        'github' => 'https://github.com/danish-pratama',
        'linkedin' => 'https://linkedin.com/in/danish-pratama',
        'instagram' => 'https://instagram.com/danish.dev',
        'whatsapp' => 'https://wa.me/6281234567890?text=Halo%20Danish,%20saya%20melihat%20portofolio%20kamu!',
        'email' => 'mailto:danish.pratama@example.com',
    ],

    'stats' => [
        ['value' => '12+', 'label' => 'Proyek Dibuat', 'icon' => 'folder-code'],
        ['value' => '5+', 'label' => 'Sertifikat Kompetensi', 'icon' => 'award'],
        ['value' => '2+', 'label' => 'Tahun Belajar Coding', 'icon' => 'calendar'],
        ['value' => '100%', 'label' => 'Semangat Belajar', 'icon' => 'zap'],
    ],

    'about' => [
        'story_p1' => 'Halo! Saya Danish, seorang pelajar yang jatuh cinta pada dunia pemrograman sejak pertama kali membuat halaman HTML sederhana di sekolah. Rasa penasaran tentang bagaimana sebuah website bekerja membuat saya terus mengeksplorasi teknologi modern.',
        'story_p2' => 'Selain fokus pada mata pelajaran sekolah, saya aktif mengikuti kursus pemrograman daring, mengerjakan proyek latihan mandiri, dan berkolaborasi dengan teman sekelas dalam tugas-tugas kelompok berbasis IT.',
        'story_p3' => 'Tujuan saya saat ini adalah mencari kesempatan Praktik Kerja Lapangan (PKL) / Magang serta proyek kolaboratif untuk memperdalam pengalaman di dunia industri nyata.',
        'details' => [
            ['label' => 'Nama Lengkap', 'value' => 'Danish Pratama'],
            ['label' => 'Status', 'value' => 'Siswa Aktif SMK / SMA'],
            ['label' => 'Jurusan', 'value' => 'Rekayasa Perangkat Lunak (RPL)'],
            ['label' => 'Usia', 'value' => '16 Tahun'],
            ['label' => 'Lokasi', 'value' => 'Jakarta, Indonesia'],
            ['label' => 'Bahasa', 'value' => 'Indonesia (Fasih), Inggris (Pasif/Menengah)'],
            ['label' => 'Minat Khusus', 'value' => 'Frontend, Laravel, UI/UX Design'],
            ['label' => 'Kesiapan Magang', 'value' => 'Siap WFO / WFH / Hybrid'],
        ],
        'strengths' => [
            [
                'title' => 'Pembelajar Cepat (Fast Learner)',
                'desc' => 'Mampu mempelajari bahasa pemrograman, framework, atau tools baru dalam waktu singkat melalui dokumentasi dan tutorial.',
                'icon' => 'sparkles',
            ],
            [
                'title' => 'Kerja Sama Tim & Komunikasi',
                'desc' => 'Terbiasa berdiskusi dan berbagi tugas dalam proyek kelompok sekolah maupun organisasi siswa.',
                'icon' => 'users',
            ],
            [
                'title' => 'Disiplin & Manajemen Waktu',
                'desc' => 'Dapat membagi waktu antara kewajiban belajar di sekolah, tugas kelompok, dan kegiatan pengembangan diri mandiri.',
                'icon' => 'clock',
            ],
            [
                'title' => 'Problem Solving & Kritis',
                'desc' => 'Senang menganalisis bug kode dan mencari solusi yang efisien serta mudah dirawat.',
                'icon' => 'cpu',
            ],
        ],
    ],

    'education' => [
        [
            'type' => 'Pendidikan Formal',
            'period' => '2024 - Sekarang',
            'institution' => 'SMK Negeri 1 Jakarta',
            'major' => 'Rekayasa Perangkat Lunak (RPL)',
            'description' => 'Mempelajari dasar algoritma pemrograman, basis data relasional (MySQL), pemrograman berorientasi objek (OOP), dan pengembangan web.',
            'highlights' => ['Peringkat 3 Besar di Kelas', 'Ketua Kelompok Tugas Pemrograman Web', 'Nilai Praktik Kejuruan 92/100'],
        ],
        [
            'type' => 'Pendidikan Formal',
            'period' => '2021 - 2024',
            'institution' => 'SMP Negeri 12 Jakarta',
            'major' => 'Pendidikan Dasar',
            'description' => 'Mulai mengenal logika komputer dan dasar teknologi informasi melalui kegiatan ekstrakurikuler komputer sekolah.',
            'highlights' => ['Lulus dengan predikat Sangat Baik', 'Anggota Tim Olimpiade TIK Sekolah'],
        ],
    ],

    'experiences' => [
        [
            'role' => 'Staf Divisi Publikasi & Dokumentasi',
            'organization' => 'OSIS SMKN 1 Jakarta',
            'period' => '2024 - Sekarang',
            'description' => 'Bertanggung jawab dalam mendesain materi visual publikasi acara sekolah, mengelola media sosial, dan membuat landing page informasi kegiatan OSIS.',
            'badge' => 'Organisasi Sekolah',
        ],
        [
            'role' => 'Koordinator Divisi Coding & Web',
            'organization' => 'IT Club / Ekstrakurikuler Komputer',
            'period' => '2024 - Sekarang',
            'description' => 'Mengkoordinasikan sesi belajar mingguan dasar HTML, CSS, dan Git untuk adik kelas dan anggota baru klub komputer.',
            'badge' => 'Ekstrakurikuler',
        ],
        [
            'role' => 'Freelance Web Designer Pemula',
            'organization' => 'Proyek Independen',
            'period' => '2025 - Sekarang',
            'description' => 'Membantu pembuatan website portofolio untuk teman dan landing page promosi UMKM produk kuliner lokal di sekitar rumah.',
            'badge' => 'Freelance / Latihan',
        ],
    ],

    'skills' => [
        'frontend' => [
            ['name' => 'HTML5 & Semantik Web', 'level' => 90, 'icon' => 'code'],
            ['name' => 'CSS3 & Flexbox/Grid', 'level' => 85, 'icon' => 'palette'],
            ['name' => 'JavaScript (ES6+)', 'level' => 80, 'icon' => 'terminal'],
            ['name' => 'Tailwind CSS', 'level' => 88, 'icon' => 'wind'],
            ['name' => 'Bootstrap 5', 'level' => 82, 'icon' => 'layout'],
        ],
        'backend' => [
            ['name' => 'PHP Dasar & OOP', 'level' => 78, 'icon' => 'server'],
            ['name' => 'Laravel Framework', 'level' => 75, 'icon' => 'box'],
            ['name' => 'MySQL Database', 'level' => 75, 'icon' => 'database'],
            ['name' => 'REST API (Dasar)', 'level' => 70, 'icon' => 'network'],
        ],
        'tools' => [
            ['name' => 'Git & GitHub', 'level' => 85, 'icon' => 'git-branch'],
            ['name' => 'Visual Studio Code', 'level' => 95, 'icon' => 'monitor'],
            ['name' => 'Figma (UI/UX Design)', 'level' => 80, 'icon' => 'figma'],
            ['name' => 'Canva', 'level' => 90, 'icon' => 'image'],
            ['name' => 'Laragon / XAMPP', 'level' => 85, 'icon' => 'hard-drive'],
            ['name' => 'Postman (API Testing)', 'level' => 70, 'icon' => 'send'],
        ],
        'soft_skills' => [
            'Komunikasi yang Santun & Jelas',
            'Kerja Tim (Teamwork) & Kolaborasi',
            'Berpikir Logis & Problem Solving',
            'Rasa Ingin Tahu Tinggi (Eager to Learn)',
            'Manajemen Waktu yang Disiplin',
            'Terbuka terhadap Masukan & Kritik Membangun',
        ],
    ],

    'projects' => [
        [
            'id' => 'project-1',
            'title' => 'Portal Informasi OSIS & Kegiatan Sekolah',
            'category' => 'web',
            'category_label' => 'Web Development',
            'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Website portal resmi kegiatan siswa dan OSIS dengan fitur pengumuman acara, galeri foto kegiatan, dan form pendaftaran lomba.',
            'description' => 'Proyek ini dikembangkan untuk memudahkan siswa dan guru mengakses informasi resmi seputar kegiatan kesiswaan. Menggunakan Laravel dan Tailwind CSS dengan antarmuka yang modern, responsif, dan mudah diakses dari smartphone siswa.',
            'features' => [
                'Halaman artikel berita dan pengumuman kesiswaan',
                'Galeri dokumentasi kegiatan ekstrakurikuler',
                'Formulir pendaftaran acara dan voting ketua OSIS online',
                'Responsive mobile-first design yang ramah kuota',
            ],
            'tags' => ['Laravel', 'Tailwind CSS', 'JavaScript', 'MySQL'],
            'demo_url' => 'https://example.com/demo-osis',
            'github_url' => 'https://github.com/danish-pratama/portal-osis-web',
            'date' => 'Desember 2025',
        ],
        [
            'id' => 'project-2',
            'title' => 'KasKu - Aplikasi Kas Kelas Digital',
            'category' => 'web',
            'category_label' => 'Web App',
            'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Aplikasi pencatatan iuran kas kelas berbasis web untuk membantu bendahara kelas mencatat pemasukan dan pengeluaran secara transparan.',
            'description' => 'Dibuat untuk mengatasi masalah pencatatan uang kas di buku tulis yang sering hilang atau terselip. Dilengkapi fitur rekap bulanan, status pembayaran per siswa, dan ekspor laporan ke format PDF.',
            'features' => [
                'Dashboard ringkasan saldo kas kelas secara real-time',
                'Daftar status pembayaran siswa (lunas / belum bayar)',
                'Riwayat pengeluaran kas dilengkapi catatan keperluan',
                'Penyimpanan data lokal (LocalStorage / Database) aman',
            ],
            'tags' => ['JavaScript', 'HTML5', 'Tailwind CSS', 'LocalStorage'],
            'demo_url' => 'https://example.com/demo-kasku',
            'github_url' => 'https://github.com/danish-pratama/kasku-web-app',
            'date' => 'November 2025',
        ],
        [
            'id' => 'project-3',
            'title' => 'Kalkulator Nilai Rapor & Target Prestasi',
            'category' => 'web',
            'category_label' => 'Web Tool',
            'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Alat bantu hitung nilai rata-rata rapor semester dan prediksi kelayakan syarat SNMPTN/SNBP untuk teman-teman pelajar.',
            'description' => 'Sebuah tools web interaktif yang membantu rekan-rekan siswa memetakan tren nilai dari semester 1 hingga 5, menghitung nilai bobot mata pelajaran utama, dan melihat grafik perkembangan akademik.',
            'features' => [
                'Perhitungan otomatis bobot nilai pengetahuan dan keterampilan',
                'Grafik tren kenaikan/penurunan nilai menggunakan Chart.js',
                'Peringatan otomatis untuk mata pelajaran di bawah KKM',
                'Tampilan bersih dan dapat langsung dicetak (Print Friendly)',
            ],
            'tags' => ['JavaScript', 'Chart.js', 'Bootstrap 5'],
            'demo_url' => 'https://example.com/demo-kalkulator',
            'github_url' => 'https://github.com/danish-pratama/kalkulator-nilai-rapor',
            'date' => 'Oktober 2025',
        ],
        [
            'id' => 'project-4',
            'title' => 'Redesign UI/UX Aplikasi Belajar Siswa (RuangBelajar)',
            'category' => 'design',
            'category_label' => 'UI/UX Design',
            'image' => 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Konsep desain ulang aplikasi edukasi mobile dengan fokus pada kemudahan navigasi siswa, gamifikasi kuis, dan tampilan modern.',
            'description' => 'Studi kasus desain UI/UX yang dibuat di Figma untuk menyelesaikan permasalahan antarmuka aplikasi belajar yang sering kali membingungkan bagi siswa sekolah. Dilengkapi prototype interaktif dan design system terstruktur.',
            'features' => [
                'User Persona & riset kebutuhan belajar siswa',
                'Design System lengkap (warna, tipografi, komponen tombol)',
                'Alur kuis interaktif dengan skor reward bintang',
                'Prototype interaktif yang dapat diuji coba di smartphone',
            ],
            'tags' => ['Figma', 'UI/UX Design', 'Wireframing', 'Prototyping'],
            'demo_url' => 'https://figma.com/@danish-pratama',
            'github_url' => 'https://figma.com/@danish-pratama',
            'date' => 'Agustus 2025',
        ],
        [
            'id' => 'project-5',
            'title' => 'Web Profil UMKM Kuliner Lokal (Kripik Renyah)',
            'category' => 'web',
            'category_label' => 'Web Development',
            'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Website katalog produk untuk UMKM lokal dengan integrasi tombol pesan via WhatsApp otomatis.',
            'description' => 'Proyek bakti sosial digital untuk membantu usaha mikro milik tetangga di lingkungan tempat tinggal agar memiliki kehadiran online yang menarik dan memudahkan pelanggan memesan tanpa perantara rumit.',
            'features' => [
                'Katalog varian rasa dan harga produk',
                'Tombol pesan instan langsung terhubung ke WhatsApp penjual',
                'Testimoni pembeli dan peta lokasi toko fisik',
                'Optimasi SEO dasar untuk pencarian lokal',
            ],
            'tags' => ['HTML5', 'CSS3', 'JavaScript', 'Responsive Design'],
            'demo_url' => 'https://example.com/demo-umkm',
            'github_url' => 'https://github.com/danish-pratama/umkm-kripik-renyah',
            'date' => 'Juli 2025',
        ],
        [
            'id' => 'project-6',
            'title' => 'Branding & Poster Digital Pentas Seni Sekolah',
            'category' => 'design',
            'category_label' => 'Desain Grafis',
            'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Rangkaian aset grafis promosi media sosial, poster cetak, dan ID card panitia untuk acara tahunan Pentas Seni.',
            'description' => 'Sebagai staf publikasi acara, saya mendesain lebih dari 15 materi promosi digital dan cetak menggunakan Adobe Photoshop dan Canva dengan tema retro modern yang disukai anak muda.',
            'features' => [
                'Poster ukuran A3 cetak resolusi tinggi (300 DPI)',
                'Feed dan Instagram Story bertema selaras (Carousel kit)',
                'Desain tiket masuk & gelang identitas pengunjung',
                'Template sertifikat apresiasi panitia dan pengisi acara',
            ],
            'tags' => ['Canva', 'Photoshop', 'Visual Branding', 'Typography'],
            'demo_url' => 'https://canva.com',
            'github_url' => 'https://canva.com',
            'date' => 'Mei 2025',
        ],
    ],

    'certificates' => [
        [
            'title' => 'Memulai Dasar Pemrograman untuk Menjadi Pengembang Software',
            'issuer' => 'Dicoding Indonesia',
            'date' => 'November 2025',
            'id_credential' => 'DICODING-2025-WEB-9871',
            'image' => 'https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Terverifikasi',
            'description' => 'Mempelajari metodologi pengembangan software, logika algoritma, Git, dan dasar arsitektur web modern.',
        ],
        [
            'title' => 'Dasar Pemrograman Web (HTML, CSS, JS)',
            'issuer' => 'Dicoding Academy',
            'date' => 'September 2025',
            'id_credential' => 'DICODING-HTMLCSS-4421',
            'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Kelulusan Bintang 5',
            'description' => 'Membangun website statis yang responsif, aksesibel, dan memenuhi standar W3C.',
        ],
        [
            'title' => 'Dasar Git dengan GitHub untuk Kolaborasi Tim',
            'issuer' => 'Skilvul / MySkill',
            'date' => 'Juli 2025',
            'id_credential' => 'SKV-GIT-2025-1109',
            'image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Terverifikasi',
            'description' => 'Penguasaan git branching, merging, pull request, resolusi konflik, dan GitHub Pages.',
        ],
        [
            'title' => 'Juara 2 Lomba Web Design Tingkat Pelajar se-Wilayah',
            'issuer' => 'Festival Komputer Siswa 2025',
            'date' => 'Desember 2025',
            'id_credential' => 'FKS-LOMBA-JUARA2-2025',
            'image' => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Penghargaan / Juara',
            'description' => 'Kompetisi membuat website profil sekolah yang ramah disabilitas dalam waktu 6 jam maraton coding.',
        ],
    ],

    'testimonials' => [
        [
            'quote' => 'Danish adalah siswa yang memiliki inisiatif belajar sangat tinggi. Ketika diberikan tugas coding, ia selalu menambahkan sentuhan kreatif dan fitur tambahan yang melebihi ekspektasi tugas standar.',
            'author' => 'Bapak Hendra, S.Kom.',
            'role' => 'Guru Produktif Rekayasa Perangkat Lunak',
            'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=150&q=80',
        ],
        [
            'quote' => 'Bekerja sama dengan Danish di OSIS sangat menyenangkan. Desain materi acaranya selalu tepat waktu, rapi, dan dia cepat tanggap ketika diminta bantuan teknis seputar web kegiatan.',
            'author' => 'Sarah Aulia',
            'role' => 'Ketua OSIS SMKN 1 Jakarta',
            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80',
        ],
    ],
];
