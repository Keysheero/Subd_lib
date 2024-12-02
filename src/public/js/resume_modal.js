document.addEventListener("DOMContentLoaded", () => {
    const resumeModal = document.getElementById("resumeModal");
    const resumeClose = document.getElementById("resume-closeModal");
    const submitResumeButton = document.getElementById("submitResume");
    const resumeForm = document.getElementById("resumeForm");

    document.getElementById("applyNowBtn").addEventListener("click", () => {
        resumeModal.style.display = "block";
    });

    resumeClose.addEventListener("click", () => {
        resumeModal.style.display = "none";
    });

    submitResumeButton.addEventListener("click", async () => {
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

    window.addEventListener("click", (event) => {
        if (event.target === resumeModal) {
            resumeModal.style.display = "none";
        }
    });
});
