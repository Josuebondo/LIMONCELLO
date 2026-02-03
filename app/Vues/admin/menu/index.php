<script>
    // Filtrage par catégorie (barre admin)
</script>
<?php \core\Vue::extends('layouts.admin'); ?>

<main class="flex-1 flex flex-col h-full overflow-hidden bg-white dark:bg-[#12110c] relative">
    <header class="flex-shrink-0 px-6 py-5 border-b border-[#e6e4db] dark:border-gray-800 bg-white/80 dark:bg-[#12110c]/80 backdrop-blur-sm z-10">
        <div class="flex flex-wrap justify-between items-center gap-4 max-w-7xl mx-auto w-full">
            <div class="flex flex-col gap-1">
                <h2 class="text-[#181711] dark:text-white text-3xl font-black tracking-tight">Carte &amp; Menu</h2>
                <p class="text-[#8a8460] dark:text-gray-400 text-sm">Mettez à jour votre carte en temps réel : disponibilité, spécialités du jour et prix.</p>
            </div>
            <div class="flex gap-3">
                <button class="group flex items-center justify-center gap-2 h-10 px-5 bg-white dark:bg-gray-800 border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-[#181711] dark:text-white text-sm font-bold rounded-lg transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">print</span>
                    <span>Imprimer Menu</span>
                </button>
                <button id="addbtn" class="group flex items-center justify-center gap-2 h-10 px-5 bg-primary hover:bg-[#e6c820] text-light text-sm font-bold rounded-lg transition-all shadow-sm shadow-yellow-200 dark:shadow-none">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    <span>Ajouter un plat</span>
                </button>
                <a href="/upload" class="group flex items-center justify-center gap-2 h-10 px-5 bg-blue-600 hover:bg-blue-700 dark:text-white text-sm font-bold rounded-lg transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">upload</span>
                    <span>Uploader un fichier</span>
                </a>
            </div>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6">
        <div class="flex flex-col gap-6 max-w-7xl mx-auto w-full pb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm relative overflow-hidden">
                    <div class="flex justify-between items-start z-10 relative">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Plats à la carte</p>
                        <span class="bg-[#fff8e1] dark:bg-yellow-900/30 text-[#b26b00] dark:text-yellow-500 text-xs font-bold px-2 py-1 rounded-full">Actif</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold z-10 relative">142</p>
                    <div class="absolute right-0 bottom-0 opacity-5 dark:opacity-10 transform translate-x-2 translate-y-2">
                        <span class="material-symbols-outlined text-8xl">restaurant</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">
                    <div class="flex justify-between items-start">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Spéciaux du jour</p>
                        <span class="bg-[#e7f7e9] dark:bg-green-900/30 text-[#078814] dark:text-green-400 text-xs font-bold px-2 py-1 rounded-full">Visible</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold">3</p>
                </div>
                <div class="flex flex-col gap-2 rounded-xl p-5 border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">
                    <div class="flex justify-between items-start">
                        <p class="text-[#5e5a45] dark:text-gray-400 text-sm font-medium">Indisponibles</p>
                        <span class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xs font-bold px-2 py-1 rounded-full">8</span>
                    </div>
                    <p class="text-[#181711] dark:text-white text-3xl font-bold">En rupture</p>
                </div>
            </div>
            <div class="w-full border-b border-[#e6e4db] dark:border-gray-700">
                <div class="flex gap-8">
                    <button class="pb-3 text-sm font-medium text-[#181711] dark:text-white border-b-2 border-primary font-bold">
                        Tous les plats
                    </button>
                    <?php foreach ($categories as $c):
                        # code...
                    ?>



                        <button data-filtre="<?= htmlspecialchars($c['id']) ?>" class="pb-3 text-sm font-medium text-[#8a8460] dark:text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors border-b-2 border-transparent">
                            <?= htmlspecialchars($c['name']) ?>
                        </button>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-[#f8f8f5] dark:bg-[#1a1810] p-2 rounded-xl border border-[#e6e4db] dark:border-gray-700" id="fonctionalite">
                <div class="flex w-full md:w-auto flex-1 gap-2 overflow-x-auto px-2 scrollbar-hide items-center">
                    <div class="flex items-center bg-white dark:bg-gray-800 rounded-lg px-3 py-2 border border-transparent focus-within:border-primary w-full md:max-w-xs shadow-sm">
                        <span class="material-symbols-outlined text-[#8a8460] dark:text-gray-400">search</span>
                        <input id="searchMenuInput" class="bg-transparent border-none focus:ring-0 text-sm w-full text-[#181711] dark:text-white placeholder:text-[#8a8460] dark:placeholder:text-gray-500" placeholder="Nom, catégorie..." type="text" autocomplete="off" />
                    </div>
                    <div class="w-px h-8 bg-[#e6e4db] dark:bg-gray-700 mx-2 hidden md:block"></div>
                    <div class="flex gap-2">
                        <button class="whitespace-nowrap px-4 py-2 bg-white dark:bg-gray-800 text-[#181711] dark:text-white border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium rounded-lg transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">category</span>
                            <span>Catégorie</span>
                        </button>
                        <button class="whitespace-nowrap px-4 py-2 bg-white dark:bg-gray-800 text-[#5e5a45] dark:text-gray-300 border border-[#e6e4db] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium rounded-lg transition-colors flex items-center gap-2">
                            <span>Prix</span>
                            <span class="material-symbols-outlined text-lg">arrow_drop_down</span>
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-auto px-2">
                    <button id="openFiltersBtn" class="flex w-full md:w-auto items-center justify-between gap-3 bg-white dark:bg-gray-800 border border-[#e6e4db] dark:border-gray-700 rounded-lg px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors shadow-sm">
                        <div class="flex items-center gap-2 text-[#181711] dark:text-white">
                            <span class="material-symbols-outlined text-sm">filter_list</span>
                            <span class="text-sm font-semibold">Filtres avancés</span>
                        </div>
                    </button>
                </div>
            </div>
            <div class="w-full overflow-hidden rounded-xl border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-[#1a1810] shadow-sm">

                <div class="overflow-scroll max-h-[500px]">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#fcfbf8] dark:bg-gray-900 border-b border-[#e6e4db] dark:border-gray-700">
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Image</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Nom du Plat</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Description</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Catégorie</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Ingrédients</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Prix</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400">Disponibilité</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-[#8a8460] dark:text-gray-400 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="menu-tbody" class="divide-y divide-[#f0efeb] dark:divide-gray-800 text-sm">
                            <!-- Rempli par JavaScript -->
                        </tbody>
                    </table>
                </div>
                <!-- Pagination JS sera insérée dans le footer ci-dessous -->

                <div class="flex items-center justify-between p-4 border-t border-[#e6e4db] dark:border-gray-700" id="menu-footer">
                    <p class="text-sm text-[#8a8460] dark:text-gray-400">
                        Affichage de
                        <span class="font-bold text-[#181711] dark:text-white">1</span>
                        à
                        <span class="font-bold text-[#181711] dark:text-white">4</span>
                        sur
                        <span class="font-bold text-[#181711] dark:text-white">142</span>
                        produits
                    </p>
                    <div id="pagination" class="flex gap-2">
                        <!-- Pagination générée par JavaScript -->
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="p-2 rounded-lg border border-[#e6e4db] dark:border-gray-700 text-[#8a8460] dark:text-gray-400 hover:bg-[#f8f8f5] dark:hover:bg-gray-800 disabled:opacity-50">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button class="p-2 rounded-lg border border-[#e6e4db] dark:border-gray-700 text-[#8a8460] dark:text-gray-400 hover:bg-[#f8f8f5] dark:hover:bg-gray-800">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Overlay modal pour mobile -->
<div id="formOverlay" class="hidden md:hidden fixed inset-0 bg-black/50 z-40"></div>

<!-- Formulaire: Modal sur mobile, Panneau sur desktop -->
<div id="formPanel" class="hidden fixed md:relative right-0 top-0 bottom-0 w-full md:w-96 h-full md:h-auto bg-white dark:bg-[#1a1810] border-l border-[#e6e4db] dark:border-gray-700 shadow-xl z-50 overflow-y-auto flex flex-col rounded-t-2xl md:rounded-none md:border-l">
    <div class="p-6 border-b border-[#e6e4db] dark:border-gray-700 sticky top-0 bg-white dark:bg-[#1a1810] z-10 flex justify-between items-center md:flex">
        <h2 class="text-xl font-bold text-[#181711] dark:text-white">
            Ajouter un Plat
        </h2>
        <button id="closeFormBtn" class="text-[#8a8460] dark:text-gray-400 hover:text-[#181711] dark:hover:text-white text-2xl transition-colors">
            ×
        </button>
    </div>
    <form id="itemForm" class="flex-1 p-6 space-y-6 overflow-y-auto">
        <div class="space-y-2">
            <div class="flex justify-between items-baseline">
                <label class="block text-sm font-bold text-[#181711] dark:text-white">Photo du plat</label>
            </div>
            <div id="addPhoto" class="border-2 border-dashed border-[#e6e4db] dark:border-gray-700 rounded-xl p-4 flex flex-col items-center justify-center gap-2 cursor-pointer hover:bg-[#f8f8f5] dark:hover:bg-gray-800/30 transition-colors relative overflow-hidden group min-h-[140px]">
                <input id="photoInput" type="file" accept="image/*" style="display:none;" />
                <div class="absolute inset-0 bg-cover bg-center z-0 opacity-40 group-hover:opacity-20 transition-opacity" id="photoPreview" style="background-image: url('');"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <div class="bg-primary/20 p-3 rounded-full mb-2 group-hover:bg-primary transition-colors">
                        <span class="material-symbols-outlined text-primary group-hover:text-black">add_a_photo</span>
                    </div>
                    <p class="text-sm font-medium text-[#181711] dark:text-white text-center">Glissez une image ou cliquez</p>
                    <p class="text-xs text-[#8a8460] dark:text-gray-400">JPG, PNG max 5Mo</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-3">
            <div class="p-3 rounded-xl bg-[#f8f8f5] dark:bg-gray-800/50 flex items-center justify-between border border-transparent dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="bg-green-100 dark:bg-green-900/30 p-2 rounded-lg">
                        <span class="material-symbols-outlined text-green-700 dark:text-green-400">check_circle</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#181711] dark:text-white">Disponible</p>
                        <p class="text-[10px] text-[#8a8460] dark:text-gray-400">Visible sur le menu</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input id="formAvailable" checked class="sr-only peer" type="checkbox" />
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                </label>
            </div>
            <div class="p-3 rounded-xl bg-[#f8f8f5] dark:bg-gray-800/50 flex items-center justify-between border border-transparent dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="bg-primary/20 p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">grade</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#181711] dark:text-white">Spécial du Jour</p>
                        <p class="text-[10px] text-[#8a8460] dark:text-gray-400">Mis en avant</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input id="formPopular" class="sr-only peer" type="checkbox" />
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                </label>
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-bold text-[#181711] dark:text-white mb-1.5">Nom du plat</label>
                <input id="formName" name="name" required class="w-full rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#181711] dark:text-white focus:ring-primary focus:border-primary px-3 py-2.5 text-sm font-medium" placeholder="Ex: Pizza Margherita" type="text" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-[#181711] dark:text-white mb-1.5">Catégorie</label>
                    <select id="formCategory" name="category_id" required class="w-full rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#181711] dark:text-white focus:ring-primary focus:border-primary px-3 py-2.5 text-sm">
                        <option value="" selected>--selectionez un categorie</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= htmlspecialchars($c['id']) ?>"><?= htmlspecialchars($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-[#181711] dark:text-white mb-1.5">Prix (€)</label>
                    <input id="formPrice" name="price" required type="number" step="0.01" min="0" class="w-full rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#181711] dark:text-white focus:ring-primary focus:border-primary px-3 py-2.5 text-sm font-medium" />
                </div>
            </div>
        </div>
        <div>
            <label class="block text-sm font-bold text-[#181711] dark:text-white mb-1.5">Description</label>
            <textarea id="formDescription" name="description" class="w-full rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#181711] dark:text-white focus:ring-primary focus:border-primary px-3 py-2.5 text-sm" placeholder="Description courte pour le menu..." rows="3"></textarea>
        </div>
        <div>
            <label class="block text-sm font-bold text-[#181711] dark:text-white mb-1.5">Tags & Allergènes</label>
            <div class="relative mb-3">
                <div class="flex gap-2">
                    <input id="tagInput" type="text" class="flex-1 rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#181711] dark:text-white focus:ring-primary focus:border-primary px-3 py-2.5 text-sm" placeholder="Ex: Pimenté, Sans gluten, Vegan..." autocomplete="off" />
                    <button id="addTagBtn" type="button" class="px-4 py-2.5 rounded-lg bg-primary/20 hover:bg-primary/30 text-primary font-bold text-sm transition-colors">Ajouter</button>
                </div>
                <div id="tagSuggestions" class="hidden absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-[#e6e4db] dark:border-gray-700 rounded-lg shadow-lg z-10 max-h-48 overflow-y-auto">
                    <!-- Les suggestions vont s'afficher ici -->
                </div>
            </div>
            <div id="tagsList" class="flex flex-wrap gap-2 p-2 rounded-lg border border-[#e6e4db] dark:border-gray-700 bg-[#f8f8f5] dark:bg-gray-800/30 min-h-[42px]">
                <!-- Les tags vont s'ajouter ici -->
            </div>
            <input id="formTags" name="tags" type="hidden" value="" />
        </div>
    </form>
    <div class="p-6 border-t border-[#e6e4db] dark:border-gray-700 flex gap-3 sticky bottom-0 bg-white dark:bg-[#1a1810] rounded-t-2xl md:rounded-none md:bg-white md:dark:bg-[#1a1810]">
        <button id="cancelFormBtn" class="flex-1 px-4 py-3 rounded-lg border border-[#e6e4db] dark:border-gray-700 text-[#181711] dark:text-white font-bold text-sm hover:bg-[#f8f8f5] dark:hover:bg-gray-800 active:scale-95 transition-all duration-200 flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-lg">close</span>
            <span>Annuler</span>
        </button>
        <button id="submitFormBtn" class="flex-1 px-4 py-3 rounded-lg bg-primary hover:bg-[#e6c820] active:scale-95 text-[#181711] font-bold text-sm shadow-md shadow-yellow-200 dark:shadow-none transition-all duration-200 flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-lg">check</span>
            <span>Enregistrer</span>
        </button>
    </div>
</div>
<script>
    const URLROOT = '<?= url('') ?>';
    //  console.log(URLROOT);
</script>
<script src="<?= asset('js/admin/menu.js') ?>"></script>
<script src="/js/menu-filtres.js"></script>