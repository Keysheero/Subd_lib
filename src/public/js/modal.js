document.addEventListener("DOMContentLoaded", () => {
    fetch("src/internal/views/modal.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Ошибка загрузки modal.views");
            }
            return response.text();
        })
        .then(html => {
            document.body.insertAdjacentHTML("beforeend", html);

            const modal = document.getElementById("modal");
            const closeBtn = modal.querySelector(".close");

            function openModal() {
                modal.style.display = "flex";
            }

            function closeModal() {
                modal.style.display = "none";
            }

            document.getElementById("loginBtn").addEventListener("click", openModal);
            document.getElementById("registerBtn").addEventListener("click", openModal);
            closeBtn.addEventListener("click", closeModal);

            window.addEventListener("click", event => {
                if (event.target === modal) {
                    closeModal();
                }
            });
        })
        .catch(error => console.error(error));
});
