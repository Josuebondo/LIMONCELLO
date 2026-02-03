// JS pour vérifier une réservation par code

document.addEventListener("DOMContentLoaded", function () {
  // Sélection des éléments DOM principaux une seule fois
  const loader = document.getElementById("verif-loader");
  const form = document.querySelector(".flex.flex-col.gap-6");
  const input = form.querySelector("input");
  const buttons = Array.from(form.querySelectorAll("button"));
  // Sélectionne le bouton de vérification (hors .paste-btn et hors bouton annulation)
  let button = buttons.find(
    (btn) =>
      !btn.classList.contains("paste-btn") &&
      !btn.classList.contains("annuler-btn") &&
      btn.textContent.toLowerCase().includes("vérifier"),
  );
  const detailsSection = form.parentElement.querySelector(".mt-10.pt-8");
  const errorSection = form.parentElement.querySelector(".mt-6");

  // Bouton Réessayer (erreur)
  if (errorSection) {
    const retryBtn = errorSection.querySelector("button");
    if (retryBtn) {
      retryBtn.addEventListener("click", function (e) {
        e.preventDefault();
        errorSection.classList.add("hidden");
        detailsSection.classList.add("hidden");
        input.value = "";
        input.focus();
      });
    }
  }

  // Annulation de réservation
  if (detailsSection) {
    const annulerBtn = detailsSection.querySelector(
      "button.bg-red-50, button.bg-red-950\\/20",
    );
    annulerBtn &&
      annulerBtn.addEventListener("click", async function (e) {
        e.preventDefault();
        const code = input.value.trim().toUpperCase();
        if (!code) return;
        annulerBtn.disabled = true;
        annulerBtn.innerHTML =
          '<span class="material-symbols-outlined animate-spin">autorenew</span> Annulation...';
        try {
          // Récupérer l'id de la réservation via l'API code
          const res = await fetch(`/api/reservations/code/${code}`);
          const data = await res.json();
          if (data.success && data.reservation && data.reservation.id) {
            const id = data.reservation.id;
            const annuler = await fetch(`/api/reservations/${id}/annuler`, {
              method: "PATCH",
              headers: {
                "Content-Type": "application/json",
              },
            });
            const annulerRes = await annuler.json();
            if (annulerRes.success) {
              annulerBtn.innerHTML =
                '<span class="material-symbols-outlined">check_circle</span> Réservation annulée';
              annulerBtn.classList.remove(
                "bg-red-50",
                "dark:bg-red-950/20",
                "text-red-600",
                "dark:text-red-400",
              );
              annulerBtn.classList.add("bg-green-100", "text-green-700");
              setTimeout(() => {
                window.location.reload();
              }, 1500);
            } else {
              annulerBtn.innerHTML =
                '<span class="material-symbols-outlined">error</span> Erreur annulation';
              setTimeout(() => {
                annulerBtn.innerHTML =
                  '<span class="material-symbols-outlined text-lg">cancel</span> Annuler la réservation';
                annulerBtn.disabled = false;
              }, 2000);
            }
          } else {
            annulerBtn.innerHTML =
              '<span class="material-symbols-outlined">error</span> Réservation introuvable';
            setTimeout(() => {
              annulerBtn.innerHTML =
                '<span class="material-symbols-outlined text-lg">cancel</span> Annuler la réservation';
              annulerBtn.disabled = false;
            }, 2000);
          }
        } catch (err) {
          annulerBtn.innerHTML =
            '<span class="material-symbols-outlined">error</span> Erreur réseau';
          setTimeout(() => {
            annulerBtn.innerHTML =
              '<span class="material-symbols-outlined text-lg">cancel</span> Annuler la réservation';
            annulerBtn.disabled = false;
          }, 2000);
        }
      });
  }

  // Bouton coller
  const pasteBtn = form.querySelector(".paste-btn");
  if (pasteBtn) {
    pasteBtn.addEventListener("click", async function (e) {
      e.preventDefault();
      if (navigator.clipboard) {
        try {
          const text = await navigator.clipboard.readText();
          if (text) {
            input.value = text.trim().toUpperCase();
            input.focus();
          }
        } catch (err) {}
      }
    });
  }

  if (button) {
    button.addEventListener("click", async function (e) {
      e.preventDefault();
      const code = input.value.trim().toUpperCase();
      // Si champ vide, afficher erreur et sortir
      if (!code) {
        errorSection.classList.remove("hidden");
        errorSection.querySelector(".text-red-800").textContent =
          "Veuillez entrer un code de réservation.";
        errorSection.querySelector(".text-red-700").textContent =
          "Le champ code ne peut pas être vide.";
        return;
      }

      // Masquer les sections
      detailsSection.classList.add("hidden");
      errorSection.classList.add("hidden");
      button.disabled = true;
      if (loader) loader.classList.remove("hidden");

      try {
        const response = await fetch(`/api/reservations/code/${code}`);
        const result = await response.json();
        // Délai visuel pour l'effet loader
        setTimeout(() => {
          button.disabled = false;
          if (loader) loader.classList.add("hidden");
          if (result.success && result.reservation) {
            // Remplir les infos
            detailsSection.querySelectorAll("p")[1].textContent =
              result.reservation.customer_name;
            detailsSection.querySelectorAll("p")[3].textContent =
              result.reservation.persons +
              (result.reservation.persons > 1 ? " Personnes" : " Personne");
            detailsSection.querySelectorAll("p")[5].textContent =
              result.reservation.reservation_date;
            detailsSection.querySelectorAll("p")[7].textContent =
              result.reservation.reservation_time;

            // Activer le bouton Modifier avec l'id
            activerBoutonModifier(result.reservation);

            // Affichage dynamique du status
            const statusSpan = detailsSection.querySelector(
              "#reservation-status",
            );
            const statusIcon = detailsSection.querySelector(
              "#reservation-status-icon",
            );
            const statusText = detailsSection.querySelector(
              "#reservation-status-text",
            );
            let status = (result.reservation.status || "").toLowerCase();
            let statusConfig = {
              confirmée: {
                text: "Confirmée",
                icon: "check_circle",
                color:
                  "bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400",
              },
              en_attente: {
                text: "En attente",
                icon: "hourglass_empty",
                color:
                  "bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400",
              },
              annulé: {
                text: "Annulée",
                icon: "cancel",
                color:
                  "bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400",
              },
              annulée: {
                text: "Annulée",
                icon: "cancel",
                color:
                  "bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400",
              },
            };
            let config = statusConfig[status] || statusConfig["en_attente"];
            if (statusSpan && statusIcon && statusText) {
              statusSpan.className = `px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-1 ${config.color}`;
              statusIcon.textContent = config.icon;
              statusText.textContent = config.text;
            }

            detailsSection.classList.remove("hidden");
          } else {
            errorSection.classList.remove("hidden");
          }
        }, 600);
      } catch (err) {
        setTimeout(() => {
          button.disabled = false;
          if (loader) loader.classList.add("hidden");
          errorSection.classList.remove("hidden");
        }, 600);
      }
    });
  }

  function activerBoutonModifier(reservation) {
    const btnModifier = document
      .querySelector("button span.material-symbols-outlined.text-lg")
      ?.closest("button");
    if (btnModifier && reservation && reservation.id) {
      btnModifier.addEventListener("click", function (e) {
        e.preventDefault();
        btnModifier.disabled = true;
        btnModifier.innerHTML =
          '<span class="material-symbols-outlined animate-spin">autorenew</span> Ouverture...';
        setTimeout(() => {
          window.location.href = `/reservations/editer/${reservation.id}`;
        }, 1200); // délai visuel 1.2s
      });
    }
  }

  // Exemple d'utilisation après avoir trouvé la réservation :
  // activerBoutonModifier(reservation);
});
