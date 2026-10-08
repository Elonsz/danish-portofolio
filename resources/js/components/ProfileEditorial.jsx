import React, { useState } from 'react';
import { User, Award, BookOpen, Activity, CheckCircle2, MapPin, Sparkles } from 'lucide-react';

export default function ProfileEditorial({ profile, about }) {
    const [activeTab, setActiveTab] = useState('narrative');

    const tabs = [
        { id: 'narrative', label: '01. Narrative' },
        { id: 'education', label: '02. Education & Tech' },
        { id: 'basket', label: '03. Athletics & Mindset' },
    ];

    return (
        <section id="profil" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 mb-12 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 01 // IDENTITY
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            The Practitioner
                        </h2>
                    </div>
                    <p className="text-xs font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400 max-w-xs">
                        MUHAMMAD DANISH EL SHIRAZY — BANJARBARU
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    {/* Left: Magazine Profile Sheet */}
                    <div className="lg:col-span-5">
                        <div className="relative border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.06)] dark:shadow-[8px_8px_0px_0px_rgba(255,255,255,0.05)] transition-transform hover:-translate-y-0.5 duration-300">
                            {/* Card top banner */}
                            <div className="flex items-center justify-between pb-4 border-b border-black/10 dark:border-white/10 text-[11px] font-mono uppercase text-neutral-500 dark:text-neutral-400">
                                <span className="flex items-center gap-1.5">
                                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-500" />
                                    <span>Verified Profile</span>
                                </span>
                                <span>Plate No. 01 / 2026</span>
                            </div>

                            {/* Photo */}
                            <div className="relative my-5 aspect-[4/5] overflow-hidden bg-neutral-200 dark:bg-neutral-800 border border-black/10 dark:border-white/10">
                                <img
                                    src="/images/muhammad-danish-profile.png"
                                    alt="Muhammad Danish El Shirazy"
                                    className="w-full h-full object-cover object-center filter grayscale contrast-105 hover:grayscale-0 transition-all duration-700"
                                    loading="lazy"
                                />
                                <div className="absolute bottom-3 left-3 px-2 py-1 bg-neutral-950/80 backdrop-blur-sm text-white text-[10px] font-mono tracking-widest uppercase">
                                    Danish // Studio
                                </div>
                            </div>

                            {/* Profile Bio Details */}
                            <div className="space-y-3 pt-2 text-xs font-mono">
                                <div className="flex items-center justify-between py-2 border-b border-black/10 dark:border-white/10">
                                    <span className="text-neutral-500 dark:text-neutral-400">Full Name</span>
                                    <span className="font-semibold text-neutral-900 dark:text-white">
                                        {profile?.full_name || 'Muhammad Danish El Shirazy'}
                                    </span>
                                </div>
                                <div className="flex items-center justify-between py-2 border-b border-black/10 dark:border-white/10">
                                    <span className="text-neutral-500 dark:text-neutral-400">Institution</span>
                                    <span className="font-semibold text-neutral-900 dark:text-white">
                                        {profile?.school || 'SMK Telkom Banjarbaru'}
                                    </span>
                                </div>
                                <div className="flex items-center justify-between py-2 border-b border-black/10 dark:border-white/10">
                                    <span className="text-neutral-500 dark:text-neutral-400">Focus & Craft</span>
                                    <span className="font-semibold text-neutral-900 dark:text-white">
                                        Web Engineering & UI/UX
                                    </span>
                                </div>
                                <div className="flex items-center justify-between py-2">
                                    <span className="text-neutral-500 dark:text-neutral-400">Athletics / Hobby</span>
                                    <span className="font-semibold text-neutral-900 dark:text-white">
                                        {profile?.hobby || 'Main basket'}
                                    </span>
                                </div>
                            </div>

                            {/* Card footer stamp */}
                            <div className="mt-4 pt-4 border-t border-black/10 dark:border-white/10 flex items-center justify-between text-[11px] font-mono text-neutral-500 dark:text-neutral-400">
                                <span className="flex items-center gap-1.5">
                                    <MapPin className="w-3.5 h-3.5 text-neutral-400" />
                                    <span>Banjarbaru, ID</span>
                                </span>
                                <span className="font-semibold text-emerald-600 dark:text-emerald-400">
                                    {profile?.status_badge || 'Available'}
                                </span>
                            </div>
                        </div>
                    </div>

                    {/* Right: Editorial Narrative & Tabs */}
                    <div className="lg:col-span-7 space-y-8">
                        <div>
                            <span className="text-xs font-mono uppercase tracking-widest text-neutral-400 dark:text-neutral-500">
                                EDITORIAL ESSAY // ABOUT
                            </span>
                            <h3 className="font-serif text-2xl sm:text-3xl lg:text-4xl font-normal text-neutral-900 dark:text-white mt-2 leading-tight">
                                Balancing disciplined engineering with tactile editorial aesthetics.
                            </h3>
                        </div>

                        {/* Interactive Tab Switcher */}
                        <div className="flex items-center gap-2 border-b border-black/10 dark:border-white/10 pb-2">
                            {tabs.map((tab) => (
                                <button
                                    key={tab.id}
                                    type="button"
                                    onClick={() => setActiveTab(tab.id)}
                                    className={`px-3 py-2 text-xs font-mono uppercase tracking-wider transition-all relative ${
                                        activeTab === tab.id
                                            ? 'text-neutral-900 dark:text-white font-bold bg-black/5 dark:bg-white/10 rounded'
                                            : 'text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white'
                                    }`}
                                >
                                    {tab.label}
                                </button>
                            ))}
                        </div>

                        {/* Tab Contents */}
                        <div className="min-h-[160px]">
                            {activeTab === 'narrative' && (
                                <div className="space-y-4 text-base sm:text-lg font-sans font-light leading-relaxed text-neutral-700 dark:text-neutral-300 animate-fadeIn">
                                    <p>
                                        {about?.story_p1 ||
                                            'Saya adalah siswa di SMK Telkom Banjarbaru dengan ketertarikan mendalam pada pengembangan web modern dan eksplorasi antarmuka digital yang interaktif.'}
                                    </p>
                                    <p>
                                        {about?.story_p2 ||
                                            'Di luar jam sekolah dan kegiatan coding, saya aktif bermain basket untuk menjaga fokus, disiplin, dan daya tahan strategi tim yang solid.'}
                                    </p>
                                    <p className="text-sm font-mono text-neutral-500 dark:text-neutral-400">
                                        {about?.story_p3 ||
                                            'Setiap karya dikembangkan dengan standar keunggulan: kode yang bersih, performa cepat, dan tampilan majalah editorial yang menonjol.'}
                                    </p>
                                </div>
                            )}

                            {activeTab === 'education' && (
                                <div className="space-y-4 animate-fadeIn">
                                    <div className="p-5 border border-black/10 dark:border-white/10 bg-neutral-50 dark:bg-neutral-800/50">
                                        <div className="flex items-center justify-between mb-2">
                                            <span className="text-xs font-mono uppercase tracking-wider text-neutral-500 dark:text-neutral-400">
                                                Active Program (2024 - Sekarang)
                                            </span>
                                            <span className="px-2 py-0.5 rounded text-[10px] font-mono uppercase bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300">
                                                Enrolled
                                            </span>
                                        </div>
                                        <h4 className="font-serif text-xl font-normal text-neutral-900 dark:text-white">
                                            SMK Telkom Banjarbaru
                                        </h4>
                                        <p className="text-sm text-neutral-600 dark:text-neutral-300 mt-1">
                                            Fokus pada Rekayasa Perangkat Lunak, algoritma pemrograman, perancangan basis data relasional, dan aplikasi web modern berstandar industri.
                                        </p>
                                    </div>

                                    <div className="grid grid-cols-2 gap-3 text-xs font-mono">
                                        <div className="p-3 border border-black/10 dark:border-white/10">
                                            <span className="text-neutral-500 dark:text-neutral-400 block mb-1">Frontend Stack</span>
                                            <strong className="text-neutral-900 dark:text-white">React.js, Tailwind, JavaScript</strong>
                                        </div>
                                        <div className="p-3 border border-black/10 dark:border-white/10">
                                            <span className="text-neutral-500 dark:text-neutral-400 block mb-1">Backend Stack</span>
                                            <strong className="text-neutral-900 dark:text-white">Laravel, PHP, MySQL</strong>
                                        </div>
                                    </div>
                                </div>
                            )}

                            {activeTab === 'basket' && (
                                <div className="space-y-4 animate-fadeIn">
                                    <div className="p-5 border border-black/10 dark:border-white/10 bg-neutral-50 dark:bg-neutral-800/50">
                                        <div className="flex items-center gap-2 mb-2 text-xs font-mono uppercase text-amber-600 dark:text-amber-400">
                                            <Activity className="w-4 h-4" />
                                            <span>The Court & The Code</span>
                                        </div>
                                        <h4 className="font-serif text-xl font-normal text-neutral-900 dark:text-white">
                                            Main Basket: Disiplin, Ritme & Kerja Tim
                                        </h4>
                                        <p className="text-sm text-neutral-600 dark:text-neutral-300 mt-2 leading-relaxed">
                                            Bermain basket bukan sekadar olahraga fisik, melainkan latihan membaca situasi cepat, komunikasi intensif tanpa kata, dan ketahanan di bawah tekanan. Prinsip-prinsip ini langsung diterapkan ketika memecahkan bug kompleks dan menyusun struktur kode yang solid.
                                        </p>
                                    </div>
                                </div>
                            )}
                        </div>

                        {/* Editorial Philosophy Quote */}
                        <div className="p-6 border-l-2 border-neutral-900 dark:border-white bg-neutral-100/60 dark:bg-neutral-900/40">
                            <p className="font-serif italic text-lg sm:text-xl text-neutral-900 dark:text-neutral-100">
                                "Design is an act of translation. It is about turning complex logic into intuitive visual languages. No fluff, just impact."
                            </p>
                            <span className="block mt-2 text-xs font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400">
                                — Danish / Manifesto
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}
