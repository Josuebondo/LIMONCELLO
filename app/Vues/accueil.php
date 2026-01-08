<?php \Core\Vue::extends('layouts.header'); ?>
<!-- Hero Section -->
<main class="flex-1">
    <div class="px-4 lg:px-40 py-8">
        <div class="max-w-[1200px] mx-auto">
            <div class="@container">
                <div class="relative min-h-[600px] flex flex-col items-center justify-center p-8 rounded-2xl overflow-hidden bg-cover bg-center" data-alt="Authentic Italian pizza on wood table in a lush garden terrace" style='background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDeuVYeIDfYVdCAXZ18s7DPHtsVx5FxkJA4ZNAvyfTG54cOM415wF7bl7DwAVfzcyUWOEkvflOHZjZxFkL77539ggieFucW1PTXENLXTE9PrCYXMxqwB1DlzDna7urG_exVmn68um4H3WZ9BiOoZ26g9Q2da68k0FgbVTTvqAKVL_OePCO0oIkuzADWYNxPius3fXWZ38wlwGqMwItSVjAo-w4nsnQYH8sdXM9eVO0MpLh1I9c8VZnX75_2ScolReG9PDzi2bfj1a8k");'>
                    <div class="flex flex-col gap-6 text-center max-w-3xl">
                        <h1 class="text-white text-5xl md:text-7xl font-black font-serif leading-tight reveal-fade-up">
                            L’authenticité italienne au cœur de Kinshasa
                        </h1>
                        <p class="text-white/90 text-lg md:text-xl font-light max-w-2xl mx-auto leading-relaxed reveal-fade-in-150">
                            Découvrez les saveurs de l'Italie dans notre jardin secret au centre de Gombe. Une expérience culinaire raffinée entre tradition et modernité.
                        </p>
                    </div>
                    <div class="mt-10 flex flex-wrap gap-4 justify-center">
                        <button class="flex min-w-[160px] cursor-pointer items-center justify-center rounded-lg h-14 px-8 bg-primary text-background-dark text-base font-bold shadow-xl shadow-primary/30 hover:bg-primary/90 transition-all reveal-zoom-in-250">
                            Voir le menu
                        </button>
                        <button class="flex min-w-[160px] cursor-pointer items-center justify-center rounded-lg h-14 px-8 bg-white/10 backdrop-blur-md border border-white/30 text-white text-base font-bold hover:bg-white/20 transition-all reveal-slide-left-350">
                            Réserver une table
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats / Quick Info Bar -->
    <div class="px-4 lg:px-40 pb-12">
        <div class="max-w-[1200px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center gap-4 bg-white dark:bg-white/5 p-6 rounded-xl border border-slate-200 dark:border-white/10 shadow-sm reveal-fade-in">
                    <div class="size-12 rounded-full bg-gold/10 flex items-center justify-center text-gold">
                        <span class="material-symbols-outlined">star</span>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-widest">Note Google</p>
                        <p class="text-slate-900 dark:text-white text-xl font-bold">4.3/5 <span class="text-sm font-normal text-slate-400">(500+ avis)</span></p>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white dark:bg-white/5 p-6 rounded-xl border border-slate-200 dark:border-white/10 shadow-sm reveal-fade-in-100">
                    <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">location_on</span>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-widest">Adresse</p>
                        <p class="text-slate-900 dark:text-white text-xl font-bold" data-location="Kinshasa">Gombe, Kinshasa</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white dark:bg-white/5 p-6 rounded-xl border border-slate-200 dark:border-white/10 shadow-sm reveal-fade-in-200">
                    <div class="size-12 rounded-full bg-slate-100 dark:bg-white/10 flex items-center justify-center text-slate-600 dark:text-slate-300">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-widest">Horaires</p>
                        <p class="text-slate-900 dark:text-white text-xl font-bold">12h00 - 23h00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Dishes Section -->
    <div class="px-4 lg:px-40 py-16 bg-slate-50 dark:bg-white/[0.02]">
        <div class="max-w-[1200px] mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 px-4">
                <div class="max-w-xl">
                    <span class="text-gold font-bold tracking-widest uppercase text-sm mb-2 block">Menu Signature</span>
                    <h2 class="text-slate-900 dark:text-white text-4xl font-black font-serif">Nos plats les plus appréciés</h2>
                </div>
                <a class="mt-4 md:mt-0 flex items-center gap-2 text-primary font-bold hover:underline" href="#">
                    Explorer la carte complète
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
                <!-- Dish 1 -->
                <div class="group flex flex-col gap-4 reveal-fade-up">
                    <div class="relative overflow-hidden rounded-xl aspect-[4/5]">
                        <div class="absolute top-4 left-4 z-10 bg-primary text-background-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">
                            Populaire
                        </div>
                        <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="Fresh Italian pizza with creamy burrata and basil" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCgX8-TBLoB_R4-JR6QwmGqk7ighnJyr_2jFjutt89_yRIzy1LwPVhzccKElebHwFc8VWlzkSBiUeJlctkIo3WC2sTHjQeCiKCgcBdHiKZvWpO3RAGKr3f47R35ku7sXLiFEGdkZXVCBdEb3HGylAunTNQnAcitwPZSeknDBkr2EJSqCfllYHnfZUyj78w9HGeV6vugkw1E3heA3iJJxX6vRWp0px4zWFQLzOIrs2Ui6nO-AdIOXuWPihiYkMLHcz1cMMYj0-6WZUr5");'></div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h3 class="text-slate-900 dark:text-white text-lg font-bold">Pizza Burrata</h3>
                            <span class="text-gold font-serif font-bold text-xl">$18</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Tomate, burrata crémeuse, basilic frais, huile d'olive extra vierge.</p>
                    </div>
                </div>
                <!-- Dish 2 -->
                <div class="group flex flex-col gap-4 reveal-fade-up-80">
                    <div class="relative overflow-hidden rounded-xl aspect-[4/5]">
                        <div class="absolute top-4 left-4 z-10 bg-primary text-background-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">
                            Populaire
                        </div>
                        <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="Creamy traditional pasta carbonara with guanciale" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVkOFBCsXB8Ifh9A0kIhRpUU4LiKQiIq7oKMmXKDCSw2A7tTily8GwFwecFa8QjNVIkPWlWB0KJ5iBGb4sbLE-AD3eZns2UwaW182wn71UYBKXFJKCi_-9k9jSa_B03utDg4U0YyPk4H7Xho1nb2DJgBFynKojhxLhqaboRBFTM63icRtw4lyNCHDb47BdoqX6--aHKMs5_9k7p13LrI-QIPHFZCFY1hyLbaOWhRe_SuE5E3IAxCwG_9quON6Guk92Fcilrvl6IYtT");'></div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h3 class="text-slate-900 dark:text-white text-lg font-bold">Pasta Carbonara</h3>
                            <span class="text-gold font-serif font-bold text-xl">$16</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Recette traditionnelle au guanciale, œufs, pecorino romano et poivre noir.</p>
                    </div>
                </div>
                <!-- Dish 3 -->
                <div class="group flex flex-col gap-4 reveal-fade-up-160">
                    <div class="relative overflow-hidden rounded-xl aspect-[4/5]">
                        <div class="absolute top-4 left-4 z-10 bg-primary text-background-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">
                            Populaire
                        </div>
                        <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="Rich osso buco stew with herbs and vegetables" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBfKOzCbd6BQi0bgqOlEH8kjjXcrYnhiCr91MDTx4AD5_ZWgWBP6KSEBWG43_3xWQKpLceLb70ID6_qSbnHfhJSM3GLU4jk60DX9tgj0YOdIr_WYuh0Sw6zzx59J4oGqehW4Acozu5argqF5dAW7C8GB4LsIZLBOsSY0GpV9zDuVxJ09MfunyvMrvLR1DvLvwysoB8yz3LlWSDzFSbNdZd1Fg6nLxnRh6dizfGvCskjBVnva1drMpKerbnr8UOP8uBt4q2gxTxkRMKf");'></div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h3 class="text-slate-900 dark:text-white text-lg font-bold">Osso Buco</h3>
                            <span class="text-gold font-serif font-bold text-xl">$24</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Jarret de veau braisé à la milanaise, servi avec son risotto au safran.</p>
                    </div>
                </div>
                <!-- Dish 4 -->
                <div class="group flex flex-col gap-4 reveal-fade-up-240">
                    <div class="relative overflow-hidden rounded-xl aspect-[4/5]">
                        <div class="absolute top-4 left-4 z-10 bg-primary text-background-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">
                            Populaire
                        </div>
                        <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="Homemade tiramisu layers with cocoa powder" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuARsTN8Tk4bfUwWK1raTYAneStB8ZXCnLPaB5EdQ0-35O8Qzpow2SMJ30G0HI8LoSo_O9UuftrhGJxuxaUygPZLGwDlCf9zE5LDT5SmrxHhp-QhIMYEc6NV0jYpIbg2GWG8_V87eJpcTlC370pwqUx_kZ3Sn6ncBW1qMTkqfyJW0GbRSgCsyXfWHgOy5ZH5_yQFLRvbJ9kzf_sVMqGUxz5-olV7dzpCBmmtBportwsZoR5E_ihR_CKkxN65JkqVS3ZRp777G0BwFl1u");'></div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center">
                            <h3 class="text-slate-900 dark:text-white text-lg font-bold">Tiramisu Maison</h3>
                            <span class="text-gold font-serif font-bold text-xl">$10</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Le classique de la maison, mascarpone onctueux et biscuits imbibés au café.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer CTA -->
    <div class="px-4 lg:px-40 py-20">
        <div class="max-w-[1200px] mx-auto text-center bg-background-dark text-white rounded-3xl p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-gold/10 rounded-full blur-2xl -ml-24 -mb-24"></div>
            <h2 class="text-4xl md:text-5xl font-black font-serif mb-6 relative z-10">Prêt pour un voyage culinaire ?</h2>
            <p class="text-slate-300 max-w-xl mx-auto mb-10 text-lg relative z-10">Réservez votre table dès maintenant pour une soirée inoubliable dans le jardin le plus prisé de Kinshasa.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center relative z-10">
                <button class="bg-primary text-background-dark px-10 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-transform">Réserver maintenant</button>
                <button class="bg-white/10 border border-white/20 px-10 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all">Nous appeler</button>
            </div>
        </div>
    </div>
</main>
<!-- Footer -->
<footer class="bg-slate-900 text-white px-4 lg:px-40 py-12 border-t border-white/5">
    <div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between gap-12">
        <div class="flex flex-col gap-6 max-w-xs">
            <div class="flex items-center gap-3">
                <div class="size-6 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-black font-serif tracking-tight">Limoncello</h2>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed italic">"Le goût de l'Italie, l'âme de Kinshasa."</p>
            <div class="flex gap-4">
                <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">social_leaderboard</span>
                <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">photo_camera</span>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-12 sm:gap-24">
            <div class="flex flex-col gap-4">
                <h4 class="font-bold text-slate-100">Restaurant</h4>
                <ul class="text-slate-400 text-sm flex flex-col gap-2">
                    <li><a class="hover:text-white transition-colors" href="#">La Carte</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Vins &amp; Boissons</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Événements</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Recrutement</a></li>
                </ul>
            </div>
            <div class="flex flex-col gap-4">
                <h4 class="font-bold text-slate-100">Informations</h4>
                <ul class="text-slate-400 text-sm flex flex-col gap-2">
                    <li><a class="hover:text-white transition-colors" href="#">Mentions Légales</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Confidentialité</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Cookies</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-white/5 text-slate-500 text-xs text-center">
        © 2024 Limoncello Kinshasa. Tous droits réservés.
    </div>
</footer>
</div>
</body>

</html>