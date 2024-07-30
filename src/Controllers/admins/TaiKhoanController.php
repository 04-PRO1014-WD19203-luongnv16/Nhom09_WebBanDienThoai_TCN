<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\TaiKhoan;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = "Quản lý tài khoản";
        $taikhoans = (new TaiKhoan())->all();

        return $this->renderAdmin('taikhoan/index', ['title' => $title, 'taikhoans' => $taikhoans]);
    }
    public function updateTaiKhoan()
    {
        $title = "Chi tiết tài khoản";
        $taikhoan = (new TaiKhoan)->findOne($_GET['id']);
        $isUpdating = isset($_POST['submit']);
        if ($isUpdating) {
            $trangthai = $_POST['trang_thai'];
            (new TaiKhoan)->update($_POST['id'], $trangthai);
            return header('location: /admin-tai-khoan');
        }
        return $this->renderAdmin('taikhoan/update', ['title' => $title, 'taikhoan' => $taikhoan]);
    }
}
