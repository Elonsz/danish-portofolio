import React, { useState } from 'react';
import { Award, Search, Copy, Check, ExternalLink, ArrowUpRight, ShieldCheck } from 'lucide-react';

export default function CertificatesSection({ certificates, adminLoginUrl, onPreviewImage }) {
    const [searchTerm, setSearchTerm] = useState('');
    const [copiedId, setCopiedId] = useState(null);

    const certList = certificates || [];

    const filtered = certList.filter((c) => {
        const query = searchTerm.toLowerCase();
        return (
            (c.title && c.title.toLowerCase().includes(query)) ||
            (c.issuer && c.issuer.toLowerCase().includes(query)) ||
            (c.badge && c.badge.toLowerCase().includes(query)) ||
            (c.credential_id && c.credential_id.toLowerCase().includes(query))
        );
    });

    const handleCopy = (id) => {
        if (!id) return;
        navigator.clipboard.writeText(id);
        setCopiedId(id);
        setTimeout(() => setCopiedId(null), 2000);
    };

    return (
        <section id="sertifikat" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 mb-10 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 05 // CREDENTIALS & VALIDATION
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            Certificates & Honors
                        </h2>
                    </div>

                    <div className="flex flex-wrap items-center gap-3">
                        {/* Search Input */}
                        <div className="relative min-w-[220px]">
                            <Search className="w-3.5 h-3.5 absolute left-3 top-1/2 -translate-y-1/2 text-neutral-400" />
                            <input
                                type="text"
                                placeholder="Search credentials..."
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                                className="w-full pl-9 pr-3 py-1.5 text-xs font-mono border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white"
                            />
                        </div>

                        {/* Admin Link */}
                        <a
                            href={adminLoginUrl || '/admin/login'}
                            className="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-mono uppercase tracking-wider border border-black/15 dark:border-white/20 hover:border-black dark:hover:border-white transition-colors"
                        >
                            <span>Manage</span>
                            <ArrowUpRight className="w-3.5 h-3.5" />
                        </a>
                    </div>
                </div>

                {/* Certificates Grid */}
                {filtered.length === 0 ? (
                    <div className="py-16 text-center border border-dashed border-black/20 dark:border-white/20 p-8">
                        <Award className="w-10 h-10 mx-auto text-neutral-400 mb-3 opacity-60" />
                        <h4 className="font-serif text-xl font-normal text-neutral-900 dark:text-white">
                            {searchTerm ? 'No matching certificates found' : 'Belum ada sertifikat terpublikasi'}
                        </h4>
                        <p className="text-xs font-mono text-neutral-500 dark:text-neutral-400 mt-1 max-w-sm mx-auto">
                            {searchTerm
                                ? 'Coba cari dengan kata kunci penerbit atau nama sertifikat lain.'
                                : 'Masuk ke dashboard admin untuk menambahkan sertifikat keahlian dan pencapaian Anda.'}
                        </p>
                        <a
                            href={adminLoginUrl || '/admin/login'}
                            className="inline-block mt-4 text-xs font-mono uppercase tracking-widest text-neutral-900 dark:text-white underline underline-offset-4"
                        >
                            Ke Dashboard Admin →
                        </a>
                    </div>
                ) : (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        {filtered.map((cert, index) => (
                            <article
                                key={index}
                                className="group border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 flex flex-col justify-between p-5 transition-all hover:-translate-y-1 duration-300 shadow-[4px_4px_0px_0px_rgba(0,0,0,0.05)] dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,0.04)]"
                            >
                                <div>
                                    {/* Image or Fallback Header */}
                                    {cert.image ? (
                                        <div
                                            className="aspect-[16/10] overflow-hidden bg-neutral-100 dark:bg-neutral-800 border border-black/10 dark:border-white/10 mb-4 cursor-pointer relative"
                                            onClick={() => onPreviewImage && onPreviewImage(cert.image, cert.title)}
                                        >
                                            <img
                                                src={cert.image}
                                                alt={cert.title}
                                                className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            />
                                            <span className="absolute bottom-2 right-2 px-2 py-0.5 bg-black/80 text-white text-[9px] font-mono tracking-widest uppercase backdrop-blur-xs">
                                                Enlarge
                                            </span>
                                        </div>
                                    ) : (
                                        <div className="aspect-[16/10] bg-neutral-100 dark:bg-neutral-800/60 border border-black/10 dark:border-white/10 mb-4 flex items-center justify-center p-6 text-center">
                                            <Award className="w-8 h-8 text-neutral-400" />
                                        </div>
                                    )}

                                    {/* Meta pills */}
                                    <div className="flex items-center justify-between text-xs font-mono text-neutral-500 dark:text-neutral-400 mb-2">
                                        <span className="px-2 py-0.5 border border-emerald-500/30 text-emerald-700 dark:text-emerald-300 bg-emerald-50/50 dark:bg-emerald-950/30 text-[10px] uppercase font-semibold">
                                            {cert.badge || 'Verified'}
                                        </span>
                                        <span>{cert.date}</span>
                                    </div>

                                    {/* Title & Issuer */}
                                    <h3 className="font-serif text-xl font-normal text-neutral-900 dark:text-white mt-2 leading-snug">
                                        {cert.title}
                                    </h3>
                                    <p className="text-xs font-mono text-neutral-500 dark:text-neutral-400 mt-1">
                                        Issued by {cert.issuer}
                                    </p>

                                    {cert.description && (
                                        <p className="text-sm font-sans font-light text-neutral-600 dark:text-neutral-300 mt-3 line-clamp-3">
                                            {cert.description}
                                        </p>
                                    )}
                                </div>

                                {/* Footer: Credential ID */}
                                {cert.credential_id && (
                                    <div className="mt-5 pt-3 border-t border-black/10 dark:border-white/10 flex items-center justify-between text-[11px] font-mono text-neutral-500 dark:text-neutral-400">
                                        <span className="truncate max-w-[160px]">ID: {cert.credential_id}</span>
                                        <button
                                            type="button"
                                            onClick={() => handleCopy(cert.credential_id)}
                                            className="flex items-center gap-1 hover:text-neutral-900 dark:hover:text-white"
                                            title="Copy credential ID"
                                        >
                                            {copiedId === cert.credential_id ? (
                                                <>
                                                    <Check className="w-3 h-3 text-emerald-500" />
                                                    <span className="text-emerald-500 font-bold">Copied</span>
                                                </>
                                            ) : (
                                                <>
                                                    <Copy className="w-3 h-3" />
                                                    <span>Copy</span>
                                                </>
                                            )}
                                        </button>
                                    </div>
                                )}
                            </article>
                        ))}
                    </div>
                )}
            </div>
        </section>
    );
}
