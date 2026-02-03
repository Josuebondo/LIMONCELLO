/**
 * API Client pour MenuItem CRUD
 * Utilise Fetch API pour les requêtes HTTP
 */

// Définir URLROOT si pas déjà défini
if (typeof window.URLROOT === "undefined") {
  window.URLROOT = window.location.protocol + "//" + window.location.host;
}

class MenuItemAPI {
  constructor(baseUrl = "/api/menu-items") {
    this.baseUrl = baseUrl;
  }

  /**
   * GET - Récupère tous les articles du menu
   * @param {number} categoryId - ID de catégorie (optionnel)
   * @returns {Promise}
   */
  async getAll(categoryId = null) {
    try {
      let url = this.baseUrl;
      if (categoryId) {
        url += `?category_id=${categoryId}`;
      }

      const response = await fetch(url, {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      });

      if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      console.error("Erreur lors de la récupération des articles:", error);
      throw error;
    }
  }

  /**
   * GET - Récupère un article spécifique
   * @param {number} id - ID de l'article
   * @returns {Promise}
   */
  async getById(id) {
    try {
      const response = await fetch(`${this.baseUrl}/${id}`, {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      });

      if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      console.error(
        `Erreur lors de la récupération de l'article ${id}:`,
        error
      );
      throw error;
    }
  }

  /**
   * POST - Crée un nouvel article
   * @param {object} data - Données du nouvel article
   * @returns {Promise}
   */
  async create(data) {
    try {
      const response = await fetch(this.baseUrl, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.error || `Erreur HTTP ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      console.error("Erreur lors de la création de l'article:", error);
      throw error;
    }
  }

  /**
   * PUT - Modifie un article existant
   * @param {number} id - ID de l'article
   * @param {object} data - Données à mettre à jour
   * @returns {Promise}
   */
  async update(id, data) {
    try {
      const response = await fetch(`${this.baseUrl}/${id}`, {
        method: "PUT",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.error || `Erreur HTTP ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      console.error(`Erreur lors de la mise à jour de l'article ${id}:`, error);
      throw error;
    }
  }

  /**
   * DELETE - Supprime un article
   * @param {number} id - ID de l'article
   * @returns {Promise}
   */
  async delete(id) {
    try {
      const response = await fetch(`${this.baseUrl}/${id}`, {
        method: "DELETE",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.error || `Erreur HTTP ${response.status}`);
      }

      return await response.json();
    } catch (error) {
      console.error(`Erreur lors de la suppression de l'article ${id}:`, error);
      throw error;
    }
  }

  /**
   * Affiche un message de succès
   * @param {string} message
   */
  static showSuccess(message) {
    console.log("✅", message);
    // À adapter avec votre système de notification
    if (typeof showNotification === "function") {
      showNotification(message, "success");
    }
  }

  /**
   * Affiche un message d'erreur
   * @param {string} message
   */
  static showError(message) {
    console.error("❌", message);
    // À adapter avec votre système de notification
    if (typeof showNotification === "function") {
      showNotification(message, "error");
    }
  }
}

// Initialiser l'API
const menuAPI = new MenuItemAPI("/api/menu-items");

// ============================================================
// EXEMPLES D'UTILISATION
// ============================================================

/**
 * Récupérer tous les articles
 */
async function loadAllMenuItems() {
  try {
    const response = await menuAPI.getAll();
    if (response.success) {
      console.log("Articles chargés:", response.data);
      displayMenuItems(response.data);
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError("Erreur lors du chargement");
  }
}

/**
 * Récupérer les articles d'une catégorie
 */
async function loadMenuItemsByCategory(categoryId) {
  try {
    const response = await menuAPI.getAll(categoryId);
    if (response.success) {
      console.log(`Articles de la catégorie ${categoryId}:`, response.data);
      displayMenuItems(response.data);
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError("Erreur lors du chargement");
  }
}

/**
 * Créer un nouvel article
 */
async function createNewMenuItem() {
  const newItem = {
    name: "Lasagne Bolognaise",
    category_id: 2,
    description: "Lasagne traditionnelle à la sauce Bolognaise",
    price: 16.5,
    image: "lasagne.jpg",
    is_popular: 0,
    is_available: 1,
  };

  try {
    const response = await menuAPI.create(newItem);
    if (response.success) {
      MenuItemAPI.showSuccess(response.message);
      console.log("Nouvel article créé:", response.data);
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError(error.message);
  }
}

/**
 * Modifier un article
 */
async function updateMenuItem(id, updateData) {
  try {
    const response = await menuAPI.update(id, updateData);
    if (response.success) {
      MenuItemAPI.showSuccess(response.message);
      console.log("Article mis à jour:", response.data);
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError(error.message);
  }
}

/**
 * Supprimer un article
 */
async function deleteMenuItem(id) {
  if (!confirm("Êtes-vous sûr de vouloir supprimer cet article?")) {
    return;
  }

  try {
    const response = await menuAPI.delete(id);
    if (response.success) {
      MenuItemAPI.showSuccess(response.message);
      // Recharger la liste
      loadAllMenuItems();
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError(error.message);
  }
}

/**
 * Affiche les articles dans le DOM
 */
function displayMenuItems(items) {
  const container = document.getElementById("menuItemsContainer");
  if (!container) return;

  container.innerHTML = items
    .map(
      (item) => `
        <div class="menu-item" data-id="${item.id}">
            <img src="${
              item.image
                ? item.image.startsWith("/")
                  ? window.URLROOT + item.image
                  : window.URLROOT + "file/" + item.image
                : window.URLROOT + "images/placeholder.png"
            }" alt="${item.name}" class="item-image">
            <div class="item-content">
                <h3>${item.name}</h3>
                <p class="description">${item.description || ""}</p>
                <div class="item-footer">
                    <span class="price">$${parseFloat(item.price).toFixed(
                      2
                    )}</span>
                    <span class="category">${item.category_name}</span>
                    ${
                      item.is_popular
                        ? '<span class="badge badge-popular">⭐ Populaire</span>'
                        : ""
                    }
                    ${
                      !item.is_available
                        ? '<span class="badge badge-unavailable">Indisponible</span>'
                        : ""
                    }
                </div>
                <div class="item-actions">
                    <button onclick="editMenuItem(${
                      item.id
                    })" class="btn-edit">✏️ Éditer</button>
                    <button onclick="deleteMenuItem(${
                      item.id
                    })" class="btn-delete">🗑️ Supprimer</button>
                </div>
            </div>
        </div>
    `
    )
    .join("");
}

/**
 * Éditer un article (exemple)
 */
async function editMenuItem(id) {
  try {
    const response = await menuAPI.getById(id);
    if (response.success) {
      // Pré-remplir le formulaire avec les données
      console.log("Édition de:", response.data);
      populateForm(response.data);
    } else {
      MenuItemAPI.showError(response.error);
    }
  } catch (error) {
    MenuItemAPI.showError("Erreur lors de la récupération");
  }
}

/**
 * Pré-remplir le formulaire
 */
function populateForm(item) {
  document.getElementById("itemId").value = item.id;
  document.getElementById("itemName").value = item.name;
  document.getElementById("itemCategory").value = item.category_id;
  document.getElementById("itemPrice").value = item.price;
  document.getElementById("itemDescription").value = item.description || "";
  document.getElementById("itemImage").value = item.image || "";
  document.getElementById("isPopular").checked = item.is_popular;
  document.getElementById("isAvailable").checked = item.is_available;
}

/**
 * Gérer la soumission du formulaire
 */
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("menuItemForm");
  if (form) {
    form.addEventListener("submit", async function (e) {
      e.preventDefault();

      const itemId = document.getElementById("itemId").value;
      const formData = new FormData(form);

      const data = {
        name: formData.get("name"),
        category_id: parseInt(formData.get("category_id")),
        description: formData.get("description"),
        price: parseFloat(formData.get("price")),
        image: formData.get("image"),
        is_popular: formData.get("is_popular") ? 1 : 0,
        is_available: formData.get("is_available") ? 1 : 0,
      };

      try {
        if (itemId) {
          // Mise à jour
          await updateMenuItem(itemId, data);
        } else {
          // Création
          await createNewMenuItem();
        }
        form.reset();
        document.getElementById("itemId").value = "";
        loadAllMenuItems();
      } catch (error) {
        console.error("Erreur:", error);
      }
    });
  }

  // Charger les articles au démarrage
  loadAllMenuItems();
});
