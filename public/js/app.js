// Vérifier si animation-timeline est supportée
const isAnimationTimelineSupported = CSS.supports(
  "animation-timeline",
  "view()"
);

if (!isAnimationTimelineSupported) {
  // Créer un Intersection Observer pour les navigateurs non supportés
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("in-view");

        // Ajouter un délai progressif pour les cartes
        if (
          entry.target.classList.contains("group") ||
          entry.target.classList.contains("card-stagger")
        ) {
          const delay = Math.random() * 0.3;
          entry.target.style.transitionDelay = `${delay}s`;
        }
      }
    });
  }, observerOptions);

  // Observer tous les éléments avec des classes d'animation
  document
    .querySelectorAll('[class*="view"], .card-stagger, .section-title-view')
    .forEach((el) => {
      observer.observe(el);
    });

  // Avertissement discret en console
  console.log(
    "Animation-timeline non supporté, utilisation du fallback JavaScript"
  );
}

// Animation pour les onglets de catégorie au scroll
document.addEventListener("DOMContentLoaded", function () {
  const categoryTabs = document.querySelectorAll('a[href^="#"]');

  categoryTabs.forEach((tab) => {
    tab.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      const targetElement = document.querySelector(targetId);

      if (targetElement) {
        // Animation douce vers la section
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });

        // Ajouter une classe d'animation à la section cible
        targetElement.classList.add("zoom-in-view");

        // Retirer la classe après l'animation
        setTimeout(() => {
          targetElement.classList.remove("zoom-in-view");
        }, 1000);
      }
    });
  });

  // Animation au chargement de la page
  setTimeout(() => {
    const headerElements = document.querySelectorAll(
      "h1, .subtitle, .fade-in-view"
    );
    headerElements.forEach((el, index) => {
      el.style.animationDelay = `${index * 0.1}s`;
    });
  }, 100);
});
console.log("App.js chargé avec succès");
