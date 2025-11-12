// === INTERACTIONS GÉNÉRALES ===

// Menu responsive
document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.querySelector(".menu-btn");
    const navLinks = document.querySelector(".nav-links");

    if (menuBtn && navLinks) {
        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("open");
        });
    }
});

// Confirmation suppression
function confirmDelete(event, message = "Voulez-vous vraiment supprimer cet élément ?") {
    if (!confirm(message)) {
        event.preventDefault();
    }
}

// Notification toast
function showToast(message, type = "success") {
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// === DASHBOARD ===
document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll(".toggle-section");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", () => {
            const target = document.querySelector(toggle.dataset.target);
            if (target) target.classList.toggle("hidden");
        });
    });
});
