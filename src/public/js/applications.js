document.addEventListener("DOMContentLoaded", () => {
    const contactModal = document.getElementById("contactModal");
    const closeModal = document.getElementById("closeModal");
    const contactButtons = document.querySelectorAll(".contact-btn");

    contactButtons.forEach(button => {
        button.addEventListener("click", async () => {
            const resumeId = button.getAttribute("data-resume-id");
            const response = await fetch(`/resume/contact/${resumeId}`);
            const data = await response.json();

            document.getElementById("authorEmail").textContent = data.email;

            contactModal.style.display = "block";
        });
    });

    closeModal.addEventListener("click", () => {
        contactModal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === contactModal) {
            contactModal.style.display = "none";
        }
    });
});
