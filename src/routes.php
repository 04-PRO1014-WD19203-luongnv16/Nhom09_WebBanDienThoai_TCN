<?php

use MVC\Controllers\TrangChuController;
use MVC\Router;
use MVC\Controllers\UserController;

$router = new Router();

$router->addRoute('/', TrangChuController::class, 'index');

//Định dang đường dẫn Route: $router->addRoute('[đường dẫn]',[Class],'[tên function]')

//Route thuộc người dùng
// $router->addRoute('/list-san_pham', SanPhamController::class, 'index');
















//Route thuộc Quản trị viên
















return $router;
    