<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Limoncello - Historique</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Noto+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
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

    <style>
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .icon-fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        @keyframes slide-in-bottom {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#181711] dark:text-gray-100 overflow-hidden">
    <div class="flex h-screen w-full">
        <aside class="w-64 flex-shrink-0 border-r border-[#e6e4db] dark:border-gray-800 bg-white dark:bg-[#1a1810] flex flex-col justify-between p-4 hidden md:flex">
            <div class="flex flex-col gap-8">
                <a href="/" class="flex items-center gap-3 px-2 cusror-pointer hover:opacity-80 transition-opacity">
                    <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 shadow-sm border border-gray-100 dark:border-gray-700" data-alt="Limoncello brand logo abstract yellow lemon" style='background-image: url("<?= asset('images/logo.png') ?>");'></div>
                    <div class="flex flex-col">
                        <h1 class="text-[#181711] dark:text-white text-lg font-bold leading-tight">Limoncello</h1>
                        <p class="text-[#8a8460] dark:text-gray-400 text-xs font-medium">Back Office</p>
                    </div>
                </a>
                <nav class="flex flex-col gap-2">
                    <?php
                    $uri = $_SERVER['REQUEST_URI'];
                    $isActive = fn($path) => str_starts_with($uri, $path) ? 'bg-primary/20 dark:bg-primary/10 text-[#181711] dark:text-primary' : 'text-[#5e5a45] dark:text-gray-400 hover:bg-[#f5f4f0] dark:hover:bg-gray-800';
                    ?>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors group <?= $isActive('/admin/dashboard') ?>" href="/admin/dashboard">
                        <span class="material-symbols-outlined text-[22px]">dashboard</span>
                        <span class="text-sm font-medium">Tableau de bord</span>
                    </a>
                    <a class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg transition-colors <?= $isActive('/admin/booking') . ($isActive('/admin/booking') !== '' ? ' ' : 'hover:bg-[#f5f4f0] dark:hover:bg-gray-800') ?>" href="/admin/bookings">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[22px] <?= str_starts_with($uri, '/admin/booking') ? 'icon-fill text-yellow-700 dark:text-yellow-400' : '' ?>">receipt_long</span>
                            <span class="text-sm <?= str_starts_with($uri, '/admin/booking') ? 'font-bold' : 'font-medium' ?>">Activité</span>
                        </div>
                        <span class="h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors group <?= $isActive('/admin/menu') ?>" href="/admin/menu">
                        <span class="material-symbols-outlined text-[22px]">restaurant_menu</span>
                        <span class="text-sm font-medium">Menu</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#5e5a45] dark:text-gray-400 hover:bg-[#f5f4f0] dark:hover:bg-gray-800 transition-colors group" href="#">
                        <span class="material-symbols-outlined text-[22px]">group</span>
                        <span class="text-sm font-medium">Personnel</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#5e5a45] dark:text-gray-400 hover:bg-[#f5f4f0] dark:hover:bg-gray-800 transition-colors group" href="#">
                        <span class="material-symbols-outlined text-[22px]">settings</span>
                        <span class="text-sm font-medium">Paramètres</span>
                    </a>
                </nav>
            </div>
            <div class="flex items-center gap-3 px-3 py-3 rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-[#fbfaf8] dark:bg-gray-900">
                <div class="bg-center bg-no-repeat bg-cover rounded-full size-8" data-alt="Profile picture of logged in manager" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA5Nrl9hvxUXjy7HV4vdSDfKVeMioY6yY4-Xlu0t6LhSAlxWe_Yo9aBpQS1y3msMoCkp7iz06OZ0d74In_hcjmWI01EgoEdDH2tIxgbgax9OO71RSHLmjLxVr_lt22PWwTFbevEWynpETqN8kG9lp9lj1Mm2m727gmFfFCO4LwnQ9mPNtZ9OxA3t-tdqcE0YSIMR05_lZE87XYYkyrf7JUhIdPkIVJZRM6JbiedxCBu47H0ZJ_AlNxXMB4LM6Qy5lQIuMgCSpzK0vE8");'></div>
                <div class="flex flex-col flex-1 min-w-0">
                    <p class="text-[#181711] dark:text-white text-sm font-semibold truncate">Michel K.</p>
                    <p class="text-[#8a8460] dark:text-gray-400 text-xs truncate">Manager</p>
                </div>
                <button class="text-[#8a8460] dark:text-gray-400 hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </button>
            </div>
        </aside>
        <!-- Contenu Principal (Section hérité des vues) -->
        <?php \Core\Vue::section('contenu'); ?>
    </div>
</body>

</html>