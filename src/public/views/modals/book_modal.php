<link rel="stylesheet" href="css/modals/book_modal.css">

<div id="addBookModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Add New Book</h2>
        <form id="addBookForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter book title" required>
            </div>
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" id="author_name" name="author_name" placeholder="Enter author name" >
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday">
            </div>
            <div class="form-group">
                <label for="published_date">Published Date:</label>
                <input type="date" id="published_date" name="published_date">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" placeholder="Enter book genre">
            </div>
            <div class="form-group">
                <label for="file">Upload Book File:</label>
                <input type="file" id="file" name="file" accept=".pdf, .epub, .mobi" required>
            </div>
            <button type="submit" class="btn-submit">Add Book</button>
        </form>
    </div>
</div>
<div id="updateBookModal" class="modal hidden">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Update Book</h2>
        <form id="updateBookForm" method="POST" action="/books/update">
            <input type="hidden" name="book_id" id="updateBookId">
            <label for="updateTitle">Title</label>
            <input type="text" id="updateTitle" name="title" required>

            <label for="updateAuthor">Author</label>
            <input type="text" id="updateAuthor" name="author_name" required>

            <label for="updatePublishedDate">Published Date</label>
            <input type="date" id="updatePublishedDate" name="published_date">

            <label for="updateGenre">Genre</label>
            <input type="text" id="updateGenre" name="genre">

            <button type="submit">Update</button>
        </form>
    </div>
</div>
