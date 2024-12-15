document.addEventListener('DOMContentLoaded', () => {
    // Элементы для добавления книги
    const applyNowBtn = document.getElementById('applyNowBtn');
    const addBookModal = document.getElementById('addBookModal');
    const closeAddModalBtn = addBookModal.querySelector('.close-btn');
    const addBookForm = document.getElementById('addBookForm');

    const updateBtns = document.querySelectorAll('.update-btn');
    const updateBookModal = document.getElementById('updateBookModal');
    const closeUpdateModalBtn = updateBookModal.querySelector('.close-btn');
    const updateBookForm = document.getElementById('updateBookForm');

    // Открытие модального окна для добавления книги
    applyNowBtn.addEventListener('click', (event) => {
        event.preventDefault();
        addBookModal.classList.add('show');
    });

    closeAddModalBtn.addEventListener('click', () => {
        addBookModal.classList.remove('show');
    });

    window.addEventListener('click', (event) => {
        if (event.target === addBookModal) {
            addBookModal.classList.remove('show');
        }
    });

    addBookForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(addBookForm);

        const response = await fetch('/books/create', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();
        alert(result.message);

        if (result.success) {
            addBookModal.classList.remove('show');
            addBookForm.reset();
            window.location.reload();
        }
    });

    // Открытие модального окна для редактирования книги
    updateBtns.forEach((btn) => {
        btn.addEventListener('click', (event) => {
            event.preventDefault();

            const bookId = btn.dataset.bookId;
            const title = btn.dataset.title;
            const author = btn.dataset.author;
            const publishedDate = btn.dataset.publishedDate;
            const genre = btn.dataset.genre;

            document.getElementById('updateBookId').value = bookId;
            document.getElementById('updateTitle').value = title;
            document.getElementById('updateAuthor').value = author;
            document.getElementById('updatePublishedDate').value = publishedDate;
            document.getElementById('updateGenre').value = genre;

            updateBookModal.classList.add('show');
        });
    });

    // Закрытие модального окна для редактирования книги
    closeUpdateModalBtn.addEventListener('click', () => {
        updateBookModal.classList.remove('show');
    });

    window.addEventListener('click', (event) => {
        if (event.target === updateBookModal) {
            updateBookModal.classList.remove('show');
        }
    });

    updateBookForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(updateBookForm);

        const response = await fetch('/books/update', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            updateBookModal.classList.remove('show');
            updateBookForm.reset();
            window.location.reload();
        }
    });
});
