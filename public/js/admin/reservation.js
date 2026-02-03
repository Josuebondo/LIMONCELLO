// JS d'affichage des réservations côté admin
// À inclure dans la vue admin réservation

function loadAdminReservations() {
  const tbody = document.getElementById("admin-reservations-tbody");
  const loader = document.getElementById("admin-reservations-loader");
  if (!tbody) return;

  // Affiche un loader pendant le chargement
  if (loader) loader.classList.remove("hidden");

  fetch("/api/reservations")
    .then((response) => response.json())
    .then((result) => {
      if (result.success && Array.isArray(result.data)) {
        tbody.innerHTML = result.data
          .map((r) => {
            const d = r.donnees || r; // supporte objets ou tableaux associatifs
            return `<tr>
            <td class="py-2 px-4">${d.id}</td>
            <td class="py-2 px-4">${d.customer_name}</td>
            <td class="py-2 px-4">${d.phone}</td>
            <td class="py-2 px-4">${d.reservation_date}</td>
            <td class="py-2 px-4">${d.reservation_time}</td>
            <td class="py-2 px-4">${d.persons}</td>
            <td class="py-2 px-4">${d.type || "-"}</td>
            <td class="py-2 px-4">${d.status || "-"}</td>
            <td class="py-2 px-4">${d.message || ""}</td>
            <td class="py-2 px-4">${d.created_at || ""}</td>
          </tr>`;
          })
          .join("");
      } else {
        tbody.innerHTML =
          '<tr><td colspan="10" class="text-center text-red-500">Aucune réservation trouvée</td></tr>';
      }
    })
    .catch((e) => {
      tbody.innerHTML =
        '<tr><td colspan="10" class="text-center text-red-500">Erreur lors du chargement</td></tr>';
    })
    .finally(() => {
      if (loader) loader.classList.add("hidden");
    });
}

// Expose pour usage dynamique
window.loadAdminReservations = loadAdminReservations;

document.addEventListener("DOMContentLoaded", function () {
  loadAdminReservations();
});
