import './bootstrap';

// Inisialisasi Tema (Dark Mode / Light Mode)
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initMobileMenu();
    initScrollSpy();
    initProjectFilter();
    initModals();
    initContactForm();
    initBackToTop();
    initEmailCopy();

    // Trigger lucide icon creation if lucide is loaded
    if (window.lucide) {
        window.lucide.createIcons();
    }
});

/**
 * Pengaturan Dark Mode / Light Mode
 */
function initTheme() {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');

    const updateIcons = (isDark) => {
        document.querySelectorAll('.theme-icon-sun').forEach(el => el.classList.toggle('hidden', !isDark));
        document.querySelectorAll('.theme-icon-moon').forEach(el => el.classList.toggle('hidden', isDark));
    };

    const isDarkMode = localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);

    if (isDarkMode) {
        document.documentElement.classList.add('dark');
        updateIcons(true);
    } else {
        document.documentElement.classList.remove('dark');
        updateIcons(false);
    }

    const toggleTheme = () => {
        const isCurrentDark = document.documentElement.classList.contains('dark');
        if (isCurrentDark) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            updateIcons(false);
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
            updateIcons(true);
        }
    };

    if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
    if (themeToggleMobileBtn) themeToggleMobileBtn.addEventListener('click', toggleTheme);
}

/**
 * Mobile Navigation Menu Toggle
 */
function initMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isExpanded = mobileMenu.classList.toggle('hidden');
            const icon = mobileMenuBtn.querySelector('i');
            if (icon) {
                icon.setAttribute('data-lucide', isExpanded ? 'menu' : 'x');
                if (window.lucide) window.lucide.createIcons();
            }
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }
}

/**
 * Active navigation highlight saat scroll
 */
function initScrollSpy() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        const scrollPosition = window.pageYOffset + 150;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('text-blue-600', 'dark:text-blue-400', 'font-semibold');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('text-blue-600', 'dark:text-blue-400', 'font-semibold');
            }
        });
    });
}

/**
 * Filter Kategori Proyek
 */
function initProjectFilter() {
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');

            // Update active state tab
            filterButtons.forEach(b => {
                b.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
                b.classList.add('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
            });
            btn.classList.add('bg-blue-600', 'text-white', 'shadow-md');
            btn.classList.remove('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');

            // Filter item cards
            projectCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    card.style.display = 'flex';
                    card.classList.add('animate-fadeIn');
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
}

/**
 * Modal Proyek & Sertifikat
 */
function initModals() {
    // Project Modal elements
    const projectModal = document.getElementById('project-modal');
    const closeProjectModalBtn = document.getElementById('close-project-modal');
    const projectModalOverlay = document.getElementById('project-modal-overlay');

    // Certificate Modal elements
    const certModal = document.getElementById('cert-modal');
    const closeCertModalBtn = document.getElementById('close-cert-modal');
    const certModalOverlay = document.getElementById('cert-modal-overlay');

    // Open Project Modal
    document.querySelectorAll('.open-project-modal').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const projectDataRaw = btn.getAttribute('data-project');
            if (!projectDataRaw) return;

            try {
                const project = JSON.parse(projectDataRaw);
                document.getElementById('modal-project-title').textContent = project.title;
                document.getElementById('modal-project-category').textContent = project.category_label || project.category;
                document.getElementById('modal-project-date').textContent = project.date || '';
                document.getElementById('modal-project-img').src = project.image;
                document.getElementById('modal-project-img').alt = project.title;
                document.getElementById('modal-project-desc').textContent = project.description || project.summary;

                // Render features list
                const featuresList = document.getElementById('modal-project-features');
                featuresList.innerHTML = '';
                if (project.features && project.features.length) {
                    project.features.forEach(feat => {
                        const li = document.createElement('li');
                        li.className = 'flex items-start gap-2 text-sm text-slate-600 dark:text-slate-300';
                        li.innerHTML = `<span class="mt-1.5 h-1.5 w-1.5 flex-none rounded-full bg-blue-500" aria-hidden="true"></span> <span>${feat}</span>`;
                        featuresList.appendChild(li);
                    });
                }

                // Render tags
                const tagsContainer = document.getElementById('modal-project-tags');
                tagsContainer.innerHTML = '';
                if (project.tags && project.tags.length) {
                    project.tags.forEach(tag => {
                        const span = document.createElement('span');
                        span.className = 'px-2.5 py-1 text-xs font-medium rounded-full bg-blue-50 dark:bg-blue-900/40 text-blue-600 dark:text-blue-300 border border-blue-200 dark:border-blue-800';
                        span.textContent = tag;
                        tagsContainer.appendChild(span);
                    });
                }

                // Links
                const demoLink = document.getElementById('modal-project-demo');
                const githubLink = document.getElementById('modal-project-github');
                if (demoLink) demoLink.href = project.demo_url || '#';
                if (githubLink) githubLink.href = project.github_url || '#';

                projectModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } catch (err) {
                console.error('Error parsing project data:', err);
            }
        });
    });

    const closeProjectModal = () => {
        if (projectModal) {
            projectModal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    if (closeProjectModalBtn) closeProjectModalBtn.addEventListener('click', closeProjectModal);
    if (projectModalOverlay) projectModalOverlay.addEventListener('click', closeProjectModal);

    // Open Certificate Modal
    document.querySelectorAll('.open-cert-modal').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const certDataRaw = btn.getAttribute('data-cert');
            if (!certDataRaw) return;

            try {
                const cert = JSON.parse(certDataRaw);
                document.getElementById('modal-cert-title').textContent = cert.title;
                document.getElementById('modal-cert-issuer').textContent = cert.issuer;
                document.getElementById('modal-cert-date').textContent = cert.date;
                document.getElementById('modal-cert-id').textContent = cert.id_credential || '-';
                document.getElementById('modal-cert-img').src = cert.image;
                document.getElementById('modal-cert-desc').textContent = cert.description || '';

                certModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } catch (err) {
                console.error('Error parsing cert data:', err);
            }
        });
    });

    const closeCertModal = () => {
        if (certModal) {
            certModal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    if (closeCertModalBtn) closeCertModalBtn.addEventListener('click', closeCertModal);
    if (certModalOverlay) certModalOverlay.addEventListener('click', closeCertModal);

    // Close modals on Esc key
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeProjectModal();
            closeCertModal();
        }
    });
}

/**
 * Contact form helper (WhatsApp & Local Feedback)
 */
function initContactForm() {
    const form = document.getElementById('contact-form');
    const sendWhatsAppBtn = document.getElementById('send-whatsapp-btn');
    const waNumber = form ? form.getAttribute('data-whatsapp') : '';

    if (sendWhatsAppBtn && form) {
        sendWhatsAppBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const name = document.getElementById('contact-name').value.trim();
            const email = document.getElementById('contact-email').value.trim();
            const subject = document.getElementById('contact-subject').value.trim();
            const message = document.getElementById('contact-message').value.trim();

            if (!name || !message) {
                alert('Silakan isi Nama dan Pesan terlebih dahulu sebelum mengirim via WhatsApp.');
                return;
            }

            const waText = `Halo Danish!\n\nNama: ${name}\nEmail: ${email}\nSubjek: ${subject || 'Tanya Portofolio'}\n\nPesan:\n${message}`;
            const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(waText)}`;
            window.open(waUrl, '_blank');
        });
    }
}

/**
 * Back to Top Button
 */
function initBackToTop() {
    const backToTopBtn = document.getElementById('back-to-top');
    if (!backToTopBtn) return;

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 400) {
            backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            backToTopBtn.classList.add('opacity-100', 'pointer-events-auto');
        } else {
            backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            backToTopBtn.classList.remove('opacity-100', 'pointer-events-auto');
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/**
 * Quick copy email to clipboard
 */
function initEmailCopy() {
    const copyBtns = document.querySelectorAll('.copy-email-btn');
    copyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const email = btn.getAttribute('data-email');
            if (navigator.clipboard && email) {
                navigator.clipboard.writeText(email).then(() => {
                    const originalText = btn.innerHTML;
                    btn.innerHTML = `<span class="text-green-500 font-semibold">Tersalin</span>`;
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        if (window.lucide) window.lucide.createIcons();
                    }, 2000);
                });
            }
        });
    });
}
