<?php
$title = 'GrandPrix - Home';
$cssFile = 'applications.css';
$page = 'applications.php   ';
$userId = $_SESSION['user_id'];
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
include $basePath . '/src/public/views/modals/resume_modal.php';

?>
<link rel="stylesheet" href="/css/pages/applications.css">
<link rel="stylesheet" href="/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Submit Your Application</h2>
        <p>Join GrandPrix and get financial support for your education.</p>
        <a href="#" class="cta" id="applyNowBtn" data-user-id="<?= htmlspecialchars($userId) ?>">Apply Now</a>
    </div>
</section>

<div class="application-text">
    <h2>Our Applications</h2>
</div>

<section class="applications-list">
    <div class="container">
        <?php foreach ($resumes as $resume): ?>
            <div class="application-item">
                <h3><?= htmlspecialchars($resume->title) ?></h3>
                <p><?= htmlspecialchars($resume->description) ?></p>
                <button class="contact-btn" data-resume-id="<?php echo $resume->id; ?>"
                        data-author-name="<?= htmlspecialchars($resume->user_id) ?>"
                        data-author-email="<?= htmlspecialchars($resume->author_email) ?>">Contact
                </button>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<div id="contactModal" class="contact-modal">
    <div class="contact-modal-content">
        <span class="contact-close" id="closeModal">&times;</span>
        <h2>Contact Author</h2>
        <p><strong>Email:</strong> <span id="authorEmail"></span></p>
    </div>
</div>

<script src="/js/resume.js"></script>
<script src="/js/applications.js"></script>


<?php include $basePath . '/src/public/views/partials/footer.php';
?>
