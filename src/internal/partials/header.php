<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'GrandPrix'; ?></title>
    <link rel="stylesheet" href="/src/public/css/partials/header.css">
    <link rel="stylesheet" href="/src/public/css/partials/header.css">
</head>
<body>
<header>
    <div class="container">
        <h1 class="logo">GrandPrix</h1>
        <nav>
            <ul class="nav-links">
                <?php
                $navItems = [
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'applications' => 'Applications',
                    'contact' => 'Contact',
                ];
                foreach ($navItems as $key => $label) {
                    $activeClass = ($key === $page) ? 'active' : '';
                    echo "<li><a href='?page={$key}' class='{$activeClass}'>{$label}</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="auth-links">
            <button id="loginBtn" class="login-btn">Login</button>
            <button id="registerBtn" class="register-btn">Register</button>
        </div>
    </div>
</header>


<script src="../../public/js/modal.js"></script>
<script src="../../public/js/navigation.js"></script>