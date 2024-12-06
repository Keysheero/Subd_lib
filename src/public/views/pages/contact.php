<?php
$title = 'GrandPrix - Home';
$cssFile = 'contact.css';
$page = 'contact';
$basePath = dirname(__DIR__, 4);
include $basePath . '/src/public/views/partials/header.php';
?>
<link rel="stylesheet" href="/css/pages/contact.css">
<link rel="stylesheet" href="/css/template.css">
<section class="hero">
    <div class="hero-text">
        <h2>Contact us</h2>
        <p>Choose the convenient way to contact us!</p>
        <a href="#" class="cta" id="contactUsBtn">Contact us</a>
    </div>
</section>

<div class="cooperation-section">
    <h2>We consider all types of cooperation</h2>
    <ul>
        <li><img src="/assets/img/contact/sponsorship.png" alt="Icon" class="icon"> Financial Sponsorship</li>
        <li><img src="/assets/img/contact/mentorships.png" alt="Icon" class="icon"> Mentorship and Guidance</li>
        <li><img src="/assets/img/contact/cooperation.png" alt="Icon" class="icon"> Collaborative Research</li>
        <li><img src="/assets/img/contact/internships.png" alt="Icon" class="icon"> Internship Opportunities</li>
        <li><img src="/assets/img/contact/job-offer.png" alt="Icon" class="icon"> Job Placement Assistance</li>
    </ul>
</div>
<div id="contactModal" class="contact-modal">
    <div class="contact-modal-content">
        <span class="contact-close" id="contact-closeModal">&times;</span>
        <h3>Contact Information</h3>
        <p>Email: <span id="contact-email">keysheero@gmail.com</span></p>
    </div>
</div>

<script src="/js/contact.js"></script>
<?php include $basePath . '/src/public/views/partials/footer.php'; ?>
