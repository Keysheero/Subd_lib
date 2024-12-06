<?php global $page; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/modals/auth_modal.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'GrandPrix'; ?></title>
    <link rel="stylesheet" href="/css/partials/header.css">
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
                    'profile' => 'Profile',
                    'services' => 'Services',
                    'applications' => 'Applications',
                    'contact' => 'Contact',
                ];
                foreach ($navItems as $key => $label) {
                    $activeClass = ($key === $page) ? 'active' : '';
                    echo "<li><a href='/$key' class='$activeClass'>$label</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="auth-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="user-name">Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?></span>
                <button id="logoutBtn" class="logout-btn">Logout</button>
            <?php else: ?>
                <button id="loginBtn" class="login-btn">Login</button>
                <button id="registerBtn" class="register-btn">Register</button>
            <?php endif; ?>
        </div>

    </div>
</header>

<script src="/js/modal.js"></script>
<script src="/js/navigation.js"></script>
