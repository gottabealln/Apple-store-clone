document.addEventListener('DOMContentLoaded', () => {
    /* =========================================
       1. Mobile Navigation Drawer
       ========================================= */
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileDrawer = document.getElementById('mobile-drawer');

    if (mobileMenuBtn && mobileDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileDrawer.classList.toggle('is-active');
            document.body.classList.toggle('no-scroll');
        });
    }

    /* =========================================
       2. Carousels (Scroll & Buttons)
       ========================================= */
    const carousels = document.querySelectorAll('.carousel-wrapper');
    
    carousels.forEach(wrapper => {
        const track = wrapper.querySelector('.carousel-track');
        const prevBtn = wrapper.querySelector('.prev');
        const nextBtn = wrapper.querySelector('.next');
        
        if (!track || !prevBtn || !nextBtn) return;

        // Calculate scroll amount based on one card width + gap
        const getScrollAmount = () => {
            const card = track.querySelector('.card');
            if (!card) return 300; // Fallback
            const gap = parseInt(window.getComputedStyle(track).gap) || 20;
            return card.offsetWidth + gap;
        };

        nextBtn.addEventListener('click', () => {
            track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        // Update button states based on scroll position
        const updateButtons = () => {
            const maxScrollLeft = track.scrollWidth - track.clientWidth;
            
            // Using a small buffer of 10px for rounding errors
            prevBtn.disabled = track.scrollLeft <= 10;
            nextBtn.disabled = track.scrollLeft >= maxScrollLeft - 10;
        };

        track.addEventListener('scroll', updateButtons);
        
        // Initial state (slight delay to ensure layout is fully rendered)
        setTimeout(updateButtons, 100); 
    });

    /* =========================================
       3. Mobile Footer Accordion
       ========================================= */
    const footerToggles = document.querySelectorAll('.footer-heading-toggle');
    
    footerToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            // Only run on mobile (check if chevron is visible/displayed)
            const chevron = toggle.querySelector('.footer-chevron');
            if (!chevron || window.getComputedStyle(chevron).display === 'none') return;
            
            const list = toggle.nextElementSibling;
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            
            // Toggle state
            toggle.setAttribute('aria-expanded', !isExpanded);
            list.classList.toggle('is-open');
        });
    });
});