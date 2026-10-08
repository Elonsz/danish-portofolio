import React, { useState } from 'react';
import { ChevronLeft, ChevronRight, LayoutGrid, Sliders, ExternalLink, ArrowUpRight, Sparkles } from 'lucide-react';

export default function SelectedWorks({ projects, onSelectProject }) {
    const [currentIndex, setCurrentIndex] = useState(0);
    const [activeFilter, setActiveFilter] = useState('ALL');
    const [viewMode, setViewMode] = useState('slider'); // 'slider' | 'grid'

    const projectList = projects && projects.length > 0 ? projects : [];

    const categories = ['ALL', ...new Set(projectList.map((p) => p.category).filter(Boolean))];

    const filteredProjects =
        activeFilter === 'ALL'
            ? projectList
            : projectList.filter((p) => p.category === activeFilter);

    const safeIndex = Math.min(currentIndex, Math.max(0, filteredProjects.length - 1));

    const nextSlide = () => {
        if (filteredProjects.length === 0) return;
        setCurrentIndex((prev) => (prev + 1) % filteredProjects.length);
    };

    const prevSlide = () => {
        if (filteredProjects.length === 0) return;
        setCurrentIndex((prev) => (prev - 1 + filteredProjects.length) % filteredProjects.length);
    };

    const currentProject = filteredProjects[safeIndex];

    return (
        <section id="karya" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 mb-10 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 03 // PORTFOLIO & ARCHIVE
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            Selected Works
                        </h2>
                    </div>

                    <div className="flex flex-wrap items-center gap-4">
                        {/* View Mode Toggle */}
                        <div className="flex items-center border border-black/15 dark:border-white/20 p-1 bg-white dark:bg-neutral-900">
                            <button
                                type="button"
                                onClick={() => setViewMode('slider')}
                                className={`px-3 py-1 text-xs font-mono uppercase tracking-wider transition-colors ${
                                    viewMode === 'slider'
                                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                                        : 'text-neutral-500 hover:text-neutral-900 dark:hover:text-white'
                                }`}
                            >
                                Editorial Slider
                            </button>
                            <button
                                type="button"
                                onClick={() => setViewMode('grid')}
                                className={`px-3 py-1 text-xs font-mono uppercase tracking-wider transition-colors ${
                                    viewMode === 'grid'
                                        ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                                        : 'text-neutral-500 hover:text-neutral-900 dark:hover:text-white'
                                }`}
                            >
                                Grid View
                            </button>
                        </div>
                    </div>
                </div>

                {/* Filter Pills */}
                <div className="flex flex-wrap items-center gap-2 mb-10">
                    {categories.map((cat) => (
                        <button
                            key={cat}
                            type="button"
                            onClick={() => {
                                setActiveFilter(cat);
                                setCurrentIndex(0);
                            }}
                            className={`px-3.5 py-1.5 text-xs font-mono uppercase tracking-widest border transition-all ${
                                activeFilter === cat
                                    ? 'border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900 font-semibold'
                                    : 'border-black/10 dark:border-white/15 bg-transparent text-neutral-600 dark:text-neutral-400 hover:border-black dark:hover:border-white'
                            }`}
                        >
                            {cat}
                        </button>
                    ))}
                </div>

                {filteredProjects.length === 0 ? (
                    <div className="py-20 text-center border border-dashed border-black/20 dark:border-white/20">
                        <p className="font-mono text-sm text-neutral-500">No projects found in this category.</p>
                    </div>
                ) : viewMode === 'slider' && currentProject ? (
                    /* EDITORIAL SLIDER VIEW (Matching Wix Glyph & Chroma 01/07) */
                    <div className="border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 p-4 sm:p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.05)] dark:shadow-[8px_8px_0px_0px_rgba(255,255,255,0.04)]">
                        {/* Top slider bar */}
                        <div className="flex items-center justify-between pb-6 border-b border-black/10 dark:border-white/10 mb-6 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                            <div className="flex items-center gap-3">
                                <span className="font-bold text-neutral-900 dark:text-white text-base">
                                    {String(safeIndex + 1).padStart(2, '0')} / {String(filteredProjects.length).padStart(2, '0')}
                                </span>
                                <span className="text-neutral-300 dark:text-neutral-700">|</span>
                                <span className="uppercase tracking-widest">{currentProject.category || 'SHOWCASE'}</span>
                            </div>

                            {/* Nav controls */}
                            <div className="flex items-center gap-2">
                                <button
                                    type="button"
                                    onClick={prevSlide}
                                    aria-label="Previous project"
                                    className="p-2 border border-black/15 dark:border-white/20 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                                >
                                    <ChevronLeft className="w-4 h-4 text-neutral-800 dark:text-neutral-200" />
                                </button>
                                <button
                                    type="button"
                                    onClick={nextSlide}
                                    aria-label="Next project"
                                    className="p-2 border border-black/15 dark:border-white/20 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                                >
                                    <ChevronRight className="w-4 h-4 text-neutral-800 dark:text-neutral-200" />
                                </button>
                            </div>
                        </div>

                        {/* Slider Content Grid */}
                        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                            {/* Image side */}
                            <div
                                className="lg:col-span-7 group relative aspect-[16/10] overflow-hidden bg-neutral-100 dark:bg-neutral-800 border border-black/10 dark:border-white/10 cursor-pointer"
                                onClick={() => onSelectProject(currentProject)}
                            >
                                <img
                                    src={currentProject.image}
                                    alt={currentProject.title}
                                    className="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700"
                                />
                                <div className="absolute inset-0 bg-neutral-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                                    <span className="px-4 py-2 bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white text-xs font-mono uppercase tracking-widest border border-black/20 shadow-md">
                                        Inspect Project
                                    </span>
                                </div>
                            </div>

                            {/* Info side */}
                            <div className="lg:col-span-5 space-y-6">
                                <div>
                                    <span className="text-xs font-mono text-neutral-400 dark:text-neutral-500 uppercase tracking-widest block mb-2">
                                        ARCHIVE // {currentProject.year || '2026'}
                                    </span>
                                    <h3
                                        onClick={() => onSelectProject(currentProject)}
                                        className="font-serif text-2xl sm:text-3xl lg:text-4xl font-normal text-neutral-900 dark:text-white hover:opacity-80 transition-opacity cursor-pointer leading-tight"
                                    >
                                        {currentProject.title}
                                    </h3>
                                </div>

                                <p className="text-base font-sans font-light leading-relaxed text-neutral-600 dark:text-neutral-300">
                                    {currentProject.description}
                                </p>

                                <div className="flex flex-wrap gap-2 pt-2">
                                    {(currentProject.tags || []).map((t, idx) => (
                                        <span
                                            key={idx}
                                            className="text-[11px] font-mono px-2 py-1 border border-black/10 dark:border-white/15 bg-neutral-50 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-300"
                                        >
                                            {t}
                                        </span>
                                    ))}
                                </div>

                                <div className="pt-4 flex items-center gap-3">
                                    <button
                                        type="button"
                                        onClick={() => onSelectProject(currentProject)}
                                        className="inline-flex items-center gap-2 px-5 py-3 border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900 text-xs font-mono uppercase tracking-widest hover:bg-neutral-800 dark:hover:bg-neutral-100 transition-colors"
                                    >
                                        <span>Read Case Study</span>
                                        <ArrowUpRight className="w-4 h-4" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                ) : (
                    /* FULL GRID VIEW */
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {filteredProjects.map((p, idx) => (
                            <article
                                key={p.id || idx}
                                onClick={() => onSelectProject(p)}
                                className="group border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,0.05)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,0.04)] cursor-pointer hover:-translate-y-1 transition-all duration-300"
                            >
                                <div className="aspect-[16/10] overflow-hidden bg-neutral-100 dark:bg-neutral-800 border border-black/10 dark:border-white/10 mb-5 relative">
                                    <img
                                        src={p.image}
                                        alt={p.title}
                                        className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    />
                                    <span className="absolute top-3 left-3 px-2 py-0.5 bg-neutral-950/80 backdrop-blur-sm text-white text-[10px] font-mono tracking-widest uppercase">
                                        {String(idx + 1).padStart(2, '0')}
                                    </span>
                                </div>

                                <div className="space-y-3">
                                    <div className="flex items-center justify-between text-xs font-mono text-neutral-400 dark:text-neutral-500">
                                        <span className="uppercase tracking-widest">{p.category}</span>
                                        <span>{p.year || '2026'}</span>
                                    </div>

                                    <h3 className="font-serif text-2xl font-normal text-neutral-900 dark:text-white group-hover:opacity-80 transition-opacity">
                                        {p.title}
                                    </h3>

                                    <p className="text-sm font-sans font-light text-neutral-600 dark:text-neutral-400 line-clamp-2">
                                        {p.description}
                                    </p>

                                    <div className="pt-2 flex items-center justify-between border-t border-black/10 dark:border-white/10 text-xs font-mono">
                                        <span className="text-neutral-500 dark:text-neutral-400">View Details</span>
                                        <ArrowUpRight className="w-4 h-4 text-neutral-700 dark:text-neutral-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
                                    </div>
                                </div>
                            </article>
                        ))}
                    </div>
                )}
            </div>
        </section>
    );
}
