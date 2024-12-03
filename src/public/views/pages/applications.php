<?php
$title = 'GrandPrix - Home';
$cssFile = 'applications.css';
$page = 'applications.php   ';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
?>
<link rel="stylesheet" href=<?php $basePath?>"/css/pages/applications.css">
<link rel="stylesheet" href= <?php $basePath?>"/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Submit Your Application</h2>
        <p>Join GrandPrix and get financial support for your education.</p>
        <a href="#" class="cta" id="applyNowBtn">Apply Now</a>
    </div>
</section>
<div id="resumeModal" class="resume-modal">
    <div class="resume-modal-content">
        <span class="resumeClose" id="resume-closeModal">&times;</span>
        <h2>Create Your Resume</h2>
        <form id="resumeForm" method="POST">
            <label for="title">Resume Title:</label>
            <input type="text" id="title" name="title" required placeholder="Enter title of your resume">

            <label for="description">Resume Description:</label>
            <textarea id="description" name="description" required placeholder="Enter a brief description of your resume"></textarea>

            <button type="submit" class="cta">Submit Resume</button>
        </form>
    </div>
</div>
<div class="application-text">
    <h2>Our Applications</h2>
</div>

<section class="applications-list">
    <div class="container">
        <?php foreach ($resumes as $resume): ?>
            <div class="application-item">
                <h3><?= htmlspecialchars($resume->title) ?></h3>
                <p><?= htmlspecialchars($resume->description) ?></p>
                <button class="contact-btn" data-resume-id="<?php echo $resume->id; ?>">Contact</button>

            </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="js/resume_modal.js">



</script>
<?php include $basePath . '/src/public/views/partials/footer.php';
?>
