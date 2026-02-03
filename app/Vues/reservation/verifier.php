<?php

\core\Vue::extends('layouts.principal');
\core\Vue::debut_section('contenu');
?>

<style>
    body {
        font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>

<main class="flex flex-1 flex-col items-center justify-center px-4 py-12 md:px-40">
    <div class="w-full max-w-[600px] flex flex-col items-center">
        <div class="mb-8 text-center">
            <h1 class="text-[#181711] dark:text-[#f8f8f5] tracking-tight text-4xl font-extrabold leading-tight pb-3">Vérifier votre réservation</h1>
            <p class="text-[#8a8460] dark:text-[#c4c1a7] text-lg font-normal leading-normal max-w-md mx-auto">
                Entrez le code unique reçu par SMS ou Email pour accéder aux détails de votre expérience chez Limoncello.
            </p>
        </div>
        <div class="w-full bg-white dark:bg-[#221f10] p-8 rounded-2xl shadow-xl border border-[#e6e4db] dark:border-[#333124]">
            <div class="flex flex-col gap-6">
                <div id="verif-loader" class="hidden flex items-center justify-center py-4">
                    <span class="material-symbols-outlined animate-spin text-3xl text-primary">autorenew</span>
                    <span class="ml-2 text-[#8a8460] dark:text-gray-400">Vérification en cours...</span>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[#181711] dark:text-[#f8f8f5] text-base font-semibold">Code de réservation
                        <div class="relative mt-2">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#8a8460] material-symbols-outlined">confirmation_number</span>
                            <input class="w-full pl-12 pr-12 h-14 rounded-xl border border-[#e6e4db] dark:border-[#333124] bg-background-light dark:bg-[#181711] dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none text-lg font-medium tracking-widest uppercase reservation-code-input" placeholder="EX: LMN-243-890" value="" />
                            <button type="button" title="Coller le code" class="absolute right-2 top-1/2 -translate-y-1/2 bg-primary/10 hover:bg-primary/30 text-primary rounded-lg p-2 transition-colors paste-btn" tabindex="-1">
                                <span class="material-symbols-outlined">content_paste</span>
                            </button>
                        </div>
                    </label>
                </div>
                <button class="w-full bg-primary hover:bg-[#e5c822] text-[#181711] font-bold h-14 rounded-xl text-lg flex items-center justify-center gap-2 transition-all shadow-md group">
                    <span>Vérifier la disponibilité</span>
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </div>
            <div class="mt-10 pt-8 border-t border-[#f5f4f0] hidden dark:border-[#333124]">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold dark:text-white">Détails de la réservation</h3>
                    <span id="reservation-status" class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm" id="reservation-status-icon">check_circle</span> <span id="reservation-status-text">Confirmée</span>
                    </span>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-background-light dark:bg-[#181711] p-4 rounded-xl">
                        <p class="text-xs text-[#8a8460] uppercase font-bold tracking-tight mb-1">Client</p>
                        <p class="text-base font-semibold dark:text-white">Jean-Pierre Kabila</p>
                    </div>
                    <div class="bg-background-light dark:bg-[#181711] p-4 rounded-xl">
                        <p class="text-xs text-[#8a8460] uppercase font-bold tracking-tight mb-1">Couverts</p>
                        <p class="text-base font-semibold dark:text-white">4 Personnes</p>
                    </div>
                    <div class="bg-background-light dark:bg-[#181711] p-4 rounded-xl">
                        <p class="text-xs text-[#8a8460] uppercase font-bold tracking-tight mb-1">Date</p>
                        <p class="text-base font-semibold dark:text-white">24 Mars 2024</p>
                    </div>
                    <div class="bg-background-light dark:bg-[#181711] p-4 rounded-xl">
                        <p class="text-xs text-[#8a8460] uppercase font-bold tracking-tight mb-1">Heure</p>
                        <p class="text-base font-semibold dark:text-white">20:30</p>
                    </div>
                </div>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 h-12 rounded-xl border-2 border-[#e6e4db] dark:border-[#333124] text-[#181711] dark:text-[#f8f8f5] font-bold text-sm hover:bg-[#f5f4f0] dark:hover:bg-[#333124] transition-all">
                        <span class="material-symbols-outlined text-lg">edit</span>
                        Modifier la réservation
                    </button>
                    <button class="flex items-center justify-center gap-2 h-12 rounded-xl bg-red-50 dark:bg-red-950/20 text-red-600 dark:text-red-400 font-bold text-sm border border-red-100 dark:border-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/30 transition-all">
                        <span class="material-symbols-outlined text-lg">cancel</span>
                        Annuler la réservation
                    </button>
                </div>
                <div class="mt-8 rounded-xl overflow-hidden h-40 relative group">
                    <img alt="Carte stylisée du restaurant à Kinshasa" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCV4YTFWfuBf3TfytlVsRAXPhFIbo1Ranh1J6SqmL2pKE6juLD-LTFRHvgodvnEDnCDRx-yLq9qCS5-BhLJ59mUBEylPUPZ0C0S5EW9OvSdQv0dKPiuzJB4gqT4iI-JEMHlTBzuQvMRiLGUFxYeqTxWJEU6OhXi8pOpdlTg1TIA2U0WI_7YRZtHB7aQ0YNw6X-JJas87EtmuA07_70Fmoc6NFH4wF985762f8-T71siw5RXZnH63BDE9d9psqAv9VcNcoqn4PPTUe3v" />
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                    <div class="absolute bottom-3 left-3 bg-white dark:bg-background-dark p-2 rounded-lg text-xs font-bold flex items-center gap-2 shadow-lg">
                        <span class="material-symbols-outlined text-primary text-sm">location_on</span>
                        Gombe, Kinshasa
                    </div>
                </div>
            </div>
            <div class="mt-6 hidden">
                <div class="bg-red-50 dark:bg-red-900/10 border border-red-100 dark:border-red-900/30 p-4 rounded-xl flex items-start gap-3">
                    <span class="material-symbols-outlined text-red-500">error</span>
                    <div>
                        <p class="text-red-800 dark:text-red-400 font-bold text-sm">Code invalide</p>
                        <p class="text-red-700 dark:text-red-500/80 text-sm">Nous ne trouvons aucune réservation avec ce code. Veuillez vérifier votre saisie.</p>
                        <button class="mt-2 text-red-800 dark:text-red-400 font-bold text-sm underline">Réessayer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 flex flex-col items-center gap-4">
            <p class="text-[#8a8460] text-sm">Besoin d'aide supplémentaire ?</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a class="flex items-center gap-2 text-[#181711] dark:text-[#f8f8f5] text-sm font-bold border-b-2 border-primary/30 hover:border-primary transition-all" href="#">
                    <span class="material-symbols-outlined text-base">call</span>
                    +243 812 345 678
                </a>
                <a class="flex items-center gap-2 text-[#181711] dark:text-[#f8f8f5] text-sm font-bold border-b-2 border-primary/30 hover:border-primary transition-all" href="#">
                    <span class="material-symbols-outlined text-base">mail</span>
                    Support Limoncello
                </a>
            </div>
        </div>
    </div>
</main>
<script src="/js/booking/verifier.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionne le bouton Modifier
        const btnModifier = document.querySelector("button span.material-symbols-outlined:text-lg");
        if (btnModifier) {
            // Trouve le bouton parent
            const btn = btnModifier.closest("button");
            btn.addEventListener("click", function() {
                // Récupère l'id de la réservation (à adapter selon votre JS)
                const reservationId = window.reservationData?.id;
                if (reservationId) {
                    window.location.href = `/reservations/modifier?id=${reservationId}`;
                } else {
                    alert("Impossible de trouver l'id de la réservation.");
                }
            });
        }
    });
</script>