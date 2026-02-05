// Toast notification utilitaire
// Usage: showToast('Message', 'success'|'error'|'info', duration)
function showToast(message, type = "info", duration = 3000) {
  // Remove any existing toast
  const oldToast = document.getElementById("custom-toast");
  if (oldToast) oldToast.remove();
  // Create toast
  const toast = document.createElement("div");
  toast.id = "custom-toast";
  toast.className = `fixed top-6 right-6 z-50 px-4 py-2 rounded shadow-lg text-white font-semibold flex items-center gap-2 toast-${type}`;
  toast.style.background =
    type === "success" ? "#22c55e" : type === "error" ? "#ef4444" : "#334155";
  toast.innerHTML = `<span>${message}</span>`;
  document.body.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = "0";
    setTimeout(() => toast.remove(), 500);
  }, duration);
}
