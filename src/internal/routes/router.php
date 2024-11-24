<?php
// Список маршрутов с правильными путями
$routes = [
    'home' => 'views/pages/home.php',
    'about' => 'views/pages/about.php',
    'services' => 'views/pages/services.php',
    'applications' => 'views/pages/applications.php',
    'contact' => 'views/pages/contact.php',
];

// Проверяем, существует ли страница
if (array_key_exists($page, $routes)) {
    include __DIR__ . '/../' . $routes[$page];
} else {
    // Если страницы нет, выводим 404
    include __DIR__ . '/../views/pages/404.php';
}
?>