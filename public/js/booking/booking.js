// booking.js
// JS de réservation extrait de la vue index.php

document.addEventListener("DOMContentLoaded", () => {
  // Définir la date minimale à aujourd'hui
  const today = new Date().toISOString().split("T")[0];
  document.getElementById("reservation_date").setAttribute("min", today);

  // Gestion du formulaire
  document
    .getElementById("reservationForm")
    .addEventListener("submit", handleSubmit);

  // Gestion du bouton de copie du code de réservation
  const confirmSection = document.getElementById("confim-container");
  if (confirmSection) {
    confirmSection.addEventListener("click", function (e) {
      const btn = e.target.closest("[title='Copier le code']");
      if (btn) {
        const codeSpan = confirmSection.querySelector(".code-unique");
        if (codeSpan) {
          const code = codeSpan.textContent.trim();
          if (navigator.clipboard) {
            navigator.clipboard.writeText(code).then(() => {
              showToast("Code copié !", "success");
            });
          } else {
            // Fallback ancien navigateur
            const textarea = document.createElement("textarea");
            textarea.value = code;
            document.body.appendChild(textarea);
            textarea.select();
            try {
              document.execCommand("copy");
              showToast("Code copié !", "success");
            } catch (err) {}
            document.body.removeChild(textarea);
          }
        }
      }
    });
  }
});

async function handleSubmit(e) {
  e.preventDefault();

  const data = {
    customer_name: document.getElementById("customer_name").value,
    phone: document.getElementById("phone").value,
    reservation_date: document.getElementById("reservation_date").value,
    reservation_time: document.getElementById("reservation_time").value,
    persons: document.getElementById("persons").value,
    message: document.getElementById("message").value,
    status: "en attente",
    type: document.getElementById("type").value,
    _csrf_token: document.querySelector('input[name="_csrf_token"]').value,
  };

  // Masquer la section de confirmation
  document.getElementById("confim-container")?.classList.add("hidden");
  // Afficher le loader immédiatement
  document.getElementById("reservation-loader").classList.remove("hidden");
  document.getElementById("form-container").classList.add("hidden");

  // Attendre 500ms avant d'envoyer la requête (effet visuel)
  setTimeout(async () => {
    try {
      const response = await fetch("/api/reservations", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
        credentials: "same-origin",
      });

      const result = await response.json();

      // Masquer le loader
      document.getElementById("reservation-loader").classList.add("hidden");
      document.getElementById("form-container").classList.add("hidden");
      if (result.success) {
        // Remplir la section de confirmation
        const confirmSection = document.getElementById("confim-container");
        if (confirmSection) {
          // Nom
          const nom = document.getElementById("customer_name").value;
          const date = document.getElementById("reservation_date").value;
          const heure = document.getElementById("reservation_time").value;
          const personnes = document.getElementById("persons").value;
          // Code unique
          const code = result.code_unique || "-";

          // Remplir les champs dynamiques si présents
          const codeSpan = confirmSection.querySelector(".code-unique");
          if (codeSpan) codeSpan.textContent = code;
          const nomSpan = confirmSection.querySelector(".conf-nom");
          if (nomSpan) nomSpan.textContent = nom;
          const dateSpan = confirmSection.querySelector(".conf-date");
          if (dateSpan) dateSpan.textContent = date;
          const heureSpan = confirmSection.querySelector(".conf-heure");
          if (heureSpan) heureSpan.textContent = heure;
          const persSpan = confirmSection.querySelector(".conf-personnes");
          if (persSpan)
            persSpan.textContent =
              personnes + (personnes > 1 ? " Personnes" : " Personne");

          confirmSection.classList.remove("hidden");
        }
        // Scroll vers le haut
        setTimeout(() => {
          window.scrollTo({
            top: 0,
            behavior: "smooth",
          });
        }, 500);
      } else {
        showToast(result.error || "Erreur lors de l'envoi", "error");
        document.getElementById("form-container").classList.remove("hidden");
      }
    } catch (error) {
      // Masquer le loader en cas d'erreur
      document.getElementById("reservation-loader").classList.add("hidden");
      document.getElementById("form-container").classList.remove("hidden");
      showToast("Erreur lors de l'envoi de la réservation", "error");
    }
  }, 500);
}

function showToast(message, type = "success") {
  const toast = document.createElement("div");
  const bgColor = type === "success" ? "bg-green-500" : "bg-red-500";
  const icon = type === "success" ? "check_circle" : "error";

  toast.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 flex items-center gap-2`;
  toast.innerHTML = `
    <span class="material-symbols-outlined">${icon}</span>
    <span>${message}</span>
`;
  document.body.appendChild(toast);

  setTimeout(() => {
    toast.remove();
  }, 4000);
}
