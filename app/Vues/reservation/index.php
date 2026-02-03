<?php \Core\Vue::extends('layouts.principal'); ?>


<main class="flex-1 pt-16">
    <!-- Hero Section -->
    <div class="relative min-h-[400px] w-full flex items-center justify-center py-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black/40 z-10"></div>
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAU79olZlvkgfmzCrb-Q6pbicy8Hy6N4iV5liyUzkvNRUMkflIQikvwmrJaqcrdgRJhZxI9Au4pJWNlfUShH_VK-iL4n-IUgr9aqio1iZ4uhQxK65HcNwd6vD9n0wP68Eqi80N3nO22uUGZZDRZgJbUFlruYPuqOBwQSaHw4cMgTSMQsRwRXVtbOfXtGHqGhSJahf5chIONUR-vQ8cMb5TUzkj-N9za5GrwjBqa5glNoe_L-ae8jyxl4FWZugfW6bd1S98El-hpbmDO');"></div>
        </div>
        <div class="relative z-20 text-center px-4">
            <h1 class="text-white text-4xl md:text-5xl font-bold tracking-tight mb-4 drop-shadow-md">Réserver une table</h1>
            <p class="text-white/90 text-lg max-w-lg mx-auto drop-shadow">Une expérience culinaire italienne authentique vous attend</p>
        </div>
    </div>

    <!-- Reservation Form -->
    <div class="max-w-[1000px] mx-auto -mt-20 relative z-30 px-4 pb-20">
        <div class="bg-white dark:bg-[#2d2a1a] rounded-xl shadow-2xl p-8 md:p-12">
            <div id="reservation-loader" class="hidden flex flex-col items-center justify-center py-12">
                <span class="material-symbols-outlined animate-spin text-5xl text-primary mb-4">autorenew</span>
                <p class="text-[#8a8460] dark:text-gray-400">Envoi de votre réservation...</p>
            </div>
            <div id="form-container" class="form-container">
                <div class="mb-10 text-center">
                    <h2 class="text-2xl font-bold mb-2">Réservez votre table</h2>
                    <p class="text-[#8a8460] dark:text-gray-400">Complétez le formulaire ci-dessous</p>
                    <div class="h-1 w-16 bg-primary mx-auto rounded-full mt-4"></div>
                </div>

                <div id="reservation-success" class="hidden text-center py-12">
                    <span class="material-symbols-outlined text-6xl text-green-500 mb-4">check_circle</span>
                    <h3 class="text-2xl font-bold mb-2">Merci pour votre réservation !</h3>
                    <p class="text-[#8a8460] dark:text-gray-400 mb-4">Nous avons bien reçu votre demande. Nous vous contacterons pour confirmation.</p>
                    <a href="/" class="inline-block mt-4 px-6 py-2 bg-primary text-white rounded-lg font-bold">Retour à l'accueil</a>
                </div>



                <form id="reservationForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?= csrf_input() ?>

                        <!-- Nom -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">person</span>
                                Votre nom
                            </label>
                            <input type="text" id="customer_name" placeholder="Ex: Jean Dupont"
                                class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary"
                                required />
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">phone</span>
                                Téléphone
                            </label>
                            <input type="tel" id="phone" placeholder="Ex: 06 12 34 56 78"
                                class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary"
                                required />
                        </div>

                        <!-- Date -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">calendar_today</span>
                                Date de réservation
                            </label>
                            <input type="date" id="reservation_date"
                                class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary"
                                required />
                        </div>

                        <!-- Heure -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">schedule</span>
                                Heure de réservation
                            </label>
                            <input type="time" id="reservation_time"
                                class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary"
                                required />
                        </div>

                        <!-- Nombre de personnes -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">group</span>
                                Nombre de personnes
                            </label>
                            <select id="persons" class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="">Sélectionnez</option>
                                <option value="1">1 personne</option>
                                <option value="2">2 personnes</option>
                                <option value="3">3 personnes</option>
                                <option value="4">4 personnes</option>
                                <option value="5">5 personnes</option>
                                <option value="6">6 personnes</option>
                                <option value="7">7 personnes</option>
                                <option value="8">8 personnes</option>
                                <option value="9">9 personnes</option>
                                <option value="10">10+ personnes</option>
                            </select>
                        </div>
                        <!-- type de plat -->
                        <div>
                            <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                                <span class="material-symbols-outlined text-sm inline">group</span>
                                Type de plat
                            </label>
                            <select id="type" class="w-full px-4 py-3 border border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="">Sélectionnez</option>
                                <option value="Sur place">Sur place</option>
                                <option value="Livraison">Livraison</option>
                                <option value="À emporter">À emporter</option>
                            </select>
                        </div>

                        <!-- Statut (optionnel - par défaut pending) -->
                        <input type="hidden" id="status" value="pending" />
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-sm font-medium text-[#181711] dark:text-white mb-2">
                            <span class="material-symbols-outlined text-sm inline">comment</span>
                            Message spécial (optionnel)
                        </label>
                        <textarea id="message" placeholder="Ex: Allergie, occasion spéciale..." rows="4"
                            class="w-full px-4 py-3 border resize-none border-[#e6e4db] dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary hover:bg-[#e6c820] text-light font-bold py-3 rounded-lg transition-colors mt-8">
                        <span class="material-symbols-outlined text-sm inline mr-2">check_circle</span>
                        Confirmer la réservation
                    </button>

                    <p class="text-xs text-[#8a8460] dark:text-gray-400 text-center">
                        Nous confirmerons votre réservation par téléphone
                    </p>
                </form>
            </div>
            <div id="confim-container" class="hidden confim-container layout-content-container flex flex-col max-w-[960px] w-full gap-8">
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

                <div class="bg-white dark:bg-background-dark border border-[#f5f4f0] dark:border-white/10 rounded-xl shadow-sm p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary"></div>
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-8 border-b border-[#f5f4f0] dark:border-white/10">
                        <h2 class="text-[#181711] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">
                            Détails de la réservation
                        </h2>
                        <div class="flex flex-col items-start md:items-end">
                            <p class="text-[10px] font-extrabold uppercase tracking-[0.1em] text-[#181711]/40 dark:text-white/30 mb-1">Code de réservation</p>
                            <div class="flex items-center gap-2 bg-background-light dark:bg-white/5 border border-primary/20 rounded-lg px-4 py-2 group hover:border-primary transition-all cursor-pointer">
                                <span class="text-xl font-mono font-bold text-[#181711] dark:text-primary tracking-widest uppercase code-unique">LMC-9247X</span>
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
                                <p class="text-lg font-semibold dark:text-white conf-nom">Jean-Pierre Mukendi</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Date</p>
                                <p class="text-lg font-semibold dark:text-white conf-date">Vendredi, 15 Décembre 2023</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                                <span class="material-symbols-outlined">schedule</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Heure</p>
                                <p class="text-lg font-semibold dark:text-white conf-heure">20:30</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-[#181711] dark:text-primary">
                                <span class="material-symbols-outlined">groups</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#181711]/50 dark:text-white/40 mb-1">Personnes</p>
                                <p class="text-lg font-semibold dark:text-white conf-personnes">4 Personnes</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 p-4 bg-background-light dark:bg-white/5 rounded-lg flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">location_on</span>
                        <p class="text-sm dark:text-white/80">Limoncello, Avenue de l'Équateur, Gombe, Kinshasa</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center py-6">
                    <button id="add-to-calendar-btn" type="button" class="w-full md:w-auto px-8 py-4 bg-primary text-gold font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-105 transition-all shadow-md">
                        <span class="material-symbols-outlined">event</span>
                        Ajouter au calendrier
                    </button>
                    <a href="/" class="w-full md:w-auto px-8 py-4 border-2 border-[#181711] dark:border-white text-[#181711] dark:text-white font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-[#181711] hover:text-white dark:hover:bg-white dark:hover:text-background-dark transition-all">
                        <span class="material-symbols-outlined">home</span>
                        Retour à l'accueil
                    </a>
                </div>
                <div class="text-center pb-10">
                    <p class="text-sm text-[#181711]/50 dark:text-white/40">
                        Besoin d'aide ou d'une modification ? Appelez-nous au <span class="font-bold">+243 00 000 0000</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Définir la date minimale à aujourd'hui
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('reservation_date').setAttribute('min', today);

        // Gestion du formulaire
        document.getElementById('reservationForm').addEventListener('submit', handleSubmit);
    });
</script>
<script src="/js/booking/booking.js"></script>
<script src="/js/booking/booking-calendar.js"></script>