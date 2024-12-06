document.addEventListener("DOMContentLoaded", () => {
    const contactUsBtn = document.getElementById("contactUsBtn");
    const contactModal = document.getElementById("contactModal");
    const closeModal = document.getElementById("contact-closeModal");

    console.log(contactUsBtn, contactModal, closeModal);
    contactUsBtn.addEventListener("click", () => {
        contactModal.style.display = "flex";
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
