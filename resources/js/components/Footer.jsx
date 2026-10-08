import React from 'react';
import { ArrowUp, Sparkles, Heart } from 'lucide-react';

export default function Footer({ profile, brand }) {
    const scrollToTop = () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    return (
        <footer className="pt-16 pb-12 bg-[#f6f5f2] dark:bg-[#07080a] border-t border-black/10 dark:border-white/10 text-neutral-800 dark:text-neutral-200">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Giant Typographic Monogram Banner */}
                <div className="pb-12 border-b border-black/10 dark:border-white/10 overflow-hidden">
                    <p className="font-serif text-[11vw] leading-[0.85] font-bold tracking-tighter text-neutral-900/10 dark:text-white/10 select-none uppercase">
                        {brand?.name || 'DANISH'} STUDIO
                    </p>
                </div>

                <div className="py-10 grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                    <div className="md:col-span-5 space-y-3">
                        <span className="font-serif text-2xl font-bold tracking-tight text-neutral-900 dark:text-white block">
                            {profile?.full_name || 'Muhammad Danish El Shirazy'}
                        </span>
                        <p className="text-xs font-mono text-neutral-500 dark:text-neutral-400 max-w-sm">
                            {profile?.school || 'SMK Telkom Banjarbaru'} — Multidisciplinary practice in web engineering and editorial interface craft.
                        </p>
                    </div>

                    <div className="md:col-span-4 grid grid-cols-2 gap-4 text-xs font-mono">
                        <div>
                            <span className="text-[10px] text-neutral-400 uppercase tracking-widest block mb-2">Navigation</span>
                            <ul className="space-y-2">
                                <li><a href="#beranda" className="hover:underline">Home</a></li>
                                <li><a href="#profil" className="hover:underline">Profile</a></li>
                                <li><a href="#capabilities" className="hover:underline">Capabilities</a></li>
                                <li><a href="#karya" className="hover:underline">Selected Works</a></li>
                            </ul>
                        </div>
                        <div>
                            <span className="text-[10px] text-neutral-400 uppercase tracking-widest block mb-2">Internal</span>
                            <ul className="space-y-2">
                                <li><a href="#pendekatan" className="hover:underline">The Approach</a></li>
                                <li><a href="#sertifikat" className="hover:underline">Credentials</a></li>
                                <li><a href="#kontak" className="hover:underline">Contact</a></li>
                                <li><a href="/admin/login" className="hover:underline text-emerald-600 dark:text-emerald-400">Admin Login</a></li>
                            </ul>
                        </div>
                    </div>

                    <div className="md:col-span-3 flex md:justify-end">
                        <button
                            type="button"
                            onClick={scrollToTop}
                            className="inline-flex items-center gap-2 px-4 py-2.5 border border-black/15 dark:border-white/20 text-xs font-mono uppercase tracking-widest hover:border-black dark:hover:border-white transition-colors"
                        >
                            <span>Back to Top</span>
                            <ArrowUp className="w-3.5 h-3.5" />
                        </button>
                    </div>
                </div>

                {/* Bottom line */}
                <div className="pt-8 border-t border-black/10 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-mono text-neutral-500 dark:text-neutral-400">
                    <p>
                        © {new Date().getFullYear()} {profile?.full_name || 'Muhammad Danish El Shirazy'}. Built with React & Laravel.
                    </p>
                    <p className="flex items-center gap-1.5">
                        <span>Editorial Design Inspired by Wix Glyph & Chroma</span>
                    </p>
                </div>
            </div>
        </footer>
    );
}
