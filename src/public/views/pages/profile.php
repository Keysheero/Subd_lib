<?php
$userId = $_SESSION['user_id'];
$title = 'GrandPrix';
$cssFile = 'profile.css';
$page = 'profile';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
include $basePath . '/src/public/views/modals/book_modal.php';?>
<link rel="stylesheet" href="/css/pages/profile.css">
<link rel="stylesheet" href="/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Manage your books</h2>
        <p>Share books to other users</p>
        <a href="#" class="cta" id="applyNowBtn" data-user-id="<?= htmlspecialchars($userId) ?>">Apply Now</a>
    </div>
</section>
<section class="books-list">
    <div class="container">
        <?php if (empty($books)): ?>
            <p>You have not uploaded any books yet.</p>
        <?php else: ?>
            <?php foreach ($books as $book): ?>
                <div class="book-item">
                    <h3><?= htmlspecialchars($book['title']) ?></h3>
                    <p><strong>Author:</strong> <?= htmlspecialchars($book['author_name']) ?></p>
                    <p><strong>Published Date:</strong> <?= htmlspecialchars($book['published_date']) ?></p>
                    <p><strong>Genre:</strong> <?= htmlspecialchars($book['genre']) ?></p>
                    <div class="actions">
                        <button class="update-btn" data-book-id="<?= $book['id'] ?>" data-title="<?= htmlspecialchars($book['title']) ?>"
                                data-author="<?= htmlspecialchars($book['author_name']) ?>"
                                data-published-date="<?= htmlspecialchars($book['published_date']) ?>"
                                data-genre="<?= htmlspecialchars($book['genre']) ?>">Update</button>
                        <button class="delete-btn" data-book-id="<?= $book['id'] ?>">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>


<script src = "/js/profile.js"></script>
<script src = "/js/book.js"></script>
<script src = "/js/user_books.js"></script>

