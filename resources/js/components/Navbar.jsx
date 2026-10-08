import React, { useState, useEffect } from 'react';
import { Sun, Moon, Menu, X, ArrowUpRight, ShieldCheck, Sparkles } from 'lucide-react';

export default function Navbar({ isDark, onToggleTheme, activeSection, brandName, availabilityText, adminLoginUrl }) {
    const [scrolled, setScrolled] = useState(false);
    const [mobileOpen, setMobileOpen] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setScrolled(window.scrollY > 20);
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    const navItems = [
        { href: '#beranda', label: 'Home' },
        { href: '#profil', label: 'Profile' },
        { href: '#capabilities', label: 'Capabilities' },
        { href: '#karya', label: 'Works' },
        { href: '#pendekatan', label: 'Approach' },
        { href: '#sertifikat', label: 'Credentials' },
        { href: '#kontak', label: 'Contact' },
    ];

    const scrollTo = (e, href) => {
        e.preventDefault();
        setMobileOpen(false);
        const target = document.querySelector(href);
        if (target) {
            const top = target.getBoundingClientRect().top + window.pageYOffset - 80;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    };

    return (
        <header
            className={`sticky top-0 z-50 transition-all duration-300 ${
                scrolled
                    ? 'bg-[#fcfbfa]/90 dark:bg-[#0c0d10]/90 backdrop-blur-md shadow-sm border-b border-black/10 dark:border-white/10'
                    : 'bg-[#fcfbfa] dark:bg-[#0c0d10] border-b border-black/5 dark:border-white/5'
            }`}
        >
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex items-center justify-between h-20">
                    {/* Brand */}
                    <a
                        href="#beranda"
                        onClick={(e) => scrollTo(e, '#beranda')}
                        className="group flex items-baseline gap-2 text-decoration-none"
                    >
                        <span className="font-serif text-2xl font-bold tracking-tight text-neutral-900 dark:text-neutral-50 group-hover:opacity-80 transition-opacity">
                            {brandName || 'DANISH'}
                        </span>
                        <span className="text-[10px] uppercase font-mono tracking-widest px-1.5 py-0.5 rounded border border-black/15 dark:border-white/20 text-neutral-500 dark:text-neutral-400">
                            Editorial
                        </span>
                    </a>

                    {/* Desktop Navigation */}
                    <nav className="hidden md:flex items-center gap-7" aria-label="Main Navigation">
                        {navItems.map((item) => {
                            const isActive = activeSection === item.href.replace('#', '');
                            return (
                                <a
                                    key={item.href}
                                    href={item.href}
                                    onClick={(e) => scrollTo(e, item.href)}
                                    className={`relative text-xs uppercase tracking-widest font-mono transition-colors py-1 ${
                                        isActive
                                            ? 'text-neutral-900 dark:text-white font-semibold'
                                            : 'text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white'
                                    }`}
                                >
                                    {item.label}
                                    {isActive && (
                                        <span className="absolute bottom-0 left-0 w-full h-[2px] bg-neutral-900 dark:bg-white animate-fadeIn" />
                                    )}
                                </a>
                            );
                        })}
                    </nav>

                    {/* Right actions */}
                    <div className="flex items-center gap-3">
                        {/* Live availability pill */}
                        <div className="hidden xl:flex items-center gap-2 px-3 py-1.5 rounded-full border border-emerald-500/30 bg-emerald-50/60 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-300 text-xs font-mono">
                            <span className="relative flex h-2 w-2">
                                <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span className="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            <span className="truncate max-w-[170px]">{availabilityText || 'Available 2026/27'}</span>
                        </div>

                        {/* Theme switcher */}
                        <button
                            type="button"
                            onClick={onToggleTheme}
                            aria-label={isDark ? 'Switch to light mode' : 'Switch to dark mode'}
                            className="p-2.5 rounded-full border border-black/10 dark:border-white/15 bg-white/70 dark:bg-neutral-900 text-neutral-800 dark:text-neutral-200 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors shadow-sm"
                        >
                            {isDark ? <Sun className="w-4 h-4 text-amber-400" /> : <Moon className="w-4 h-4 text-neutral-700" />}
                        </button>

                        {/* Admin Link */}
                        <a
                            href={adminLoginUrl || '/admin/login'}
                            className="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-mono uppercase tracking-wider rounded border border-neutral-900 dark:border-white/40 text-neutral-900 dark:text-white hover:bg-neutral-900 hover:text-white dark:hover:bg-white dark:hover:text-neutral-900 transition-all duration-200"
                        >
                            <span>Admin</span>
                            <ArrowUpRight className="w-3.5 h-3.5" />
                        </a>

                        {/* Mobile Menu Button */}
                        <button
                            type="button"
                            onClick={() => setMobileOpen(!mobileOpen)}
                            aria-label="Toggle navigation menu"
                            className="p-2.5 md:hidden rounded-lg border border-black/10 dark:border-white/15 text-neutral-800 dark:text-neutral-200 hover:bg-neutral-100 dark:hover:bg-neutral-800"
                        >
                            {mobileOpen ? <X className="w-5 h-5" /> : <Menu className="w-5 h-5" />}
                        </button>
                    </div>
                </div>
            </div>

            {/* Mobile Drawer */}
            {mobileOpen && (
                <div className="md:hidden border-b border-black/10 dark:border-white/10 bg-[#fcfbfa] dark:bg-[#0c0d10] px-4 pt-3 pb-6 animate-slideDown">
                    <div className="flex flex-col gap-3">
                        <div className="flex items-center gap-2 px-3 py-2 mb-2 rounded border border-emerald-500/20 bg-emerald-50/50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-300 text-xs font-mono">
                            <span className="relative flex h-2 w-2">
                                <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span className="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            <span>{availabilityText || 'Available for collaboration'}</span>
                        </div>

                        {navItems.map((item) => (
                            <a
                                key={item.href}
                                href={item.href}
                                onClick={(e) => scrollTo(e, item.href)}
                                className="flex items-center justify-between px-3 py-2 text-sm font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 hover:bg-black/5 dark:hover:bg-white/5 rounded transition-colors"
                            >
                                <span>{item.label}</span>
                                <ArrowUpRight className="w-4 h-4 opacity-50" />
                            </a>
                        ))}

                        <div className="pt-2 border-t border-black/10 dark:border-white/10 mt-2">
                            <a
                                href={adminLoginUrl || '/admin/login'}
                                className="flex items-center justify-center gap-2 w-full py-2.5 text-xs font-mono uppercase tracking-wider bg-neutral-900 text-white dark:bg-white dark:text-neutral-900 rounded"
                            >
                                <span>Dashboard Admin</span>
                                <ArrowUpRight className="w-3.5 h-3.5" />
                            </a>
                        </div>
                    </div>
                </div>
            )}
        </header>
    );
}
