/* ============================================================================
   GPS Finance Premium Theme - Minimal Vanilla JavaScript
   ============================================================================ */

(function() {
    'use strict';

    // ========================================================================
    // Mobile Navigation Toggle
    // ========================================================================
    
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const body = document.body;
    
    if (mobileMenuToggle && mainNav) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Toggle aria-expanded
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle navigation
            mainNav.classList.toggle('is-open');
            
            // Prevent body scroll when menu is open
            body.style.overflow = !isExpanded ? 'hidden' : '';
        });
        
        // Close menu when clicking nav links
        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('is-open');
                body.style.overflow = '';
            });
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNav.classList.contains('is-open')) {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('is-open');
                body.style.overflow = '';
            }
        });
    }

    // ========================================================================
    // FAQ Accordion
    // ========================================================================
    
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const answer = this.nextElementSibling;
            
            // Close all other FAQ items
            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.setAttribute('aria-expanded', 'false');
                    const otherAnswer = q.nextElementSibling;
                    otherAnswer.style.maxHeight = null;
                }
            });
            
            // Toggle current item
            this.setAttribute('aria-expanded', !isExpanded);
            
            if (!isExpanded) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                answer.style.maxHeight = null;
            }
        });
        
        // Keyboard navigation
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    // ========================================================================
    // Scroll Reveal Animation
    // ========================================================================
    
    const revealElements = document.querySelectorAll('.reveal');
    
    // Check if user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (!prefersReducedMotion && revealElements.length > 0) {
        const revealOnScroll = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Optionally unobserve after revealing
                    revealOnScroll.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        revealElements.forEach(el => {
            revealOnScroll.observe(el);
        });
    } else {
        // If reduced motion is preferred, show all elements immediately
        revealElements.forEach(el => {
            el.classList.add('is-visible');
        });
    }

    // ========================================================================
    // Smooth Scroll for Anchor Links
    // ========================================================================
    
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Skip if it's just "#" or empty
            if (href === '#' || href === '') {
                e.preventDefault();
                return;
            }
            
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                
                // Calculate offset for sticky header
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ========================================================================
    // Form Validation Enhancement (Optional)
    // ========================================================================
    
    const contactForm = document.querySelector('.contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Prevent default only for demo purposes
            // In production, remove this or handle form submission via AJAX
            e.preventDefault();
            
            // Basic validation feedback
            const formData = new FormData(this);
            let isValid = true;
            
            // Check required fields
            for (let [key, value] of formData.entries()) {
                const field = this.querySelector(`[name="${key}"]`);
                if (field.hasAttribute('required') && !value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ef4444';
                    setTimeout(() => {
                        field.style.borderColor = '';
                    }, 2000);
                }
            }
            
            if (isValid) {
                // Show success message (in production, submit to server)
                alert('Thank you! We\'ll be in touch soon.');
                this.reset();
            } else {
                alert('Please fill in all required fields.');
            }
        });
        
        // Remove error styling on input
        const formInputs = contactForm.querySelectorAll('input, select, textarea');
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '';
            });
        });
    }

    // ========================================================================
    // Header Shadow on Scroll
    // ========================================================================
    
    const header = document.querySelector('.site-header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
        } else {
            header.style.boxShadow = '';
        }
        
        lastScroll = currentScroll;
    }, { passive: true });

    // ========================================================================
    // Performance: Debounce Resize Events
    // ========================================================================
    
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Handle responsive adjustments on resize
    const handleResize = debounce(() => {
        // Close mobile menu on resize to desktop
        if (window.innerWidth >= 1024 && mainNav.classList.contains('is-open')) {
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
            mainNav.classList.remove('is-open');
            body.style.overflow = '';
        }
    }, 250);
    
    window.addEventListener('resize', handleResize);

    // ========================================================================
    // Focus Management for Accessibility
    // ========================================================================
    
    // Add visible focus indicator for keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-nav');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-nav');
    });

    // ========================================================================
    // Console Log (Remove in Production)
    // ========================================================================
    
    console.log('%cGPS Finance Theme Loaded', 'color: #d4af37; font-size: 16px; font-weight: bold;');
    console.log('Version: 1.0.0');
    console.log('Mobile-first, premium, accessible, and AI-friendly.');

})();