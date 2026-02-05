<?php
\core\Vue::extends('layouts.admin');
\core\Vue::debut_section('contenu')
?>

<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#f4d525",
                    "background-light": "#f8f8f5",
                    "background-dark": "#221f10",
                },
                // (Suppression du bloc HTML corrompu ici)
                fontFamily: {
                    "display": ["Plus Jakarta Sans", "sans-serif"],
                    "body": ["Noto Sans", "sans-serif"]
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
</style>

<main class="flex-1 flex flex-col h-full overflow-hidden bg-white dark:bg-[#12110c] relative">
    <header class="flex-shrink-0 px-6 py-5 border-b border-[#e6e4db] dark:border-gray-800 bg-white/80 dark:bg-[#12110c]/80 backdrop-blur-sm z-10">
        <div class="flex flex-wrap justify-between items-center gap-4 max-w-7xl mx-auto w-full">
            <div class="flex flex-col gap-1">
                <h2 class="text-[#181711] dark:text-white text-3xl font-black tracking-tight">Activité &amp; Historique</h2>
                <p class="text-[#8a8460] dark:text-gray-400 text-sm">Suivez les réservations, les commandes et consultez l'historique complet.</p>
            </div>
            <div class="flex gap-3">
                <button class="group flex items-center justify-center gap-2 h-10 px-5 bg-white dark:bg-gray-800 border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-[#181711] dark:text-white text-sm font-bold rounded-lg transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">calendar_add_on</span>
                    <span>Réservation</span>
                </button>
                <button class="group flex items-center justify-center gap-2 h-10 px-5 bg-primary hover:bg-[#e6c820] text-[#181711] text-sm font-bold rounded-lg transition-all shadow-sm shadow-yellow-200 dark:shadow-none">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    <span>Nouvelle Commande</span>
                </button>
            </div>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 relative">
        <!-- Aside détails -->
        <aside id="admin-details-aside" class="fixed hidden top-0 right-0 h-full w-96 max-w-full bg-white dark:bg-[#181711] shadow-xl border-l border-[#e6e4db] dark:border-gray-800 z-50  flex-col p-6 overflow-y-auto transition-all">
            <button id="close-details-aside" class="absolute top-4 right-4 p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-500 hover:text-primary hover:bg-gray-200 dark:hover:bg-gray-700">
                <span class="material-symbols-outlined text-[24px]">close</span>
            </button>
            <div id="details-content" class="mt-8"></div>
        </aside>
        <!-- Fin Aside détails -->

        <div id="admin-booking-tab-content" class="w-full">
            <!-- Le contenu dynamique des onglets sera injecté ici -->
        </div>
        <div class="flex flex-col gap-6 max-w-7xl mx-auto w-full pb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm relative overflow-hidden">
                    <div class="flex justify-between items-start z-10 relative">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Total Commandes (Oct)</p>
                        <span class="bg-[#fff8e1] dark:bg-yellow-900/30 text-[#b26b00] dark:text-yellow-500 text-xs font-bold px-2 py-1 rounded-full">+12%</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold z-10 relative">482</p>
                    <div class="absolute right-0 bottom-0 opacity-5 dark:opacity-10 transform translate-x-2 translate-y-2">
                        <span class="material-symbols-outlined text-8xl">shopping_bag</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">
                    <div class="flex justify-between items-start">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Réservations Honorées</p>
                        <span class="bg-[#e7f7e9] dark:bg-green-900/30 text-[#078814] dark:text-green-400 text-xs font-bold px-2 py-1 rounded-full">94%</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold">156</p>
                </div>
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">
                    <div class="flex justify-between items-start">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Chiffre d'affaires (Oct)</p>
                        <span class="bg-[#e7f7e9] dark:bg-green-900/30 text-[#078814] dark:text-green-400 text-xs font-bold px-2 py-1 rounded-full">+8%</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold">$12,845</p>
                </div>
            </div>
            <div class="w-full border-b border-[#e6e4db] dark:border-gray-700">
                <div class="flex gap-8">
                    <button class="pb-3 text-sm font-medium text-[#8a8460] dark:text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors border-b-2 border-transparent">
                        Réservations
                    </button>
                    <button class="pb-3 text-sm font-medium text-[#8a8460] dark:text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors border-b-2 border-transparent">
                        Commandes
                    </button>
                    <button class="pb-3 text-sm font-bold text-primary border-b-2 border-primary hidden">
                        Historique
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-[#f8f8f5] dark:bg-[#1a1810] p-2 rounded-xl border border-[#e6e4db] dark:border-gray-700">
                <div class="flex w-full md:w-auto flex-1 gap-2 overflow-x-auto px-2 scrollbar-hide items-center">
                    <div class="flex items-center bg-white dark:bg-gray-800 rounded-lg px-3 py-2 border border-transparent focus-within:border-primary w-full md:max-w-xs shadow-sm">
                        <span class="material-symbols-outlined text-[#8a8460] dark:text-gray-400">search</span>
                        <input class="bg-transparent border-none focus:ring-0 text-sm w-full text-[#181711] dark:text-white placeholder:text-[#8a8460] dark:placeholder:text-gray-500" placeholder="Nom, ID, Date..." type="text" />
                    </div>
                    <div class="w-px h-8 bg-[#e6e4db] dark:bg-gray-700 mx-2 hidden md:block"></div>
                    <div class="flex gap-2">
                        <button class="whitespace-nowrap px-4 py-2 bg-white dark:bg-gray-800 text-[#181711] dark:text-white border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium rounded-lg transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">calendar_month</span>
                            <span>Octobre 2023</span>
                        </button>
                        <button class="whitespace-nowrap px-4 py-2 bg-white dark:bg-gray-800 text-[#5e5a45] dark:text-gray-300 border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium rounded-lg transition-colors flex items-center gap-2">
                            <span>Statut: Tous</span>
                            <span class="material-symbols-outlined text-lg">arrow_drop_down</span>
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-auto px-2">
                    <button class="flex w-full md:w-auto items-center justify-between gap-3 bg-white dark:bg-gray-800 border border-[#e6e4db] dark:border-gray-700 rounded-lg px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors shadow-sm">
                        <div class="flex items-center gap-2 text-[#181711] dark:text-white">
                            <span class="material-symbols-outlined text-sm">filter_list</span>
                            <span class="text-sm font-semibold">Filtres avancés</span>
                        </div>
                    </button>
                </div>
            </div>
            <div class="w-full overflow-hidden rounded-xl border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">
                <div class="overflow-x-auto hidden " id="commande-tbl">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#fcfbf8] dark:bg-gray-900 border-b border-[#e6e4db] dark:border-gray-700">
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Date &amp; Heure</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 w-24">ID</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Client </th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 w-1/3">type</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Montant</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Statut</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f0efeb] dark:divide-gray-800 text-sm">
                            <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">24 Oct</span>
                                        <span class="text-xs">19:30</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#1028</td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">Jean Dupont</span>
                                        <div class="flex items-center gap-1 text-xs text-[#8a8460] dark:text-gray-500">
                                            <span class="material-symbols-outlined text-[14px]">takeout_dining</span>
                                            <span>À Emporter</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-[#181711] dark:text-gray-300 line-clamp-1">2x Pizza 4 Fromages, 2x Tiramisu</p>
                                </td>
                                <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">$42.00</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
                                        Terminée
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" title="Voir les détails">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">24 Oct</span>
                                        <span class="text-xs">20:00</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#RES-402</td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">Marie Currie</span>
                                        <div class="flex items-center gap-1 text-xs text-[#8a8460] dark:text-gray-500">
                                            <span class="material-symbols-outlined text-[14px]">table_restaurant</span>
                                            <span>Sur Place</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-[#181711] dark:text-gray-300 line-clamp-1">Table 4 • 4 personnes</p>
                                </td>
                                <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">-</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-[#eefae6] dark:bg-green-900/20 text-[#1a7f37] dark:text-green-400 border border-[#ccebc4] dark:border-green-800/50">
                                        Honorée
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" title="Voir les détails">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors opacity-75">
                                <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">23 Oct</span>
                                        <span class="text-xs">18:45</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#1025</td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">Lucas M.</span>
                                        <div class="flex items-center gap-1 text-xs text-[#8a8460] dark:text-gray-500">
                                            <span class="material-symbols-outlined text-[14px]">two_wheeler</span>
                                            <span>Livraison</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-[#181711] dark:text-gray-300 line-clamp-1">1x Burger Classique, 1x Frites</p>
                                </td>
                                <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">$18.50</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900/50">
                                        Annulée
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" title="Voir les détails">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">23 Oct</span>
                                        <span class="text-xs">21:15</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#1022</td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">Sophie L.</span>
                                        <div class="flex items-center gap-1 text-xs text-[#8a8460] dark:text-gray-500">
                                            <span class="material-symbols-outlined text-[14px]">restaurant</span>
                                            <span>Sur Place</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-[#181711] dark:text-gray-300 line-clamp-1">1x Vin Blanc, 2x Pâtes Truffe</p>
                                </td>
                                <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">$56.00</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
                                        Terminée
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" title="Voir les détails">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">22 Oct</span>
                                        <span class="text-xs">19:00</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#RES-398</td>
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-[#181711] dark:text-white">Marc H.</span>
                                        <div class="flex items-center gap-1 text-xs text-[#8a8460] dark:text-gray-500">
                                            <span class="material-symbols-outlined text-[14px]">table_restaurant</span>
                                            <span>Sur Place</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-[#181711] dark:text-gray-300 line-clamp-1">Table 2 • 2 personnes</p>
                                </td>
                                <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">-</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 border border-orange-200 dark:border-orange-900/50">
                                        No-Show
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" title="Voir les détails">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="overflow-x-auto " id="reservation-tbl">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-[#fcfbf8] dark:bg-gray-900 border-b border-[#e6e4db] dark:border-gray-700">
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 w-16">
                                    #
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">
                                    Client
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">
                                    Date &amp; Heure
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">
                                    Pax
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">
                                    Type de plat
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">
                                    Statut
                                </th>
                                <th
                                    class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 text-right">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f0efeb] dark:divide-gray-800 text-sm">
                            <!-- les données sont chargés avec js -->
                        </tbody>
                    </table>
                </div>
                <div id="reservation-pagination" class="flex items-center justify-between px-6 py-4 bg-[#fcfbf8] dark:bg-gray-900 border-t border-[#e6e4db] dark:border-gray-700">
                    <span class="text-sm text-[#8a8460] dark:text-gray-400">
                        Affichage de <span class="font-medium text-[#181711] dark:text-white">1</span> à <span class="font-medium text-[#181711] dark:text-white">5</span> sur <span class="font-medium text-[#181711] dark:text-white">482</span> entrées
                    </span>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 text-sm text-[#8a8460] dark:text-gray-400 border border-[#e6e4db] dark:border-gray-700 rounded hover:bg-white dark:hover:bg-gray-800 disabled:opacity-50" disabled="">Précédent</button>
                        <button class="px-3 py-1 text-sm text-[#181711] dark:text-white border border-[#e6e4db] dark:border-gray-700 rounded bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Réservations admin -->

<script src="/js/admin/reservation.js"></script>
<script src="/js/admin/booking-tabs.js"></script>
<?php
\core\Vue::fin_section('contenu');
?>