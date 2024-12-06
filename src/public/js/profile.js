document.addEventListener("DOMContentLoaded", () => {
    const contactModal = document.getElementById("contactModal");
    const closeModal = document.getElementById("closeModal");
    const contactButtons = document.querySelectorAll(".contact-btn");
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", async (event) => {
            const resumeId = event.target.dataset.resumeId;

            if (!resumeId) {
                console.error("Resume ID not found.");
                return;
            }

            const confirmDelete = confirm("Are you sure you want to delete this resume?");
            if (!confirmDelete) return;

            try {
                const response = await fetch('/resume/delete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({id: resumeId}),
                });

                if (response.ok) {
                    alert("Resume deleted successfully!");
                    event.target.closest(".resume-item").remove();
                } else {
                    const error = await response.text();
                    console.error("Failed to delete resume:", error);
                    alert("Failed to delete the resume. Please try again.");
                }
            } catch (error) {
                console.error("Error deleting resume:", error);
                alert("An error occurred. Please try again.");
            }
        });
    });
    contactButtons.forEach(button => {
        button.addEventListener("click", async () => {
            const resumeId = button.getAttribute("data-resume-id");

            try {
                const response = await fetch(`/resume/contact/${resumeId}`);
                const result = await response.json();

                if (result.success) {
                    document.getElementById("authorEmail").textContent = result.email;
                    contactModal.style.display = "block";
                } else {
                    alert(result.message || "Ошибка при получении данных");
                }
            } catch (error) {
                console.error("Ошибка при запросе данных:", error);
                alert("Не удалось загрузить данные");
            }
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
    console.log('DOM fully loaded and parsed');


});



