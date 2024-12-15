document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", () => {
            const bookId = button.getAttribute("data-book-id");

            if (confirm("Are you sure you want to delete this book?")) {
                fetch('/books/delete', {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ bookId }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            button.closest(".book-item").remove();
                        } else {
                            alert("Failed to delete the book. Please try again.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred. Please try again.");
                    });
            }
        });
    });
});