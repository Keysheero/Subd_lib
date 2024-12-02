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

<div class="application-text">
    <h2>Our Applications</h2>
</div>

<section class="applications-list">
    <div class="container">
        <div class="application-item">
            <h3>John Doe</h3>
            <p>Looking for funding to complete a degree in Software Engineering.</p>
            <a href="#" class="more-details-btn">See Details</a>
        </div>

        <div class="application-item">
            <h3>Jane Smith</h3>
            <p>Seeking sponsorship for medical school.</p>
            <a href="#" class="more-details-btn">See Details</a>
        </div>

        <div class="application-item">
            <h3>Mark Evans</h3>
            <p>Needs financial support to finish law school.</p>
            <a href="#" class="more-details-btn">See Details</a>
        </div>
    </div>
</section>

<?php include $basePath . '/src/public/views/partials/footer.php';
?>
