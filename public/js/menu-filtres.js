// JS de filtrage dynamique pour le menu
// À inclure après le chargement des items dans #menu-contener

document.addEventListener("DOMContentLoaded", function () {
  const filtres = document.querySelectorAll("#menu-filtres button");
  const menuContener = document.getElementById("menu-contener");
  let allItems = [];

  // Récupère tous les items au chargement (suppose que chaque item a data-categorie)
  function snapshotItems() {
    allItems = Array.from(menuContener.children);
  }

  // Filtrage
  filtres.forEach((btn) => {
    btn.addEventListener("click", function () {
      filtres.forEach((b) =>
        b.classList.remove(
          "bg-primary",
          "text-background-dark",
          "font-bold",
          "shadow-lg",
          "shadow-primary/20",
        ),
      );
      btn.classList.add(
        "bg-primary",
        "text-background-dark",
        "font-bold",
        "shadow-lg",
        "shadow-primary/20",
      );
      const filtre = btn.getAttribute("data-filtre");
      if (filtre === "all") {
        allItems.forEach((el) => (el.style.display = ""));
      } else {
        allItems.forEach((el) => {
          if (el.getAttribute("data-categorie") === filtre) {
            el.style.display = "";
          } else {
            el.style.display = "none";
          }
        });
      }
    });
  });

  // Prend un snapshot initial après le premier rendu dynamique
  document.addEventListener("menuItemsLoaded", snapshotItems);
  // à ajuster selon le chargement dynamique
});
