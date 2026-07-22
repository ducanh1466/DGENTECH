/* ============================================
   DGENTECH — Main JavaScript
   ============================================ */

document.addEventListener('DOMContentLoaded', function () {

    // ==========================================
    // DARK / LIGHT MODE TOGGLE
    // ==========================================
    const themeToggleBtns = document.querySelectorAll('.theme-toggle');
    const savedTheme = localStorage.getItem('dgentech-theme') || 'light';

    // Apply saved theme
    document.documentElement.setAttribute('data-theme', savedTheme);

    themeToggleBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('dgentech-theme', newTheme);
        });
    });


    // ==========================================
    // NAVBAR SCROLL EFFECT
    // ==========================================
    const mainNavbar = document.querySelector('.main-navbar');
    if (mainNavbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        });
    }


    // ==========================================
    // BACK TO TOP BUTTON
    // ==========================================
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }


    // ==========================================
    // MOBILE SEARCH TOGGLE
    // ==========================================
    const searchToggleBtn = document.getElementById('searchToggle');
    const searchBox = document.querySelector('.search-box');
    if (searchToggleBtn && searchBox) {
        searchToggleBtn.addEventListener('click', function () {
            searchBox.classList.toggle('active');
        });
    }


    // ==========================================
    // PRODUCT GALLERY — THUMBNAIL CLICK
    // ==========================================
    const thumbItems = document.querySelectorAll('.thumb-item');
    const mainImage = document.getElementById('mainProductImage');
    if (thumbItems.length > 0 && mainImage) {
        thumbItems.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                // Remove active from all
                thumbItems.forEach(function (t) { t.classList.remove('active'); });
                // Set active on clicked
                thumb.classList.add('active');
                // Update main image
                const newSrc = thumb.querySelector('img').getAttribute('data-full');
                if (newSrc) {
                    mainImage.src = newSrc;
                }
            });
        });
    }


    // ==========================================
    // QUANTITY SELECTOR
    // ==========================================
    document.querySelectorAll('.quantity-selector').forEach(function (selector) {
        const minusBtn = selector.querySelector('.qty-minus');
        const plusBtn = selector.querySelector('.qty-plus');
        const input = selector.querySelector('.qty-input');

        if (minusBtn && plusBtn && input) {
            minusBtn.addEventListener('click', function () {
                let val = parseInt(input.value) || 1;
                if (val > 1) {
                    input.value = val - 1;
                    input.dispatchEvent(new Event('change'));
                }
            });

            plusBtn.addEventListener('click', function () {
                let val = parseInt(input.value) || 1;
                input.value = val + 1;
                input.dispatchEvent(new Event('change'));
            });

            input.addEventListener('change', function () {
                let val = parseInt(input.value);
                if (isNaN(val) || val < 1) input.value = 1;
            });
        }
    });


    // ==========================================
    // ANIMATE ON SCROLL (Simple IntersectionObserver)
    // ==========================================
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    if (animateElements.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(function (el) {
            observer.observe(el);
        });
    }


    // ==========================================
    // TOOLTIP INIT (Bootstrap)
    // ==========================================
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

});
