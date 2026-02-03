// JS pour la page de modification de réservation

// Toast utilitaire
function showToast(message, type = "info") {
  let toast = document.createElement("div");
  toast.textContent = message;
  toast.style.position = "fixed";
  toast.style.bottom = "2em";
  toast.style.left = "50%";
  toast.style.transform = "translateX(-50%)";
  toast.style.background =
    type === "success" ? "#38c172" : type === "error" ? "#e3342f" : "#444";
  toast.style.color = "#fff";
  toast.style.padding = "1em 2em";
  toast.style.borderRadius = "8px";
  toast.style.fontWeight = "bold";
  toast.style.zIndex = 9999;
  toast.style.boxShadow = "0 2px 8px rgba(0,0,0,0.15)";
  document.body.appendChild(toast);
  setTimeout(() => {
    toast.remove();
  }, 3000);
}

document.addEventListener("DOMContentLoaded", function () {
  const reservation = window.reservationData || {};
  const inputNom = document.querySelector('input[name="nom"]');
  const inputPhone = document.querySelector('input[name="phone"]');
  const selectPersonnes = document.querySelector('select[name="personnes"]');
  const inputDate = document.querySelector('input[name="date"]');
  const inputHeure = document.querySelector('input[name="heure"]');
  const textareaSpecial = document.querySelector('textarea[name="special"]');

  if (inputNom)
    inputNom.value = reservation.customer_name || reservation.nom || "";
  if (inputPhone) inputPhone.value = reservation.phone || "";
  if (selectPersonnes)
    selectPersonnes.value = reservation.persons || reservation.personnes || "";
  if (inputDate)
    inputDate.value = reservation.reservation_date || reservation.date || "";
  if (inputHeure)
    inputHeure.value = reservation.reservation_time || reservation.heure || "";
  if (textareaSpecial)
    textareaSpecial.value = reservation.message || reservation.special || "";

  const form = document.querySelector("form");
  const loader = document.getElementById("reservation-loader");
  if (form) {
    form.addEventListener("submit", async function (e) {
      e.preventDefault();
      if (loader) loader.classList.remove("hidden");
      const data = {
        customer_name: inputNom ? inputNom.value : "",
        phone: inputPhone ? inputPhone.value : "",
        reservation_date: inputDate ? inputDate.value : "",
        reservation_time: inputHeure ? inputHeure.value : "",
        persons: selectPersonnes ? selectPersonnes.value : "",
        message: textareaSpecial ? textareaSpecial.value : "",
        status: reservation.status || "en_attente",
      };
      try {
        const response = await fetch(`/api/reservations/${reservation.id}`, {
          method: "PUT",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        });
        const result = await response.json();
        if (loader) loader.classList.add("hidden");
        if (result.success) {
          showToast("Modification enregistrée !", "success");
          setTimeout(() => {
            window.location.reload();
          }, 1200);
        } else {
          showToast(result.error || "Erreur lors de la modification", "error");
        }
      } catch (err) {
        if (loader) loader.classList.add("hidden");
        showToast("Erreur réseau ou serveur", "error");
      }
    });
  }
});
