<?php

return [
    'brand' => [
        'name' => 'DANISH',
        'tagline' => 'Glyph & Chroma Practice',
        'location' => 'Banjarbaru, Kalimantan Selatan',
        'availability' => 'Available for Collaboration 2026/2027',
    ],

    'admin' => [
        'email' => env('PORTFOLIO_ADMIN_EMAIL', 'danish@admin.me'),
        'password' => env('PORTFOLIO_ADMIN_PASSWORD', 'danishsecret2026!'),
    ],

    'profile' => [
        'nickname' => 'Danish',
        'full_name' => 'Muhammad Danish El Shirazy',
        'role' => 'Creative Developer & Student',
        'status_badge' => 'Available for 2026/2027',
        'school' => 'SMK Telkom Banjarbaru',
        'hobby' => 'Main basket',
        'short_bio' => 'Danish is the multidisciplinary practice of Muhammad Danish El Shirazy. Specializing in modern web engineering, clean identity systems, and tactile digital experiences.',
    ],

    'about' => [
        'story_p1' => 'Saya adalah siswa di SMK Telkom Banjarbaru dengan ketertarikan mendalam pada pengembangan web modern, eksplorasi estetika editorial, dan interaktivitas frontend.',
        'story_p2' => 'Di luar jam sekolah dan kegiatan coding, saya aktif bermain basket untuk menjaga fokus, disiplin, dan stamina tim yang solid.',
        'story_p3' => 'Portofolio ini dirancang dengan standar editorial kontemporer: tipografi berkarakter kuat, presisi visual tinggi, dan interaksi yang halus.',
        'details' => [
            ['label' => 'Nama Lengkap', 'value' => 'Muhammad Danish El Shirazy'],
            ['label' => 'Institusi', 'value' => 'SMK Telkom Banjarbaru'],
            ['label' => 'Fokus Keahlian', 'value' => 'Web Development & UI Design'],
            ['label' => 'Minat & Hobi', 'value' => 'Basket & Creative Coding'],
            ['label' => 'Lokasi', 'value' => 'Banjarbaru, Indonesia'],
        ],
    ],

    'editorial' => [
        'hero_title' => 'Design that speaks volumes',
        'hero_subtitle' => 'Glyph & Chroma is the multidisciplinary practice of Danish. Specializing in identity systems, full-stack web engineering, and tactile digital experiences.',
        'approach_title' => 'The Approach',
        'approach_quote' => 'Design is an act of translation. It is about turning complex logic into intuitive visual languages. No fluff, just impact.',
        'approach_description' => 'Menggabungkan ketelitian rekayasa kode dengan kepekaan desain editorial. Setiap detail tata letak, ritme tipografi, dan respons interaktif diperhitungkan untuk memberikan kesan profesional dan berkelas.',
    ],

    'capabilities' => [
        [
            'number' => '01',
            'title' => 'Website Design & Interactive Frontend',
            'summary' => 'Membangun antarmuka web interaktif menggunakan React JS, modern CSS, dan mikro-animasi yang responsif di seluruh layar.',
            'tags' => ['React.js', 'Tailwind CSS', 'Vite', 'Micro-interactions', 'Responsive Design'],
        ],
        [
            'number' => '02',
            'title' => 'Full-Stack Web Engineering',
            'summary' => 'Pengembangan backend berbasis Laravel, arsitektur database relasional, otentikasi aman, dan integrasi REST API terstruktur.',
            'tags' => ['Laravel 11', 'PHP 8.2+', 'MySQL', 'Blade & Inertia', 'REST APIs'],
        ],
        [
            'number' => '03',
            'title' => 'UI/UX System & Editorial Layouts',
            'summary' => 'Merancang sistem antarmuka berbasis grid editorial dengan hierarki visual yang tajam, kontras tipografi tinggi, dan ramah pengguna.',
            'tags' => ['Design Systems', 'Typography Hierarchy', 'Editorial Grid', 'Figma'],
        ],
        [
            'number' => '04',
            'title' => 'Brand Identity & Digital Presence',
            'summary' => 'Menciptakan bahasa visual konsisten yang memperkuat kehadiran digital personal maupun proyek teknologi.',
            'tags' => ['Visual Identity', 'Color Science', 'Digital Assets', 'Creative Direction'],
        ],
    ],

    'projects' => [
        [
            'id' => '01',
            'number' => '01',
            'title' => 'Editorial Portfolio Platform',
            'category' => 'Web Development',
            'year' => '2026',
            'description' => 'Platform portofolio personal dengan konsep majalah editorial, transisi React dinamis, sistem tema gelap-terang otomatis, dan dashboard manajemen tersinkronisasi.',
            'tags' => ['React.js', 'Laravel', 'Tailwind CSS', 'Editorial Design'],
            'image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1200&q=80',
            'link' => '#',
            'featured' => true,
        ],
        [
            'id' => '02',
            'number' => '02',
            'title' => 'Banjarbaru Sports & Basketball Hub',
            'category' => 'UI/UX & Web',
            'year' => '2026',
            'description' => 'Konsep antarmuka interaktif pencatatan skor, penjadwalan latihan basket antar-sekolah, dan analitik performa atlet muda.',
            'tags' => ['UI/UX', 'Interactive Dashboard', 'Prototyping', 'Mobile-First'],
            'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=1200&q=80',
            'link' => '#',
            'featured' => true,
        ],
        [
            'id' => '03',
            'number' => '03',
            'title' => 'Telkom Student Verification System',
            'category' => 'Full-Stack Web',
            'year' => '2025',
            'description' => 'Sistem kredensial sertifikat berbasis web untuk verifikasi sertifikat keahlian siswa dengan QR Code dan penyimpanan data tersentralisasi.',
            'tags' => ['Laravel', 'MySQL', 'CRUD & Security', 'Auth System'],
            'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80',
            'link' => '#',
            'featured' => true,
        ],
        [
            'id' => '04',
            'number' => '04',
            'title' => 'Kinetic Typography & Brand Motion',
            'category' => 'Creative & Motion',
            'year' => '2025',
            'description' => 'Eksperimen gerak tipografi kinetik editorial, eksplorasi kontras hitam-putih, serta mikro-interaksi kursor untuk pengalaman digital yang impresif.',
            'tags' => ['Creative Coding', 'CSS Motion', 'Editorial Typography'],
            'image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
            'link' => '#',
            'featured' => true,
        ],
    ],

    'contact' => [
        'email' => 'danish.shirazy@example.com',
        'location' => 'Banjarbaru, Kalimantan Selatan, Indonesia',
        'school' => 'SMK Telkom Banjarbaru',
        'socials' => [
            ['name' => 'GitHub', 'url' => 'https://github.com', 'handle' => '@danish-shirazy'],
            ['name' => 'LinkedIn', 'url' => 'https://linkedin.com', 'handle' => 'Muhammad Danish El Shirazy'],
            ['name' => 'Instagram', 'url' => 'https://instagram.com', 'handle' => '@danish.shirazy'],
        ],
    ],
];
