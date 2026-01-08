<?php \Core\Vue::extends('layouts.header'); ?>
<main class="flex flex-col items-center">
    <div class="w-full max-w-[1200px] px-4 md:px-10 flex flex-col">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pt-10 pb-6 fade-in-view">
            <div class="flex flex-col gap-2">
                <h1 class="text-4xl font-extrabold leading-tight tracking-[-0.015em] dark:text-white fade-in-view">La Carte</h1>
                <p class="text-slate-500 dark:text-[#a0c992] max-w-md fade-in-view">Découvrez notre sélection de spécialités italiennes authentiques préparées avec passion et des ingrédients de première qualité.</p>
            </div>
            <!-- View Toggle -->
            <div class="flex min-w-[200px] h-11 items-center justify-center rounded-xl bg-slate-100 dark:bg-[#2c4823] p-1.5">
                <label class="flex cursor-pointer h-full grow items-center justify-center rounded-lg px-4 gap-2 has-[:checked]:bg-white dark:has-[:checked]:bg-background-dark has-[:checked]:shadow-sm text-slate-500 dark:text-[#a0c992] has-[:checked]:text-primary text-sm font-bold transition-all">
                    <span class="material-symbols-outlined text-lg">grid_view</span>
                    <span class="truncate">Mosaïque</span>
                    <input checked="" class="hidden" name="view-toggle" type="radio" value="mosaic" />
                </label>
                <label class="flex cursor-pointer h-full grow items-center justify-center rounded-lg px-4 gap-2 has-[:checked]:bg-white dark:has-[:checked]:bg-background-dark has-[:checked]:shadow-sm text-slate-500 dark:text-[#a0c992] has-[:checked]:text-primary text-sm font-bold transition-all">
                    <span class="material-symbols-outlined text-lg">list</span>
                    <span class="truncate">Liste</span>
                    <input class="hidden" name="view-toggle" type="radio" value="list" />
                </label>
            </div>
        </div>
        <!-- Category Tabs (Sticky) -->
        <div class="sticky top-[65px] z-40 bg-background-light dark:bg-background-dark py-2 fade-in-view">
            <div class="flex border-b border-slate-200 dark:border-[#3f6732] gap-8 overflow-x-auto no-scrollbar fade-in-view">
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-primary text-slate-900 dark:text-white pb-3 pt-4 whitespace-nowrap" href="#pizzas">
                    <p class="text-sm font-bold leading-normal tracking-[0.015em]">PIZZAS</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#a0c992] pb-3 pt-4 whitespace-nowrap hover:text-primary transition-colors" href="#pastas">
                    <p class="text-sm font-bold leading-normal tracking-[0.015em]">PÂTES</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#a0c992] pb-3 pt-4 whitespace-nowrap hover:text-primary transition-colors" href="#secondi">
                    <p class="text-sm font-bold leading-normal tracking-[0.015em]">SECONDI</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#a0c992] pb-3 pt-4 whitespace-nowrap hover:text-primary transition-colors" href="#desserts">
                    <p class="text-sm font-bold leading-normal tracking-[0.015em]">DESSERTS</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#a0c992] pb-3 pt-4 whitespace-nowrap hover:text-primary transition-colors" href="#vins">
                    <p class="text-sm font-bold leading-normal tracking-[0.015em]">VINS &amp; COCKTAILS</p>
                </a>
            </div>
        </div>
        <!-- Pizzas Section -->
        <section class="py-8 fade-in-view" id="pizzas">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white flex items-center gap-3 fade-in-view">
                <span class="w-10 h-[2px] bg-primary"></span>
                Pizzas Napolitaines
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Pizza Item 1 -->
                <div class="group  fade-in-view relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg hover:shadow-primary/10 transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center overflow-hidden" data-alt="Traditional margherita pizza with fresh basil" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuARwDUY3YfB9Q2ERKQJ0WmOvPEfXdAn3i3l8LulWXq6uSERjLPVDaZn-KDJDgjivdgCImojX21VVCY7q9J0KFTZkIlWkzaeEalOWsb0E8oRyRX3UTk88QRLdm1pwM977AWGvzAq8t4-w3Tp8BtP_Ady6g3H_16QRvoiBEmv48ApYxx-llcFOehGEA2KHbU45x-Z8u3xTUMb2Srae1Yo1rT8tRP-MWrljKHDFfz9YwL-pwQJMnazQtU4haZ6osfPDnDZMLP6SSlRSFkk");'>
                        <div class="w-full h-full bg-black/20 group-hover:bg-black/0 transition-all"></div>
                    </div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Margherita Extra</h4>
                            <span class="text-primary font-bold">14€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Tomates San Marzano, Mozzarella di Bufala, Basilic frais, Huile d'olive extra vierge.</p>
                    </div>
                </div>
                <!-- Pizza Item 2 -->
                <div class="group fade-in-view relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Truffle pizza with mushrooms and white base" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC4-JvbDFWIS9i-_XGOk-MQAtlfmMudJJvxJADZZfthFFnMMjcaJEfcYsuVsu5KzeIbNOfVvlMim5oheh-2ZOWmdHeqQhILnXnDNUlm2kdxKwjIrFLLqXSwM26ttpzcTb_vyRhpC-_Q2zt2FhQZeVijJpvMnE1lhfIm2l20pM5pE2oZ2HAQqm7qEx4-RFt_XUBXDmcuNiavOMUrXBNo2nYgZOHVKD89TYVJVYI9hodA9dwaGeOttomKnbRvmNNs8humJocvlCC_bjYg");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Tartufata</h4>
                            <span class="text-primary font-bold">21€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Crème de Truffe, Fior di Latte, Champignons de saison, Parmesan 24 mois.</p>
                    </div>
                </div>
                <!-- Pizza Item 3 -->
                <div class="group relative fade-in-view bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Spicy pepperoni pizza with red peppers" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAxsYBGyld7sm-hnTvHodOp6SJ4PNhSA5QkQEBbiwQCkNm3GKjHMnuDVfBqIHH2573vs5wPxB2W3AAqzvgbOyLDfMRa4uH56JJAX0mKqiq4zRSv-SyLVWTeODsqzpu58cxancWq-OLrMcLmp0QGFqfqR09aF6-02XbfiRf462W2eJ5a0avuN-n9nXq-SaREeeKmKGXontM6RKyMME4-XGw-IBKCzT86MGQgh-1aEAw664qU2A3qB3DaXo5aeLy_CEQCbwE-MbJfJL8e");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Diavola</h4>
                            <span class="text-primary font-bold">16€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Tomates, Salami piquant de Calabre, Nduja, Fior di Latte, Oignons rouges.</p>
                    </div>
                </div>
                <!-- Pizza Item 4 -->
                <div class="group relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Four cheese pizza gourmet style" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAWUE-98basXcvCkcuHwaM6-bEnxDbQTQetCcQXz9y6YJFKNWR_0H65YQjFOCtWk5j1wyk5VnJCW8VpWZm8WX1DZBaVtN2q-HHXQh-ZX9Lfb5V6JBnRp_hNC2RGjkVOT_SjvSCicJiYTaZEzKV_aGU40Ny586D12oqkYSIv5LiCbB4tHJXaUU5wJ-f0mJJp8Rddb0igykKTiNsO-oi94jqTMQZiOdMFN7XQmKG3toVI6Ap67VLgIhaRBWaPkxXPqSQnkin-DLpgYDMR");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">4 Formaggi</h4>
                            <span class="text-primary font-bold">17€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Fior di Latte, Gorgonzola DOP, Taleggio, Ricotta fumée.</p>
                    </div>
                </div>
                <!-- Pizza Item 5 -->
                <div class="group fade-in-view relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Napoli pizza with anchovies and olives" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCJ867uA5IJUohwWoNZ_mHpQU-wdWlA3QA2GmtyKIRU32nvBIJ0Nb0TCBJj7WAc16tnjAtVyRwqoi95KfammKk96eNLgGn9lbBoqaClKPzrPOlr_s6s5lSSrYgtMlt3DhFtcEK-lbfE-He0hgXNK06HuTxBu7-lmmiFxjgtaHh2vFuK-IFkPmC0VPYI9F3ibSVCVvQ2nzwn9aSbfGoNAMk_Dzbczzn7Euhulc2vkLLegUG2lXDn78ZdNEgM4nvinU3qjKKrcEb2modx");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Napoletana</h4>
                            <span class="text-primary font-bold">15€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Tomates, Anchois de Cetara, Câpres de Salina, Olives taggiasche.</p>
                    </div>
                </div>
                <!-- Pizza Item 6 -->
                <div class="group relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Calzone pizza folded with ricotta" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCi60Va8H6Q8SFrw3ZekqXKyf92VEbZ0Su8Hl4B_gP9PmtfkXXGHju_Jgm2EXiLgnexDSCG3e2KwM7DBZI0zPSfGilSHHSFRwV15J4Bt45zpAEVTZ1VuFOw0HekXzgAcfKA3MReBe-hh8CBF9d2PPtomvBcE1krVbPn9-4b2f6Dr-0LLz5LiQRvMS-D2ooUm7w8700Mig3Cs7KXIP1LwrgppNatmDd2KR7s1NjdTdtOEkxfPiV93yqPVpU7PFZXi3sUEfGxroWHPEzq");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Calzone Classico</h4>
                            <span class="text-primary font-bold">16€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Chausson farci : Jambon cuit, Ricotta, Fior di Latte, Poivre noir.</p>
                    </div>
                </div>
                <!-- Pizza Item 7 -->
                <div class="group relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Veggie pizza with grilled vegetables" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCA6zt9bCZja_jDn9OTmac36WpTMdGiyugK4PtUNtElyTyaGkwPbY92SbBllmHxTqain-BlMWBlvxUz8gAnG94TpiU-i8J6BPW2IQH5tPvrmU7tVIHjzEPxjYjvH-slHRgIogDm2nL4vCaKl-TORZo-Tdhfjbw7rb4HxwnT0yckgzGcp8y5_xwz1Ze3ahNb4UKjLhm_BVI4EXI_YNln4el0bKz_L2suANJsUkW1DxMVgnCSK48GaNR8JTdvLdRbqqVPFIoDSpyH10cX");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Ortolana</h4>
                            <span class="text-primary font-bold">15€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Légumes de saison grillés, Fior di Latte, Pesto de basilic maison.</p>
                    </div>
                </div>
                <!-- Pizza Item 8 -->
                <div class="group relative bg-white dark:bg-[#1a2d14] rounded-xl overflow-hidden shadow-lg transition-all border border-transparent dark:border-[#2c4823] hover:border-primary/30 fade-in-view">
                    <div class="aspect-square bg-cover bg-center" data-alt="Parma ham pizza with arugula" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAdg5Syyl8ygBYnDmyRn1uDlbKOVEhhwOnW30dY7jWiwEJdkjE_VevZKrYRvtPsuUCCg9jmXpV_eBAdlno3VAt59q3X1kYnYcsx_QvBh0_DSOfMvGVUKh8fDcDCDOuPJgH6Kp1XPyqXhVWfet8m3qOc66Bjy_F2g3RAQ4WnBcOaJLlIheikJQs2Ua9OGc2OIyVBcHYCVtrB7o151rg1GC2ch8DmssUjZKHiF6fmdzoHaQ4BRoZMqTFqPSCcUEQ5iuqLEsbwVtciQD4j");'></div>
                    <div class="p-4 flex flex-col gap-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-lg fade-in-view">Prosciutto &amp; Rucola</h4>
                            <span class="text-primary font-bold">18€</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992] line-clamp-2">Tomates, Mozzarella, Jambon de Parme 18 mois, Roquette, Copeaux de Grana.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pastas Section -->
        <section class="py-8" id="pastas">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white flex items-center gap-3 fade-in-view">
                <span class="w-10 h-[2px] bg-primary"></span>
                Primi Piatti
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                <!-- Pasta List 1 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center gap-2">
                            <h4 class="font-bold text-lg fade-in-view">Carbonara Authentique</h4>
                            <span class="px-2 py-0.5 text-[10px] bg-primary/20 text-primary font-bold rounded uppercase">Best Seller</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Spaghetti alla chitarra, Guanciale croquant, Jaunes d'œufs, Pecorino Romano DOP, Poivre.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">19€</span>
                </div>
                <!-- Pasta List 2 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold text-lg fade-in-view">Linguine alle Vongole</h4>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Palourdes fraîches, Ail, Piment, Vin blanc, Persil plat, Huile d'olive.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">24€</span>
                </div>
                <!-- Pasta List 3 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold text-lg fade-in-view">Pappardelle al Ragu</h4>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Pâtes larges fraîches, Ragoût de bœuf mijoté 12 heures, Vin rouge, Romarin.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">22€</span>
                </div>
                <!-- Pasta List 4 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold text-lg fade-in-view">Gnocchi alla Sorrentina</h4>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Gnocchi de pommes de terre maison, Sauce tomate, Mozzarella di bufala fondue, Basilic.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">18€</span>
                </div>
                <!-- Pasta List 5 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold text-lg fade-in-view">Tagliolini au Homard</h4>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Demi-homard bleu, Tomates cerises, Cognac, Émulsion de crustacés.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">34€</span>
                </div>
                <!-- Pasta List 6 -->
                <div class="flex justify-between items-start border-b border-slate-200 dark:border-[#2c4823] pb-4">
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold text-lg fade-in-view">Ravioli à la Sauge</h4>
                        <p class="text-sm text-slate-500 dark:text-[#a0c992]">Farce Ricotta &amp; Épinards, Beurre noisette, Sauge fraîche, Parmesan craquant.</p>
                    </div>
                    <span class="text-primary font-bold text-lg">20€</span>
                </div>
            </div>
        </section>
        <!-- Secondi Section -->
        <section class="py-8" id="secondi">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white flex items-center gap-3 fade-in-view">
                <span class="w-10 h-[2px] bg-primary"></span>
                Secondi Piatti
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Item 1 -->
                <div class="flex flex-col gap-4">
                    <div class="rounded-xl overflow-hidden h-48 bg-cover bg-center" data-alt="Italian veal cutlet with lemon sauce" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBjIJRGmTK0e9uulIrgV5guw01UmDPr1gwl505JuW7leIc-ZVhwCBfZbZyyO27GTVWBv2-4V7_SGqUhe3qRmu3ry4pUcIQb9a2vO5GXcP8uyNlgZ_XRu8nYYq1sQAA5VC-0IeqF1oAbGMqKcjA--XBXemRLrzGK8gRx-12Vyv3Vwvcgoxsm_V0fG-jEvcdCloRlLTyTI2_ubOFn1vODeQ4P3BxegL-wEEKB3RKdhCAD7XYMKTbl-NCCI1QmSSo87B64mKreZvi5LnNV");'></div>
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-xl uppercase fade-in-view">Scaloppine al Limone</h4>
                        <span class="text-primary font-bold">26€</span>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-[#a0c992]">Fines tranches de veau de lait, sauce onctueuse au citron d'Amalfi et câpres.</p>
                </div>
                <!-- Item 2 -->
                <div class="flex flex-col gap-4">
                    <div class="rounded-xl overflow-hidden h-48 bg-cover bg-center" data-alt="Traditional Osso Buco with gremolata" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAbqPeN-U_KiLl0hzPTK2ax3tkgW55Z_06idaAh3HUGWXf7boSRcORKQCe7zdbBciVoFb1XandE1a-y2uy2gk6X47BfsmsMuMyT8BPIy2Sor4P7RWeoyZCbT_lOgaYK6Rlvla7em528D0QzOjRN29TEW6VVNPFHJK9VeaEGMNeaAqO5z3hlTU1ckp7jjcX24gCzLnG4FZViUzXGZhWUvwDNJd6NP25kDvCX0NnYhwy6MJB0jbvNil6V-xEgrhag8lo19hWPsI1EA0jO");'></div>
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-xl uppercase fade-in-view">Osso Buco alla Milanese</h4>
                        <span class="text-primary font-bold">29€</span>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-[#a0c992]">Jarret de veau braisé au vin blanc et légumes, servi avec son risotto au safran.</p>
                </div>
                <!-- Item 3 -->
                <div class="flex flex-col gap-4">
                    <div class="rounded-xl overflow-hidden h-48 bg-cover bg-center" data-alt="Grilled sea bream with Mediterranean vegetables" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBB2k4GGn9XCaUSGwJINEEERiuVNiYe8CNO-qP7tXPiEts2G5jUSFQ0-zQ3xFqGWv7ctopysOmWsVl4Uz319pkzXiI_W6WSLUTdbqE1Vc3MD8QkpA2YO8voIHDZrOS58LYDm4mgHPLdoVooh2TsEMBgxavOx8-trlSdAF3NzYlgEms12k98AtZjoTFxf1s1OmY8uZJfJ2z80ciJr6o-XltxG8vdQw0vui5op_Eg9PhP3hwGyC6lYmEZi14RMjAPjQQd7bdB5oks9OlI");'></div>
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-xl uppercase fade-in-view">Orata alla Griglia</h4>
                        <span class="text-primary font-bold">27€</span>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-[#a0c992]">Daurade royale entière grillée aux herbes, légumes croquants et huile citronnée.</p>
                </div>
            </div>
        </section>
        <!-- Desserts Section -->
        <section class="py-12 border-t border-slate-200 dark:border-[#2c4823]" id="desserts">
            <div class="text-center mb-10">
                <h3 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-2 fade-in-view">Dolci</h3>
                <p class="text-slate-500 dark:text-[#a0c992] fade-in-view">La touche finale parfaite pour votre voyage culinaire.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Dessert 1 -->
                <div class="group cursor-pointer">
                    <div class="aspect-video rounded-xl bg-cover bg-center mb-3" data-alt="Classic creamy tiramisu dessert" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDVBzsIQpA0-mZsneyoLL6lrAilFzin6JofcBw1MW-hPnZQg8xbmjyNFgWWnZ_cfahhseLXcci5zjzj8PFxbkEoU6oFymESzliI4B1I9Pi48vvQPzjnTzHo6BMZlqDk8L-Okos1oc6IeMy9jQwSpnkN06FNe1JdbUs167lmLG4n16mC9an6AvA9G3e7VUBcXlGMVOzkhFTJIMmfe5ElyCnCcpUr7XtgtsO82k1DNSjyo-qqQQZJBTJb0y_xdJKSUXIB6VWjiCBa8aXB");'></div>
                    <div class="flex justify-between items-center px-1">
                        <h4 class="font-bold group-hover:text-primary transition-colors">Tiramisu Maison</h4>
                        <span class="text-sm font-bold text-primary">9€</span>
                    </div>
                </div>
                <!-- Dessert 2 -->
                <div class="group cursor-pointer">
                    <div class="aspect-video rounded-xl bg-cover bg-center mb-3" data-alt="Panna cotta with basil and strawberry" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBNOaBDnfgLgTaObhL8OWd5SRFxxpsBV27EX2iFKPWMV8EDQ7RV6eA432zIByDtmEuFBwlvMrImvPvyH_bc2bSJuzehhrUVLxVMBv7IYrstWyWsgMN03QUq-eXML6JezB4ctxLfW1LvVIgl2WF6O1MZVXZ4nxNCIjRgOfHDcBkEsuk37PnYSmRT8Yr0Qk0X1HQRC3uf5LMdydGlx1wsG_SioqPSYmcCddxmUJp3yCi3M1Ss37vgf0rRmcw8O8bfo_x_4K7we9cgYZuq");'></div>
                    <div class="flex justify-between items-center px-1">
                        <h4 class="font-bold group-hover:text-primary transition-colors">Panna Cotta Basilic</h4>
                        <span class="text-sm font-bold text-primary">8€</span>
                    </div>
                </div>
                <!-- Dessert 3 -->
                <div class="group cursor-pointer">
                    <div class="aspect-video rounded-xl bg-cover bg-center mb-3" data-alt="Molten chocolate fondant cake" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCysN_cewBv32qLVCBMou-kvO_NJv8KJeNFVxThSkqvsxNpBSBLd738UOvjzcW7FdXQAqOVYpp6nK6d5fzhOApYPBlwvxCqvtKxuZESXsqZH0gQGJXWw6d_jV_hZl_n5KYTG16Kffvisx3rxMbcgZCcmBSOJRYSIaEVGQDFRTDv_iy5gwg7HYxYLN5Y2GpNLgU8hRzFsbJFhE4EyxGoP_1iDDw6zAI5NY6sN9v8ahue0jZXpj_KcAj3HTQYHRSS4wnFnwgaLGWfN4RD");'></div>
                    <div class="flex justify-between items-center px-1">
                        <h4 class="font-bold group-hover:text-primary transition-colors">Fondant Gianduja</h4>
                        <span class="text-sm font-bold text-primary">10€</span>
                    </div>
                </div>
                <!-- Dessert 4 -->
                <div class="group cursor-pointer">
                    <div class="aspect-video rounded-xl bg-cover bg-center mb-3" data-alt="Italian lemon sorbet in a lemon shell" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD88ywFwgq0UkQBVwW8B0EvJZ5AZV-Lp4L7hLWIN4gLqwwqse411ZSS6AOeHL9j79FcFKNLEZOE5wNUQCF3QhTJC-8AEBF6Y4qOEPUS3CH5aGpBCAu4cPt57YIBaemSxVxofFlfxnidGwdm-NFzPOTBDz_pt0e5wEnVNXKa5pz59ihJYssFCCIlGKSzy-Daya1EugUnv0gNpzyT_nGZwAdlwCI6PXN1VV0BOZtIb-Qk6Yyu4XH5juxpHIhNB88CCcGl2f8GTbHKurrY");'></div>
                    <div class="flex justify-between items-center px-1">
                        <h4 class="font-bold group-hover:text-primary transition-colors">Sorbetto Limoncello</h4>
                        <span class="text-sm font-bold text-primary">8€</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Promo -->
        <div class="mt-12 mb-20 p-8 rounded-2xl bg-slate-900 text-white relative overflow-hidden flex flex-col items-center text-center gap-6">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
            <h3 class="text-2xl font-bold z-10">Une occasion spéciale à célébrer ?</h3>
            <p class="max-w-xl text-slate-300 z-10 leading-relaxed">Privatisez Limoncello pour vos événements privés ou professionnels. Menu sur mesure, service exclusif et ambiance italienne inoubliable.</p>
            <button class="z-10 px-8 py-3 bg-primary text-background-dark font-bold rounded-lg hover:scale-105 transition-transform">Nous contacter</button>
        </div>
    </div>
</main>
<!-- Footer Info -->
<footer class="bg-slate-100 dark:bg-[#1a2d14] py-10 px-4 mt-auto">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-4 text-primary">
                <span class="material-symbols-outlined">restaurant</span>
                <h2 class="text-lg font-bold uppercase text-slate-900 dark:text-white">Limoncello</h2>
            </div>
            <p class="text-sm text-slate-500 dark:text-[#a0c992]">L'excellence de la cuisine italienne au cœur de la ville. Produits frais importés directement d'Italie.</p>
        </div>
        <div class="flex flex-col gap-4">
            <h3 class="font-bold text-slate-900 dark:text-white">Horaires</h3>
            <ul class="text-sm text-slate-500 dark:text-[#a0c992] space-y-2">
                <li class="flex justify-between"><span>Lundi - Jeudi</span> <span>12:00 - 22:30</span></li>
                <li class="flex justify-between"><span>Vendredi - Samedi</span> <span>12:00 - 00:00</span></li>
                <li class="flex justify-between"><span>Dimanche</span> <span>12:00 - 22:00</span></li>
            </ul>
        </div>
        <div class="flex flex-col gap-4">
            <h3 class="font-bold text-slate-900 dark:text-white">Suivez-nous</h3>
            <div class="flex gap-4">
                <a class="w-10 h-10 rounded-full bg-slate-200 dark:bg-[#2c4823] flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined">share</span></a>
                <a class="w-10 h-10 rounded-full bg-slate-200 dark:bg-[#2c4823] flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined">camera</span></a>
                <a class="w-10 h-10 rounded-full bg-slate-200 dark:bg-[#2c4823] flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined">alternate_email</span></a>
            </div>
            <p class="text-xs text-slate-400 mt-2">© 2024 Limoncello Restaurant. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</div>
</main>
<script src="<?= asset('js/view-polyfill.js') ?>"></script>
<script src="<?= asset('js/app.js') ?>"></script>