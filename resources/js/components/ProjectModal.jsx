import React, { useEffect } from 'react';
import { X, ExternalLink, ArrowUpRight, Calendar, Tag, ShieldCheck } from 'lucide-react';

export default function ProjectModal({ project, imagePreview, onClose }) {
    useEffect(() => {
        const handleKeyDown = (e) => {
            if (e.key === 'Escape') onClose();
        };
        window.addEventListener('keydown', handleKeyDown);
        document.body.style.overflow = 'hidden';

        return () => {
            window.removeEventListener('keydown', handleKeyDown);
            document.body.style.overflow = 'unset';
        };
    }, [onClose]);

    if (!project && !imagePreview) return null;

    return (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 md:p-10 bg-black/70 backdrop-blur-sm animate-fadeIn">
            {/* Backdrop click */}
            <div className="absolute inset-0" onClick={onClose} />

            <div className="relative z-10 w-full max-w-4xl max-h-[90vh] overflow-y-auto border border-black/20 dark:border-white/20 bg-white dark:bg-neutral-900 shadow-2xl p-6 sm:p-8 md:p-10 animate-scaleUp">
                {/* Close Button */}
                <button
                    type="button"
                    onClick={onClose}
                    aria-label="Close modal"
                    className="absolute top-6 right-6 p-2 rounded-full border border-black/15 dark:border-white/20 text-neutral-800 dark:text-neutral-200 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                >
                    <X className="w-5 h-5" />
                </button>

                {imagePreview ? (
                    /* Simple Image Preview Lightbox */
                    <div className="space-y-4">
                        <span className="text-xs font-mono uppercase tracking-widest text-neutral-400 block">
                            CREDENTIAL PREVIEW
                        </span>
                        <h3 className="font-serif text-2xl font-normal text-neutral-900 dark:text-white">
                            {imagePreview.title}
                        </h3>
                        <div className="border border-black/10 dark:border-white/10 overflow-hidden bg-neutral-950 flex items-center justify-center max-h-[70vh]">
                            <img
                                src={imagePreview.url}
                                alt={imagePreview.title}
                                className="max-w-full max-h-[70vh] object-contain"
                            />
                        </div>
                    </div>
                ) : (
                    /* Detailed Project Modal */
                    <div className="space-y-6">
                        {/* Header metadata */}
                        <div className="flex flex-wrap items-center gap-3 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                            <span className="px-2.5 py-1 border border-black/15 dark:border-white/20 uppercase tracking-widest bg-neutral-50 dark:bg-neutral-800">
                                {project.category || 'PROJECT'}
                            </span>
                            <span>•</span>
                            <span className="flex items-center gap-1">
                                <Calendar className="w-3.5 h-3.5" />
                                {project.year || '2026'}
                            </span>
                        </div>

                        <h3 className="font-serif text-3xl sm:text-4xl font-normal text-neutral-900 dark:text-white leading-tight">
                            {project.title}
                        </h3>

                        {/* Image */}
                        <div className="aspect-[16/9] w-full overflow-hidden bg-neutral-100 dark:bg-neutral-800 border border-black/10 dark:border-white/10">
                            <img
                                src={project.image}
                                alt={project.title}
                                className="w-full h-full object-cover"
                            />
                        </div>

                        {/* Description */}
                        <div className="space-y-4 text-base font-sans font-light leading-relaxed text-neutral-700 dark:text-neutral-300">
                            <p>{project.description}</p>
                        </div>

                        {/* Tags */}
                        {project.tags && project.tags.length > 0 && (
                            <div className="pt-4 border-t border-black/10 dark:border-white/10">
                                <span className="text-[10px] font-mono uppercase tracking-widest text-neutral-400 block mb-2">
                                    Technologies & Competencies
                                </span>
                                <div className="flex flex-wrap gap-2">
                                    {project.tags.map((t, idx) => (
                                        <span
                                            key={idx}
                                            className="text-xs font-mono px-3 py-1 border border-black/15 dark:border-white/20 bg-neutral-100 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-200"
                                        >
                                            {t}
                                        </span>
                                    ))}
                                </div>
                            </div>
                        )}

                        {/* Modal Actions */}
                        <div className="pt-4 flex flex-wrap items-center justify-between gap-4">
                            <button
                                type="button"
                                onClick={onClose}
                                className="px-5 py-2.5 border border-black/20 dark:border-white/20 text-xs font-mono uppercase tracking-widest hover:border-black dark:hover:border-white transition-colors"
                            >
                                Close Window
                            </button>

                            {project.link && project.link !== '#' && (
                                <a
                                    href={project.link}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="inline-flex items-center gap-2 px-6 py-2.5 bg-neutral-900 text-white dark:bg-white dark:text-neutral-900 text-xs font-mono uppercase tracking-widest hover:opacity-90 transition-opacity"
                                >
                                    <span>Visit Live Project</span>
                                    <ExternalLink className="w-3.5 h-3.5" />
                                </a>
                            )}
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}
