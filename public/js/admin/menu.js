// Recherche instantanée sur le tableau admin
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchMenuInput");
  const tbody = document.getElementById("menu-tbody");
  if (!searchInput || !tbody) return;
  searchInput.addEventListener("input", function () {
    const val = searchInput.value.trim().toLowerCase();
    const rows = tbody.querySelectorAll("tr");
    rows.forEach((row) => {
      // Recherche sur nom, catégorie, description
      const name =
        row.querySelector("td:nth-child(2)")?.textContent.toLowerCase() || "";
      const desc =
        row.querySelector("td:nth-child(3)")?.textContent.toLowerCase() || "";
      const cat =
        row.querySelector("td:nth-child(4)")?.textContent.toLowerCase() || "";
      if (name.includes(val) || desc.includes(val) || cat.includes(val)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});
// Charger les articles au démarrage
document.addEventListener("DOMContentLoaded", async () => {
  // Fonction pour afficher les toasts
  function showToast(message, type = "success") {
    const toast = document.createElement("div");
    const bgColor = type === "success" ? "bg-green-500" : "bg-red-500";
    toast.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slideIn`;
    toast.innerText = message;
    document.body.appendChild(toast);
    let removed = false;
    const removeToast = () => {
      if (!removed) {
        removed = true;
        toast.remove();
      }
    };
    setTimeout(() => {
      toast.classList.add("animate-slideOut");
      toast.addEventListener("animationend", removeToast, { once: true });
      // Sécurité : suppression forcée après 500ms si animationend ne se déclenche pas
      setTimeout(removeToast, 500);
    }, 3000);
  }

  // --- Nouvelle organisation ---
  async function fetchMenuData() {
    try {
      const result = await MenuAPI.getAll();
      return result.data || [];
    } catch (e) {
      showToast(
        "Erreur lors du chargement du menu : " +
          (e && e.message ? e.message : e),
        "error",
      );
      console.log("Erreur lors du chargement du menu", e);
      return [];
    }
  }

  // --- Pagination ---
  let currentPage = 1;
  const itemsPerPage = 6;
  let menuDataCache = [];

  function renderMenuTable(data, page = 1) {
    const tbody = document.querySelector("table tbody");
    if (!tbody) return;
    const start = (page - 1) * itemsPerPage;
    const end = Math.min(start + itemsPerPage, data.length);
    const pageData = data.slice(start, end);
    tbody.innerHTML = pageData
      .map((item) => {
        const ingredients = Array.isArray(item.ingredients)
          ? item.ingredients
          : [];
        return `
            <tr data-categorie="${item.category_id}" class="border-b border-[#e6e4db] dark:border-gray-700 hover:bg-[#fcfbf8] dark:hover:bg-gray-900/50 transition-colors">
              <td class="py-3 px-6">
                ${
                  item.image
                    ? `<img src="/${encodeURIComponent(item.image)}" alt="${item.name}" class="h-10 w-10 rounded object-cover">`
                    : '<div class="h-10 w-10 bg-gray-300 rounded"></div>'
                }
              </td>
              <td class="py-3 px-6">
                <p class="text-[#181711] dark:text-white font-semibold">${item.name}</p>
              </td>
              <td class="py-3 px-6">
                <p class="text-[#8a8460] dark:text-gray-400 text-sm line-clamp-2">${item.description || "-"}</p>
              </td>
              <td class="py-3 px-6">
                <span class="text-[#8a8460] dark:text-gray-400 text-sm">${item.category_name || "N/A"}</span>
              </td>
              <td class="py-3 px-6">
                ${
                  ingredients.length
                    ? ingredients
                        .map(
                          (ing) =>
                            `<span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold mr-1 mb-1 px-2 py-1 rounded badge-ingredient">${ing}</span>`,
                        )
                        .join("")
                    : ""
                }
              </td>
              <td class="py-3 px-6">
                <span class="text-[#181711] dark:text-white font-semibold">${item.price}€</span>
              </td>
              <td class="py-3 px-6">
                <span class="text-xs font-bold px-2 py-1 rounded-full ${item.is_available ? "bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400" : "bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400"}">${item.is_available ? "Disponible" : "Indisponible"}</span>
              </td>
              <td class="py-3 px-6 text-right">
                <div class="flex gap-2 justify-end items-center">
                  <button onclick="editItem(${item.id})" class="p-2 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 text-blue-600 dark:text-blue-400 transition-colors" title="Modifier">
                    <span class="material-symbols-outlined text-lg">edit</span>
                  </button>
                  <button onclick="deleteItem(${item.id})" class="p-2 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 transition-colors" title="Supprimer">
                    <span class="material-symbols-outlined text-lg">delete</span>
                  </button>
                </div>
              </td>
            </tr>
          `;
      })
      .join("");
    renderPagination(data.length, page);

    // Met à jour le texte du footer (Affichage de X à Y sur Z produits)
    const footer = document.getElementById("menu-footer");
    if (footer) {
      const info = footer.querySelector("p");
      if (info) {
        info.innerHTML = `Affichage de <span class="font-bold text-[#181711] dark:text-white">${data.length === 0 ? 0 : start + 1}</span> à <span class="font-bold text-[#181711] dark:text-white">${end}</span> sur <span class="font-bold text-[#181711] dark:text-white">${data.length}</span> produits`;
      }
      // Met à jour les boutons précédent/suivant
      const btns = footer.querySelectorAll("button");
      if (btns.length >= 2) {
        const prevBtn = btns[0];
        const nextBtn = btns[1];
        prevBtn.disabled = page <= 1;
        nextBtn.disabled = page >= Math.ceil(data.length / itemsPerPage);
        prevBtn.onclick = () => {
          if (page > 1) {
            currentPage = page - 1;
            renderMenuTable(menuDataCache, currentPage);
          }
        };
        nextBtn.onclick = () => {
          if (page < Math.ceil(data.length / itemsPerPage)) {
            currentPage = page + 1;
            renderMenuTable(menuDataCache, currentPage);
          }
        };
      }
    }
  }

  function renderPagination(totalItems, page) {
    let pagination = document.getElementById("menu-pagination");
    if (!pagination) {
      pagination = document.createElement("div");
      pagination.id = "menu-pagination";
      pagination.className = "flex justify-center gap-2 my-4";
      const footer = document.getElementById("menu-footer");
      if (footer) {
        // Place la pagination à la place du bloc pagination existant
        let oldPag = footer.querySelector("#pagination");
        if (oldPag) oldPag.replaceWith(pagination);
        else footer.appendChild(pagination);
      }
    }
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    let html = "";
    for (let i = 1; i <= totalPages; i++) {
      html += `<button class="px-3 py-1 rounded ${i === page ? "bg-primary text-white" : "bg-gray-200 dark:bg-gray-700"}" data-page="${i}">${i}</button>`;
    }
    pagination.innerHTML = html;
    Array.from(pagination.querySelectorAll("button")).forEach((btn) => {
      btn.onclick = (e) => {
        currentPage = parseInt(btn.getAttribute("data-page"));
        renderMenuTable(menuDataCache, currentPage);
      };
    });
    pagination.style.display = totalPages > 1 ? "flex" : "none";
  }

  // Initialisation au chargement de la page
  menuDataCache = await fetchMenuData();
  renderMenuTable(menuDataCache, currentPage);

  // Gestion des tags avec localStorage et autocomplete
  let tags = JSON.parse(localStorage.getItem("menuTags")) || [];
  const tagInput = document.getElementById("tagInput");
  const addTagBtn = document.getElementById("addTagBtn");
  const tagsList = document.getElementById("tagsList");
  const tagSuggestions = document.getElementById("tagSuggestions");
  const formTags = document.getElementById("formTags");

  // Afficher les tags au chargement
  renderTags();

  // Ajout d'un tag
  if (addTagBtn && tagInput) {
    addTagBtn.addEventListener("click", () => {
      const value = tagInput.value.trim();
      if (value && !tags.includes(value)) {
        tags.push(value);
        tagInput.value = "";
        renderTags();
      }
    });
    tagInput.addEventListener("keydown", (e) => {
      if (e.key === "Enter") {
        e.preventDefault();
        addTagBtn.click();
      }
    });
  }

  // Suppression d'un tag
  window.removeTag = function (index) {
    tags.splice(index, 1);
    renderTags();
  };

  // Suggestions dynamiques
  if (tagInput) {
    tagInput.addEventListener("input", renderSuggestions);
    tagInput.addEventListener("focus", renderSuggestions);
    tagInput.addEventListener("blur", () => {
      setTimeout(() => {
        if (tagSuggestions) tagSuggestions.classList.add("hidden");
      }, 200);
    });
  }

  function saveTags() {
    localStorage.setItem("menuTags", JSON.stringify(tags));
    if (formTags) formTags.value = JSON.stringify(tags);
  }

  function renderTags() {
    if (!tagsList) return;
    tagsList.innerHTML =
      tags.length === 0
        ? '<span class="text-[#8a8460] dark:text-gray-500 text-xs italic">Aucun tag ajouté</span>'
        : tags
            .map(
              (tag, index) => `
            <span class="inline-flex items-center gap-1 bg-white dark:bg-gray-700 border border-[#e6e4db] dark:border-gray-600 rounded px-2 py-0.5 text-xs font-medium text-[#181711] dark:text-gray-200">
                ${tag}
                <button type="button" onclick="window.removeTag(${index})" class="hover:text-red-500">
                    <span class="material-symbols-outlined text-[14px]">close</span>
                </button>
            </span>
        `,
            )
            .join("");
    saveTags();
  }

  function renderSuggestions() {
    const inputValue = tagInput.value.trim().toLowerCase();
    selectedSuggestionIndex = -1;

    if (!inputValue) {
      tagSuggestions.innerHTML = "";
      if (tagSuggestions) tagSuggestions.classList.add("hidden");
      return;
    }

    const filtered = suggestedTags.filter(
      (tag) => tag.toLowerCase().includes(inputValue) && !tags.includes(tag),
    );

    if (filtered.length === 0) {
      tagSuggestions.innerHTML = "";
      if (tagSuggestions) tagSuggestions.classList.add("hidden");
      return;
    }

    tagSuggestions.innerHTML = filtered
      .map(
        (tag, index) => `
            <div class="suggestion-item px-3 py-2 hover:bg-[#8a8460]/10 dark:hover:bg-gray-700 cursor-pointer text-[#181711] dark:text-white text-sm" data-index="${index}">
                ${tag}
            </div>
        `,
      )
      .join("");
    if (tagSuggestions) tagSuggestions.classList.remove("hidden");

    // Ajouter les event listeners à chaque suggestion
    document.querySelectorAll(".suggestion-item").forEach((item, index) => {
      item.addEventListener("click", () => selectSuggestion(filtered[index]));
      item.addEventListener("mouseenter", () => {
        document.querySelectorAll(".suggestion-item").forEach((i) => {
          if (i) i.classList.remove("bg-[#8a8460]/10", "dark:bg-gray-700");
        });
        if (item) item.classList.add("bg-[#8a8460]/10", "dark:bg-gray-700");
      });
    });
  }

  // Fonction pour sélectionner une suggestion de tag
  function selectSuggestion(tag) {
    if (tag && !tags.includes(tag)) {
      tags.push(tag);
      renderTags();
      if (tagInput) tagInput.value = "";
      if (tagSuggestions) tagSuggestions.classList.add("hidden");
    }
  }

  // Gestion du Drag & Drop pour l'upload de photos
  const addPhotoZone = document.getElementById("addPhoto");
  const photoInput = document.getElementById("photoInput");
  const photoPreview = document.getElementById("photoPreview");

  if (addPhotoZone && photoInput) {
    // Click pour ouvrir le sélecteur de fichier
    addPhotoZone.addEventListener("click", () => {
      photoInput.click();
    });

    // Gestion du changement de fichier
    photoInput.addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        handleFileSelect(file);
      }
    });

    // Prévenir le comportement par défaut du drag-drop
    ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
      addPhotoZone.addEventListener(eventName, preventDefaults, false);
      document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Ajouter la classe active au survol
    ["dragenter", "dragover"].forEach((eventName) => {
      addPhotoZone.addEventListener(
        eventName,
        () => {
          if (addPhotoZone)
            addPhotoZone.classList.add("border-primary", "bg-primary/5");
        },
        false,
      );
    });

    ["dragleave", "drop"].forEach((eventName) => {
      addPhotoZone.addEventListener(
        eventName,
        () => {
          if (addPhotoZone)
            addPhotoZone.classList.remove("border-primary", "bg-primary/5");
        },
        false,
      );
    });

    // Gestion du drop
    addPhotoZone.addEventListener(
      "drop",
      (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length > 0) {
          const file = files[0];
          if (file.type.startsWith("image/")) {
            photoInput.files = files;
            handleFileSelect(file);
          } else {
            alert("Veuillez déposer une image valide (JPG, PNG, etc.)");
          }
        }
      },
      false,
    );
  }

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  function handleFileSelect(file) {
    // Vérifier la taille du fichier (max 5Mo)
    const maxSize = 5 * 1024 * 1024;
    if (file.size > maxSize) {
      // alert("Le fichier est trop volumineux (max 5Mo)");
      showToast("Le fichier est trop volumineux (max 5Mo)", "error");
      photoInput.value = "";
      return;
    }

    // Afficher l'aperçu
    const reader = new FileReader();
    reader.onload = (e) => {
      const imageUrl = e.target.result;
      if (photoPreview)
        photoPreview.style.backgroundImage = `url('${imageUrl}')`;
      if (addPhotoZone)
        addPhotoZone.classList.add("border-green-500", "border-2");

      // Ajouter un message de succès
      if (addPhotoZone) {
        const existingMessage = addPhotoZone.querySelector(".upload-success");
        if (!existingMessage) {
          const successMsg = document.createElement("div");
          successMsg.className =
            "upload-success absolute inset-0 bg-green-500/20 flex items-center justify-center rounded-xl z-20";
          successMsg.innerHTML =
            '<span class="material-symbols-outlined text-green-600 text-5xl">check_circle</span>';
          addPhotoZone.appendChild(successMsg);

          setTimeout(() => {
            successMsg.remove();
          }, 1500);
        }
      }
    };
    reader.readAsDataURL(file);
  }

  // Gestion du formulaire responsif (Modal sur mobile, Panneau sur desktop)
  const formPanel = document.getElementById("formPanel");
  const formOverlay = document.getElementById("formOverlay");
  const closeFormBtn = document.getElementById("closeFormBtn");
  const cancelFormBtn = document.getElementById("cancelFormBtn");
  const addBtn = document.getElementById("addbtn");

  function openForm() {
    if (formPanel) formPanel.classList.remove("hidden");
    // Sur mobile, afficher l'overlay
    if (window.innerWidth < 768 && formOverlay) {
      formOverlay.classList.remove("hidden");
    }
  }

  function closeForm() {
    if (formPanel) formPanel.classList.add("hidden");
    if (formOverlay) formOverlay.classList.add("hidden");
    const itemForm = document.getElementById("itemForm");
    if (itemForm) itemForm.reset();
  }

  // Event listeners pour ouvrir/fermer le formulaire
  if (addBtn) {
    addBtn.addEventListener("click", openForm);
  }

  if (closeFormBtn) {
    closeFormBtn.addEventListener("click", closeForm);
  }

  if (cancelFormBtn) {
    cancelFormBtn.addEventListener("click", closeForm);
  }

  // Fermer en cliquant sur l'overlay
  if (formOverlay) {
    formOverlay.addEventListener("click", closeForm);
  }

  // Gestion du submit du formulaire
  const submitFormBtn = document.getElementById("submitFormBtn");
  const itemForm = document.getElementById("itemForm");

  if (submitFormBtn && itemForm) {
    submitFormBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      try {
        const formData = new FormData();
        formData.append("name", document.getElementById("formName").value);
        formData.append(
          "category_id",
          document.getElementById("formCategory").value,
        );
        formData.append("price", document.getElementById("formPrice").value);
        formData.append(
          "description",
          document.getElementById("formDescription").value,
        );
        formData.append(
          "is_popular",
          document.getElementById("formPopular").checked ? 1 : 0,
        );
        formData.append(
          "is_available",
          document.getElementById("formAvailable").checked ? 1 : 0,
        );
        // Ne pas ajouter 'tags', seulement 'ingredients' (voir plus bas)
        const photoInput = document.getElementById("photoInput");
        if (photoInput && photoInput.files.length > 0) {
          formData.append("photo", photoInput.files[0]);
        }
        if (
          !formData.get("name") ||
          !formData.get("category_id") ||
          !formData.get("price")
        ) {
          showToast("Veuillez remplir tous les champs obligatoires", "error");
          return;
        }
        submitFormBtn.disabled = true;
        if (submitFormBtn) submitFormBtn.classList.add("opacity-50");
        // DEBUG : Afficher le contenu envoyé lors de l'édition/ajout
        if (window.DEBUG_FORMDATA) {
          for (let pair of formData.entries()) {
            console.log(pair[0] + ":", pair[1]);
          }
        }
        // Ajouter les ingrédients (toujours, même si vide)
        formData.append("ingredients", JSON.stringify(tags));
        // Vérifier si édition ou création
        const editId = itemForm.getAttribute("data-edit-id");
        let response, result;
        if (editId) {
          response = await fetch(`/api/menu-items/${editId}`, {
            method: "POST",

            body: formData,
          });

          result = await response.json();
          console.log("Result from create:", result);

          itemForm.removeAttribute("data-edit-id");
        } else {
          response = await fetch("/api/menu-items", {
            method: "POST",
            body: formData,
          });
          result = await response.json();
        }
        submitFormBtn.disabled = false;
        if (submitFormBtn) submitFormBtn.classList.remove("opacity-50");
        if (!response.ok || !result.success) {
          showToast(result.error || "Erreur lors de la sauvegarde", "error");
          return;
        }
        showToast(
          editId ? "Article modifié avec succès" : "Article ajouté avec succès",
          "success",
        );
        localStorage.removeItem("menuTags");
        closeForm();
        itemForm.reset();
        const data = await fetchMenuData();
        menuDataCache = data;
        renderMenuTable(menuDataCache, currentPage);
      } catch (error) {
        submitFormBtn.disabled = false;
        if (submitFormBtn) submitFormBtn.classList.remove("opacity-50");
        showToast("Erreur lors de la sauvegarde", "error");
        console.error(error);
      }
    });
  }

  // Gérer le responsive au redimensionnement
  window.addEventListener("resize", () => {
    if (window.innerWidth >= 768 && formOverlay) {
      // Desktop: masquer l'overlay
      formOverlay.classList.add("hidden");
    }
  });

  // Fonctions globales pour les actions du tableau

  window.editItem = function (id) {
    // Pré-remplir le formulaire avec les données de l'article
    fetch(`/api/menu-items/${id}`)
      .then((response) => response.json())
      .then((data) => {
        if (!data.success || !data.data) {
          showToast("Erreur lors du chargement de l'article", "error");
          return;
        }
        const item = data.data;
        openForm();
        // Remplir les champs du formulaire
        document.getElementById("formName").value = item.name || "";
        document.getElementById("formCategory").value = item.category_id || "";
        document.getElementById("formPrice").value = item.price || "";
        document.getElementById("formDescription").value =
          item.description || "";
        document.getElementById("formPopular").checked = !!item.is_popular;
        document.getElementById("formAvailable").checked = !!item.is_available;
        // Pré-remplir les tags/ingrédients
        tags = Array.isArray(item.ingredients) ? [...item.ingredients] : [];
        renderTags();
        // Prévisualisation image (optionnel)
        if (item.image) {
          if (photoPreview)
            photoPreview.style.backgroundImage = `url('${item.image.startsWith("/") ? item.image : "/" + item.image}')`;
        } else if (photoPreview) {
          photoPreview.style.backgroundImage = "";
        }
        // Réinitialiser le champ fichier
        if (photoInput) photoInput.value = "";
        // Stocker l'ID de l'item en cours d'édition
        itemForm.setAttribute("data-edit-id", item.id);
      })
      .catch(() => {
        showToast("Erreur lors du chargement de l'article", "error");
      });
  };

  window.deleteItem = async function (id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet article?")) {
      try {
        const response = await fetch(`/api/menu-items/${id}`, {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
          },
        });
        const data = await response.json();
        if (data.success) {
          showToast("Article supprimé avec succès", "success");
          // Rafraîchir le tableau après suppression
          const menu = await fetchMenuData();
          renderMenuTable(menu);
        } else {
          showToast("Erreur: " + data.error, "error");
        }
      } catch (error) {
        console.error("Erreur:", error);
        showToast("Erreur lors de la suppression", "error");
      }
    }
  };
});

// API utilitaire pour les menus
const MenuAPI = {
  async getAll() {
    const response = await fetch("/api/menu-items");
    if (!response.ok) throw new Error("Erreur API: " + response.status);
    return await response.json();
  },

  // Tu peux ajouter d'autres méthodes ici (getById, create, update, delete...)
};

// Tags prédéfinis
const suggestedTags = [
  "Pimenté",
  "Sans gluten",
  "Vegan",
  "Sans lactose",
  "Spicy",
  "Allergène",
  "Nouveau",
  "Signature",
];
document.addEventListener("DOMContentLoaded", function () {
  const filtreBtns = document.querySelectorAll(
    ".flex.gap-8 button[data-filtre], .flex.gap-8 button:not([data-filtre])",
  );
  const tbody = document.getElementById("menu-tbody");
  if (!tbody) return;
  filtreBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      // Style actif
      filtreBtns.forEach((b) =>
        b.classList.remove(
          "text-[#181711]",
          "dark:text-white",
          "border-primary",
          "font-bold",
        ),
      );
      btn.classList.add(
        "text-[#181711]",
        "dark:text-white",
        "border-primary",
        "font-bold",
      );
      // Filtrage
      const filtre = btn.getAttribute("data-filtre");
      const rows = tbody.querySelectorAll("tr");
      rows.forEach((row) => {
        if (!filtre || filtre === "all") {
          row.style.display = "";
        } else {
          // data-categorie sur <tr>
          if (row.getAttribute("data-categorie") == filtre) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        }
      });
    });
  });
});
