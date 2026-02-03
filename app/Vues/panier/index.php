<?php
// app/Vues/panier/index.php
\core\Vue::extends('layouts.principal');
\core\Vue::debut_section('contenu');
?>


<main class="max-w-[1200px] mx-auto px-6 lg:px-10 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex flex-wrap gap-2 mb-6">
        <a class="text-[#bab29c] text-sm font-medium hover:text-primary transition-colors" href="#">Accueil</a>
        <span class="text-[#bab29c] text-sm font-medium">/</span>
        <span class="text-white text-sm font-medium">Votre Panier</span>
    </nav>
    <!-- Page Heading -->
    <div class="flex flex-col gap-2 mb-10">
        <h1 class="text-4xl font-black leading-tight tracking-tight">Votre Panier</h1>
        <p class="text-[#bab29c] text-lg font-normal">Finalisez votre sélection gastronomique italienne à Kinshasa</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Cart Items List -->
        <div class="lg:col-span-2 flex flex-col gap-6" id="panier-items">
            <!-- Les items du panier seront affichés ici dynamiquement -->
        </div>
        <!-- Recap Panier -->
        <aside class="lg:col-span-1 sticky top-24 self-start">
            <div class="bg-gradient-to-br from-amber-400/20 via-background-dark/80 to-yellow-500/10 border border-gold/30 shadow-xl rounded-2xl p-8 flex flex-col gap-6">
                <h2 class="text-2xl font-extrabold text-gold mb-2 tracking-tight flex items-center gap-2">
                    <span class="material-symbols-outlined text-3xl">receipt_long</span>
                    Récapitulatif
                </h2>
                <div class="flex flex-col gap-2 text-lg font-semibold text-white/90">
                    <div class="flex justify-between items-center">
                        <span>Sous-total</span>
                        <span id="panier-total" class="text-2xl font-black text-primary">0 $</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Livraison</span>
                        <span class="text-base text-[#bab29c]">Gratuite</span>
                    </div>
                </div>
                <hr class="border-gold/30 my-2">
                <button class="mt-2 w-full py-4 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 text-white font-extrabold text-lg shadow hover:from-amber-500 hover:to-yellow-600 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    Valider la commande
                </button>
            </div>
        </aside>
    </div>
    <script>
        window.updatePanierBadge = function() {
            const badge = document.getElementById("panier-count");
            if (!badge) return;
            let cart = JSON.parse(localStorage.getItem("panier")) || [];
            let total = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
            badge.textContent = total;
        }
        window.updateQtyPanier = function(id, delta) {
            let cart = JSON.parse(localStorage.getItem('panier')) || [];
            const item = cart.find(i => Number(i.id) === Number(id));
            if (!item) return;
            item.quantity = (item.quantity || 1) + delta;
            if (item.quantity < 1) item.quantity = 1;
            localStorage.setItem('panier', JSON.stringify(cart));
            renderPanier();
            window.updatePanierBadge();
        }
        window.removeFromPanier = function(id) {
            if (!confirm('Supprimer cet article du panier ?')) return;
            let cart = JSON.parse(localStorage.getItem('panier')) || [];
            cart = cart.filter(item => Number(item.id) !== Number(id));
            localStorage.setItem('panier', JSON.stringify(cart));
            renderPanier();
            window.updatePanierBadge();
            showToastPanier('Article supprimé', 'success');
        }

        function renderPanier() {
            const itemsContainer = document.getElementById('panier-items');
            const totalContainer = document.getElementById('panier-total');
            let cart = JSON.parse(localStorage.getItem('panier')) || [];
            itemsContainer.innerHTML = '';
            let total = 0;
            if (cart.length === 0) {
                itemsContainer.innerHTML = '<div class="text-[#bab29c] text-lg font-semibold py-12 text-center">Votre panier est vide.</div>';
                totalContainer.textContent = '0 $';
                return;
            }
            cart.forEach(item => {
                total += (item.price * (item.quantity || 1));
                itemsContainer.innerHTML += `
        <div class="flex flex-col sm:flex-row gap-6 bg-background-dark/80 border border-border-dark p-6 rounded-2xl justify-between items-center group hover:border-primary/30 transition-all shadow-lg" data-panier-id="${item.id}">
          <div class="flex items-center gap-6 w-full sm:w-auto">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-xl size-[100px] shadow-lg border border-gold/30 shrink-0" style='background-image: url("/${item.image}");'></div>
            <div class="flex flex-col justify-center">
              <h3 class="text-white text-xl font-extrabold mb-1">${item.name}</h3>
              <p class="text-gold text-lg font-bold">${item.price} $</p>
            </div>
          </div>
          <div class="flex items-center gap-8 w-full sm:w-auto justify-between sm:justify-end">
            <div class="flex items-center gap-3 text-white bg-surface-dark rounded-full px-4 py-2 border border-gold/20">
              <button onclick="window.updateQtyPanier('${item.id}', -1)" class="h-8 w-8 flex items-center justify-center rounded-full bg-surface-dark hover:bg-primary hover:text-black transition-colors text-lg font-bold">-</button>
              <span class="font-bold text-lg w-8 text-center">${item.quantity || 1}</span>
              <button onclick="window.updateQtyPanier('${item.id}', 1)" class="h-8 w-8 flex items-center justify-center rounded-full bg-surface-dark hover:bg-primary hover:text-black transition-colors text-lg font-bold">+</button>
            </div>
            <button class="text-[#bab29c] hover:text-red-500 transition-colors p-2" onclick="window.removeFromPanier('${item.id}')">
              <span class="material-symbols-outlined text-2xl">delete</span>
            </button>
          </div>
        </div>
      `;
            });
            totalContainer.textContent = total.toFixed(2) + ' $';
        }

        function showToastPanier(message, type = "info") {
            let toast = document.createElement("div");
            toast.textContent = message;
            toast.className = `fixed bottom-8 left-1/2 -translate-x-1/2 px-6 py-3 rounded-lg font-bold z-50 text-white text-center shadow-lg animate__fadeInUp ${type === "success" ? "bg-green-600" : type === "info" ? "bg-amber-500" : "bg-red-600"}`;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 1800);
        }
        document.addEventListener('DOMContentLoaded', renderPanier);
    </script>
    <!-- Order Summary Sidebar -->


</main>
<!-- Map/Location Info (Simplified) -->
<?php \core\Vue::fin_section('contenu'); ?>