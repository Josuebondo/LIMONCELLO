// les variables et fonctions JavaScript pour le menu peuvent être ajoutées ici
document.addEventListener("DOMContentLoaded", function () {
  const contener = document.getElementById("menu-contener");
  if (!contener) {
    console.error("menu-contener introuvable dans le DOM");
    return;
  }
  function loadMenuItems(data) {
    // Corrige l'accès au loader
    const loader = document.getElementById("menu-loader");
    if (loader) loader.classList.add("hidden");
    // Correction: s'assurer que data est un tableau
    let items = Array.isArray(data)
      ? data
      : data && Array.isArray(data.data)
        ? data.data
        : [];
    console.log("Loading menu items:", items);
    contener.innerHTML = "";
    items.forEach((d) => {
      const item = document.createElement("div");
      // Ajout de l'attribut data-categorie pour le filtrage
      item.setAttribute(
        "data-categorie",
        d.category_id || d.category_name || "",
      );
      item.className =
        "group cursor-pointer relative overflow-hidden rounded-xl bg-card-dark aspect-[3/4] transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10 border border-white/5" +
        " sm:aspect-[3/4] aspect-[3/4] sm:p-0 p-1";
      // Appliquer un style inline pour mobile (max-width: 640px)
      // Ajoute le bouton panier
      const btn = document.createElement("button");
      btn.innerHTML =
        '<span class="material-symbols-outlined align-middle mr-1">add_shopping_cart</span>';
      btn.className =
        "mt-2 w-full py-2 rounded-lg bg-gradient-to-r from-amber-400 to-yellow-500 text-white font-bold shadow hover:from-amber-500 hover:to-yellow-600 hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-2";
      // Ajoute l'écouteur sur le bouton
      btn.addEventListener("click", function (e) {
        e.stopPropagation();
        e.stopImmediatePropagation();
        addToCart(d);
      });
      item.style.maxWidth = "100%";
      item.style.minWidth = "0";
      item.style.height = "auto";
      item.style.padding = window.innerWidth <= 640 ? "2px" : "0";
      item.innerHTML = `
          <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="${d.name || ""}" style='background-image: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 60%), url("/${d.image}");'></div>
          <div class="absolute bottom-0 left-0 right-0 p-2 flex flex-col justify-end h-1/2">
            <p class="text-white  rounder-xl text-xl font-bold uppercase tracking-widest mb-1">${d.price} $</p>
            <h3 class="text-white text-xl font-bold leading-tight group-hover:text-gold transition-colors">${d.name}</h3>
          </div>
        `;
      // Ajoute le bouton dans le bloc info
      const infoBlock = item.querySelector(
        ".absolute.bottom-0.left-0.right-0.p-2",
      );
      if (infoBlock) {
        infoBlock.appendChild(btn);
      }
      // Ajoute l'ouverture du modal uniquement si on clique sur la carte (hors bouton)
      item.addEventListener("click", function (e) {
        // Si le clic vient du bouton, ne rien faire
        if (e.target === btn || btn.contains(e.target)) return;
        openDetail(d);
      });
      contener.appendChild(item);
    });
    // Déclencher un événement personnalisé après le rendu
    const event = new CustomEvent("menuItemsLoaded");
    document.dispatchEvent(event);
  }

  async function fetchMenuItems() {
    const loader = document.getElementById("menu-loader");
    if (loader) loader.classList.remove("hidden");
    try {
      const response = await fetch("/api/menu-items");
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const data = await response.json();
      console.log("Menu items fetched:", data);
      // Ajoute un délai avant d'afficher les cartes
      setTimeout(() => {
        loadMenuItems(data.data);
      }, 1500);
      // Le loader sera caché dans loadMenuItems
    } catch (error) {
      if (loader) loader.classList.add("hidden");
      console.error(
        "There has been a problem with your fetch operation:",
        error,
      );
      return [];
    }
  }
  const closedetailBtn = document.getElementById("closedetail-btn");
  if (closedetailBtn) {
    closedetailBtn.addEventListener("click", function () {
      const modal = document.getElementById("dish-detail-modal");
      if (modal) {
        modal.classList.add("hidden");
      }
    });
  }

  function openDetail(data) {
    // Gestion de la quantité dans le modal
    const modal = document.getElementById("dish-detail-modal");
    if (!modal) {
      console.error("dish-detail-modal introuvable dans le DOM");
      return;
    }
    let quantity = 1;
    // Sélectionne le bloc quantité du modal de façon robuste
    const qtyBlock = modal.querySelector(".modal-qty-block");
    const qtySpan = qtyBlock ? qtyBlock.querySelector("span") : null;
    const btnMinus = qtyBlock
      ? qtyBlock.querySelector("button:first-child")
      : null;
    const btnPlus = qtyBlock
      ? qtyBlock.querySelector("button:last-child")
      : null;
    if (qtySpan) qtySpan.textContent = quantity;
    if (btnMinus) {
      btnMinus.onclick = function (e) {
        e.stopPropagation();
        e.preventDefault();
        if (quantity > 1) quantity--;
        if (qtySpan) qtySpan.textContent = quantity;
      };
    }
    if (btnPlus) {
      btnPlus.onclick = function (e) {
        e.stopPropagation();
        e.preventDefault();
        quantity++;
        if (qtySpan) qtySpan.textContent = quantity;
      };
    }
    // Populate modal with data
    modal.querySelector(".modal-title").textContent = data.name;
    modal.querySelector(".modal-description").textContent = data.description;
    modal.querySelector(".modal-price").textContent = `${data.price} $`;
    modal.querySelector(".modal-image").style.backgroundImage =
      `url('/${data.image}')`;

    // Afficher les ingrédients si présents
    const ingredientsContainer = modal.querySelector(".modal-ingredients");
    if (ingredientsContainer) {
      if (Array.isArray(data.ingredients) && data.ingredients.length > 0) {
        ingredientsContainer.innerHTML = "";
        ingredientsContainer.innerHTML = data.ingredients
          .map(
            (ing) =>
              `<span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold mr-1 mb-1 px-2 py-1 rounded badge-ingredient">${ing}</span>`,
          )
          .join("");
      } else {
        ingredientsContainer.innerHTML =
          "<p class='text-white/80 text-xs'>Aucun ingrédient mentioné.</p>";
      }
    }
    // Rendre le bouton du modal fonctionnel
    const btnModal = modal.querySelector("button.flex-1.bg-primary");
    if (btnModal) {
      btnModal.onclick = function (e) {
        e.stopPropagation();
        e.preventDefault();
        // Ajoute la quantité choisie
        addToCart({ ...data, quantity });
        updatePanierBadge();
        // Ferme le modal après ajout
        modal.classList.add("hidden");
      };
    }
    // Show modal
    modal.classList.remove("hidden");
  }

  function addToCart(item) {
    console.log("Tentative d'ajout au panier:", item);
    if (!item.id) {
      console.error("Erreur : le plat n'a pas de champ id !", item);
      showToast("Erreur : plat sans identifiant.", "error");
      return;
    }
    let cart = JSON.parse(localStorage.getItem("panier")) || [];
    // Vérifie si le plat existe déjà
    const exists = cart.find((p) => p.id === item.id);
    if (!exists) {
      cart.push({
        id: item.id,
        name: item.name,
        price: item.price,
        image: item.image,
        quantity: item.quantity || 1,
      });
      localStorage.setItem("panier", JSON.stringify(cart));
      console.log("Panier après ajout:", cart);
      showToast("Plat ajouté au panier !", "success");
      if (window.updatePanierCount) window.updatePanierCount();
    } else {
      // Augmente la quantité existante
      exists.quantity = (exists.quantity || 1) + (item.quantity || 1);
      localStorage.setItem("panier", JSON.stringify(cart));
      showToast("Quantité augmentée dans le panier !", "info");
      if (window.updatePanierCount) window.updatePanierCount();
    }
  }

  // Met à jour dynamiquement le badge du panier dans le header
  // La fonction updatePanierCount est maintenant globale (header.php)

  function showToast(message, type = "info") {
    let toast = document.createElement("div");
    toast.textContent = message;
    toast.className = `fixed bottom-8 left-1/2 -translate-x-1/2 px-6 py-3 rounded-lg font-bold z-50 text-white text-center shadow-lg ${type === "success" ? "bg-green-600" : type === "info" ? "bg-amber-500" : "bg-red-600"}`;
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.remove();
    }, 2000);
  }

  fetchMenuItems();
  if (window.updatePanierCount) window.updatePanierCount();
});
