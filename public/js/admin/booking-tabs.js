// --- Navigation par onglets admin booking ---
// Fonction globale pour récupérer et afficher les réservations
async function fetchAndRenderReservations(page = 1, perPage = 10) {
  const reservationTbl = document.getElementById("reservation-tbl");
  if (!reservationTbl) return;
  const tbody = reservationTbl.querySelector("tbody");
  if (!tbody) return;
  tbody.innerHTML =
    '<tr><td colspan="7" class="text-center">Chargement...</td></tr>';
  try {
    const res = await fetch(
      `/api/reservations?page=${page}&perPage=${perPage}`,
    );
    const result = await res.json();
    const data = Array.isArray(result.data) ? result.data : [];
    const total = result.count || data.length;
    if (data.length > 0) {
      tbody.innerHTML = data
        .map(
          (r) => `
        <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
          <td class="py-4 px-6 font-medium text-gray-400">#${r.code_unique || r.id}</td>
          <td class="py-4 px-6">
            <div class="flex flex-col">
              <span class="font-bold text-[#181711] dark:text-white">${r.customer_name || ""}</span>
              <span class="text-xs text-[#8a8460] dark:text-gray-500">${r.phone || ""}</span>
            </div>
          </td>
          <td class="py-4 px-6 text-[#181711] dark:text-gray-300">
            ${
              r.reservation_date
                ? new Date(r.reservation_date).toLocaleDateString("fr-FR", {
                    day: "2-digit",
                    month: "short",
                  })
                : ""
            }, <span class="font-semibold">${r.reservation_time || ""}</span>
          </td>
          <td class="py-4 px-6">
            <div class="flex items-center gap-1.5">
              <span class="material-symbols-outlined text-gray-400 text-sm">person</span>
              <span class="font-medium text-[#181711] dark:text-white">${r.persons || "-"}</span>
            </div>
          </td>
          <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">${r.type || "—"}</td>
          <td class="py-4 px-6">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold ${
              r.status === "Annulé"
                ? "bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700"
                : r.status === "En attente"
                  ? "bg-[#fff8e1] dark:bg-yellow-900/20 text-[#b26b00] dark:text-yellow-500 border border-[#ffe082] dark:border-yellow-800/50"
                  : "bg-[#eefae6] dark:bg-green-900/20 text-[#1a7f37] dark:text-green-400 border border-[#ccebc4] dark:border-green-800/50"
            }">
              <span class="size-1.5 rounded-full bg-current${r.status === "En attente" ? " animate-pulse" : ""}"></span>
              ${r.status || "Confirmé"}
            </span>
          </td>
          <td class="py-4 px-6 text-right">
            <div class="flex justify-end gap-1">
              <button class="p-1.5 text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30 rounded-md transition-colors btn-confirm-res" title="Confirmer" data-id="${r.id}">
                <span class="material-symbols-outlined text-[20px]">check</span>
              </button>
              <button class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-md transition-colors btn-cancel-res" title="Annuler" data-id="${r.id}">
                <span class="material-symbols-outlined text-[20px]">close</span>
              </button>
              <button class="p-1.5 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 btn-details-res" title="Voir le détail" data-id="${r.id}">
                <span class="material-symbols-outlined text-[20px]">visibility</span>
              </button>
            </div>
          </td>
        </tr>
      `,
        )
        .join("");
      // Ajout des listeners après le rendu du tableau !
      addReservationActionListeners();
      // Pagination
      const pagination = document.getElementById("reservation-pagination");
      if (pagination) {
        const totalPages = Math.ceil(total / perPage);
        let html = `<span class="text-sm text-[#8a8460] dark:text-gray-400">Affichage de <span class="font-medium text-[#181711] dark:text-white">${(page - 1) * perPage + 1}</span> à <span class="font-medium text-[#181711] dark:text-white">${Math.min(page * perPage, total)}</span> sur <span class="font-medium text-[#181711] dark:text-white">${total}</span> entrées</span>`;
        html += '<div class="flex gap-2">';
        html += `<button class="px-3 py-1 text-sm text-[#8a8460] dark:text-gray-400 border border-[#e6e4db] dark:border-gray-700 rounded hover:bg-white dark:hover:bg-gray-800" ${page === 1 ? "disabled" : ""} id="btn-prev-res">Précédent</button>`;
        html += `<button class="px-3 py-1 text-sm text-[#181711] dark:text-white border border-[#e6e4db] dark:border-gray-700 rounded bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" ${page === totalPages ? "disabled" : ""} id="btn-next-res">Suivant</button>`;
        html += "</div>";
        pagination.innerHTML = html;
        document
          .getElementById("btn-prev-res")
          .addEventListener("click", function () {
            if (page > 1) fetchAndRenderReservations(page - 1, perPage);
          });
        document
          .getElementById("btn-next-res")
          .addEventListener("click", function () {
            if (page < totalPages)
              fetchAndRenderReservations(page + 1, perPage);
          });
        // Ajout navigation directe par numéro de page si > 2 pages
        if (totalPages > 2) {
          let pageNav = '<div class="flex gap-1 ml-4">';
          for (let i = 1; i <= totalPages; i++) {
            pageNav += `<button class="px-2 py-1 text-xs rounded ${i === page ? "bg-primary text-white" : "bg-gray-100 text-gray-600"}" data-page="${i}">${i}</button>`;
          }
          pageNav += "</div>";
          pagination.innerHTML += pageNav;
          pagination.querySelectorAll("button[data-page]").forEach((btn) => {
            btn.addEventListener("click", function () {
              const targetPage = parseInt(btn.getAttribute("data-page"));
              if (targetPage !== page)
                fetchAndRenderReservations(targetPage, perPage);
            });
          });
        }
      }
    } else {
      tbody.innerHTML =
        '<tr><td colspan="7" class="text-center">Aucune réservation trouvée.</td></tr>';
    }
  } catch (e) {
    tbody.innerHTML =
      '<tr><td colspan="7" class="text-center text-red-500">Erreur de chargement</td></tr>';
  }
}
// Action: confirmation et annulation de réservation
function handleReservationAction(action, id) {
  let apiAction = action === "confirm" ? "confirmer" : "annuler";
  fetch(`/api/reservations/${id}/${apiAction}`, {
    method: "PATCH",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({}),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        fetchAndRenderReservations();
        showToast(
          action === "confirm"
            ? "Réservation confirmée !"
            : "Réservation annulée !",
          "success",
        );
      } else {
        showToast(
          "Erreur: " + (data.message || data.error || "Opération impossible"),
          "error",
        );
      }
    })
    .catch(() => showToast("Erreur réseau ou serveur", "error"));
}
// Ajout des listeners sur les boutons dynamiques
function addReservationActionListeners() {
  document.querySelectorAll(".btn-confirm-res").forEach((btn) => {
    btn.onclick = function () {
      handleReservationAction("confirm", btn.dataset.id);
    };
  });
  document.querySelectorAll(".btn-cancel-res").forEach((btn) => {
    btn.onclick = function () {
      handleReservationAction("cancel", btn.dataset.id);
    };
  });
}
// Activation visuelle des boutons tabs
function activateTab(tabBtn, tabTable, otherBtn, otherTable) {
  tabBtn.classList.add(
    "border-b-2",
    "border-primary",
    "text-primary",
    "font-bold",
  );
  tabBtn.classList.add(
    "text-primary",
    "font-bold",
    "border-b-2",
    "border-primary",
  );
  tabBtn.classList.remove(
    "text-[#8a8460]",
    "dark:text-gray-400",
    "font-medium",
    "border-transparent",
  );
  otherBtn.classList.remove(
    "border-b-2",
    "border-primary",
    "text-primary",
    "font-bold",
  );
  otherBtn.classList.add(
    "text-[#8a8460]",
    "dark:text-gray-400",
    "font-medium",
    "border-transparent",
  );
  tabTable.classList.remove("hidden");
  otherTable.classList.add("hidden");
}
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionne les bons boutons tabs par leur texte
  const btns = document.querySelectorAll(".flex.gap-8 > button");
  let btnReservation = null;
  let btnCommande = null;
  btns.forEach((btn) => {
    if (btn.textContent.trim().toLowerCase().includes("réservations"))
      btnReservation = btn;
    if (btn.textContent.trim().toLowerCase().includes("commandes"))
      btnCommande = btn;
  });
  const tblReservation = document.getElementById("reservation-tbl");
  const tblCommande = document.getElementById("commande-tbl");
  if (btnReservation && btnCommande && tblReservation && tblCommande) {
    btnReservation.addEventListener("click", function () {
      fetchAndRenderReservations();
      activateTab(btnReservation, tblReservation, btnCommande, tblCommande);
    });
    btnCommande.addEventListener("click", function () {
      fetchAndRenderCommandes();
      activateTab(btnCommande, tblCommande, btnReservation, tblReservation);
    });
    // Par défaut, affiche commandes et cache réservations
    fetchAndRenderCommandes();
    activateTab(btnCommande, tblCommande, btnReservation, tblReservation);
  }
});

// JS pour aside détails admin
function showDetailsAside(contentHtml) {
  const aside = document.getElementById("admin-details-aside");
  const content = document.getElementById("details-content");
  if (aside && content) {
    content.innerHTML = contentHtml;
    aside.classList.remove("hidden");
  }
}
function hideDetailsAside() {
  const aside = document.getElementById("admin-details-aside");
  if (aside) aside.classList.add("hidden");
}
document.addEventListener("DOMContentLoaded", function () {
  const closeBtn = document.getElementById("close-details-aside");
  if (closeBtn) closeBtn.onclick = hideDetailsAside;
  // Détails réservation
  document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-details-res")) {
      const id = e.target.closest(".btn-details-res").dataset.id;
      fetch(`/api/reservations/${id}`)
        .then((res) => res.json())
        .then((data) => {
          if (data.success && data.data) {
            const r = data.data;
            showDetailsAside(`
              <div class='mb-4 bg-[#fcfbf8] dark:bg-[#181711] border border-[#e6e4db] dark:border-gray-800 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4'>
                <div class='flex items-center gap-3 mb-4'>
                  <span class='inline-flex items-center justify-center size-10 rounded-full bg-primary text-[#181711] font-bold text-lg'>${r.customer_name ? r.customer_name[0].toUpperCase() : "?"}</span>
                  <div>
                    <h3 class='text-xl font-bold'>${r.customer_name || ""}</h3>
                    <div class='text-sm text-gray-500'>${r.phone || ""}</div>
                  </div>
                </div>
                <div class='grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4'>
                  <div class='grid gap-1'>
                    <label class='text-xs font-semibold text-[#8a8460]'>Date</label>
                    <div>${r.reservation_date || ""} ${r.reservation_time || ""}</div>
                  </div>
                  <div class='grid gap-1'>
                    <label class='text-xs font-semibold text-[#8a8460]'>Personnes</label>
                    <div>${r.persons || "-"}</div>
                  </div>
                  <div class='grid gap-1'>
                    <label class='text-xs font-semibold text-[#8a8460]'>Type</label>
                    <div>${r.type || "-"}</div>
                  </div>
                  <div class='grid gap-1'>
                    <label class='text-xs font-semibold text-[#8a8460]'>Statut</label>
                    <div>${r.status || "-"}</div>
                  </div>
                </div>
                <div class='mt-4'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Message</label><br>
                  <span>${r.message || '<span class="text-gray-400">Aucun message</span>'}</span>
                </div>
                <div class='mt-4 flex gap-2'>
                  <span class='inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold'>Code: ${r.code_unique || r.id}</span>
                </div>
              </div>
            `);
          } else {
            showDetailsAside(
              "<div class='text-red-500'>Réservation introuvable.</div>",
            );
          }
        });
    }
    // Détails commande (à adapter selon l'API)
    if (e.target.closest(".btn-details-com")) {
      const id = e.target.closest(".btn-details-com").dataset.id;
      fetch(`/api/commandes/${id}`)
        .then((res) => res.json())
        .then((data) => {
          console.log("Détails commande:", data);
          if ((data.success || data.statut === "ok") && data.data) {
            const c = data.data;
            showDetailsAside(`
              <h3 class='text-xl font-bold mb-4'>Commande #${c.id}</h3>
              <div class='mb-4 bg-[#fcfbf8] dark:bg-[#181711] border border-[#e6e4db] dark:border-gray-800 rounded-xl p-4 grid grid-cols-2 sm:grid-cols-2 gap-x-8 gap-y-4'>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Client</label>
                  <div class='text-[#181711] dark:text-white'>${c.nom_client}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Téléphone</label>
                  <div class='text-[#181711] dark:text-white'>${c.telephone}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Email</label>
                  <div class='text-[#181711] dark:text-white'>${c.email}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Date</label>
                  <div class='text-[#181711] dark:text-white'>${c.date_commande}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Montant</label>
                  <div class='text-[#181711] dark:text-white'>${c.montant_total} €</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Frais livraison</label>
                  <div class='text-[#181711] dark:text-white'>${c.frais_livraison} €</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Mode réception</label>
                  <div class='text-[#181711] dark:text-white'>${c.mode_reception}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Adresse</label>
                  <div class='text-[#181711] dark:text-white'>${c.adresse}, ${c.commune}, ${c.quartier}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Point repère</label>
                  <div class='text-[#181711] dark:text-white'>${c.point_repere}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Note</label>
                  <div class='text-[#181711] dark:text-white'>${c.note || "—"}</div>
                </div>
                <div class='grid gap-1'>
                  <label class='text-xs font-semibold text-[#8a8460]'>Statut</label>
                  <div class='text-[#181711] dark:text-white'>${c.statut || "—"}</div>
                </div>
              </div>
              <div class='mb-2 col-span-2'><span class='font-semibold text-[#8a8460]'>Articles :</span></div>
              <div class='mb-4 col-span-2'>
                <div class='grid grid-cols-1 sm:grid-cols-2 gap-4'>
                  ${(c.items || [])
                    .map(
                      (item) => `
                    <div class='border rounded-lg p-3 bg-white dark:bg-[#181711] flex flex-col gap-1'>
                      <span class='font-bold text-[#181711] dark:text-white'>${item.nom_produit}</span>
                      <span class='text-xs text-[#8a8460] dark:text-gray-400'>Quantité : ${item.quantite} | Produit #${item.produit_id}</span>
                    </div>
                  `,
                    )
                    .join("")}
                </div>
              </div>
            `);
          } else {
            showDetailsAside(
              "<div class='text-red-500'>Commande introuvable.</div>",
            );
          }
        });
    }
  });
});

// Fonction globale pour récupérer et afficher les commandes
async function fetchAndRenderCommandes(page = 1, perPage = 10) {
  const commandeTbl = document.getElementById("commande-tbl");
  if (!commandeTbl) return;
  const tbody = commandeTbl.querySelector("tbody");
  if (!tbody) return;
  tbody.innerHTML =
    '<tr><td colspan="7" class="text-center">Chargement...</td></tr>';
  try {
    const res = await fetch(`/api/commandes?page=${page}&perPage=${perPage}`);
    const result = await res.json();
    console.log("Commandes fetched:", result);
    const data = Array.isArray(result.data) ? result.data : [];
    const total = result.count || data.length;
    if (data.length > 0) {
      tbody.innerHTML = data
        .map(
          (c) => `
        <tr class="group hover:bg-[#faf9f6] dark:hover:bg-gray-800/50 transition-colors">
          <td class="py-4 px-6 text-[#5e5a45] dark:text-gray-400">
            <div class="flex flex-col">
              <span class="font-bold text-[#181711] dark:text-white">${c.date_commande ? new Date(c.date_commande).toLocaleDateString("fr-FR", { day: "2-digit", month: "short" }) : ""}</span>
            </div>
          </td>
          <td class="py-4 px-6 font-medium text-gray-500 dark:text-gray-400">#${c.id}</td>
          <td class="py-4 px-6">
            <div class="flex flex-col">
              <span class="font-bold text-[#181711] dark:text-white">${c.nom_client || ""}</span>
              <span class="text-xs text-[#8a8460] dark:text-gray-500">${c.telephone || ""}</span>
            </div>
          </td>
          <td class="py-4 px-6">
            <span class="text-[#181711] dark:text-gray-300">${c.mode_reception || ""}</span>
          </td>
          <td class="py-4 px-6 font-semibold text-[#181711] dark:text-white">${c.montant_total ? "$" + c.montant_total : "-"}</td>
          <td class="py-4 px-6">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold ${c.statut === "Terminée" ? "bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700" : c.statut === "Annulée" ? "bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900/50" : "bg-[#eefae6] dark:bg-green-900/20 text-[#1a7f37] dark:text-green-400 border border-[#ccebc4] dark:border-green-800/50"}">
              ${c.statut || "—"}
            </span>
          </td>
          <td class="py-4 px-6 text-right">
            <button class="p-2 text-gray-400 hover:text-[#181711] dark:hover:text-white transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 btn-details-com" title="Voir les détails" data-id="${c.id}">
              <span class="material-symbols-outlined text-[20px]">visibility</span>
            </button>
          </td>
        </tr>
      `,
        )
        .join("");
      // Pagination
      const pagination = document.getElementById("commande-pagination");
      if (pagination) {
        const totalPages = Math.ceil(total / perPage);
        let html = `<span class="text-sm text-[#8a8460] dark:text-gray-400">Affichage de <span class="font-medium text-[#181711] dark:text-white">${(page - 1) * perPage + 1}</span> à <span class="font-medium text-[#181711] dark:text-white">${Math.min(page * perPage, total)}</span> sur <span class="font-medium text-[#181711] dark:text-white">${total}</span> entrées</span>`;
        html += '<div class="flex gap-2">';
        html += `<button class="px-3 py-1 text-sm text-[#8a8460] dark:text-gray-400 border border-[#e6e4db] dark:border-gray-700 rounded hover:bg-white dark:hover:bg-gray-800" ${page === 1 ? "disabled" : ""} id="btn-prev-com">Précédent</button>`;
        html += `<button class="px-3 py-1 text-sm text-[#181711] dark:text-white border border-[#e6e4db] dark:border-gray-700 rounded bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" ${page === totalPages ? "disabled" : ""} id="btn-next-com">Suivant</button>`;
        html += "</div>";
        pagination.innerHTML = html;
        document
          .getElementById("btn-prev-com")
          .addEventListener("click", function () {
            if (page > 1) fetchAndRenderCommandes(page - 1, perPage);
          });
        document
          .getElementById("btn-next-com")
          .addEventListener("click", function () {
            if (page < totalPages) fetchAndRenderCommandes(page + 1, perPage);
          });
        // Navigation directe par numéro de page
        if (totalPages > 2) {
          let pageNav = '<div class="flex gap-1 ml-4">';
          for (let i = 1; i <= totalPages; i++) {
            pageNav += `<button class="px-2 py-1 text-xs rounded ${i === page ? "bg-primary text-white" : "bg-gray-100 text-gray-600"}" data-page="${i}">${i}</button>`;
          }
          pageNav += "</div>";
          pagination.innerHTML += pageNav;
          pagination.querySelectorAll("button[data-page]").forEach((btn) => {
            btn.addEventListener("click", function () {
              const targetPage = parseInt(btn.getAttribute("data-page"));
              if (targetPage !== page)
                fetchAndRenderCommandes(targetPage, perPage);
            });
          });
        }
      }
    } else {
      tbody.innerHTML =
        '<tr><td colspan="7" class="text-center">Aucune commande trouvée.</td></tr>';
    }
  } catch (e) {
    tbody.innerHTML =
      '<tr><td colspan="7" class="text-center text-red-500">Erreur de chargement</td></tr>';
  }
}
// Action: confirmation et annulation de réservation
function handleReservationAction(action, id) {
  let apiAction = action === "confirm" ? "confirmer" : "annuler";
  fetch(`/api/reservations/${id}/${apiAction}`, {
    method: "PATCH",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({}),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        fetchAndRenderReservations();
        showToast(
          action === "confirm"
            ? "Réservation confirmée !"
            : "Réservation annulée !",
          "success",
        );
      } else {
        showToast(
          "Erreur: " + (data.message || data.error || "Opération impossible"),
          "error",
        );
      }
    })
    .catch(() => showToast("Erreur réseau ou serveur", "error"));
}
// Ajout des listeners sur les boutons dynamiques
function addReservationActionListeners() {
  document.querySelectorAll(".btn-confirm-res").forEach((btn) => {
    btn.onclick = function () {
      handleReservationAction("confirm", btn.dataset.id);
    };
  });
  document.querySelectorAll(".btn-cancel-res").forEach((btn) => {
    btn.onclick = function () {
      handleReservationAction("cancel", btn.dataset.id);
    };
  });
}
// Activation visuelle des boutons tabs
function activateTab(tabBtn, tabTable, otherBtn, otherTable) {
  tabBtn.classList.add(
    "border-b-2",
    "border-primary",
    "text-primary",
    "font-bold",
  );
  tabBtn.classList.add(
    "text-primary",
    "font-bold",
    "border-b-2",
    "border-primary",
  );
  tabBtn.classList.remove(
    "text-[#8a8460]",
    "dark:text-gray-400",
    "font-medium",
    "border-transparent",
  );
  otherBtn.classList.remove(
    "border-b-2",
    "border-primary",
    "text-primary",
    "font-bold",
  );
  otherBtn.classList.add(
    "text-[#8a8460]",
    "dark:text-gray-400",
    "font-medium",
    "border-transparent",
  );
  tabTable.classList.remove("hidden");
  otherTable.classList.add("hidden");
}
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionne les bons boutons tabs par leur texte
  const btns = document.querySelectorAll(".flex.gap-8 > button");
  let btnReservation = null;
  let btnCommande = null;
  btns.forEach((btn) => {
    if (btn.textContent.trim().toLowerCase().includes("réservations"))
      btnReservation = btn;
    if (btn.textContent.trim().toLowerCase().includes("commandes"))
      btnCommande = btn;
  });
  const tblReservation = document.getElementById("reservation-tbl");
  const tblCommande = document.getElementById("commande-tbl");
  if (btnReservation && btnCommande && tblReservation && tblCommande) {
    btnReservation.addEventListener("click", function () {
      fetchAndRenderReservations();
      activateTab(btnReservation, tblReservation, btnCommande, tblCommande);
    });
    btnCommande.addEventListener("click", function () {
      fetchAndRenderCommandes();
      activateTab(btnCommande, tblCommande, btnReservation, tblReservation);
    });
    // Par défaut, affiche commandes et cache réservations
    fetchAndRenderCommandes();
    activateTab(btnCommande, tblCommande, btnReservation, tblReservation);
  }
});

// JS pour aside détails admin
function showDetailsAside(contentHtml) {
  const aside = document.getElementById("admin-details-aside");
  const content = document.getElementById("details-content");
  if (aside && content) {
    content.innerHTML = contentHtml;
    aside.classList.remove("hidden");
  }
}
function hideDetailsAside() {
  const aside = document.getElementById("admin-details-aside");
  if (aside) aside.classList.add("hidden");
}
document.addEventListener("DOMContentLoaded", function () {
  const closeBtn = document.getElementById("close-details-aside");
  if (closeBtn) closeBtn.onclick = hideDetailsAside;
  // Détails réservation
  document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-details-res")) {
      const id = e.target.closest(".btn-details-res").dataset.id;
      fetch(`/api/reservations/${id}`)
        .then((res) => res.json())
        .then((data) => {
          if (data.success && data.data) {
            const r = data.data;
            showDetailsAside(`
              <div class='flex flex-col gap-4'>
                <div class='flex items-center gap-3 mb-2'>
                  <span class='inline-flex items-center justify-center size-10 rounded-full bg-primary text-[#181711] font-bold text-lg'>${r.customer_name ? r.customer_name[0].toUpperCase() : "?"}</span>
                  <div>
                    <h3 class='text-xl font-bold'>${r.customer_name || ""}</h3>
                    <div class='text-sm text-gray-500'>${r.phone || ""}</div>
                  </div>
                </div>
                <div class='grid grid-cols-2 gap-4'>
                  <div><span class='font-semibold text-[#8a8460]'>Date</span><br><span>${r.reservation_date || ""} ${r.reservation_time || ""}</span></div>
                  <div><span class='font-semibold text-[#8a8460]'>Personnes</span><br><span>${r.persons || "-"}</span></div>
                  <div><span class='font-semibold text-[#8a8460]'>Type</span><br><span>${r.type || "-"}</span></div>
                  <div><span class='font-semibold text-[#8a8460]'>Statut</span><br><span>${r.status || "-"}</span></div>
                </div>
                <div class='mt-4'>
                  <span class='font-semibold text-[#8a8460]'>Message</span><br>
                  <span>${r.message || '<span class="text-gray-400">Aucun message</span>'}</span>
                </div>
                <div class='mt-4 flex gap-2'>
                  <span class='inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold'>Code: ${r.code_unique || r.id}</span>
                </div>
              </div>
            `);
          } else {
            showDetailsAside(
              "<div class='text-red-500'>Réservation introuvable.</div>",
            );
          }
        });
    }
    // Détails commande (à adapter selon l'API)
    if (e.target.closest(".btn-details-com")) {
      const id = e.target.closest(".btn-details-com").dataset.id;
      fetch(`/api/commandes/${id}`)
        .then((res) => res.json())
        .then((data) => {
          if ((data.success || data.statut === "ok") && data.data) {
            const c = data.data;
            showDetailsAside(`
              <h3 class='text-xl font-bold mb-4'>Commande #${c.id}</h3>
              <div class='mb-4'>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Client :</span> <span class='text-[#181711] dark:text-white'>${c.nom_client}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Téléphone :</span> <span class='text-[#181711] dark:text-white'>${c.telephone}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Email :</span> <span class='text-[#181711] dark:text-white'>${c.email}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Date :</span> <span class='text-[#181711] dark:text-white'>${c.date_commande}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Montant :</span> <span class='text-[#181711] dark:text-white'>${c.montant_total} €</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Frais livraison :</span> <span class='text-[#181711] dark:text-white'>${c.frais_livraison} €</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Mode réception :</span> <span class='text-[#181711] dark:text-white'>${c.mode_reception}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Adresse :</span> <span class='text-[#181711] dark:text-white'>${c.adresse}, ${c.commune}, ${c.quartier}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Point repère :</span> <span class='text-[#181711] dark:text-white'>${c.point_repere}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Note :</span> <span class='text-[#181711] dark:text-white'>${c.note || "—"}</span></div>
                <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Statut :</span> <span class='text-[#181711] dark:text-white'>${c.statut || "—"}</span></div>
              </div>
              <div class='mb-2'><span class='font-semibold text-[#8a8460]'>Articles :</span></div>
              <div class='mb-4'>
                <ul class='divide-y divide-[#e6e4db] dark:divide-gray-700'>
                  ${(c.items || [])
                    .map(
                      (item) => `
                    <li class='py-2 flex flex-col'>
                      <span class='font-bold text-[#181711] dark:text-white'>${item.nom_produit}</span>
                      <span class='text-xs text-[#8a8460] dark:text-gray-400'>Quantité : ${item.quantite} | Produit #${item.produit_id}</span>
                    </li>
                  `,
                    )
                    .join("")}
                </ul>
              </div>
            `);
          } else {
            showDetailsAside(
              "<div class='text-red-500'>Commande introuvable.</div>",
            );
          }
        });
    }
  });
});
