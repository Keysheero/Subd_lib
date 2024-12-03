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
    const baseUrl = '/';
    const url = `${baseUrl}?page=${page}`;
    window.location.assign(url);
}
document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', async () => {
            const response = await fetch('/user/logout', { method: 'POST' });
            const result = await response.json();
            if (result.success) {
                alert('Вы вышли из системы.');
                window.location.reload();
            } else {
                alert('Ошибка при выходе.');
            }
        });
    }
});
