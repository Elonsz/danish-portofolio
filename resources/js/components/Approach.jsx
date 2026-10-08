import React from 'react';
import { Compass, Sparkles, Target, Zap, ShieldCheck } from 'lucide-react';

export default function Approach({ editorial }) {
    const pillars = [
        {
            number: 'I',
            title: 'Functional Logic First',
            kicker: 'ARCHITECTURE',
            description:
                'Setiap baris kode dibangun dengan struktur bersih, modular, dan terukur. Fondasi arsitektur yang kuat menjamin reliabilitas dan kecepatan loading maksimal.',
        },
        {
            number: 'II',
            title: 'Editorial Visual Restraint',
            kicker: 'TYPOGRAPHY & HIERARCHY',
            description:
                'Menghindari ornamen berlebihan. Mengutamakan ritme tipografi majalah bermutu tinggi, rasio grid proporsional, dan ruang kosong yang bernapas.',
        },
        {
            number: 'III',
            title: 'Tactile Motion & Delight',
            kicker: 'MICRO-INTERACTIONS',
            description:
                'Interaktivitas React yang responsif memberikan umpan balik langsung pada setiap gestur kursor, menciptakan pengalaman digital yang berkesan premium.',
        },
    ];

    return (
        <section id="pendekatan" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10 bg-neutral-100/40 dark:bg-neutral-900/30">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 mb-12 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 04 // METHODOLOGY & ETHOS
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            {editorial?.approach_title || 'The Approach'}
                        </h2>
                    </div>
                    <p className="text-xs font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400 max-w-xs">
                        TURNING LOGIC INTO INTUITIVE VISUAL EXPERIENCES
                    </p>
                </div>

                {/* Big Editorial Quote */}
                <div className="p-8 sm:p-12 border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 mb-12 shadow-[6px_6px_0px_0px_rgba(0,0,0,0.05)] dark:shadow-[6px_6px_0px_0px_rgba(255,255,255,0.04)]">
                    <span className="text-xs font-mono uppercase tracking-widest text-neutral-400 dark:text-neutral-500 block mb-4">
                        PHILOSOPHICAL TENET
                    </span>
                    <blockquote className="font-serif text-2xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white leading-[1.2]">
                        "{editorial?.approach_quote ||
                            'Design is an act of translation. It is about turning complex business logic into intuitive visual languages. No fluff, just impact.'}"
                    </blockquote>
                    <div className="mt-6 pt-6 border-t border-black/10 dark:border-white/10 flex flex-wrap items-center justify-between gap-4 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                        <span>MUHAMMAD DANISH EL SHIRAZY — PRACTICE LEAD</span>
                        <span>SMK TELKOM BANJARBARU</span>
                    </div>
                </div>

                {/* 3 Pillars Grid */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                    {pillars.map((pillar, idx) => (
                        <div
                            key={idx}
                            className="p-6 border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900/80 transition-all hover:-translate-y-1 duration-300"
                        >
                            <div className="flex items-center justify-between pb-4 border-b border-black/10 dark:border-white/10 text-xs font-mono text-neutral-400 dark:text-neutral-500 mb-4">
                                <span className="font-bold text-neutral-900 dark:text-white">{pillar.number}</span>
                                <span>{pillar.kicker}</span>
                            </div>
                            <h3 className="font-serif text-xl sm:text-2xl font-normal text-neutral-900 dark:text-white mb-3">
                                {pillar.title}
                            </h3>
                            <p className="text-sm font-sans font-light leading-relaxed text-neutral-600 dark:text-neutral-300">
                                {pillar.description}
                            </p>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}
