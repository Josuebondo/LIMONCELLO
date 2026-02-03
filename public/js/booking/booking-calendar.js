// booking-calendar.js
// Script pour ajouter la réservation au calendrier (Google Agenda ou .ics)
document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("add-to-calendar-btn");
  if (!btn) return;
  btn.addEventListener("click", function () {
    // Récupérer les infos dynamiques de la confirmation
    const nom = document.querySelector(".conf-nom")?.textContent?.trim() || "";
    const date =
      document.querySelector(".conf-date")?.textContent?.trim() || "";
    const heure =
      document.querySelector(".conf-heure")?.textContent?.trim() || "";
    const personnes =
      document.querySelector(".conf-personnes")?.textContent?.trim() || "";
    const code =
      document.querySelector(".code-unique")?.textContent?.trim() || "";
    // Format date/heure pour l'ICS (YYYYMMDDTHHMMSS)
    // On suppose date au format YYYY-MM-DD ou DD/MM/YYYY, heure HH:mm
    let dateObj;
    if (date.match(/^\d{4}-\d{2}-\d{2}$/)) {
      dateObj = new Date(date + "T" + heure);
    } else {
      // Essaye de parser "Vendredi, 15 Décembre 2023" ou autre
      const parts = date.match(/(\d{1,2})\s+([a-zA-Zéû]+)\s+(\d{4})/);
      if (parts) {
        const mois = {
          janvier: 1,
          février: 2,
          mars: 3,
          avril: 4,
          mai: 5,
          juin: 6,
          juillet: 7,
          août: 8,
          septembre: 9,
          octobre: 10,
          novembre: 11,
          décembre: 12,
        };
        let m = mois[(parts[2] || "").toLowerCase()] || 1;
        dateObj = new Date(
          parts[3] +
            "-" +
            String(m).padStart(2, "0") +
            "-" +
            parts[1].padStart(2, "0") +
            "T" +
            heure,
        );
      } else {
        dateObj = new Date();
      }
    }
    // Durée par défaut : 2h
    let dtStart = dateObj;
    let dtEnd = new Date(dateObj.getTime() + 2 * 60 * 60 * 1000);
    function toICSDate(d) {
      return (
        d.getFullYear().toString() +
        String(d.getMonth() + 1).padStart(2, "0") +
        String(d.getDate()).padStart(2, "0") +
        "T" +
        String(d.getHours()).padStart(2, "0") +
        String(d.getMinutes()).padStart(2, "0") +
        "00"
      );
    }
    // Google Calendar URL
    function pad(n) {
      return n < 10 ? "0" + n : n;
    }
    function toGCalDate(d) {
      return (
        d.getFullYear().toString() +
        pad(d.getMonth() + 1) +
        pad(d.getDate()) +
        "T" +
        pad(d.getHours()) +
        pad(d.getMinutes()) +
        "00Z"
      );
    }
    const gcalUrl =
      "https://calendar.google.com/calendar/render?action=TEMPLATE" +
      "&text=" +
      encodeURIComponent("Réservation Limoncello") +
      "&dates=" +
      toGCalDate(dtStart) +
      "/" +
      toGCalDate(dtEnd) +
      "&details=" +
      encodeURIComponent(
        "Réservation pour " + nom + " (" + personnes + ") - Code: " + code,
      ) +
      "&location=" +
      encodeURIComponent("Limoncello, Avenue de l'Équateur, Gombe, Kinshasa");
    // Ouvre Google Agenda dans un nouvel onglet
    let gcalWindow = window.open(gcalUrl, "_blank");
    // Fallback : si Google Calendar ne s'ouvre pas ou retourne une erreur, forcer le téléchargement ICS
    setTimeout(() => {
      if (
        !gcalWindow ||
        gcalWindow.closed ||
        typeof gcalWindow.closed === "undefined"
      ) {
        telechargerICS(ics);
      }
    }, 1000);
    // Fonction pour forcer le téléchargement et ouverture du .ics
    function telechargerICS(icsContent) {
      const blob = new Blob([icsContent], { type: "text/calendar" });
      const url = URL.createObjectURL(blob);
      const a = document.createElement("a");
      a.href = url;
      a.download = "reservation-limoncello.ics";
      document.body.appendChild(a);
      a.click();
      setTimeout(() => {
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
      }, 100);
    }
    // Fallback : aussi générer le .ics pour Outlook/Apple
    const ics = [
      "BEGIN:VCALENDAR",
      "VERSION:2.0",
      "PRODID:-//Limoncello//Reservation//FR",
      "BEGIN:VEVENT",
      "UID:" + code + "@limoncello",
      "DTSTAMP:" + toICSDate(new Date()),
      "DTSTART:" + toICSDate(dtStart),
      "DTEND:" + toICSDate(dtEnd),
      "SUMMARY:Réservation Limoncello",
      "DESCRIPTION:Réservation pour " +
        nom +
        " (" +
        personnes +
        ") - Code: " +
        code,
      "LOCATION:Limoncello, Avenue de l'Équateur, Gombe, Kinshasa",
      "END:VEVENT",
      "END:VCALENDAR",
    ].join("\r\n");
    // Ne pas appeler telechargerICS(ics) ici !
  });
});
