function highlightActivePage() {
    const navLinks = document.querySelectorAll(".nav-links a");
    const currentPage = window.location.pathname;

    navLinks.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("active");
        }
    });
}

function addHoverEffect() {
    const navLinks = document.querySelectorAll(".nav-links a");

    navLinks.forEach(link => {
        link.addEventListener("mouseenter", () => {
            link.style.color = "#FFD700";
        });

        link.addEventListener("mouseleave", () => {
            link.style.color = "";
        });
    });
}

document.addEventListener("DOMContentLoaded", () => {
    highlightActivePage();
    addHoverEffect();
});
function navigateToPage(page) {
    const baseUrl = '/'; // Укажите базовый путь для роутинга
    const url = `${baseUrl}?page=${page}`;
    window.location.assign(url);
}
