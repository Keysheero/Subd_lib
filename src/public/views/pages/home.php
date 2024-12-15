<?php
$title = 'LibraryApp - Home';
$cssFile = 'home.css';
$page = 'home.php';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
?>
<link rel="stylesheet" href="/css/pages/home.css">
<link rel="stylesheet" href="/css/template.css">

<section class="hero">
    <div class="hero-text">
        <h2>Welcome to Your Library</h2>
        <p>Explore, borrow, and enjoy a wide collection of books across various genres and authors.</p>
        <a href="/books" class="cta">Explore Books</a>
    </div>
</section>
<section class="features">
    <div class="feature">
        <h3>For Readers</h3>
        <p>Discover your next favorite book and expand your horizons with ease.</p>
    </div>
    <div class="feature">
        <h3>For Authors</h3>
        <p>Showcase your work to a dedicated audience of book lovers.</p>
    </div>
    <div class="feature">
        <h3>Simple Borrowing</h3>
        <p>Reserve books online and pick them up at your convenience.</p>
    </div>
</section>
<section class="how-it-works">
    <h2>How It Works</h2>
    <div class="steps">
        <div class="step">
            <h4>1. Register</h4>
            <p>Create your account to start exploring our collection.</p>
        </div>
        <div class="step">
            <h4>2. Browse</h4>
            <p>Search and discover books across a variety of genres and categories.</p>
        </div>
        <div class="step">
            <h4>3. Borrow</h4>
            <p>Reserve your chosen books and pick them up at your nearest branch.</p>
        </div>
    </div>
</section>

<?php
include $basePath . '/src/public/views/partials/footer.php';
?>
