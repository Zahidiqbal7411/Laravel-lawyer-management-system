// Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Counter animation for stats
        const animateNumbers = () => {
            const numbers = document.querySelectorAll('.stat-number');
            numbers.forEach(number => {
                const target = parseInt(number.textContent);
                const increment = target / 100;
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    number.textContent = Math.floor(current) + '+';
                }, 20);
            });
        };

        // Trigger number animation when stats section is visible
        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Form submission
        // document.querySelector('.contact-form').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     alert('Thank you for your message! We will get back to you soon.');
        //     this.reset();
        // });

        // Mobile menu functionality
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const menuTrigger = document.querySelector('.menu-trigger');
        const sidebar = document.querySelector('.sidebar');
        const sidebarOverlay = document.querySelector('.sidebar-overlay');
        const sidebarClose = document.querySelector('.sidebar-close');

        function openSidebar() {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
            if (mobileMenuToggle) mobileMenuToggle.classList.add('active');
            if (menuTrigger) menuTrigger.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
            if (menuTrigger) menuTrigger.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Event listeners for both mobile menu triggers
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', openSidebar);
        }

        if (menuTrigger) {
            menuTrigger.addEventListener('click', openSidebar);
        }

        if (sidebarClose) {
            sidebarClose.addEventListener('click', closeSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        // Close sidebar when clicking on nav items
        document.querySelectorAll('.sidebar-nav-item').forEach(item => {
            item.addEventListener('click', closeSidebar);
        });

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });

        // Header background change on scroll (applies to all pages)
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (header) {
                if (window.scrollY > 100) {
                    header.style.background = '#037971';
                    header.style.backdropFilter = 'blur(10px)';
                } else {
                    header.style.background = '#035450';
                    header.style.backdropFilter = 'none';
                }
            }
        });

        // Enhanced staggered animation for service cards
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.15}s`;
            card.classList.add('animate-on-scroll');

            // Add unique hover effects
            card.addEventListener('mouseenter', () => {
                card.style.transform = `translateY(-15px) rotateX(${index % 2 === 0 ? '5deg' : '-5deg'}) scale(1.02)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

        // Add random floating animation to tech items
        const techItems = document.querySelectorAll('.tech-item');
        techItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.3}s`;
            item.style.animation = `float ${3 + Math.random() * 2}s ease-in-out infinite`;
        });

        // Enhanced hover effects for feature items
        const featureItems = document.querySelectorAll('.feature-item');
        featureItems.forEach((item, index) => {
            // Staggered entrance animation
            item.style.animationDelay = `${index * 0.15}s`;

            item.addEventListener('mouseenter', () => {
                item.style.transform = 'translateY(-10px) scale(1.03)';
                item.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';

                // Add ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 20px;
                    height: 20px;
                    background: rgba(0,201,167,0.3);
                    border-radius: 50%;
                    transform: translate(-50%, -50%) scale(0);
                    animation: pulseRing 0.6s ease-out;
                    pointer-events: none;
                    z-index: 1;
                `;
                item.appendChild(ripple);

                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.parentNode.removeChild(ripple);
                    }
                }, 600);
            });

            item.addEventListener('mouseleave', () => {
                item.style.transform = '';
            });
        });

        // Enhanced metrics animation
        const metricsSection = document.querySelector('.why-choose-metrics');
        const metricsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const metricNumbers = entry.target.querySelectorAll('.metric-number');
                    metricNumbers.forEach((number, index) => {
                        setTimeout(() => {
                            number.style.animation = 'bounceIn 0.8s ease';

                            // Add a subtle glow effect
                            number.style.textShadow = '0 0 20px rgba(0,201,167,0.5)';
                            setTimeout(() => {
                                number.style.textShadow = '';
                            }, 1000);
                        }, index * 200);
                    });
                    metricsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (metricsSection) {
            metricsObserver.observe(metricsSection);
        }

        // Dynamic particle generation for why choose section
        const particleContainer = document.querySelector('.why-choose-particles');
        if (particleContainer) {
            // Create additional random particles
            for (let i = 0; i < 8; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.cssText = `
                    top: ${Math.random() * 100}%;
                    left: ${Math.random() * 100}%;
                    animation-delay: ${Math.random() * 5}s;
                    animation-duration: ${5 + Math.random() * 5}s;
                    width: ${2 + Math.random() * 4}px;
                    height: ${2 + Math.random() * 4}px;
                    background: ${Math.random() > 0.5 ? '#00C9A7' : '#4ECDC4'};
                `;
                particleContainer.appendChild(particle);
            }
        }

        // Add scroll-triggered animations for feature items
        const featureObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animated');

                        // Add a pulse effect to the icon
                        const icon = entry.target.querySelector('.feature-icon');
                        if (icon) {
                            icon.style.animation = 'pulse 0.6s ease';
                            setTimeout(() => {
                                icon.style.animation = '';
                            }, 600);
                        }
                    }, index * 100);
                }
            });
        }, { threshold: 0.2 });

        featureItems.forEach(item => {
            featureObserver.observe(item);
        });

        // Add interactive hover sound effects (visual feedback)
        featureItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                const icon = item.querySelector('.feature-icon');
                if (icon) {
                    // Create a temporary scaling effect
                    icon.style.transform = 'rotate(360deg) scale(1.1)';
                    icon.style.transition = 'all 0.4s ease';
                }
            });

            item.addEventListener('mouseleave', () => {
                const icon = item.querySelector('.feature-icon');
                if (icon) {
                    icon.style.transform = '';
                }
            });
        });

        // Floating shapes random movement
        const shapes = document.querySelectorAll('.floating-shape');
        shapes.forEach((shape, index) => {
            const randomDelay = Math.random() * 5;
            const randomDuration = 10 + Math.random() * 10;
            shape.style.animationDelay = `${randomDelay}s`;
            shape.style.animationDuration = `${randomDuration}s`;
        });
