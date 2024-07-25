<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\DonHang;
use MVC\Models\TaiKhoan;



class DonHangController extends Controller
{
    public function index()
    {
        $title = "Quản lý đơn hàng";
        $donhangs = (new DonHang)->all();
        $taikhoans = (new TaiKhoan)->all();
        return $this->renderAdmin('donhang/index', ['title' => $title, 'donhangs' => $donhangs, 'taikhoans' => $taikhoans]);
    }
    public function detailDonHang()
    {
        $title = "Chi tiết đơn hàng";
        $donhang = (new DonHang)->one($_GET['id']);

        return $this->renderAdmin('sanpham/detail', ['title' => $title, 'donhang' => $donhang]);
    }
}
