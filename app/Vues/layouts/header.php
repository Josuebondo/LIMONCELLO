<header class="flex fixed items-center animate__fadeInDown justify-between border-b border-solid border-slate-200 dark:border-[#2c4823] px-4 md:px-10 py-3 sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md w-full h-[65px]">
    <div class="flex items-center gap-4 md:gap-8">
        <div class="flex items-center gap-2 md:gap-4 animate__flipInX">
            <div class="size-5 md:size-6 text-primary flex-shrink-0">
                <img src="<?= asset('images/logo.png') ?>" alt="Logo" srcset="">
            </div>
            <h2 class="text-lg md:text-xl font-bold leading-tight tracking-[-0.015em] uppercase">Limoncello</h2>
        </div>
        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-8" id="nav-desktop">
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/">Accueil</a>
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/menus">Menu</a>
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/reservations/verifier">Réservation</a>
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/apropos">À Propos</a>
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/gallery">Gallery</a>
            <a class="nav-link text-sm font-medium leading-normal hover:text-gold hover:animate__pulse transition-colors duration-200" href="/contact">Contact</a>
        </nav>
    </div>

    <!-- Right Section -->
    <div class="flex flex-1 justify-end gap-2 md:gap-6 items-center">
        <!-- Desktop Search -->
        <label id="search-input" class="hidden md:flex flex-col min-w-40 !h-10 max-w-64" style="opacity: 0;">
            <div class="flex w-full flex-1 items-stretch rounded-lg h-full overflow-hidden">
                <div class="text-slate-400 dark:text-[#a0c992] flex border-none bg-slate-100 dark:bg-[#2c4823] items-center justify-center pl-4">
                    <span class="material-symbols-outlined text-xl">search</span>
                </div>
                <input class="form-input flex w-full min-w-0 flex-1 border-none bg-slate-100 dark:bg-[#2c4823] focus:ring-0 h-full placeholder:text-slate-400 dark:placeholder:text-[#a0c992] px-4 pl-2 text-base font-normal leading-normal" placeholder="Rechercher un plat..." />
            </div>
        </label>

        <!-- Dark Mode Toggle Button -->
        <button id="dark-mode-toggle" class="p-2.5 hover:bg-slate-200 dark:hover:bg-white/20 rounded-lg transition-all duration-300 cursor-pointer" style="opacity: 1;" aria-label="Toggle dark mode">
            <span class="material-symbols-outlined text-slate-900 dark:text-yellow-300 text-xl transition-all duration-300" id="theme-icon">light_mode</span>
        </button>
        <!-- Panier Icon -->
        <a href="/paniers" class="relative flex items-center justify-center p-2 hover:bg-slate-100 dark:hover:bg-white/10 rounded-lg transition-colors animate__bounceIn hover:animate__heartBeat" aria-label="Voir le panier">
            <span class="material-symbols-outlined text-slate-900 dark:text-yellow-300 text-2xl">shopping_cart</span>
            <span id="panier-count" class="absolute -top-1 hidden -right-1 bg-gold text-white text-xs font-bold rounded-full px-2 py-0.5 shadow-lg"></span>
        </a>

        <!-- Desktop Button -->
        <a href="/reservation" class="hidden sm:flex min-w-[120px] cursor-pointer items-center justify-center rounded-lg h-10 px-5 bg-primary hover:bg-primary/90 text-background-light hover:text-gold text-sm font-bold leading-normal tracking-[0.015em] transition-all duration-200 hover:shadow-lg animate__rubberBand">
            <span>Réserver</span>
        </a>

        <!-- Mobile Search Icon -->
        <button class="md:hidden p-2 hover:bg-slate-100 dark:hover:bg-white/10 rounded-lg transition-colors animate__bounceIn hover:animate__heartBeat">
            <span class="material-symbols-outlined text-slate-900 dark:text-white">search</span>
        </button>

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle" class="lg:hidden flex items-center justify-center p-2 hover:bg-slate-100 ml-4 dark:hover:bg-white/10 rounded-lg transition-colors animate__fadeInLeft hover:animate__swing" aria-label="Toggle menu">
            <span class="material-symbols-outlined text-slate-900 dark:text-white" id="menu-icon">menu</span>
        </button>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-0 top-[65px] z-50 transform -translate-x-full transition-transform duration-300 lg:hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" id="menu-backdrop"></div>

    <!-- Menu Content -->
    <nav class="relative w-64 h-full bg-white dark:bg-slate-900 shadow-2xl overflow-y-auto flex flex-col">
        <!-- Search Bar -->
        <div class="p-4 border-b border-slate-200 dark:border-white/10">
            <label class="flex items-stretch rounded-lg overflow-hidden">
                <div class="text-slate-400 dark:text-[#a0c992] flex bg-slate-100 dark:bg-[#2c4823] items-center justify-center px-4">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <input class="w-full bg-slate-100 dark:bg-[#2c4823] border-none focus:ring-0 placeholder:text-slate-400 dark:placeholder:text-[#a0c992] px-3 text-sm" placeholder="Rechercher..." />
            </label>
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col flex-1 p-4 gap-2">
            <a href="/" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">home</span>
                    <span>Accueil</span>
                </span>
            </a>
            <a href="/menus" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">restaurant_menu</span>
                    <span>Menu</span>
                </span>
            </a>
            <a href="/reservations/verifier" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">event</span>
                    <span>Réservation</span>
                </span>
            </a>
            <a href="/apropos" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">info</span>
                    <span>À Propos</span>
                </span>
            </a>
            <a href="/gallery" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">photo</span>
                    <span>Gallery</span>
                </span>
            </a>
            <a href="/contact" class="px-4 py-3 rounded-lg text-slate-900 dark:text-white font-medium hover:bg-primary/10 hover:text-primary transition-colors duration-200 border border-transparent hover:border-primary/30 hover:animate__slideInLeft">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined">phone</span>
                    <span>Contact</span>
                </span>
            </a>
        </div>

        <!-- Mobile Button -->
        <div class="p-4 border-t border-slate-200 dark:border-white/10">
            <a href="/reservation" class="w-full py-3 px-4 bg-gradient-to-r from-primary to-green-500 hover:from-primary/90 hover:to-green-500/90 text-white font-bold rounded-lg transition-all duration-200 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined">event</span>
                <span>Réserver une table</span>
            </a>
        </div>
    </nav>
</div>

<!-- Add Script for Mobile Menu -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const menuIcon = document.getElementById('menu-icon');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuBackdrop = document.getElementById('menu-backdrop');
        let isOpen = false;

        function toggleMenu() {
            isOpen = !isOpen;
            if (isOpen) {
                mobileMenu.classList.remove('-translate-x-full');
                menuIcon.textContent = 'close';
            } else {
                mobileMenu.classList.add('-translate-x-full');
                menuIcon.textContent = 'menu';
            }
        }

        menuToggle.addEventListener('click', toggleMenu);
        menuBackdrop.addEventListener('click', toggleMenu);

        // Close menu on link click
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });

        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const html = document.documentElement;

        // Initialize dark mode state
        function initDarkMode() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                html.classList.add('dark');
                document.body.classList.add('dark');
                if (themeIcon) themeIcon.textContent = 'dark_mode';
            } else {
                html.classList.remove('dark');
                document.body.classList.remove('dark');
                if (themeIcon) themeIcon.textContent = 'light_mode';
            }
            // Make button visible
            if (darkModeToggle) {
                darkModeToggle.style.opacity = '1';
            }
        }

        // Initialize on page load
        initDarkMode();

        // Toggle dark mode
        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const isDark = html.classList.toggle('dark');

                // Update body class as well (required for Tailwind dark mode)
                if (isDark) {
                    document.body.classList.add('dark');
                } else {
                    document.body.classList.remove('dark');
                }

                // Save preference
                localStorage.setItem('theme', isDark ? 'dark' : 'light');

                // Update icon with animation
                if (themeIcon) {
                    themeIcon.style.transform = 'scale(0.8) rotate(-45deg)';
                    themeIcon.style.opacity = '0';

                    setTimeout(() => {
                        themeIcon.textContent = isDark ? 'dark_mode' : 'light_mode';
                        themeIcon.style.transform = 'scale(1) rotate(0deg)';
                        themeIcon.style.opacity = '1';
                    }, 150);
                }
            });

            // Smooth transition on theme icon
            if (themeIcon) {
                themeIcon.style.transition = 'all 0.3s ease-in-out';
            }
        }

        // ===== ACTIVE NAV LINK SYSTEM =====
        function highlightActiveLink() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                let isActive = false;

                // Determine if link is active based on current path
                if (href === '/' && currentPath === '/') {
                    isActive = true;
                } else if (href !== '/' && currentPath.includes(href)) {
                    isActive = true;
                }

                // Apply or remove active styling
                if (isActive) {
                    link.style.color = '#1a4d2e'; // Primary color
                    link.style.fontWeight = '700';
                    link.style.borderBottom = '2px solid #1a4d2e';
                    link.style.paddingBottom = '2px';
                } else {
                    link.style.color = '';
                    link.style.fontWeight = '';
                    link.style.borderBottom = '';
                    link.style.paddingBottom = '';
                }
            });
        }

        // Run on page load and on navigation
        highlightActiveLink();
        window.addEventListener('load', highlightActiveLink);
    });

    // ========== GreenSock GSAP avec ScrollTrigger AMÉLIORÉ ==========
    if (typeof gsap !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // ===== ANIMATIONS POUR SEARCH ET DARK MODE TOGGLE =====
        const searchInput = document.getElementById('search-input');
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        if (searchInput) {
            gsap.to(searchInput, {
                opacity: 1,
                duration: 0.8,
                delay: 0.2,
                ease: 'power2.out'
            });
        }

        if (darkModeToggle) {
            gsap.to(darkModeToggle, {
                opacity: 1,
                duration: 0.8,
                delay: 0.35,
                ease: 'power2.out'
            });
        }

        // ===== ANIMATIONS AU CHARGEMENT DE LA PAGE (Header & Hero) =====
        const headerElements = document.querySelectorAll('header [class*="animate__"]:not(label):not(#dark-mode-toggle):not(#dark-mode-toggle *)');
        const heroElements = document.querySelectorAll('.hero [class*="animate__"], [class*="hero"] [class*="animate__"], main > section:first-child [class*="animate__"]');

        const allHeaderHeroElements = [...headerElements, ...heroElements];

        const loadAnimations = {
            'animate__fadeInDown': {
                duration: 0.8,
                y: -30,
                opacity: 1
            },
            'animate__flipInX': {
                duration: 0.8,
                rotationY: 0,
                opacity: 1
            },
            'animate__fadeInUp': {
                duration: 0.8,
                y: 30,
                opacity: 1
            },
            'animate__rotateIn': {
                duration: 0.6,
                rotation: 0,
                opacity: 1
            },
            'animate__bounceIn': {
                duration: 1,
                opacity: 1,
                scale: 1
            },
            'animate__heartBeat': {
                duration: 0.6,
                scale: 1
            },
            'animate__fadeInLeft': {
                duration: 0.8,
                x: -30,
                opacity: 1
            },
            'animate__swing': {
                duration: 0.8,
                rotation: 0
            },
            'animate__rubberBand': {
                duration: 0.8,
                scaleX: 1,
                opacity: 1
            },
            'animate__pulse': {
                duration: 0.8,
                opacity: 1
            },
            'animate__slideInLeft': {
                duration: 0.8,
                x: -30,
                opacity: 1
            },
            'animate__lightSpeedInLeft': {
                duration: 0.8,
                x: -50,
                opacity: 1
            },
            'animate__lightSpeedInRight': {
                duration: 0.8,
                x: 50,
                opacity: 1
            },
            'animate__zoomIn': {
                duration: 0.8,
                scale: 0.3,
                opacity: 1
            },
            'animate__rollIn': {
                duration: 0.8,
                rotation: -120,
                opacity: 1
            }
        };

        allHeaderHeroElements.forEach((element, index) => {
            // Exclure les éléments qui doivent rester visibles
            const isSearch = element.closest('label[class*="min-w-40"]');
            const isDarkModeToggle = element.id === 'dark-mode-toggle' || element.closest('#dark-mode-toggle');
            const isReserveButton = element.textContent.includes('Réserver') && element.closest('header');

            if (isSearch || isDarkModeToggle || isReserveButton) {
                // Garder visibles mais animer quand même
                const animClass = Array.from(element.classList).find(cls => cls.startsWith('animate__'));
                if (animClass) {
                    const animConfig = loadAnimations[animClass] || {
                        duration: 0.8,
                        opacity: 1
                    };
                    gsap.to(element, {
                        ...animConfig,
                        delay: index * 0.15,
                        ease: 'power2.out'
                    });
                }
                return;
            }

            const animClass = Array.from(element.classList).find(cls => cls.startsWith('animate__'));
            const animConfig = loadAnimations[animClass] || {
                duration: 0.8,
                opacity: 1
            };

            gsap.fromTo(element, {
                opacity: 0,
                ...getInitialState(animClass)
            }, {
                ...animConfig,
                delay: index * 0.15,
                ease: 'power2.out'
            });
        });

        // ===== ANIMATIONS AU SCROLL (Contenu Principal) =====
        const scrollAnimations = {
            'animate__fadeInDown': {
                y: -20,
                opacity: 1
            },
            'animate__flipInX': {
                rotationY: 0,
                opacity: 1
            },
            'animate__fadeInUp': {
                y: 20,
                opacity: 1
            },
            'animate__rotateIn': {
                rotation: 0,
                opacity: 1
            },
            'animate__bounceIn': {
                opacity: 1,
                scale: 1
            },
            'animate__heartBeat': {
                scale: 1
            },
            'animate__fadeInLeft': {
                x: -20,
                opacity: 1
            },
            'animate__swing': {
                rotation: 0
            },
            'animate__rubberBand': {
                scaleX: 1
            },
            'animate__pulse': {
                opacity: 1
            },
            'animate__slideInLeft': {
                x: -20,
                opacity: 1
            },
            'animate__lightSpeedInLeft': {
                x: -50,
                opacity: 1
            },
            'animate__lightSpeedInRight': {
                x: 50,
                opacity: 1
            },
            'animate__zoomIn': {
                scale: 1,
                opacity: 1
            },
            'animate__rollIn': {
                rotation: 0,
                opacity: 1
            }
        };

        // Appliquer les animations scroll à TOUS les éléments animate__
        document.querySelectorAll('[class*="animate__"]').forEach(element => {
            const isInHeader = element.closest('header');
            const isInHero = element.closest('.hero') || element.closest('[class*="hero"]') || (element.closest('main') && element.closest('main > section:first-child'));

            // Animer seulement les éléments en dehors du header/hero
            if (!isInHeader && !isInHero) {
                const animClass = Array.from(element.classList).find(cls => cls.startsWith('animate__'));
                if (!animClass) return;

                const animConfig = scrollAnimations[animClass] || {
                    opacity: 1
                };

                gsap.fromTo(element, {
                    opacity: 0,
                    ...getInitialState(animClass)
                }, {
                    ...animConfig,
                    duration: 0.8,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'top 40%',
                        once: true
                    }
                });
            }
        });

        // ===== ANIMATIONS AVANCÉES AU HOVER =====
        // Animations pour les boutons
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    duration: 0.3,
                    scale: 1.05,
                    ease: 'power2.out'
                });
            });
            btn.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    duration: 0.3,
                    scale: 1,
                    ease: 'power2.out'
                });
            });
        });

        // Animations pour les cartes (.group)
        document.querySelectorAll('.group').forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    duration: 0.4,
                    y: -8,
                    boxShadow: '0 20px 40px rgba(0,0,0,0.3)',
                    ease: 'power2.out'
                });
            });
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    duration: 0.4,
                    y: 0,
                    boxShadow: 'none',
                    ease: 'power2.out'
                });
            });
        });

        // Fonction helper pour définir l'état initial
        function getInitialState(animClass) {
            const states = {
                'animate__fadeInDown': {
                    y: 30
                },
                'animate__flipInX': {
                    rotationY: -90
                },
                'animate__fadeInUp': {
                    y: -30
                },
                'animate__rotateIn': {
                    rotation: -200
                },
                'animate__bounceIn': {
                    scale: 0.3
                },
                'animate__fadeInLeft': {
                    x: 30
                },
                'animate__slideInLeft': {
                    x: 30
                },
                'animate__lightSpeedInLeft': {
                    x: 100
                },
                'animate__lightSpeedInRight': {
                    x: -100
                },
                'animate__zoomIn': {
                    scale: 0
                },
                'animate__rollIn': {
                    rotation: 120
                }
            };
            return states[animClass] || {};
        }

        // Rafraîchir ScrollTrigger après changement du DOM
        ScrollTrigger.refresh();
    }
</script>

<!-- Met à jour le nombre d'items du panier -->
<script>
    function updatePanierCount() {
        const panier = JSON.parse(localStorage.getItem('panier')) || [];
        const count = panier.reduce((acc, item) => acc + item.quantity, 0);
        const badge = document.getElementById('panier-count');
        if (badge) {
            badge.textContent = count > 0 ? count : '';
            if (count > 0) {
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }
        }
    }
    window.updatePanierCount = updatePanierCount;
    document.addEventListener('DOMContentLoaded', updatePanierCount);
    window.addEventListener('storage', updatePanierCount);
</script>