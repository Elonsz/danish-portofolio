import React, { useState } from 'react';
import { Plus, Minus, ArrowUpRight, Code, Layers, Layout, Palette } from 'lucide-react';

export default function Capabilities({ capabilities }) {
    const [openIndex, setOpenIndex] = useState(0);

    const defaultCapabilities = [
        {
            number: '01',
            title: 'Website Design & Interactive Frontend',
            summary:
                'Membangun antarmuka web interaktif menggunakan React JS, CSS editorial modern, tipografi berpola majalah, dan mikro-animasi responsif di seluruh resolusi layar.',
            tags: ['React.js', 'Tailwind CSS', 'Vite', 'Micro-interactions', 'Responsive Layouts'],
            icon: Code,
            deliverables: ['Single Page Applications', 'Animated Landing Pages', 'Design Systems Component Library', 'Cross-browser Optimization'],
        },
        {
            number: '02',
            title: 'Full-Stack Web Engineering',
            summary:
                'Pengembangan arsitektur backend kokoh menggunakan Laravel, skema database MySQL teroptimasi, otentikasi role-based, dan API endpoint terstruktur.',
            tags: ['Laravel 11', 'PHP 8.2+', 'MySQL', 'RESTful APIs', 'Authentication & Security'],
            icon: Layers,
            deliverables: ['Custom Content Dashboards', 'RESTful API Services', 'Database Schema & Migrations', 'Secure File & Asset Management'],
        },
        {
            number: '03',
            title: 'UI/UX System & Editorial Layouts',
            summary:
                'Merancang sistem antarmuka berbasis grid editorial dengan hierarki visual tajam, kontras tipografi berani, dan kemudahan navigasi bagi pengunjung.',
            tags: ['Design Systems', 'Typography Hierarchy', 'Editorial Grid', 'Figma Prototyping'],
            icon: Layout,
            deliverables: ['High-Fidelity Wireframes', 'Interactive UI Prototypes', 'Accessible Design Tokens', 'Visual Styleguides'],
        },
        {
            number: '04',
            title: 'Brand Identity & Visual Presence',
            summary:
                'Menciptakan konsistensi visual personal dan proyek digital yang berkesan kuat, dari simbol monogram hingga aset grafis komprehensif.',
            tags: ['Visual Identity', 'Typography Direction', 'Digital Merchandise', 'Brand Guidelines'],
            icon: Palette,
            deliverables: ['Digital Brand Guidelines', 'Custom Typography Pairing', 'Iconography Sets', 'Editorial Presentation Decks'],
        },
    ];

    const items = capabilities && capabilities.length > 0 ? capabilities : defaultCapabilities;

    return (
        <section id="capabilities" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10 bg-neutral-50/50 dark:bg-neutral-900/20">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 mb-12 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 02 // SERVICES & EXPERTISE
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            Capabilities
                        </h2>
                    </div>
                    <p className="text-xs font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400 max-w-sm">
                        DISCIPLINES TURNING IDEAS INTO TACTILE DIGITAL EXPERIENCES
                    </p>
                </div>

                {/* Editorial Accordion */}
                <div className="border-t border-black/15 dark:border-white/15 divide-y divide-black/10 dark:divide-white/10">
                    {items.map((item, index) => {
                        const isOpen = openIndex === index;
                        return (
                            <div
                                key={index}
                                className={`transition-colors duration-300 ${
                                    isOpen ? 'bg-white dark:bg-neutral-900/60' : 'hover:bg-neutral-100/50 dark:hover:bg-neutral-900/30'
                                }`}
                            >
                                <button
                                    type="button"
                                    onClick={() => setOpenIndex(isOpen ? -1 : index)}
                                    className="w-full py-6 sm:py-8 px-2 sm:px-6 flex items-start sm:items-center justify-between text-left gap-4"
                                    aria-expanded={isOpen}
                                >
                                    <div className="flex items-start sm:items-center gap-4 sm:gap-8">
                                        <span className="font-mono text-sm sm:text-base text-neutral-400 dark:text-neutral-500 font-semibold pt-0.5 sm:pt-0">
                                            {item.number || `0${index + 1}`}
                                        </span>
                                        <h3 className="font-serif text-xl sm:text-2xl lg:text-3xl font-normal text-neutral-900 dark:text-white">
                                            {item.title}
                                        </h3>
                                    </div>

                                    <div className="flex-none p-2 rounded-full border border-black/15 dark:border-white/15 text-neutral-700 dark:text-neutral-300">
                                        {isOpen ? <Minus className="w-4 h-4" /> : <Plus className="w-4 h-4" />}
                                    </div>
                                </button>

                                {isOpen && (
                                    <div className="px-2 sm:px-6 pb-8 pt-2 pl-12 sm:pl-20 animate-fadeIn">
                                        <div className="max-w-4xl grid grid-cols-1 md:grid-cols-12 gap-6">
                                            <div className="md:col-span-8">
                                                <p className="text-base sm:text-lg font-sans font-light leading-relaxed text-neutral-700 dark:text-neutral-300">
                                                    {item.summary}
                                                </p>

                                                {/* Tags */}
                                                <div className="flex flex-wrap gap-2 mt-5">
                                                    {(item.tags || []).map((tag, tIdx) => (
                                                        <span
                                                            key={tIdx}
                                                            className="text-[11px] font-mono px-2.5 py-1 rounded-none border border-black/15 dark:border-white/15 bg-neutral-100 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-200"
                                                        >
                                                            {tag}
                                                        </span>
                                                    ))}
                                                </div>
                                            </div>

                                            {/* Deliverables */}
                                            <div className="md:col-span-4 border-l border-black/10 dark:border-white/10 pl-5">
                                                <span className="text-[10px] font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400 block mb-2">
                                                    Key Deliverables
                                                </span>
                                                <ul className="space-y-1.5 text-xs font-mono text-neutral-600 dark:text-neutral-300">
                                                    {(item.deliverables || ['Modular Architecture', 'High Performance', 'Clean Documentation']).map((d, dIdx) => (
                                                        <li key={dIdx} className="flex items-center gap-1.5">
                                                            <span className="w-1 h-1 bg-neutral-900 dark:bg-white rounded-full" />
                                                            <span>{d}</span>
                                                        </li>
                                                    ))}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        );
                    })}
                </div>
            </div>
        </section>
    );
}
