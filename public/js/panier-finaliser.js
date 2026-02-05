// panier-finaliser.js
// Gère l'affichage dynamique du panier, le calcul des totaux et le mode de réception

function renderPanierResume() {
  let panier;
  try {
    panier = JSON.parse(localStorage.getItem("panier"));
  } catch (e) {
    panier = [];
  }
  if (!Array.isArray(panier)) panier = [];
  const container = document.getElementById("panier-resume");
  const sousTotalEl = document.getElementById("panier-sous-total");
  const livraisonEl = document.getElementById("panier-livraison");
  const totalEl = document.getElementById("panier-total");
  let sousTotal = 0;
  let fraisLivraison = 0;
  if (!container) return;
  if (panier.length === 0) {
    container.innerHTML =
      '<p class="text-center text-slate-600 dark:text-muted-white text-base">Votre panier est vide.</p>';
    if (sousTotalEl) sousTotalEl.textContent = "$0.00";
    if (livraisonEl) livraisonEl.textContent = "$0.00";
    if (totalEl) totalEl.textContent = "$0.00";
    return;
  }
  let html = "";
  panier.forEach((item) => {
    sousTotal += item.price * item.quantity;
    html += `
        <div class="flex gap-4 items-center">
            <div class="w-20 h-20 rounded-xl bg-cover bg-center shrink-0 border-2 border-border-dark shadow-md" style="background-image: url('/${item.image ? item.image : "/images/menu/default.png"}')"></div>
            <div class="flex-1">
                <div class="flex justify-between items-start gap-2">
                    <p class="text-slate-900 dark:text-background-light text-base font-bold leading-tight transition-colors">${item.name}</p>
                    <p class="text-gold text-lg font-black shrink-0">$${(item.price * item.quantity).toFixed(2)}</p>
                </div>
                <p class="text-slate-600 dark:text-muted-white text-sm mt-2 font-medium bg-white/5 dark:bg-white/10 inline-block px-2 py-0.5 rounded transition-colors">Quantité: ${item.quantity}</p>
            </div>
        </div>
        `;
  });
  // Exemple de calcul de frais de livraison : 5$ si sous-total < 50, sinon 0
  fraisLivraison = sousTotal > 0 && sousTotal < 50 ? 5 : 0;
  if (sousTotalEl) sousTotalEl.textContent = `$${sousTotal.toFixed(2)}`;
  if (livraisonEl) livraisonEl.textContent = `$${fraisLivraison.toFixed(2)}`;
  if (totalEl)
    totalEl.textContent = `$${(sousTotal + fraisLivraison).toFixed(2)}`;
  container.innerHTML = html;
}

document.addEventListener("DOMContentLoaded", renderPanierResume);
window.addEventListener("storage", renderPanierResume);

// Gestion du mode de réception (livraison, à emporter, sur place)
document.addEventListener("DOMContentLoaded", function () {
  const btnLivraison = document.getElementById("btn-livraison");
  const btnEmporter = document.getElementById("btn-emporter");
  const btnSurPlace = document.getElementById("btn-surplace");
  // Ajout d'un attribut data-mode pour chaque bouton
  if (btnLivraison) btnLivraison.setAttribute("data-mode", "livraison");
  if (btnEmporter) btnEmporter.setAttribute("data-mode", "emporter");
  if (btnSurPlace) btnSurPlace.setAttribute("data-mode", "surplace");
  const zoneLivraison = document.getElementById("zone-livraison");
  function setMode(mode) {
    [btnLivraison, btnEmporter, btnSurPlace].forEach((btn) => {
      btn.classList.remove("bg-primary", "text-background-dark");
      btn.classList.add(
        "bg-background-light",
        "dark:bg-background-dark",
        "text-slate-900",
        "dark:text-background-light",
      );
    });
    if (mode === "livraison") {
      btnLivraison.classList.add("bg-primary", "text-background-dark");
      btnLivraison.classList.remove(
        "bg-background-light",
        "dark:bg-background-dark",
        "text-slate-900",
        "dark:text-background-light",
      );
      zoneLivraison.style.display = "";
    } else if (mode === "emporter") {
      btnEmporter.classList.add("bg-primary", "text-background-dark");
      btnEmporter.classList.remove(
        "bg-background-light",
        "dark:bg-background-dark",
        "text-slate-900",
        "dark:text-background-light",
      );
      zoneLivraison.style.display = "none";
    } else {
      btnSurPlace.classList.add("bg-primary", "text-background-dark");
      btnSurPlace.classList.remove(
        "bg-background-light",
        "dark:bg-background-dark",
        "text-slate-900",
        "dark:text-background-light",
      );
      zoneLivraison.style.display = "none";
    }
  }
  if (btnLivraison)
    btnLivraison.addEventListener("click", function () {
      setMode("livraison");
    });
  if (btnEmporter)
    btnEmporter.addEventListener("click", function () {
      setMode("emporter");
    });
  if (btnSurPlace)
    btnSurPlace.addEventListener("click", function () {
      setMode("surplace");
    });
  setMode("livraison");
});
console.log("panierr data ", JSON.parse(localStorage.getItem("panier")));
// Envoi de la commande au backend
async function envoyerCommande() {
  // Récupération du token CSRF depuis l'input généré par csrf_input()
  const csrfToken =
    document.querySelector('input[name="_csrf_token"]')?.value || "";
  showLoader();
  // Récupération des données du formulaire
  const nom = document.getElementById("input-nom")?.value || "";
  const telephone = document.getElementById("input-telephone")?.value || "";
  const email = document.getElementById("input-email")?.value || "";
  // Récupère le mode via l'attribut data-mode du bouton actif
  let modeReception = "livraison";
  const btnActive = document.querySelector(
    "button[data-mode].bg-primary.text-background-dark",
  );
  if (btnActive) {
    modeReception = btnActive.getAttribute("data-mode") || "livraison";
  }
  let commune = "",
    quartier = "",
    adresse = "",
    point_repere = "";
  if (modeReception === "livraison") {
    commune = document.getElementById("select-commune")?.value || "";
    quartier = document.getElementById("input-quartier")?.value || "";
    adresse = document.getElementById("input-adresse")?.value || "";
    point_repere = document.getElementById("input-repere")?.value || "";
  }
  const note = document.getElementById("input-note")?.value || "";
  // Récupération du panier
  let panier = [];
  try {
    panier = JSON.parse(localStorage.getItem("panier")) || [];
  } catch (e) {}
  // Calcul des totaux
  let montant_total = 0;
  panier.forEach((item) => {
    montant_total += item.price * item.quantity;
  });
  let frais_livraison =
    modeReception === "livraison" && montant_total < 50 ? 5 : 0;
  // Construction de la commande
  const commande = {
    nom_client: nom,
    telephone: telephone,
    email: email,
    mode_reception: modeReception,
    commune,
    quartier,
    adresse,
    point_repere,
    note,
    montant_total,
    frais_livraison,
    produits: panier,
    _csrf_token: csrfToken,
  };
  console.log("Envoi de la commande:", commande);
  // Envoi via fetch
  try {
    const res = await fetch("/api/commandes", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(commande),
    });
    const data = await res.json();
    console.log("Réponse du serveur:", data);
    hideLoader();
    if (res.ok && data && data.id) {
      showToast("Commande envoyée avec succès !", "success");
      localStorage.removeItem("panier");
      // S'assure que le loader est bien caché avant de le réafficher
      hideLoader();
      setTimeout(() => {
        showLoader();
        setTimeout(() => {
          hideLoader();
          afficherConfirmation(data, commande);
        }, 700);
      }, 50);
    } else {
      showToast(
        "Erreur : " + (data.message || "Impossible de créer la commande"),
        "error",
      );
    }
    // Affiche la confirmation avec les vraies données
    function afficherConfirmation(data, commande) {
      console.log(
        "Affichage de la confirmation avec les données:",
        data,
        commande,
      );
      // Masquer le formulaire
      const formContainer = document.getElementById("form-container");
      if (formContainer) formContainer.style.display = "none";
      const confirmation = document.getElementById("confirmation");
      if (confirmation) confirmation.style.display = "flex";
      // Numéro de commande
      const numeroEl = document.getElementById("confirmation-numero");
      if (numeroEl) numeroEl.textContent = `#${data.numero || data.id || "-"}`;
      // Message principal
      const messageEl = document.getElementById("confirmation-message");
      if (messageEl) {
        let estimationHtml = "";
        if (commande.mode_reception === "livraison") {
          estimationHtml = `<span class='inline-flex items-center gap-1 text-primary dark:text-primary font-bold mt-2'><span class='material-symbols-outlined text-base'>local_shipping</span> Livraison estimée : <span class='ml-1' id='confirmation-estimation'>${data.estimation || "35 - 45 min"}</span></span>`;
        }
        messageEl.innerHTML = `Merci pour votre confiance et votre gourmandise.<br>
        <span class='text-primary dark:text-primary font-bold text-lg' id='confirmation-numero'>#${data.numero || data.id || "-"}</span> — Notre équipe prépare votre expérience avec passion.<br>
        Vous recevrez une notification dès que votre commande sera prête ou en route.<br>
        ${estimationHtml}`;
      }
      // Estimation
      const estimationEl = document.getElementById("confirmation-estimation");
      const estimation2El = document.getElementById("confirmation-estimation2");
      if (commande.mode_reception === "livraison") {
        if (estimationEl)
          estimationEl.textContent = data.estimation || "35 - 45 min";
        if (estimation2El)
          estimation2El.textContent = data.estimation || "35 - 45 min";
      } else {
        if (estimationEl) estimationEl.textContent = "";
        if (estimation2El) estimation2El.textContent = "";
      }
      // Adresse
      const adresseEl = document.getElementById("confirmation-adresse");
      if (adresseEl) {
        if (commande.mode_reception === "livraison") {
          let adresse = commande.adresse;
          if (commande.commune) adresse += `<br>${commande.commune}`;
          if (commande.quartier) adresse += `, ${commande.quartier}`;
          if (commande.point_repere) adresse += `<br>${commande.point_repere}`;
          adresseEl.innerHTML = adresse;
        } else if (commande.mode_reception === "emporter") {
          adresseEl.textContent = "À retirer sur place";
        } else {
          adresseEl.textContent = "Service à table";
        }
      }
      // Items
      const itemsEl = document.getElementById("confirmation-items");
      if (itemsEl) {
        let html = "";
        (commande.produits || []).forEach((item) => {
          html += `<div class='flex justify-between items-start py-2'>
          <div class='flex gap-4'>
            <span class='font-bold text-primary'>${item.quantity}x</span>
            <div>
              <p class='text-slate-900 dark:text-white font-semibold'>${item.name}</p>
              <p class='text-xs text-slate-500 dark:text-white-400'>${item.description || ""}</p>
            </div>
          </div>
          <p class='text-slate-900 dark:text-white font-medium'>${(item.price * item.quantity).toLocaleString()} CDF</p>
        </div>`;
        });
        // Sous-total, livraison, total
        html += `<div class='h-px bg-slate-100 dark:bg-white/10 my-4'></div>
        <div class='space-y-2'>
          <div class='flex justify-between text-sm'>
            <p class='text-slate-500 dark:text-[#bab29c]'>Sous-total</p>
            <p class='text-slate-900 dark:text-white'>${commande.montant_total.toLocaleString()} CDF</p>
          </div>
          <div class='flex justify-between text-sm'>
            <p class='text-slate-500 dark:text-[#bab29c]'>Frais de livraison</p>
            <p class='text-slate-900 dark:text-white'>${commande.frais_livraison.toLocaleString()} CDF</p>
          </div>
        </div>
        <div class='h-px bg-slate-100 dark:bg-white/10 my-4'></div>
        <div class='flex justify-between items-center pt-2'>
          <p class='text-lg font-bold text-slate-900 dark:text-white uppercase tracking-wider'>Total</p>
          <p class='text-2xl font-black text-primary'>${(commande.montant_total + commande.frais_livraison).toLocaleString()} CDF</p>
        </div>`;
        itemsEl.innerHTML = html;
      }
    }
  } catch (e) {
    hideLoader();
    showToast("Erreur réseau ou serveur", "error");
  }
}

// Ajout de l'événement sur le bouton de confirmation
const btnConfirmer = document.getElementById("btn-confirmer");
if (btnConfirmer) {
  btnConfirmer.addEventListener("click", function (e) {
    e.preventDefault();
    envoyerCommande();
  });
}

// Affichage d'un loader
function showLoader() {
  let loader = document.getElementById("loader-panier");
  if (!loader) {
    loader = document.createElement("div");
    loader.id = "loader-panier";
    loader.className =
      "fixed inset-0 bg-black/40 flex items-center justify-center z-50";
    loader.innerHTML = `
      <div class="relative flex flex-col items-center justify-center">
        <div class="w-16 h-16 flex items-center justify-center">
          <span class="block w-16 h-16 rounded-full border-4 border-gold border-t-transparent animate-spin"></span>
        </div>
        <span class="mt-4 text-gold text-lg font-bold tracking-wide">Chargement...</span>
      </div>
    `;
    document.body.appendChild(loader);
  }
  setTimeout(() => {
    loader.style.display = "flex";
  }, 300);
}
function hideLoader() {
  const loader = document.getElementById("loader-panier");
  if (loader) {
    // Ajoute un délai pour l'effet visuel de disparition

    loader.style.display = "none";
  }
}

// Affichage d'un toast
function showToast(message, type = "success") {
  let toast = document.getElementById("toast-panier");
  if (!toast) {
    toast = document.createElement("div");
    toast.id = "toast-panier";
    toast.className =
      "fixed bottom-8 left-1/2 -translate-x-1/2 px-6 py-4 rounded-xl shadow-lg text-lg font-bold z-50 transition-all duration-300";
    document.body.appendChild(toast);
  }
  toast.textContent = message;
  toast.style.background = type === "success" ? "#FFD700" : "#EF4444";
  toast.style.color = type === "success" ? "#222" : "#fff";
  toast.style.opacity = "1";
  setTimeout(() => {
    toast.style.opacity = "0";
  }, 3500);
}
