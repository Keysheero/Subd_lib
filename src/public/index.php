<?php

require __DIR__ . '/../../vendor/autoload.php';


use Infrastructure\config\Config;
use FastRoute\RouteCollector;
use Application\services\UserService;
use Application\services\ResumeService;
use Infrastructure\Database\Database;
use Infrastructure\repository\postgres\ResumeRepository;
use Infrastructure\repository\postgres\UserRepository;
use Interfaces\controllers\UserController;
use Interfaces\controllers\ResumeController;
use Interfaces\controllers\PageController;

session_start();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('POST', '/user/register', 'user_register');
    $r->addRoute('POST', '/user/login', 'user_login');
    $r->addRoute('POST', '/user/logout', 'user_logout');

    // protect at any cost by auth!
    $r->addRoute('POST', '/resume/create', 'resume_create');
    $r->addRoute('POST', '/resume/update-status', 'resume_update_status');
    $r->addRoute('POST', '/resume/delete', 'resume_delete');
    $r->addRoute('GET', '/resume/contact/{id}', 'resume_contact');


    $r->addRoute('GET', '/home', 'home_load');
    $r->addRoute('GET', '/services', 'services_load');
    $r->addRoute('GET', '/applications', 'resume_applications_load');
    $r->addRoute('GET', '/contact', 'contact_load');
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
        $resumeRepository = new ResumeRepository($connection);

        $userService = new UserService($userRepository);
        $resumeService = new ResumeService($resumeRepository);

        $userController = new UserController($userService);
        $resumeController = new ResumeController($resumeService, $userService);

        $pageController = new PageController();


        if ($handler == 'user_register') {
            $userController->register();
        } elseif ($handler == 'user_login') {
            $userController->login();
        } elseif ($handler == 'user_logout') {
            $userController->logout();
        } elseif ($handler == 'resume_create') {
            $userController->checkAuth();
            $resumeController->createResume();
        } elseif ($handler == 'resume_update_status') {
            $userController->checkAuth();
            $resumeController->updateResumeStatus();
        } elseif ($handler == 'resume_delete') {
            $userController->checkAuth();
            $resumeController->deleteResume();
        }elseif ($handler == 'resume_contact') {
            $userController->checkAuth();
            $resumeId = $vars['id'];
            $resumeController->getContact($resumeId);
        }
        elseif ($handler == 'home_load') {
            $pageController->home_load();
        } elseif ($handler == 'services_load') {
            $pageController->services_load();
        } elseif ($handler == 'contact_load') {
            $pageController->contact_load();
        } elseif ($handler == 'resume_applications_load') {
            $resumeController->applicationsLoad();
        }

        break;
}
