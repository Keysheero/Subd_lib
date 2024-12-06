document.addEventListener("DOMContentLoaded", () => {
        const resumeModal = document.getElementById("resumeModal");
        const resumeClose = document.getElementById("resume-closeModal");
        const resumeForm = document.getElementById("resumeForm");


        window.addEventListener("click", (event) => {
            if (event.target === resumeModal) {
                resumeModal.style.display = "none";
            }
        });
        applyNowBtn.addEventListener("click", () => {
            resumeModal.style.display = "block";
        });
        resumeClose.addEventListener("click", () => {
            resumeModal.style.display = "none";
        });

        resumeForm.addEventListener("submit", async (event) => {
            event.preventDefault();

            const formData = new FormData(resumeForm);
            const response = await fetch('/resume/create', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            if (result.success) {
                alert("Резюме успешно создано!");
                resumeModal.style.display = "none";
                window.location.reload();
            } else {
                alert(result.message || "Ошибка создания резюме");
            }
        });
    }
)
;
