<?php
$title = 'LibraryApp - Books';
$cssFile = 'books.css';
$page = 'books.php';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
?>
<link rel="stylesheet" href="/css/pages/books.css">
<link rel="stylesheet" href="/css/template.css">

<section class="hero">
    <div class="hero-text">
        <h2>Our Book Collection</h2>
        <p>Explore our extensive library and discover your next favorite read.</p>
        <a href="/profile" class="cta">Add a Book</a>
    </div>
</section>
<section class="filter-section">
    <form id="bookFilterForm" action="/books" method="GET">
        <input
                type="text"
                name="search"
                placeholder="Search by title"
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
        >
        <select name="sort_by">
            <option value="" disabled selected>Sort by</option>
            <option value="title" <?= isset($_GET['sort_by']) && $_GET['sort_by'] === 'title' ? 'selected' : '' ?>>
                Title
            </option>
            <option value="genre" <?= isset($_GET['sort_by']) && $_GET['sort_by'] === 'genre' ? 'selected' : '' ?>>
                Genre
            </option>
        </select>
        <select name="sort_order">
            <option value="asc" <?= isset($_GET['sort_order']) && $_GET['sort_order'] === 'asc' ? 'selected' : '' ?>>
                Ascending
            </option>
            <option value="desc" <?= isset($_GET['sort_order']) && $_GET['sort_order'] === 'desc' ? 'selected' : '' ?>>
                Descending
            </option>
        </select>
        <button type="submit" class="filter-btn">Apply</button>
    </form>
</section>

<section class="books-list">
    <div class="container">
        <?php if (empty($books)): ?>
            <p>No books available yet. Be the first to add one!</p>
        <?php else: ?>
            <?php foreach ($books as $book): ?>
                <div class="book-item">
                    <h3><?= htmlspecialchars($book['title']) ?></h3>
                    <p><strong>Author:</strong> <?= htmlspecialchars($book['author_name']) ?></p>
                    <p><strong>Genre:</strong> <?= htmlspecialchars($book['genre']) ?></p>
                    <p><strong>Published Date:</strong> <?= htmlspecialchars($book['published_date']) ?></p>
                    <div class="actions">
                        <a href="/books/download/<?= $book['id'] ?>" class="download-btn">Download</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<?php
include $basePath . '/src/public/views/partials/footer.php';
?>
