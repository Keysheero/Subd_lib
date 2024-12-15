<?php

require __DIR__ . '/../../vendor/autoload.php';


use Infrastructure\config\Config;
use FastRoute\RouteCollector;
use Application\services\UserService;
use Application\services\BookService;
use Infrastructure\Database\Database;
use Infrastructure\repository\postgres\BookRepository;
use Infrastructure\repository\postgres\UserRepository;
use Interfaces\controllers\UserController;
use Interfaces\controllers\BookController;
use Interfaces\controllers\PageController;

session_start();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('POST', '/user/register', 'user_register');
    $r->addRoute('POST', '/user/login', 'user_login');
    $r->addRoute('POST', '/user/logout', 'user_logout');

    $r->addRoute('POST', '/books/create', 'books_create');
    $r->addRoute('POST', '/books/delete', 'books_delete');
    $r->addRoute('POST', '/books/update',  'books_update');


    $r->addRoute('GET', '/books/download/{book_id}', 'books_download');

    $r->addRoute('GET', '/home', 'home_load');
    $r->addRoute('GET', '/books', 'books_load');
    $r->addRoute('GET', '/profile', 'profile_load');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:


        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $config = new Config();

        $database = new Database();
        $connection = $database->getConnection($config);


        $userRepository = new UserRepository($connection);
        $bookRepository = new BookRepository($connection);

        $userService = new UserService($userRepository);
        $bookService = new BookService($bookRepository);

        $userController = new UserController($userService);
        $bookController = new BookController($bookService);

        $pageController = new PageController($bookService);


        if ($handler == 'user_register') {
            $userController->register();
        } elseif ($handler == 'user_login') {
            $userController->login();
        } elseif ($handler == 'user_logout') {
            $userController->logout();
        } elseif ($handler == 'home_load') {
            $pageController->home_load();
        } elseif ($handler == 'books_load') {
            $pageController->books_load();
        } elseif ($handler == 'books_delete') {
            $userController->checkAuth();
            $bookController->deleteBook();
        } elseif ($handler == 'books_create') {
            $userController->checkAuth();
            $bookController->addBook();
        }elseif ($handler == 'books_update') {
            $userController->checkAuth();
            $bookController->updateBook();
        } elseif ($handler == 'books_download') {
            $bookController->downloadBook(intval($vars['book_id']));

        } elseif ($handler == 'profile_load') {
            $userController->checkAuth();
            $userId = $_SESSION['user_id'];
            $pageController->profile_load($userId);
        }

        break;
}
