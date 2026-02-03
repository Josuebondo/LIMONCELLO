// --- Navigation par onglets admin booking ---
document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll("#admin-booking-tabs .tab-btn");
  const tabContent = document.getElementById("admin-booking-tab-content");
  let currentTab = "reservations";

  function setActiveTab(tab) {
    tabs.forEach((btn) => {
      btn.classList.remove(
        "tab-active",
        "text-primary",
        "font-bold",
        "border-primary",
      );
      btn.classList.add("font-medium", "text-[#8a8460]", "border-transparent");
    });
    tab.classList.add(
      "tab-active",
      "text-primary",
      "font-bold",
      "border-primary",
    );
    tab.classList.remove("font-medium", "text-[#8a8460]", "border-transparent");
  }

  function renderTab(tabName) {
    currentTab = tabName;
    // Tables statiques dans le HTML : reservation-tbl et commande-tbl
    const reservationTbl = document.getElementById("reservation-tbl");
    const commandeTbl = document.getElementById("commande-tbl");
    if (!reservationTbl || !commandeTbl) return;

    if (tabName === "reservations") {
      reservationTbl.classList.remove("hidden");
      commandeTbl.classList.add("hidden");
    } else if (tabName === "commandes") {
      reservationTbl.classList.add("hidden");
      commandeTbl.classList.remove("hidden");
    } else {
      reservationTbl.classList.add("hidden");
      commandeTbl.classList.add("hidden");
    }
  }

  tabs.forEach((btn) => {
    btn.addEventListener("click", function () {
      setActiveTab(btn);
      renderTab(btn.getAttribute("data-tab"));
    });
  });

  // Initialisation
  renderTab(currentTab);
});
