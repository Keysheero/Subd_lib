<?php
namespace Interfaces\controllers;

class PageController
{
    public function home_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/home.php';
    }
    public function applications_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/applications.php';
    }
    public function contact_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/contact.php';
    }
    public function services_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/services.php';
    }

}
