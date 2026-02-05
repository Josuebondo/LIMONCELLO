<?php
\core\Vue::extends('layouts.principal');
\core\Vue::debut_section('contenu');
?>

<main class="max-w-[1200px] mx-auto px-6 lg:px-10 py-12">
    <div id="form-container" class="mb-20">
        <nav class="flex items-center gap-2 mb-8">
            <a class="text-slate-900 dark:text-background-light opacity-80 text-sm font-medium hover:text-gold transition-colors" href="#">Panier</a>
            <span class="text-primary text-sm">/</span>
            <span class="text-primary text-sm font-bold">Finalisation</span>
        </nav>
        <div class="mb-14">
            <h2 class="text-primary text-5xl lg:text-6xl font-black leading-tight tracking-tight mb-4">Finalisation de commande</h2>
            <p class="text-slate-600 dark:text-muted-white text-xl max-w-2xl font-light">Veuillez renseigner vos informations pour savourer l'excellence italienne à Kinshasa.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <div class="lg:col-span-2 flex flex-col gap-14">
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">1</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Informations de Contact</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?= csrf_input() ?>
                        <label class="flex flex-col">
                            <span for="input-nom" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide">Nom complet</span>
                            <input id="input-nom" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="Ex: Jean Kasongo" />
                        </label>
                        <label class="flex flex-col">
                            <span for="input-telephone" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide">Numéro de téléphone</span>
                            <input id="input-telephone" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="+243 ..." />
                        </label>
                        <label class="flex flex-col md:col-span-2">
                            <span for="input-email" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide">Adresse Email</span>
                            <input id="input-email" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="exemple@email.com" />
                        </label>
                    </div>
                </section>
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">2</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Mode de Réception</h3>
                    </div>
                    <div class="flex p-1.5 bg-background-light dark:bg-background-dark rounded-xl mb-8 border border-border-dark w-full md:w-fit transition-colors">
                        <button id="btn-livraison" type="button" class="flex-1 md:w-40 py-4 rounded-lg bg-primary text-background-dark font-black text-base transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/10 focus:outline-none">
                            <span class="material-symbols-outlined text-xl">delivery_dining</span>
                            LIVRAISON
                        </button>
                        <button id="btn-emporter" type="button" class="flex-1 md:w-40 py-4 rounded-lg bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light hover:text-primary font-bold text-base transition-all flex items-center justify-center gap-2 border border-border-dark ml-2 focus:outline-none">
                            <span class="material-symbols-outlined text-xl">takeout_dining</span>
                            À EMPORTER
                        </button>
                        <button id="btn-surplace" type="button" class="flex-1 md:w-40 py-4 rounded-lg bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light hover:text-primary font-bold text-base transition-all flex items-center justify-center gap-2 border border-border-dark ml-2 focus:outline-none">
                            <span class="material-symbols-outlined text-xl">storefront</span>
                            SUR PLACE
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div id="zone-livraison" class="grid grid-cols-1 md:grid-cols-2 gap-6 md:col-span-2">
                            <label class="flex flex-col">
                                <label for="select-commune" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide transition-colors">Commune</label>
                                <select id="select-commune" class="form-select w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 px-4 text-lg transition-colors">
                                    <option value="Gombe">Gombe</option>
                                    <option value="Ngaliema">Ngaliema</option>
                                    <option value="Limete">Limete</option>
                                    <option value="Kintambo">Kintambo</option>
                                    <option value="Bandalungwa">Bandalungwa</option>
                                </select>
                            </label>
                            <label class="flex flex-col">
                                <span for="input-quartier" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide transition-colors">Quartier</span>
                                <input id="input-quartier" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="Ex: Macampagne" />
                            </label>
                            <label class="flex flex-col md:col-span-2">
                                <span for="input-adresse" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide transition-colors">Adresse & N° de maison</span>
                                <input id="input-adresse" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="Ex: Avenue de la Justice, N° 12" />
                            </label>
                            <label class="flex flex-col md:col-span-2">
                                <span for="input-repere" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide transition-colors">Point de repère (Landmark)</span>
                                <input id="input-repere" class="form-input w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-14 placeholder:text-slate-400 dark:placeholder:text-white/30 px-4 text-lg transition-colors" placeholder="Ex: En face de l'ambassade..." />
                            </label>
                        </div>

                    </div>
                </section>
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">3</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Notes pour la cuisine</h3>
                    </div>
                    <label class="flex flex-col">
                        <span for="input-note" class="text-slate-900 dark:text-background-light text-base font-bold pb-2 uppercase tracking-wide transition-colors">Instructions spéciales</span>
                        <textarea id="input-note" class="form-textarea resize-none w-full rounded-lg border-2 border-border-dark bg-background-light dark:bg-background-dark text-slate-900 dark:text-background-light focus:border-primary focus:ring-0 h-40 placeholder:text-slate-400 dark:placeholder:text-white/30 p-4 text-lg transition-colors" placeholder="Allergies, cuisson, pas de piment..."></textarea>
                    </label>
                </section>
                <div class="p-6 rounded-xl bg-primary/10 border-2 border-primary/30 flex gap-5 items-center">
                    <span class="material-symbols-outlined text-primary text-4xl">payments</span>
                    <div>
                        <p class="text-primary font-black text-xl uppercase">Paiement à la livraison</p>
                        <p class="text-muted-white text-base mt-1 font-medium">Le règlement s'effectue en espèces ou via Mobile Money lors de la réception.</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="sticky top-28 p-8 rounded-2xl bg-background-light dark:bg-background-dark border-2 border-border-dark flex flex-col gap-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] transition-colors">
                    <h3 class="text-primary text-2xl font-black border-b-2 border-border-dark pb-6 uppercase tracking-wider">Résumé du Panier</h3>
                    <div id="panier-resume" class="flex flex-col gap-6 max-h-[450px] overflow-y-auto pr-2 custom-scrollbar"></div>

                    <div class="flex flex-col gap-4 pt-8 border-t-2 border-border-dark">
                        <div class="flex justify-between items-center">
                            <p class="text-slate-600 dark:text-muted-white text-base font-medium transition-colors">Sous-total</p>
                            <p id="panier-sous-total" class="text-slate-900 dark:text-background-light text-lg font-bold transition-colors">$0.00</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-slate-600 dark:text-muted-white text-base font-medium transition-colors">Frais de livraison</p>
                            <p id="panier-livraison" class="text-slate-900 dark:text-background-light text-lg font-bold transition-colors">$0.00</p>
                        </div>
                        <div class="flex justify-between items-center mt-4 p-4 bg-white/5 dark:bg-white/10 rounded-xl border border-white/10 transition-colors">
                            <p class="text-gold text-xl font-black uppercase">Total</p>
                            <p id="panier-total" class="text-gold text-3xl font-black leading-tight">$0.00</p>
                        </div>
                    </div>
                    <button id="btn-confirmer" class="w-full h-20 bg-gold text-background-dark font-black text-xl uppercase tracking-widest rounded-xl shadow-2xl shadow-gold/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4">
                        <span class="material-symbols-outlined text-3xl font-bold">check_circle</span>
                        CONFIRMER LA COMMANDE
                    </button>
                    <p class="text-center text-slate-600 dark:text-muted-white text-[11px] uppercase tracking-widest leading-relaxed opacity-60 px-4 transition-colors">
                        En confirmant, vous acceptez nos CGV et notre politique de confidentialité.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-[720px] w-full flex flex-col items-center hidden" id="confirmation">
        <!-- Success Animation Area -->
        <div class="mb-10 flex flex-col items-center justify-center">
            <div class="w-28 h-28 rounded-full bg-gradient-to-br from-primary/20 via-gold/20 to-primary/10 flex items-center justify-center mb-6 border-4 border-primary/30 shadow-lg shadow-gold/10 animate-bounce-in">
                <span class="material-symbols-outlined text-gold dark:text-primary text-7xl drop-shadow-lg">check_circle</span>
            </div>
            <h1 class="text-gold dark:text-primary tracking-tight text-[2.2rem] md:text-[2.7rem] font-black leading-tight text-center pb-2 drop-shadow-lg" id="confirmation-title">
                Félicitations, votre commande est confirmée !
            </h1>
            <p class="text-slate-600 dark:text-white text-lg md:text-xl font-medium text-center max-w-xl mx-auto mt-2" id="confirmation-message">
                Merci pour votre confiance et votre gourmandise.<br>
                <span class="text-primary dark:text-primary font-bold text-lg" id="confirmation-numero">#LIMO-8829</span> — Notre équipe prépare votre expérience avec passion.<br>
                Vous recevrez une notification dès que votre commande sera prête ou en route.<br>
                <span class="inline-flex items-center gap-1 text-primary dark:text-primary font-bold mt-2"><span class="material-symbols-outlined text-base">local_shipping</span> Livraison estimée : <span class="ml-1" id="confirmation-estimation">35 - 45 min</span></span>
            </p>
        </div>
        <!-- Order Summary Card -->
        <div class="w-full bg-slate-50 dark:bg-[#18181c] rounded-xl shadow-2xl overflow-hidden border border-slate-200 dark:border-white/10 mb-8">
            <div class="p-6 border-b border-slate-100 dark:border-white/10">
                <h2 class="text-slate-900 dark:text-white text-xl font-bold tracking-tight flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                    Détails de la commande
                </h2>
            </div>
            <div class="p-6 space-y-4" id="confirmation-items">
                <!-- Les items de la commande seront affichés ici dynamiquement -->
            </div>
            <!-- Delivery Info -->
            <div class="bg-slate-50 dark:bg-white/5 p-6 border-t border-slate-100 dark:border-white/10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-[10px] uppercase font-bold tracking-widest text-slate-400 dark:text-slate-500 mb-2">Adresse de livraison</p>
                        <p class="text-slate-900 dark:text-white text-sm font-medium leading-relaxed" id="confirmation-adresse">
                            <!-- Adresse dynamique -->
                        </p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-bold tracking-widest text-slate-400 dark:text-slate-500 mb-2">Estimation</p>
                        <div class="flex items-center gap-2 text-primary font-bold">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            <p class="text-sm" id="confirmation-estimation2">35 - 45 Minutes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Action Buttons -->
        <div class="w-full flex flex-col gap-4 sm:flex-row sm:justify-center">
            <button class="flex items-center justify-center gap-2 bg-primary hover:bg-yellow-500 text-black font-bold py-4 px-8 rounded-lg transition-all transform hover:scale-[1.02] shadow-xl shadow-primary/20">
                <span class="material-symbols-outlined">local_shipping</span>
                Suivre ma commande
            </button>
            <button class="flex items-center justify-center gap-2 bg-transparent hover:bg-white/10 text-slate-900 dark:text-white font-bold py-4 px-8 rounded-lg border border-slate-300 dark:border-white/20 transition-all">
                <span class="material-symbols-outlined">home</span>
                Retour à l'accueil
            </button>
        </div>

    </div>
</main>
<script src="/js/panier-finaliser.js"></script>