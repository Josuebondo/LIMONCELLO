<!DOCTYPE html>

<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Limoncello - L'authenticité italienne à Kinshasa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;900&amp;family=Playfair+Display:wght@700;900&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Exemple d'assets locaux (utiliser si vous avez des fichiers dans public/): -->
    <?php if (function_exists('asset')): ?>
        <link rel="stylesheet" href="<?= asset('css/app.css') ?>">

    <?php endif; ?>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec13",
                        "gold": "#D4AF37",
                        "background-light": "#f6f8f6",
                        "background-dark": "#102210",
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"],
                        "serif": ["Playfair Display", "serif"]
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
        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-display {
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-300">
    <!-- Navigation -->
    <div class="layout-container flex flex-col">
        <header class="flex fixed items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-[#2c4823] px-10 py-3 sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-4">
                    <div class="size-6 text-primary">
                        <img src="<?= asset('images/logo.png') ?>" alt="" srcset="">
                    </div>
                    <h2 class="text-xl font-bold leading-tight tracking-[-0.015em] uppercase">Limoncello</h2>
                </div>
                <nav class="hidden lg:flex items-center gap-9">
                    <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="/">Accueil</a>
                    <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="/menus">Menu</a>
                    <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="/reservation">Réservation</a>
                    <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="/apropos">À Propos</a>
                    <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="/contact">Contact</a>
                </nav>
            </div>
            <div class="flex flex-1 justify-end gap-6 items-center">
                <label class="hidden md:flex flex-col min-w-40 !h-10 max-w-64">
                    <div class="flex w-full flex-1 items-stretch rounded-lg h-full overflow-hidden">
                        <div class="text-slate-400 dark:text-[#a0c992] flex border-none bg-slate-100 dark:bg-[#2c4823] items-center justify-center pl-4">
                            <span class="material-symbols-outlined text-xl">search</span>
                        </div>
                        <input class="form-input flex w-full min-w-0 flex-1 border-none bg-slate-100 dark:bg-[#2c4823] focus:ring-0 h-full placeholder:text-slate-400 dark:placeholder:text-[#a0c992] px-4 pl-2 text-base font-normal leading-normal" placeholder="Rechercher un plat..." />
                    </div>
                </label>
                <button class="flex min-w-[120px] cursor-pointer items-center justify-center rounded-lg h-10 px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] hover:brightness-110 transition-all">
                    <span>Réserver une table</span>
                </button>
            </div>
        </header>



        <?php \Core\Vue::section('contenu'); ?>