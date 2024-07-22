<?php

use MVC\Controllers\admins\DanhMucController;
use MVC\Controllers\admins\DashboardController;
use MVC\Controllers\admins\SanPhamController;
use MVC\Controllers\clients\CuaHangController;
use MVC\Controllers\clients\LoginController;
use MVC\Controllers\clients\TrangChuController;
use MVC\Router;
use Phroute\Phroute\RouteCollector;

$route=new RouteCollector();

$router = new Router();

$router->addRoute('/', TrangChuController::class, 'index');

//Định dang đường dẫn Route: $router->addRoute('[đường dẫn]',[Class],'[tên function]')
$router->addRoute('/login', LoginController::class, 'index');
$router->addRoute('/logout', LoginController::class, 'logout');

//Route thuộc người dùng
// $router->addRoute('/list-san_pham', SanPhamController::class, 'index');

//dang ky
$router->addRoute('/dang_ky', LoginController::class, 'dangky');
$route->post('/dang_ky',[LoginController::class, 'dangky']);    
// SanPham
$router->addRoute('/cua-hang', CuaHangController::class, 'index');
$router->addRoute('/detail-san-pham', CuaHangController::class, 'detail');
//

$route->post('/sanphamdanhmuc',[CuaHangController::class, 'index']);

//Route thuộc Quản trị viên
$router->addRoute('/admin', DashboardController::class, 'index');

// Quản lý danh mục
$router->addRoute('/admin-danhmuc', DanhMucController::class, 'index');
$router->addRoute('/add-danh-muc', DanhMucController::class, 'addDanhMuc');
$router->addRoute('/sua-danh-muc', DanhMucController::class, 'suaDanhMuc');
$router->addRoute('/delete-danh-muc', DanhMucController::class, 'deleteDanhMuc');
// Quản lý sản phẩm




return $router;
    