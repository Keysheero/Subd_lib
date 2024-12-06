<?php
$userId = $_SESSION['user_id'];
$title = 'GrandPrix';
$cssFile = 'profile.css';
$page = 'profile';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
include $basePath . '/src/public/views/modals/resume_modal.php';?>
<link rel="stylesheet" href="/css/pages/profile.css">
<link rel="stylesheet" href="/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Manage your applications</h2>
        <p>Make sure not to make more than 3 of them</p>
        <a href="#" class="cta" id="applyNowBtn" data-user-id="<?= htmlspecialchars($userId) ?>">Apply Now</a>
    </div>
</section>
<section class="resumes-list">
    <div class="container">
        <?php if (empty($resumes)): ?>
            <p>You have not submitted any resumes yet.</p>
        <?php else: ?>
            <?php foreach ($resumes as $resume): ?>
                <div class="resume-item">
                    <h3><?= htmlspecialchars($resume->title) ?></h3>
                    <p><?= htmlspecialchars($resume->description) ?></p>
                    <div class="actions">
                        <button class="delete-btn" data-resume-id="<?= $resume->id ?>">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>


<script src = "/js/resume_modal.js"></script>
<script src = "/js/resume.js"></script>
<script src = "/js/profile.js"></script>

