<?php \core\Vue::extends('layouts.principal'); ?>
<?php \core\Vue::debut_section('contenu'); ?>
<style>
    body {
        font-family: "Plus Jakarta Sans", sans-serif;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>

<main class="flex-1 px-4 md:px-40 py-10 flex flex-col items-center">
    <div class="layout-content-container flex flex-col max-w-[960px] w-full gap-8">
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-green-600 dark:text-green-400 text-5xl font-bold">check_circle</span>
            </div>
            <h1 class="text-[#181711] dark:text-white tracking-light text-[32px] md:text-[40px] font-bold leading-tight px-4 text-center">
                Merci pour votre réservation !
            </h1>
            <p class="text-[#181711]/70 dark:text-white/60 text-lg font-normal leading-normal pb-3 pt-2 px-4 text-center max-w-2xl">
                A presto ! Votre table est réservée chez Limoncello Kinshasa. Un email de confirmation a été envoyé à votre adresse.
            </p>
        </div>
        <div class="flex w-full grow bg-transparent p-0">
            <div class="w-full overflow-hidden aspect-[21/9] rounded-xl flex shadow-lg">
                <div class="w-full bg-center bg-no-repeat bg-cover aspect-auto rounded-none flex-1 transition-transform hover:scale-105 duration-700" data-alt="Interior view of Limoncello restaurant with warm lighting and Italian decor" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDvYf9SV6T3ogtxg2BDtjaZdQIagV16B39TEZHt_HdxgHDuOpWhmitAggqFQlFqQEdBKOOOuCnov3IX-D-IRyLM9Ok9x93qJ3bzZ4OeLTWkeyKq7ecwHdLB3Fkuki8QooYHWsV5HxtlXpxVx4S9qJHCUBv8c8D0_8sjRPusTo3RxfY14sxVGpeab1x8nY7H6-W7klVynLoqP78Cy-EbbhM6DH5_RLwmAf5IEp7suSjxqV8nKPhsljiWoowZexsvFVOPUGt3AF8GzQ45");'>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-background-dark border border-[#f5f4f0] dark:border-white/10 rounded-xl shadow-sm p-8 md:p-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-primary"></div>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-8 border-b border-[#f5f4f0] dark:border-white/10">
                <h2 class="text-[#181711] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">
                    Détails de la réservation
                </h2>
                <div class="flex flex-col items-start md:items-end">
                    <p class="text-[10px] font-extrabold uppercase tracking-[0.1em] text-[#181711]/40 dark:text-white/30 mb-1">Code de réservation</p>
                    <div class="flex items-center gap-2 bg-background-light dark:bg-white/5 border border-primary/20 rounded-lg px-4 py-2 group hover:border-primary transition-all cursor-pointer">
                        <span class="text-xl font-mono font-bold text-[#181711] dark:text-primary tracking-widest uppercase">LMC-9247X</span>
                        <button class="flex items-center text-primary hover:text-primary/70 transition-colors" title="Copier le code">
                            <span class="material-symbols-outlined text-lg">content_copy</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12 mt-8">
                <div class="flex items-start gap-4">
                    <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Invité</p>
                        <p class="text-lg font-semibold dark:text-white">Jean-Pierre Mukendi</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                        <span class="material-symbols-outlined">calendar_today</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Date</p>
                        <p class="text-lg font-semibold dark:text-white">Vendredi, 15 Décembre 2023</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Heure</p>
                        <p class="text-lg font-semibold dark:text-white">20:30</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Personnes</p>
                        <p class="text-lg font-semibold dark:text-white">4 Personnes</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 p-4 bg-background-light dark:bg-white/5 rounded-lg flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">location_on</span>
                <p class="text-sm dark:text-white/80">Limoncello, Avenue de l'Équateur, Gombe, Kinshasa</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 justify-center items-center py-6">
            <button class="w-full md:w-auto px-8 py-4 bg-primary text-[#181711] font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-105 transition-all shadow-md">
                <span class="material-symbols-outlined">event</span>
                Ajouter au calendrier
            </button>
            <button class="w-full md:w-auto px-8 py-4 border-2 border-[#181711] dark:border-white text-[#181711] dark:text-white font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-[#181711] hover:text-white dark:hover:bg-white dark:hover:text-background-dark transition-all">
                <span class="material-symbols-outlined">home</span>
                Retour à l'accueil
            </button>
        </div>
        <div class="text-center pb-10">
            <p class="text-sm text-[#181711]/50 dark:text-white/40">
                Besoin d'aide ou d'une modification ? Appelez-nous au <span class="font-bold">+243 00 000 0000</span>
            </p>
        </div>
    </div>
</main>