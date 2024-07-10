<?php

use MVC\Controllers\DangKyController;
use MVC\Controllers\DashboardController;
use MVC\Controllers\LoginController;
use MVC\Controllers\TrangChuController;
use Phroute\Phroute\RouteCollector;
use MVC\Router;
use MVC\Controllers\UserController;

$route=new RouteCollector();

$router = new Router();

$router->addRoute('/', TrangChuController::class, 'index');

//Định dang đường dẫn Route: $router->addRoute('[đường dẫn]',[Class],'[tên function]')
$router->addRoute('/login', LoginController::class, 'index');
$router->addRoute('/logout', LoginController::class, 'logout');
$router->addRoute('/dang_ky', LoginController::class, 'dangky');

//Route thuộc người dùng
// $router->addRoute('/list-san_pham', SanPhamController::class, 'index');
$route->post('/dang_ky',[LoginController::class, 'dangky']);    















//Route thuộc Quản trị viên
$router->addRoute('/admin', DashboardController::class, 'index');















return $router;
    