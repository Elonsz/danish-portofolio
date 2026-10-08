import React, { useState } from 'react';
import { Mail, MapPin, Send, CheckCircle2, AlertCircle, ArrowUpRight, MessageSquare, Phone } from 'lucide-react';

export default function Contact({ contact, profile, csrfToken }) {
    const [formState, setFormState] = useState({
        name: '',
        email: '',
        subject: '',
        message: '',
    });
    const [status, setStatus] = useState('idle'); // 'idle' | 'loading' | 'success' | 'error'
    const [responseMessage, setResponseMessage] = useState('');

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormState((prev) => ({ ...prev, [name]: value }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setStatus('loading');
        setResponseMessage('');

        try {
            const response = await fetch('/kontak', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken || '',
                },
                body: JSON.stringify(formState),
            });

            const data = await response.json().catch(() => ({}));

            if (response.ok) {
                setStatus('success');
                setResponseMessage(data.message || 'Terima kasih, pesan Anda telah berhasil dikirim!');
                setFormState({ name: '', email: '', subject: '', message: '' });
            } else {
                setStatus('error');
                setResponseMessage(data.message || 'Gagal mengirim pesan. Silakan periksa kembali data Anda.');
            }
        } catch (err) {
            setStatus('error');
            setResponseMessage('Terjadi gangguan koneksi. Silakan hubungi langsung via email.');
        }
    };

    return (
        <section id="kontak" className="py-20 md:py-28 border-b border-black/10 dark:border-white/10 bg-[#fcfbfa] dark:bg-[#0c0d10]">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Section Header */}
                <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-8 mb-12 border-b border-black/10 dark:border-white/10">
                    <div>
                        <span className="text-xs uppercase tracking-[0.25em] font-mono text-neutral-500 dark:text-neutral-400">
                            SECTION 06 // INQUIRIES & COLLABORATION
                        </span>
                        <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 dark:text-white mt-2">
                            Start a Conversation
                        </h2>
                    </div>
                    <p className="text-xs font-mono uppercase tracking-widest text-neutral-500 dark:text-neutral-400 max-w-xs">
                        OPEN FOR FREELANCE & COLLABORATIVE COMMISSIONS
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    {/* Left: Contact Info & Editorial Details */}
                    <div className="lg:col-span-5 space-y-8">
                        <div>
                            <h3 className="font-serif text-2xl sm:text-3xl font-normal text-neutral-900 dark:text-white">
                                Let's build something remarkable.
                            </h3>
                            <p className="mt-3 text-base font-sans font-light leading-relaxed text-neutral-600 dark:text-neutral-300">
                                Tertarik untuk berkolaborasi dalam proyek web, mendiskusikan konsep desain editorial, atau sekadar bertukar ide tentang teknologi dan basket? Jangan ragu untuk mengirimkan pesan.
                            </p>
                        </div>

                        {/* Contact Meta List */}
                        <div className="space-y-4 border-t border-b border-black/10 dark:border-white/10 py-6 text-xs font-mono">
                            <div className="flex items-start gap-4">
                                <Mail className="w-4 h-4 text-neutral-500 dark:text-neutral-400 mt-0.5" />
                                <div>
                                    <span className="text-neutral-400 block uppercase tracking-wider text-[10px]">Direct Email</span>
                                    <a
                                        href={`mailto:${contact?.email || 'danish.shirazy@example.com'}`}
                                        className="text-neutral-900 dark:text-white font-semibold hover:underline"
                                    >
                                        {contact?.email || 'danish.shirazy@example.com'}
                                    </a>
                                </div>
                            </div>

                            <div className="flex items-start gap-4">
                                <MapPin className="w-4 h-4 text-neutral-500 dark:text-neutral-400 mt-0.5" />
                                <div>
                                    <span className="text-neutral-400 block uppercase tracking-wider text-[10px]">Location & Studio</span>
                                    <span className="text-neutral-900 dark:text-white font-semibold">
                                        {contact?.location || 'Banjarbaru, Kalimantan Selatan, Indonesia'}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {/* Social Links */}
                        <div>
                            <span className="text-[10px] font-mono uppercase tracking-widest text-neutral-400 block mb-3">
                                Connect on Networks
                            </span>
                            <div className="flex flex-wrap gap-2">
                                {(contact?.socials || [
                                    { name: 'GitHub', url: 'https://github.com' },
                                    { name: 'LinkedIn', url: 'https://linkedin.com' },
                                    { name: 'Instagram', url: 'https://instagram.com' },
                                ]).map((s, idx) => (
                                    <a
                                        key={idx}
                                        href={s.url}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="inline-flex items-center gap-1.5 px-3 py-1.5 border border-black/15 dark:border-white/20 text-xs font-mono uppercase text-neutral-800 dark:text-neutral-200 hover:border-black dark:hover:border-white transition-colors"
                                    >
                                        <span>{s.name}</span>
                                        <ArrowUpRight className="w-3.5 h-3.5 opacity-60" />
                                    </a>
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Right: Interactive Contact Form */}
                    <div className="lg:col-span-7">
                        <div className="border border-black/15 dark:border-white/20 bg-white dark:bg-neutral-900 p-6 sm:p-10 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.05)] dark:shadow-[8px_8px_0px_0px_rgba(255,255,255,0.04)]">
                            <div className="flex items-center justify-between pb-4 border-b border-black/10 dark:border-white/10 mb-6 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                                <span>INQUIRY FORM</span>
                                <span>ONLINE TRANSMISSION</span>
                            </div>

                            {status === 'success' ? (
                                <div className="py-12 text-center space-y-4 animate-fadeIn">
                                    <div className="w-12 h-12 mx-auto rounded-full bg-emerald-100 dark:bg-emerald-950/80 flex items-center justify-center text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        <CheckCircle2 className="w-6 h-6" />
                                    </div>
                                    <h4 className="font-serif text-2xl font-normal text-neutral-900 dark:text-white">
                                        Transmission Received
                                    </h4>
                                    <p className="text-sm font-sans text-neutral-600 dark:text-neutral-300 max-w-md mx-auto">
                                        {responseMessage || 'Terima kasih, pesan Anda telah sampai. Saya akan segera membaca dan merespons dalam waktu 1x24 jam.'}
                                    </p>
                                    <button
                                        type="button"
                                        onClick={() => setStatus('idle')}
                                        className="mt-4 px-5 py-2.5 border border-neutral-900 dark:border-white text-xs font-mono uppercase tracking-widest hover:bg-neutral-900 hover:text-white dark:hover:bg-white dark:hover:text-neutral-900 transition-colors"
                                    >
                                        Kirim Pesan Lain
                                    </button>
                                </div>
                            ) : (
                                <form onSubmit={handleSubmit} className="space-y-5">
                                    {status === 'error' && (
                                        <div className="p-3 border border-red-500/30 bg-red-50 dark:bg-red-950/40 text-red-700 dark:text-red-300 text-xs font-mono flex items-center gap-2">
                                            <AlertCircle className="w-4 h-4 flex-none" />
                                            <span>{responseMessage}</span>
                                        </div>
                                    )}

                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div>
                                            <label className="block text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 mb-2">
                                                Your Name *
                                            </label>
                                            <input
                                                type="text"
                                                name="name"
                                                required
                                                placeholder="e.g. Alex Morgan"
                                                value={formState.name}
                                                onChange={handleChange}
                                                className="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-transparent text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors"
                                            />
                                        </div>

                                        <div>
                                            <label className="block text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 mb-2">
                                                Email Address *
                                            </label>
                                            <input
                                                type="email"
                                                name="email"
                                                required
                                                placeholder="alex@domain.com"
                                                value={formState.email}
                                                onChange={handleChange}
                                                className="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-transparent text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label className="block text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 mb-2">
                                            Subject / Inquiry Topic
                                        </label>
                                        <input
                                            type="text"
                                            name="subject"
                                            placeholder="Web Development, Collaboration, or Question"
                                            value={formState.subject}
                                            onChange={handleChange}
                                            className="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-transparent text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors"
                                        />
                                    </div>

                                    <div>
                                        <label className="block text-xs font-mono uppercase tracking-wider text-neutral-700 dark:text-neutral-300 mb-2">
                                            Message *
                                        </label>
                                        <textarea
                                            name="message"
                                            required
                                            rows={5}
                                            placeholder="Write your note, idea, or questions here..."
                                            value={formState.message}
                                            onChange={handleChange}
                                            className="w-full px-3.5 py-3 text-sm font-sans border border-black/15 dark:border-white/20 bg-transparent text-neutral-900 dark:text-white placeholder:text-neutral-400 focus:outline-none focus:border-neutral-900 dark:focus:border-white transition-colors resize-y"
                                        />
                                    </div>

                                    <div className="pt-2 flex items-center justify-between">
                                        <span className="text-[11px] font-mono text-neutral-400">
                                            * All fields handled securely
                                        </span>

                                        <button
                                            type="submit"
                                            disabled={status === 'loading'}
                                            className="inline-flex items-center gap-2 px-7 py-3.5 border border-neutral-900 bg-neutral-900 text-white dark:border-white dark:bg-white dark:text-neutral-900 text-xs font-mono uppercase tracking-widest hover:bg-neutral-800 dark:hover:bg-neutral-100 disabled:opacity-50 transition-all cursor-pointer"
                                        >
                                            {status === 'loading' ? (
                                                <span>Transmitting...</span>
                                            ) : (
                                                <>
                                                    <span>Send Transmission</span>
                                                    <Send className="w-3.5 h-3.5" />
                                                </>
                                            )}
                                        </button>
                                    </div>
                                </form>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}
