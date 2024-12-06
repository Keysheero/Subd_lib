<?php
$title = 'GrandPrix';
$cssFile = 'services.css';
$page = 'services';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php'; ?>
<link rel="stylesheet" href="/css/pages/services.css">
<link rel="stylesheet" href="/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Want to sign a contract? </h2>
        <p>sign a contract through application below</p>
        <a href="https://online-contract.kz/" target="_blank" class="cta" id="applyNowBtn">Proceed</a>
    </div>
</section>

<section class="features">
    <div class="feature">
        <h3>Click the Link</h3>
        <p>Follow the link to contract signing page.</p>
    </div>
    <div class="feature">
        <h3>Log In or Register</h3>
        <p>Create an account or log in to access the contract features.</p>
    </div>
    <div class="feature">
        <h3>Review and Sign</h3>
        <p>Carefully review the contract terms and sign when you’re ready to proceed.</p>
    </div>
</section>

<section>
    <div class="advice-section">
        <h2>Advices</h2>
        <ul>
            <li><img src="/assets/img/service/contract.png" alt="Icon" class="icon"> Keep a copy of the contract</li>
            <li><img src="/assets/img/service/defining.png" alt="Icon" class="icon"> Clearly define your goals</li>
            <li><img src="/assets/img/service/vulnerability.png" alt="Icon" class="icon"> Check for hidden clauses:</li>
        </ul>
    </div>
</section>

<?php include $basePath . '/src/public/views/partials/footer.php'; ?>
