<?php

use MVC\Controllers\TrangChuController;
use MVC\Router;
use MVC\Controllers\UserController;

$router = new Router();

$router->addRoute('/', TrangChuController::class, 'index');

return $router;
    