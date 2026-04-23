// ============================================
// VRF Klima — Main JavaScript
// ============================================

document.addEventListener('DOMContentLoaded', () => {

    // -- Header Scroll Effect --
    const header = document.querySelector('header');
    if (header) {
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const y = window.scrollY;
            header.classList.toggle('scrolled', y > 40);
            lastScroll = y;
        }, { passive: true });
    }

    // -- Mobile Menu Toggle --
    const menuBtn = document.getElementById('mobile-menu-btn');
    const nav = document.getElementById('main-nav');
    if (menuBtn && nav) {
        menuBtn.addEventListener('click', () => {
            nav.classList.toggle('open');
            const icon = menuBtn.querySelector('.material-symbols-outlined');
            if (icon) icon.textContent = nav.classList.contains('open') ? 'close' : 'menu';
        });
        // Close on link click
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('open');
                const icon = menuBtn.querySelector('.material-symbols-outlined');
                if (icon) icon.textContent = 'menu';
            });
        });
    }

    // -- FAQ Accordion --
    document.querySelectorAll('.faq-q').forEach(btn => {
        btn.addEventListener('click', () => {
            const answer = btn.nextElementSibling;
            const isOpen = btn.classList.contains('active');

            // Close all others
            document.querySelectorAll('.faq-q.active').forEach(other => {
                if (other !== btn) {
                    other.classList.remove('active');
                    other.nextElementSibling.style.maxHeight = null;
                }
            });

            btn.classList.toggle('active');
            answer.style.maxHeight = isOpen ? null : answer.scrollHeight + 'px';
        });
    });

    // -- Smooth Scroll --
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // -- Service Accordion (if any) --
    document.querySelectorAll('.service-accordion-head').forEach(btn => {
        btn.addEventListener('click', () => {
            const body = btn.nextElementSibling;
            btn.classList.toggle('active');
            body.style.maxHeight = btn.classList.contains('active') ? body.scrollHeight + 'px' : null;
        });
    });

    // -- Intersection Observer for animations --
    const animElements = document.querySelectorAll('.stat-card, .product-card, .service-tile, .region-card, .sector-card, .indoor-card, .tech-feature, .review-card, .brand-card, .blog-card');
    if ('IntersectionObserver' in window && animElements.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(24px)';
            el.style.transition = 'opacity .6s ease, transform .6s ease';
            observer.observe(el);
        });
    }

});
