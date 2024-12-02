<?php
$title = 'GrandPrix - Home';
$cssFile = 'home.css';
$page = 'home.php';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
?>
<link rel="stylesheet" href="/css/pages/home.css">
<link rel="stylesheet" href="/css/template.css">

<section class="hero">
    <div class="hero-text">
        <h2>Support Education for All</h2>
        <p>We connect those in need of education funding with investors willing to support.</p>
        <a href="#" class="cta">Get Started</a>
    </div>
</section>
<section class="features">
    <div class="feature">
        <h3>For Learners</h3>
        <p>Submit your application and get financial support to pursue your education dreams.</p>
    </div>
    <div class="feature">
        <h3>For Investors</h3>
        <p>Choose applications, provide funding, and help shape the future of learners.</p>
    </div>
    <div class="feature">
        <h3>Secure Contracts</h3>
        <p>Sign contracts with clear terms, ensuring smooth collaboration for both sides.</p>
    </div>
</section>
<section class="how-it-works">
    <h2>How It Works</h2>
    <div class="steps">
        <div class="step">
            <h4>1. Sign Up</h4>
            <p>Register as a learner or an investor to get started.</p>
        </div>
        <div class="step">
            <h4>2. Apply or Choose</h4>
            <p>Submit your application or browse through learner applications.</p>
        </div>
        <div class="step">
            <h4>3. Make a Contract</h4>
            <p>Work together by signing a secure contract for funding or services.</p>
        </div>
    </div>
</section>

<?php
include $basePath . '/src/public/views/partials/footer.php';
?>
