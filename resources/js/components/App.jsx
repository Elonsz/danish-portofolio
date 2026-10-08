import React, { useState, useEffect } from 'react';
import Navbar from './Navbar';
import Hero from './Hero';
import ProfileEditorial from './ProfileEditorial';
import Capabilities from './Capabilities';
import SelectedWorks from './SelectedWorks';
import Approach from './Approach';
import CertificatesSection from './CertificatesSection';
import Contact from './Contact';
import Footer from './Footer';
import ProjectModal from './ProjectModal';

export default function App({ initialData, csrfToken }) {
    const portfolio = initialData || {};
    const { brand, profile, about, editorial, capabilities, projects, certificates, contact } = portfolio;

    // Theme state
    const [isDark, setIsDark] = useState(() => {
        if (typeof window !== 'undefined') {
            const saved = localStorage.getItem('color-theme');
            if (saved) return saved === 'dark';
            return window.matchMedia('(prefers-color-scheme: dark)').matches;
        }
        return false;
    });

    // Active Section Tracking
    const [activeSection, setActiveSection] = useState('beranda');

    // Modals
    const [selectedProject, setSelectedProject] = useState(null);
    const [previewImage, setPreviewImage] = useState(null);

    // Apply dark class
    useEffect(() => {
        if (isDark) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    }, [isDark]);

    const toggleTheme = () => {
        setIsDark((prev) => !prev);
    };

    // Scroll spy for navigation
    useEffect(() => {
        const sections = ['beranda', 'profil', 'capabilities', 'karya', 'pendekatan', 'sertifikat', 'kontak'];
        const handleScroll = () => {
            const scrollPos = window.scrollY + 200;
            for (let i = sections.length - 1; i >= 0; i--) {
                const el = document.getElementById(sections[i]);
                if (el && el.offsetTop <= scrollPos) {
                    setActiveSection(sections[i]);
                    break;
                }
            }
        };

        window.addEventListener('scroll', handleScroll, { passive: true });
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    return (
        <div className="min-h-screen bg-[#fcfbfa] dark:bg-[#0c0d10] text-neutral-900 dark:text-neutral-100 font-sans selection:bg-neutral-900 selection:text-white dark:selection:bg-white dark:selection:text-neutral-900 transition-colors duration-300">
            {/* Editorial Sticky Navigation */}
            <Navbar
                isDark={isDark}
                onToggleTheme={toggleTheme}
                activeSection={activeSection}
                brandName={brand?.name || profile?.nickname || 'DANISH'}
                availabilityText={profile?.status_badge || brand?.availability}
                adminLoginUrl="/admin/login"
            />

            {/* Main Content Sections */}
            <main>
                <Hero profile={profile} editorial={editorial} />
                <ProfileEditorial profile={profile} about={about} />
                <Capabilities capabilities={capabilities} />
                <SelectedWorks
                    projects={projects}
                    onSelectProject={(proj) => {
                        setSelectedProject(proj);
                        setPreviewImage(null);
                    }}
                />
                <Approach editorial={editorial} />
                <CertificatesSection
                    certificates={certificates}
                    adminLoginUrl="/admin/login"
                    onPreviewImage={(url, title) => {
                        setPreviewImage({ url, title });
                        setSelectedProject(null);
                    }}
                />
                <Contact contact={contact} profile={profile} csrfToken={csrfToken} />
            </main>

            {/* Editorial Footer */}
            <Footer profile={profile} brand={brand} />

            {/* Interactive Modals */}
            <ProjectModal
                project={selectedProject}
                imagePreview={previewImage}
                onClose={() => {
                    setSelectedProject(null);
                    setPreviewImage(null);
                }}
            />
        </div>
    );
}
