<!DOCTYPE html>

<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>404 - Limoncello Kinshasa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@100..900&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f4d525",
                        "background-light": "#f8f8f5",
                        "background-dark": "#12110a",
                        "secondary-dark": "#221f10",
                    },
                    fontFamily: {
                        "display": ["Epilogue", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Epilogue', sans-serif;
        }

        .luxury-gradient {
            background: radial-gradient(circle at center, rgba(244, 213, 37, 0.05) 0%, rgba(18, 17, 10, 0) 70%);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-white font-display overflow-x-hidden transition-colors duration-300">
    <div class="relative flex h-screen w-full flex-col group/design-root">
        <!-- Navigation Bar -->
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 px-6 md:px-20 py-4 absolute top-0 w-full z-50">
            <div class="flex items-center gap-4 text-white">
                <div class="size-6 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-white text-xl font-bold leading-tight tracking-[-0.02em] uppercase italic">Limoncello</h2>
            </div>
            <div class="hidden md:flex flex-1 justify-end gap-10">
                <nav class="flex items-center gap-10">
                    <a class="text-white/80 hover:text-primary text-sm font-medium transition-colors" href="#">Menu</a>
                    <a class="text-white/80 hover:text-primary text-sm font-medium transition-colors" href="#">Réservations</a>
                    <a class="text-white/80 hover:text-primary text-sm font-medium transition-colors" href="#">Galerie</a>
                    <a class="text-white/80 hover:text-primary text-sm font-medium transition-colors" href="#">Contact</a>
                </nav>
            </div>
            <div class="md:hidden">
                <span class="material-symbols-outlined text-white">menu</span>
            </div>
        </header>
        <!-- Main Content Section -->
        <main class="flex-1 flex flex-col items-center justify-center px-6 relative">
            <!-- Background Decorative Glow -->
            <div class="absolute inset-0 luxury-gradient pointer-events-none"></div>
            <div class="max-w-[1200px] w-full grid grid-cols-1 lg:grid-cols-2 items-center gap-12 z-10">
                <!-- Hero Image Container (Variant 2: The Spilled Limoncello) -->
                <div class="order-1 lg:order-2 flex justify-center items-center">
                    <div class="relative w-full max-w-lg aspect-square">
                        <div class="absolute inset-0 bg-primary/10 blur-[100px] rounded-full"></div>
                        <div class="w-full h-full bg-center bg-no-repeat bg-cover rounded-xl shadow-2xl border border-white/5" data-alt="Luxurious spilled glass of yellow limoncello on dark surface" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD1W1_mK40dEyb0m--1YeEfiJdhDn6AACkd0MgvruP2tHWXyb9mHH6hisxq59zr_h4l7wGTnRTgRCAX0XJbXWX9rwUmfkZvEpyRgIjCKZy4Xe7iLTyTwh2ZuwpgS5nNguzM3U2Xbscso52-Fg5uxtTFSZPuxnaM-oomarheYOIk0ekSuUhLKLv_VbK8mS9OPHpIq3bW2mTy1sbO7bE2E1gCWsW8VrKDYETq1QbGTfnw3JIi8UrXUoPeVumMMi7mxKXHkUeoxVwBYYxZ");'>
                            <!-- Overlay to blend image -->
                            <div class="absolute inset-0 bg-gradient-to-t from-background-dark/80 via-transparent to-transparent"></div>
                        </div>
                    </div>
                </div>
                <!-- Text Content -->
                <div class="order-2 lg:order-1 flex flex-col text-center lg:text-left space-y-6">
                    <div>
                        <span class="text-primary font-bold text-6xl md:text-8xl tracking-tighter drop-shadow-[0_0_15px_rgba(244,213,37,0.4)]">404</span>
                        <h1 class="text-white tracking-tight text-3xl md:text-5xl font-bold leading-tight pt-4">
                            Oups, cette page <br class="hidden md:block" /> s'est envolée !
                        </h1>
                    </div>
                    <p class="text-white/60 text-lg font-normal leading-relaxed max-w-md mx-auto lg:mx-0">
                        Même nos meilleurs plats s'échappent parfois. Retrouvez votre chemin vers l'excellence italienne au cœur de Kinshasa.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4 justify-center lg:justify-start">
                        <button class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-8 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                            <span class="truncate">Retourner à la carte</span>
                        </button>
                        <button class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-8 bg-secondary-dark border border-white/10 text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-white/5 transition-all">
                            <span class="truncate">Réserver une table</span>
                        </button>
                    </div>
                    <!-- Subtle Footer Credit -->
                    <div class="pt-12 flex items-center justify-center lg:justify-start gap-3 opacity-40">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        <p class="text-xs uppercase tracking-[0.2em]">Gombe, Kinshasa</p>
                    </div>
                </div>
            </div>
        </main>
        <!-- Sidebar Decorative Text -->
        <div class="hidden xl:block absolute left-10 bottom-20 rotate-[-90deg] origin-left pointer-events-none">
            <p class="text-white/5 text-8xl font-black uppercase whitespace-nowrap">Excellence Italienne</p>
        </div>
    </div>
</body>

</html>