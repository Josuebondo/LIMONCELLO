<?php \Core\Vue::extends('layouts.principal'); ?>
<!-- Hero Section -->
<main class="flex-1">
    <div class="px-4 md:px-20 lg:px-40 flex justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
            <div class="@container">
                <div class="@[480px]:p-4">
                    <div class="flex min-h-[520px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 rounded-xl items-center justify-center p-8 text-center animate__bounceIn" data-alt="Lush green garden terrace of Limoncello restaurant" style='background-image: linear-gradient(rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBLTD-WtHuhjtRJ3ctdsFAXfYHl5-YL4sZZFvFlUAt1UvqPSTeXzardK1_MtGbpaXpNplCiD-l32CoiHoGVhGFObE564AElnMWFPLYoVKeAoaQ467HFEwbTJEZzI0Xe9z6nAI3Hg_r2LyeVyWdYw0SL5zOZrS_ILCcPdJjDHjh7zTfnwNXmZNbIS8U_lnJVUGTmRQBrCB0YBfEr2tN349ZR3vgi-cWi1Vu_bh_yBaefseBHmkTwMzLc4aEPYB2wKBTJ_briFAMtynfX");'>
                        <div class="flex flex-col gap-4 max-w-[800px] animate__fadeInUp">
                            <h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-6xl font-display animate__fadeInDown">
                                Limoncello: Une Passion Italienne au Cœur de Kinshasa
                            </h1>
                            <p class="text-white/90 text-lg font-normal leading-relaxed @[480px]:text-xl italic animate__fadeInUp">
                                Découvrez l'héritage d'une cuisine authentique et le charme de notre jardin secret.
                            </p>
                        </div>
                        <div class="mt-4 animate__bounce">
                            <span class="material-symbols-outlined text-white text-4xl animate-bounce">keyboard_double_arrow_down</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Notre Histoire Narrative -->
    <div class="px-4 md:px-20 lg:px-40 flex justify-center py-12 md:py-20">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
            <div class="flex flex-col md:flex-row gap-12 items-center px-4">
                <div class="w-full md:w-1/2 flex flex-col gap-6 animate__slideInLeft">
                    <h2 class="text-primary text-sm font-bold uppercase tracking-widest animate__fadeInDown">Le Commencement</h2>
                    <h1 class="text-3xl md:text-5xl font-display font-bold leading-tight animate__bounceIn">De la Terre à l'Assiette</h1>
                    <p class="text-lg leading-relaxed text-[#555] dark:text-gray-300 animate__fadeInUp">
                        L'aventure a commencé avec un seul citronnier importé d'Amalfi et planté avec amour dans le sol fertile de Kinshasa. Ce qui n'était au départ qu'un rêve de partager les saveurs de notre enfance italienne est devenu, au fil des décennies, une véritable institution culinaire.
                    </p>
                    <p class="text-lg leading-relaxed text-[#555] dark:text-gray-300 animate__fadeInUp">
                        Chaque pierre de notre terrasse raconte une histoire de résilience et de passion. Aujourd'hui, Limoncello est un lieu où les traditions séculaires de la gastronomie italienne rencontrent la générosité vibrante de la culture congolaise.
                    </p>
                </div>
                <div class="w-full md:w-1/2 animate__zoomIn">
                    <div class="relative">
                        <div class="bg-primary/20 absolute -top-4 -left-4 w-full h-full rounded-xl -z-10"></div>
                        <img alt="Vintage style photo of original restaurant courtyard" class="rounded-xl shadow-2xl grayscale hover:grayscale-0 transition-all duration-700 aspect-[4/3] object-cover animate__rollIn" data-alt="Vintage photograph of a beautiful Italian courtyard" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8tx2kd-NBubXNL-kQdIEwpZd1YFUd0tUuqc6uMrJbNk5-fJX_TAe5XjrIJ_JajsxdpZjGRkfxv7dDkyDNzygbUxn-Dda9j2oGW6uv_pyDutrF-GnXgwuORq4z-I0wLaoGJ_YiLdYdZdBjFrGf9UzkVIc05Isr2ibDcJiW09B6n9-36g8ICede6Zp6GaXYHAHV3mguQ0tkJLNWLGSxxdNDoag3EVgwYULCikxht4A_xnJBXQgzoohi0oBuBHg4XeDuCuRyCHHBYFi8" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features / Timeline -->
    <div class="bg-white/50 dark:bg-[#1a1a0c] py-20">
        <div class="px-4 md:px-20 lg:px-40 flex justify-center">
            <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 px-4">
                    <div class="flex flex-col gap-6 text-center">
                        <div class="w-20 h-20 bg-primary/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="material-symbols-outlined text-primary text-3xl">history_edu</span>
                        </div>
                        <h3 class="text-2xl font-display font-bold">1992: Les Débuts</h3>
                        <p class="text-base text-[#666] dark:text-gray-400">Une vision née de la nostalgie pour les saveurs authentiques de l'Italie du Sud sous le soleil de Kinshasa.</p>
                    </div>
                    <div class="flex flex-col gap-6 text-center">
                        <div class="w-20 h-20 bg-primary/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="material-symbols-outlined text-primary text-3xl">deck</span>
                        </div>
                        <h3 class="text-2xl font-display font-bold">2005: L'Expansion</h3>
                        <p class="text-base text-[#666] dark:text-gray-400">L'ouverture de notre terrasse emblématique, un havre de paix urbain devenu le refuge secret de la ville.</p>
                    </div>
                    <div class="flex flex-col gap-6 text-center">
                        <div class="w-20 h-20 bg-primary/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="material-symbols-outlined text-primary text-3xl">stars</span>
                        </div>
                        <h3 class="text-2xl font-display font-bold">Aujourd'hui</h3>
                        <p class="text-base text-[#666] dark:text-gray-400">Une référence gastronomique célébrée pour sa constance, son excellence et son accueil chaleureux.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Header - Chef -->
    <div class="px-4 md:px-20 lg:px-40 flex justify-center py-20">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
            <div class="bg-[#f3f3e7] dark:bg-[#2a2a14] rounded-2xl overflow-hidden shadow-sm">
                <div class="flex flex-col md:flex-row items-stretch">
                    <div class="w-full md:w-2/5 min-h-[400px] bg-cover bg-center" data-alt="Portrait of a professional Italian chef" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDVtdA-O2kX9i7Y9qikL91OskbOWSD3y6R3Y4cqu1JKAHvr9cd7_TFnMbOe2X5fbdeObVUWpD3eqoObBCFid8o5Vxbu-zwEzsmJLAJyAnHNglYub7nWPeIxE4C-XDln3b8IvNF8tHWFJ54Rv2Sa8atfvY4XzBAohfPYwjoR3tp3MHZyoW90uY8oSAKCstWBZHE_Ub8xXbikGV7lUwae4QAibwnfxwXdFJKFuEcpSR6kxc08WpK_5hshV35Cco3qe1fXEeSQaJM9fNbb");'>
                    </div>
                    <div class="w-full md:w-3/5 p-8 md:p-16 flex flex-col justify-center gap-6">
                        <h2 class="text-primary text-sm font-bold uppercase tracking-widest">Le Cœur du Restaurant</h2>
                        <h1 class="text-3xl md:text-5xl font-display font-bold">Marco Rossi, Notre Chef</h1>
                        <p class="text-xl font-display italic text-[#444] dark:text-gray-300 border-l-4 border-primary pl-6 py-2">
                            « Ma cuisine est un dialogue entre les racines italiennes et la générosité de la terre congolaise. Je ne cuisine pas seulement des plats, je prépare des souvenirs. »
                        </p>
                        <p class="text-base leading-relaxed text-[#666] dark:text-gray-400">
                            Chef Marco apporte avec lui trois décennies d'expérience acquise dans les cuisines les plus prestigieuses de Rome et de Florence, adaptant son savoir-faire aux ingrédients locaux les plus frais de la région du Pool Malebo.
                        </p>
                        <button class="flex min-w-[200px] self-start cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-[#1b1b0d] text-base font-bold leading-normal transition-transform hover:scale-105">
                            <span>Découvrir sa vision</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ingredient Showcase -->
    <div class="px-4 md:px-20 lg:px-40 flex justify-center py-10">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
            <div class="flex flex-col gap-8">
                <div class="text-center max-w-[700px] mx-auto flex flex-col gap-4">
                    <h2 class="text-3xl md:text-4xl font-display font-bold italic">L'Art de la Cuisine Italienne</h2>
                    <p class="text-[#666] dark:text-gray-400">La qualité commence par le respect du produit. Nous sélectionnons chaque ingrédient avec une exigence absolue.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="group relative overflow-hidden rounded-xl aspect-square">
                        <img class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" data-alt="Close up of fresh yellow lemons" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAFmatnQJRsQLr04xZ8dZp1Ur2drRMiZ5vBxynCQBjLYjEK_B3Q483nph1YPhyHluVZVNEIjpFAsgUusc65-9pl1dND3PHlcsIGj4hWzvh7yj4KRTHRxuMEzWTUxIcdIqaoVhbmxeqbprLjiHhnjS2pZoYdoaYwGhgs-ZbrSWCHXkIqHiTPiWfikpAJ0gyeHxtQfOwXK-Ek-ab5fYUIpvbdY0VtIo2i2UcCKQ2guHn65i3tFCXFchxYDUVmWT22JIdYv0hll6UmfExq" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white font-display text-xl">Citrons d'Amalfi</span>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl aspect-square">
                        <img class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" data-alt="Handmade pasta on a floured surface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2pl-CMqfo1SAuWQ-p5onrTOHrCa5QCMmJ4l80VWmVSJe6YZAxxq1pllv3qx1Q7EIKxgcYbJBfK5hoI3f__1Sz9GaIIfJJujwzvZDA1tyCokghzCEMbIKi0JWSe7-7MOc6Z_oDQPDO7DGGZL9txvSt_N7RKbr0GwzD1B7YDq2v4LaUbBx4rJEx_Li7UVCIuQA-Zks_aj7tlQM8zYDOIyOIgUONYLj0EAAlGrbW_gd2DLMp31VgwErstSCv8ig-7wqUy62og2aoSFrs" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white font-display text-xl">Pasta Fresca</span>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl aspect-square">
                        <img class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" data-alt="Fresh basil leaves and herbs" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIzwiNtnkPPkeBH7LxU-wrEni5cIHjjYr56qHgBI4PIiN5aZ49XO9SzLaOyO02yInCNrYpxYtdRLaVnRmJsdXzwSvtb0OS2HBJPPDIPVBZESTolyQJ-9x9GEhlK4gA2cM3NIrMvjq5P4pc0ObPX-28PEfI7xeBcZUxz54kH_Emzi6pp0yqlLcO5drjkFejR-zyhM-HZhxyez_ffEIhu-3wGyrOIOtKXpnSqjJHOnOqVJi8gZUN5eqmtoc2oC7OHN_PJ98b8dmW7FLe" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white font-display text-xl">Herbes du Jardin</span>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl aspect-square">
                        <img class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" data-alt="Virgin olive oil in glass bottle" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiFK6bMVaYwbaA61SahckyEsAStMwkMIKmZdOM62QkrYDiVOSe9-KVg59sKMJ_kFgkS-3ATHcFOmoWxECls_F9_jSKa4Zw26AffOsFTqFPIH-OpRPPg6hrHNH4U9M2nOKxruIMda7vAJaazpZs4ePHiTm2HX_G01DNxQdjBu3IR8GqcJlNy9ddXEzORuPQUUgdVtAc2WyIfdOHzIm8s4gFBnnXFdWDXR97AtGHR9aQBOnW35xY6BO0fb2Voxe50om8s5dWw8SU4wqW" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white font-display text-xl">Olio d'Oliva</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>