<?php
// echo "<?php\n";
// print_r($categories);
// print_r($menus);
// return;
// app/Vues/menu/index.php
\core\Vue::extends('layouts.principal');
?>
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #181611;
    }

    ::-webkit-scrollbar-thumb {
        background: #393528;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #f2b90d;
    }

    @media (max-width: 640px) {
        #menu-contener>div {
            min-width: 0;
            max-width: 100%;
            aspect-ratio: 1/1.3;
            height: auto;
            padding: 0.25rem;
        }
    }

    body {
        overflow-x: hidden;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<main class="max-w-[1600px] mx-auto pb-20 w-full overflow-x-hidden">
    <!-- Category Filters -->
    <div class="px-4 md:px-10 lg:px-40 py-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-extrabold tracking-tight">Notre Carte</h1>
            <p class="text-[#bab29c] italic">Menu de saison • Automne 2024</p>
        </div>
        <div id="menu-filtres" class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide w-full min-w-0">
            <button data-filtre="all" class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary text-background-dark font-bold shadow-lg shadow-primary/20 px-6 text-white hover:bg-[#4a4536] transition-colors">
                <span class="material-symbols-outlined text-lg">restaurant</span>
                Tous les plats
            </button>
            <?php foreach ($categories as $c):
            ?>
                <button data-filtre="<?= htmlspecialchars($c['id']) ?>" class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#393528] px-6 text-white hover:bg-[#4a4536] transition-colors">
                    <?= htmlspecialchars($c['name']) ?>
                </button>
            <?php endforeach;
            ?>


        </div>
    </div>
    <!-- 10-Column Responsive Grid -->
    <div class="px-2 md:px-10 lg:px-10 w-full overflow-x-hidden">
        <div id="menu-contener" class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 xl:grid-cols-8 gap-1 sm:gap-3">
            <!-- Menu items will be dynamically loaded here -->
        </div>
    </div>
</main>
<div id="menu-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white/70 hidden">
    <span class="material-symbols-outlined animate-spin text-amber-700 text-6xl">autorenew</span>
</div>
<script src="/js/menu-filtres.js"></script>
<!-- Modal Overlay (Dish Detail) -->
<!-- Note: In a real app, this would be toggled by JS. Here it's visible to show the design -->
<div class="fixed hidden inset-0 z-[100] flex items-center justify-center p-4" id="dish-detail-modal">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-primary/40 via-transparent to-gold/20 pointer-events-none"></div>
    <div class="relative bg-card-dark w-full max-w-4xl rounded-2xl overflow-hidden shadow-2xl flex flex-col md:flex-row animate-in fade-in zoom-in duration-300">
        <!-- Close Button -->
        <button id="closedetail-btn" class="absolute top-4 right-4 text-white z-10 bg-black/40 hover:bg-primary hover:text-background-dark p-2 rounded-full transition-all">
            <span class="material-symbols-outlined">close</span>
        </button>
        <!-- Modal Image Section -->
        <div class="md:w-1/2 relative aspect-video md:aspect-auto">
            <div class="absolute inset-0 bg-cover bg-center modal-image" data-alt="Gros plan sur un filet mignon en croûte" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC1RyznWCT0p7DRJrao5BcESSFNmYFLgZwlD5hMOWkRG8hAho0C7oaXTj_BLoIFQJEkCPtcSqhzT0a_rXtHpq4vYMkRWBOCvNN2hWG2LBy17cvOLbk9d22NVTRDEYaCdyV5eYuT-Ont9012IRxzL10_UFxc70M0nQYAcsOgwQKxVhqnCn6X9DVoz81XM1dnYbjNG7f-_XH_JGcZiGPsvKiP_QOhWYAh96KkVnNqWmJi8W8w4FL76CmJ-bM60XXA7EMC4_myzgS4HSM");'></div>
            <div class="absolute inset-0 bg-gradient-to-t from-card-dark via-transparent to-transparent md:bg-gradient-to-r"></div>
        </div>
        <!-- Modal Content Section -->
        <div class="md:w-1/2 p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="bg-primary/20 text-primary text-[10px] font-bold px-2 py-1 rounded uppercase tracking-tighter">Chef's Choice</span>
                    <div class="flex gap-2">
                        <span class="material-symbols-outlined text-green-500 text-lg" title="Sén Gluten">spa</span>
                        <span class="material-symbols-outlined text-orange-400 text-lg" title="Végan">energy_savings_leaf</span>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2 modal-title">Filet Mignon en Croûte</h2>
                <p class="text-gold text-2xl font-bold mb-6 modal-price">32,00€</p>
                <div class="space-y-4 mb-8">
                    <div>
                        <h4 class="text-[#bab29c] text-xs font-bold uppercase tracking-widest mb-2">Description</h4>
                        <p class="text-white/80 leading-relaxed text-sm modal-description">
                            Un cœur de bœuf tendre enveloppé dans une pâte feuilletée croustillante avec une duxelles de champignons de Paris et herbes fraîches. Accompagné d'une réduction au vin rouge corsé et de mini-légumes glacés.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-[#bab29c] text-xs font-bold uppercase tracking-widest mb-2">Ingrédients</h4>
                        <div class="flex flex-wrap gap-2 modal-ingredients">
                            <span class="bg-[#393528] px-3 py-1 rounded-full text-xs text-white/90">Bœuf Charolais</span>
                            <span class="bg-[#393528] px-3 py-1 rounded-full text-xs text-white/90">Pâte feuilletée maison</span>
                            <span class="bg-[#393528] px-3 py-1 rounded-full text-xs text-white/90">Champignons de Paris</span>
                            <span class="bg-[#393528] px-3 py-1 rounded-full text-xs text-white/90">Herbes de Provence</span>
                            <span class="bg-[#393528] px-3 py-1 rounded-full text-xs text-white/90">Beurre noisette</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="flex items-center bg-[#393528] rounded-lg modal-qty-block">
                    <button class="px-4 py-2 hover:text-primary transition-colors text-xl">-</button>
                    <span class="px-2 font-bold">1</span>
                    <button class="px-4 py-2 hover:text-primary transition-colors text-xl">+</button>
                </div>
                <button class="flex-1 bg-primary text-background-light font-bold py-3 px-6 rounded-lg hover:gold transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                    Ajouter au panier
                </button>
            </div>
        </div>
    </div>
</div>
<script src="<?= asset('js/menu.js') ?>"></script>