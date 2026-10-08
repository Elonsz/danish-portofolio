import React, { useState, useEffect } from 'react';
import { ArrowDown, Sparkles, MoveRight, Clock } from 'lucide-react';

export default function Hero({ profile, editorial }) {
    const [currentTime, setCurrentTime] = useState('');

    useEffect(() => {
        const updateTime = () => {
            const now = new Date();
            // Format time in WITA / Banjarbaru (UTC+8)
            const timeString = new Intl.DateTimeFormat('id-ID', {
                timeZone: 'Asia/Makassar',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false,
            }).format(now);
            setCurrentTime(`${timeString} WITA (Banjarbaru)`);
        };
        updateTime();
        const interval = setInterval(updateTime, 1000);
        return () => clearInterval(interval);
    }, []);

    const scrollTo = (href) => {
        const target = document.querySelector(href);
        if (target) {
            const top = target.getBoundingClientRect().top + window.pageYOffset - 80;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    };

    const marqueeKeywords = [
        'WEBSITE DESIGN',
        'FULL-STACK ARCHITECTURE',
        'REACT JS & LARAVEL',
        'EDITORIAL TYPOGRAPHY',
        'UI/UX DESIGN SYSTEMS',
        'SMK TELKOM BANJARBARU',
        'TACTILE DIGITAL EXPERIENCES',
        'GLYPH & CHROMA PRACTICE',
    ];

    return (
        <section id="beranda" className="relative pt-12 pb-20 md:pt-20 md:pb-28 overflow-hidden">
            {/* Top kicker and location bar */}
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 md:mb-12">
                <div className="flex flex-wrap items-center justify-between gap-4 pb-4 border-b border-black/10 dark:border-white/10 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                    <div className="flex items-center gap-2">
                        <span className="w-2 h-2 rounded-full bg-neutral-900 dark:bg-neutral-100" />
                        <span className="uppercase tracking-widest font-semibold text-neutral-900 dark:text-white">
                            {profile?.nickname || 'DANISH'} STUDIO PRACTICE
                        </span>
                        <span className="text-neutral-400 dark:text-neutral-600">/</span>
                        <span>BANJARBARU, INDONESIA</span>
                    </div>

                    <div className="flex items-center gap-4">
                        <div className="flex items-center gap-1.5">
                            <Clock className="w-3.5 h-3.5 opacity-70" />
                            <span>{currentTime || '12:00:00 WITA'}</span>
                        </div>
                        <span className="hidden sm:inline px-2 py-0.5 rounded bg-neutral-200/60 dark:bg-neutral-800/80 text-[10px] uppercase tracking-wider text-neutral-700 dark:text-neutral-300">
                            {profile?.school || 'SMK TELKOM BANJARBARU'}
                        </span>
                    </div>
                </div>
            </div>

            {/* Main Headline Section */}
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="max-w-5xl">
                    <span className="inline-block text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400 mb-4">
                        VOL. 26 // EDITORIAL IDENTITY
                    </span>

                    <h1 className="font-serif text-5xl sm:text-7xl lg:text-8xl xl:text-[6.5rem] leading-[1.02] tracking-tight font-normal text-neutral-900 dark:text-neutral-50">
                        {editorial?.hero_title || 'Design that speaks volumes'}
                    </h1>

                    <div className="mt-8 sm:mt-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
                        <div className="lg:col-span-8">
                            <p className="text-lg sm:text-2xl font-sans font-light leading-relaxed text-neutral-700 dark:text-neutral-300 max-w-3xl">
                                {editorial?.hero_subtitle ||
                                    'Glyph & Chroma is the multidisciplinary practice of Danish. Specializing in identity systems, full-stack web engineering, and tactile digital experiences.'}
                            </p>
                        </div>

                        <div className="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3.5">
                            <button
                                type="button"
                                onClick={() => scrollTo('#karya')}
                                className="group inline-flex items-center justify-between px-6 py-4 rounded-none border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900 text-xs font-mono uppercase tracking-widest hover:bg-neutral-800 dark:hover:bg-neutral-100 transition-all shadow-sm"
                            >
                                <span>View Selected Works</span>
                                <MoveRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                            </button>

                            <button
                                type="button"
                                onClick={() => scrollTo('#kontak')}
                                className="group inline-flex items-center justify-between px-6 py-4 rounded-none border border-black/20 dark:border-white/20 bg-transparent text-neutral-900 dark:text-white text-xs font-mono uppercase tracking-widest hover:border-black dark:hover:border-white transition-all"
                            >
                                <span>Start a Conversation</span>
                                <ArrowDown className="w-4 h-4 group-hover:translate-y-1 transition-transform" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {/* Infinite Marquee Ticker */}
            <div className="mt-16 md:mt-24 border-y border-black/10 dark:border-white/10 bg-neutral-100/60 dark:bg-neutral-900/40 py-3.5 overflow-hidden select-none">
                <div className="flex w-max animate-marquee">
                    {[...marqueeKeywords, ...marqueeKeywords].map((word, idx) => (
                        <span
                            key={idx}
                            className="inline-flex items-center gap-6 px-4 text-xs font-mono tracking-[0.2em] uppercase text-neutral-600 dark:text-neutral-400 whitespace-nowrap"
                        >
                            <span>{word}</span>
                            <span className="text-neutral-400 dark:text-neutral-600">•</span>
                        </span>
                    ))}
                </div>
            </div>
        </section>
    );
}
