<?php
// Включение вывода ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/internal/config/config.php';

// Получаем маршрут из URL
$page = $_GET['page'] ?? 'home';

// Подключаем маршруты
require_once __DIR__ . '/../src/internal/routes/router.php';
?>
