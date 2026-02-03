<!DOCTYPE html>

<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Limoncello - L'authenticité italienne à Kinshasa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Tailwind Configuration - MUST be right after Tailwind CDN loads -->
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1a4d2e",
                        "gold": "#D4AF37",
                        "background-light": "#fdfdfb",
                        "background-dark": "#0a1a0a",
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"],
                        "serif": ["Playfair Display", "serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "1rem",
                        "2xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>

    <!-- Early Dark Mode Initialization - MUST be after Tailwind but before body renders -->
    <script>
        (function() {
            const html = document.documentElement;
            const savedTheme = localStorage.getItem('theme');

            // console.log('🎨 Dark Mode Init - Saved theme:', savedTheme);

            let isDark = false;

            // Priority: saved preference > system preference
            if (savedTheme === 'dark') {
                isDark = true;
                // console.log('✅ Using saved dark theme');
            } else if (savedTheme === 'light') {
                isDark = false;
                // console.log('✅ Using saved light theme');
            } else {
                isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                // console.log('🔍 System preference detected - isDark:', isDark);
            }

            // Apply theme to HTML AND BODY (important for Tailwind dark mode)
            if (isDark) {
                html.classList.add('dark');
                html.setAttribute('data-theme', 'dark');
                // document.body.classList.add('dark');
                // console.log('🌙 Dark mode ACTIVATED');
            } else {
                html.classList.remove('dark');
                html.setAttribute('data-theme', 'light');
                document.body.classList.remove('dark');
                // console.log('☀️ Light mode ACTIVATED');
            }



            // Store preference for consistency
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        })();
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;900&amp;family=Playfair+Display:wght@700;900&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <!-- GreenSock GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Exemple d'assets locaux (utiliser si vous avez des fichiers dans public/): -->
    <?php if (function_exists('asset')): ?>
        <link rel="stylesheet" href="<?= asset('css/app.css') ?>">

    <?php endif; ?>
    <style>
        /* GSAP Animation Configs */
        :root {
            --gsap-duration: 0.8;
            --gsap-delay: 0.9s;
        }

        /* Global animation styles */
        .gsap-element {
            opacity: 0;
        }

        /* Prevent flash of wrong theme */
        html {
            color-scheme: light;
        }

        html.dark {
            color-scheme: dark;
        }
    </style>

    <style type="text/tailwindcss">

        @layer base {
            :root {
                --primary: #1a4d2e;
                --gold: #D4AF37;
                --background-light: #fdfdfb;
                --background-dark: #0a1a0a;
            }

            /* Dark mode colors */
            html.dark {
                color-scheme: dark;
            }

            html:not(.dark) {
                color-scheme: light;
            }
        }
        
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes flip-in-x {
            from { opacity: 0; transform: perspective(400px) rotateX(90deg); }
            to { opacity: 1; transform: perspective(400px) rotateX(0deg); }
        }
        @keyframes bounce-in {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }
        @keyframes slide-in-left {
            from { opacity: 0; transform: translateX(-60px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slide-in-right {
            from { opacity: 0; transform: translateX(60px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes rubber-band-scroll {
            0% { transform: scaleX(1); }
            30% { transform: scaleX(1.25) scaleY(0.75); }
            40% { transform: scaleX(0.75) scaleY(1.25); }
            50% { transform: scaleX(1.15) scaleY(0.85); }
            65% { transform: scaleX(0.95) scaleY(1.05); }
            75% { transform: scaleX(1.05) scaleY(0.95); }
            100% { transform: scaleX(1) scaleY(1); }
        }
        /* Header animations avec view() */
        .header-fade-in {
            animation-name: fade-in-down;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
            animation-duration: 0.8s;
            animation-fill-mode: both;
        }
        .logo-flip-in {
            animation-name: flip-in-x;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
            animation-duration: 0.9s;
            animation-fill-mode: both;
        }
        .search-fade-in {
            animation-name: fade-up;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
            animation-duration: 0.8s;
            animation-delay: 0.2s;
            animation-fill-mode: both;
        }
        .button-reserve-scroll {
            animation-name: rubber-band-scroll;
            animation-timeline: view();
            animation-range: entry 0% cover 50%;
            animation-duration: 1s;
            animation-fill-mode: both;
        }
        .mobile-search-bounce {
            animation-name: bounce-in;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
            animation-duration: 0.8s;
            animation-fill-mode: both;
        }
        .mobile-menu-slide {
            animation-name: slide-in-left;
            animation-timeline: view();
            animation-range: entry 0% cover 40%;
            animation-duration: 0.8s;
            animation-fill-mode: both;
        }
        .animate-scroll-fade {
            view-timeline-name: --section;
            view-timeline-axis: block;
            animation-timeline: --section;
            animation-name: fade-up;
            animation-range: entry 10% cover 30%;
            animation-fill-mode: both;
        }
        .animate-scroll-left {
            view-timeline-name: --reveal;
            view-timeline-axis: block;
            animation-timeline: --reveal;
            animation-name: slide-in-left;
            animation-range: entry 10% cover 30%;
            animation-fill-mode: both;
        }
        .animate-scroll-right {
            view-timeline-name: --reveal;
            view-timeline-axis: block;
            animation-timeline: --reveal;
            animation-name: slide-in-right;
            animation-range: entry 10% cover 30%;
            animation-fill-mode: both;
        }
        .stagger-card {
            view-timeline-name: --stagger;
            view-timeline-axis: block;
            animation-timeline: --stagger;
            animation-name: scale-in;
            animation-range: entry 5% cover 25%;
            animation-fill-mode: both;
        }
        .reserve-button-scroll {
            animation-name: rubber-band-scroll;
            animation-timeline: view();
            animation-range: entry 0% cover 50%;
            animation-duration: 1s;
            animation-fill-mode: both;
        }
        .hero-zoom {
            animation: hero-zoom-in 20s infinite alternate ease-in-out;
        }
        @keyframes hero-zoom-in {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }
        body::-webkit-scrollbar {
            width: 8px;
        }
        body::-webkit-scrollbar-track {
            background: transparent;
        }
        body::-webkit-scrollbar-thumb {
            background-color: rgba(26, 77, 46, 0.5);
            border-radius: 4px;
        }
         html.dark body::-webkit-scrollbar-thumb {
            background-color: rgba(212, 175, 55, 0.5);
            border-radius: 4px;
        }
        html{
            scroll-behavior: smooth;
        }
        
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-300 ">
    <!-- Navigation -->
    <div class="layout-container flex flex-col">
        <?php
        // Inclure le header sans créer une nouvelle instance
        echo $this instanceof \Core\Vue ? $this->inclure('layouts.header') : '';
        ?>

        <!-- Contenu Principal (Section hérité des vues) -->
        <?php \Core\Vue::section('contenu'); ?>
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

                if (menuToggle && menuBackdrop && mobileMenu && menuIcon) {
                    menuToggle.addEventListener('click', toggleMenu);
                    menuBackdrop.addEventListener('click', toggleMenu);

                    // Close menu on link click
                    document.querySelectorAll('#mobile-menu a').forEach(link => {
                        link.addEventListener('click', toggleMenu);
                    });
                }
                // (Gestion dark mode uniquement dans le header)
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

        <!-- Footer -->
        <?php
        // Inclure le footer sans créer une nouvelle instance
        echo $this instanceof \Core\Vue ? $this->inclure('layouts.footer') : '';
        ?>

    </div>
</body>

</html>