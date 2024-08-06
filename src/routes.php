<?php

use MVC\Controllers\admins\DanhGiaController;
use MVC\Controllers\admins\DanhMucController;
use MVC\Controllers\admins\DashboardController;
use MVC\Controllers\admins\DonHangController;
use MVC\Controllers\admins\TaiKhoanAdminController;
use MVC\Controllers\admins\SanPhamController;
use MVC\Controllers\clients\ChiTietDonHangController;
use MVC\Controllers\clients\CuaHangController;
use MVC\Controllers\clients\DanhGiaSanPhamController;
use MVC\Controllers\clients\GioHangController;
use MVC\Controllers\clients\LoginController;
use MVC\Controllers\clients\ThanhToanController;
use MVC\Controllers\clients\TrangChuController;

use MVC\Router;
use Phroute\Phroute\RouteCollector;
use MVC\Controllers\clients\TaiKhoanController;

$route = new RouteCollector();

$router = new Router();

$router->addRoute('/', TrangChuController::class, 'index');

//Định dang đường dẫn Route: $router->addRoute('[đường dẫn]',[Class],'[tên function]')
$router->addRoute('/login', LoginController::class, 'index');
$router->addRoute('/logout', LoginController::class, 'logout');

//Route thuộc người dùng

$router->addRoute('/list-san_pham', SanPhamController::class, 'index');
// $route->post('/dang_ky', [LoginController::class, 'dangky']);

// $router->addRoute('/list-danhmuc',CuaHangController::class,'loadListDM');

//dang ky
$router->addRoute('/dang_ky', LoginController::class, 'dangky');

// $route->post('/dang_ky',[LoginController::class, 'dangky']);  

// SanPham
$router->addRoute('/cua-hang', CuaHangController::class, 'index');
$router->addRoute('/chi-tiet-san-pham', CuaHangController::class, 'detail');
// Giỏ hàng
$router->addRoute('/gio-hang', GioHangController::class, 'index');
$router->addRoute('/xoa-gio-hang', GioHangController::class, 'delete');
// Thanh toán
$router->addRoute('/thanh-toan-form', ThanhToanController::class, 'index');
$router->addRoute('/check-out', ThanhToanController::class, 'checkout');

// chi tiet
$router->addRoute('/detail-san-pham', CuaHangController::class, 'detail');
$router->addRoute('/chi-tiet-san-pham', CuaHangController::class, 'detail');

// Tài khoản
$router->addRoute('/tai-khoan', TaiKhoanController::class, 'index');
$router->addRoute('/tai-khoan-update', TaiKhoanController::class, 'update');
// Chi tiết hóa đơn
$router->addRoute('/chi-tiet-don-hang', ChiTietDonHangController::class, 'detail');
// Đánh giá sản phẩm
$router->addRoute('/danh-gia-user', DanhGiaSanPhamController::class, 'index');
$router->addRoute('/viet-danh-gia', DanhGiaSanPhamController::class, 'createDanhGia');
//loc sp theo dm
$route->post('/sanphamdanhmuc', [CuaHangController::class, 'index']);
//list danh muc
$router->addRoute('/loaddanhmuc', CuaHangController::class, 'loadListDM');

//Route thuộc Quản trị viên
$router->addRoute('/admin', DashboardController::class, 'index');

// Quản lý danh mục
$router->addRoute('/admin-danhmuc', DanhMucController::class, 'index');
$router->addRoute('/add-danh-muc', DanhMucController::class, 'addDanhMuc');
$router->addRoute('/sua-danh-muc', DanhMucController::class, 'suaDanhMuc');
$router->addRoute('/delete-danh-muc', DanhMucController::class, 'deleteDanhMuc');
// Quản lý sản phẩm
$router->addRoute('/admin-san-pham', SanPhamController::class, 'index');
$router->addRoute('/add-san-pham', SanPhamController::class, 'addSanPham');
$router->addRoute('/sua-san-pham', SanPhamController::class, 'suaSanPham');
$router->addRoute('/delete-san-pham', SanPhamController::class, 'deleteSanPham');
$router->addRoute('/detail-san-pham', SanPhamController::class, 'detailSanPham');
$router->addRoute('/update-bien-the', SanPhamController::class, 'updateBienThe');
//Quản lý đơn hàng
$router->addRoute('/admin-don-hang', DonHangController::class, 'index');
$router->addRoute('/detail-don-hang', DonHangController::class, 'detailDonHang');

//Quản lý đánh giá
$router->addRoute('/admin-danh-gia',DanhGiaController::class,'AllDanhGia');
$router->addRoute('/admin-thong-ke',DanhGiaController::class,'thongKe');

//Quản lý tài khoản
$router->addRoute('/admin-tai-khoan', TaiKhoanAdminController::class, 'index');
$router->addRoute('/sua-tai-khoan', TaiKhoanAdminController::class, 'updateTaiKhoan');


return $router;

