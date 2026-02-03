<?php


// Accepte un objet ou un tableau sous le nom $item, et l'utilise comme $reservation

$reservation = $item;


\core\Vue::extends('layouts.principal');
\core\Vue::debut_section('contenu');
?>


<style>
    body {
        font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;
    }
</style>



<main class="flex-grow">
    <div class="max-w-[960px] mx-auto px-4 md:px-10 py-8">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 py-4">
            <a class="text-[#8a8460] dark:text-gray-400 text-base font-medium leading-normal hover:underline" href="#">Accueil</a>
            <span class="text-[#8a8460] dark:text-gray-400 text-base font-medium leading-normal">/</span>
            <span class="text-[#181711] dark:text-white text-base font-medium leading-normal">Modification de Réservation</span>
        </div>
        <!-- PageHeading -->
        <div class="flex flex-wrap justify-between gap-3 py-6">
            <div class="flex min-w-72 flex-col gap-3">
                <h2 class="text-[#181711] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Modifier votre réservation</h2>
                <p class="text-[#8a8460] dark:text-gray-400 text-base font-normal leading-normal">Mettez à jour les détails de votre table chez Limoncello Kinshasa.</p>
            </div>
        </div>
        <!-- Reservation Card (Current State) -->
        <div class="pb-8">
            <div class="flex flex-col md:flex-row items-stretch justify-start rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-white dark:bg-[#2d2a1b] overflow-hidden border border-[#e5e4de] dark:border-[#3d3a2a]">
                <div class="w-full md:w-1/3 bg-center bg-no-repeat aspect-video md:aspect-auto bg-cover" data-alt="Interior of an elegant Italian restaurant with warm lighting" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBu8QmDuDbxDMB4r6rROhXVpY-471SviY4GDHBqxxuHxvFzuDBJErQB_tXVpEv7uz54BHip5MbvHwV_mb2gmhrOx4_G-MU01VhJeUs_0LpBvWtLu8UTcRCggbDvHBMH0YP7AjZ1cFfOL_YIMUYi6xjj48buwkpTny9ayJkvwtObdckI2bGXrlDemAkKEnT4dUL6mcqmvvUSB2K_RWIsTDE7DVY1iKP6-lvhP3bw2o_3KNKxKBYCJcGWLfOUzABMiCcrmq2h2lTFGkTL");'>
                </div>
                <div class="flex w-full min-w-72 grow flex-col justify-center gap-2 p-6">
                    <div class="flex items-center justify-between">
                        <p class="text-[#181711] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Réservation #<?= htmlspecialchars($reservation['code_unique'] ?? $reservation['code'] ?? '-') ?></p>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded uppercase">
                            <?= htmlspecialchars($reservation['statut'] ?? $reservation['status'] ?? 'En attente') ?>
                        </span>
                    </div>
                    <p class="text-[#8a8460] dark:text-gray-400 text-base font-normal leading-normal">Limoncello - Kinshasa, Gombe</p>
                    <div class="flex items-center gap-2 text-sm text-[#181711] dark:text-gray-300 mt-2">
                        <span class="material-symbols-outlined text-sm">calendar_month</span>
                        <span><?= htmlspecialchars($reservation['reservation_date'] ?? $reservation['date'] ?? '-') ?></span>
                        <span class="mx-2">•</span>
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span><?= htmlspecialchars($reservation['reservation_time'] ?? $reservation['heure'] ?? '-') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Section -->
        <div class="bg-white dark:bg-[#2d2a1b] rounded-xl shadow-sm border border-[#e5e4de] dark:border-[#3d3a2a] p-6 md:p-8">
            <h3 class="text-[#181711] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] mb-6 border-b pb-4 border-gray-100 dark:border-[#3d3a2a]">Nouveaux détails</h3>
            <form class="space-y-6">

                <div class=" grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name Input -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-[#181711] dark:text-gray-300">Nom de la réservation</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400">person</span>
                            <input name="nom" class="w-full pl-10 pr-4 py-3 rounded-lg border border-[#e5e4de] dark:border-[#3d3a2a] bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" type="text" value="<?= htmlspecialchars($reservation['customer_name'] ?? $reservation['nom'] ?? '') ?>" />
                        </div>
                    </div>
                    <!-- Guests Count -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-[#181711] dark:text-gray-300">Nombre de personnes</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400">group</span>
                            <select name="personnes" class="w-full pl-10 pr-4 py-3 rounded-lg border border-[#e5e4de] dark:border-[#3d3a2a] bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none appearance-none transition-all">
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <option value="<?= $i ?>" <?= (isset($reservation['persons']) && $reservation['persons'] == $i) ? 'selected' : '' ?>><?= $i ?> Personne<?= $i > 1 ? 's' : '' ?></option>
                                <?php endfor; ?>
                                <option value="6+" <?= (isset($reservation['persons']) && $reservation['persons'] === '6+') ? 'selected' : '' ?>>6+ Personnes</option>
                            </select>
                        </div>
                    </div>
                    <!-- Date Picker -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-[#181711] dark:text-gray-300">Date</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400">event</span>
                            <input name="date" class="w-full pl-10 pr-4 py-3 rounded-lg border border-[#e5e4de] dark:border-[#3d3a2a] bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" type="date" value="<?= htmlspecialchars($reservation['reservation_date'] ?? $reservation['date'] ?? '') ?>" />
                        </div>
                    </div>
                    <!-- Time Picker -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-[#181711] dark:text-gray-300">Heure</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400">schedule</span>
                            <input type="time" name="heure" class="w-full pl-10 pr-4 py-3 rounded-lg border border-[#e5e4de] dark:border-[#3d3a2a] bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" value="<?= htmlspecialchars($reservation['reservation_time'] ?? $reservation['heure'] ?? '') ?>">

                        </div>
                    </div>
                </div>
                <!-- Special Requests -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-bold text-[#181711] dark:text-gray-300">Demandes spéciales (Optionnel)</label>
                    <textarea name="special" class="w-full px-4 py-3 rounded-lg border border-[#e5e4de] dark:border-[#3d3a2a] bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all resize-none" placeholder="Ex: Anniversaire, préférence de table, allergies..." rows="3"><?= htmlspecialchars($reservation['special'] ?? $reservation['message'] ?? '') ?></textarea>
                </div>
                <!-- Actions -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 pt-4 mt-6 border-t border-gray-100 dark:border-[#3d3a2a]">
                    <button class="flex items-center justify-center gap-2 px-6 py-3 w-full md:w-auto text-sm font-bold text-[#8a8460] dark:text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors" type="button">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Retour
                    </button>
                    <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                        <button class="flex items-center justify-center px-6 py-3 rounded-lg bg-red-50 text-red-600 text-sm font-bold hover:bg-red-100 transition-colors" type="button">
                            Annuler la réservation
                        </button>
                        <button class="flex items-center justify-center px-8 py-3 rounded-lg bg-primary text-[#181711] text-sm font-bold shadow-md hover:bg-opacity-90 transition-all" type="submit">
                            Enregistrer les modifications
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Help Footer -->
        <div class="mt-8 text-center">
            <p class="text-[#8a8460] dark:text-gray-400 text-sm">
                Besoin d'aide ? Appelez-nous au <span class="font-bold text-[#181711] dark:text-white">+243 81 234 5678</span>
            </p>
        </div>
    </div>

</main>
<script>
    window.reservationData = <?php echo json_encode($reservation ?? []); ?>;
</script>
<script src="/js/reservation/modifier.js"></script>
<?php \core\Vue::fin_section('contenu'); ?>