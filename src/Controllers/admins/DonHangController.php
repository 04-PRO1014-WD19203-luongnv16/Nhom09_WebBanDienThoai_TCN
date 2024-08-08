<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\DonHang;
use MVC\Models\TaiKhoan;
use MVC\Models\TrangThaiDonHang;
use MVC\Models\ThanhToan;
use MVC\Models\ChiTietDonHang;


class DonHangController extends Controller
{
    public function index()
    {
        $title = "Quản lý đơn hàng";
        $donhangs = (new DonHang)->all();
        $taikhoans = (new TaiKhoan)->all();
        $ttdonhang = (new TrangThaiDonHang)->all();
        return $this->renderAdmin('donhang/index', ['title' => $title, 'donhangs' => $donhangs, 'taikhoans' => $taikhoans, 'ttdonhang' => $ttdonhang]);
    }
    public function detailDonHang()
    {

        $title = "Chi tiết đơn hàng";
        $donhang = (new DonHang)->find($_GET['id']);
        $ttdonhang = (new TrangThaiDonHang)->all();
        $thanhtoans = (new ThanhToan)->all();
        $ctdonhangs = (new ChiTietDonHang)->showSanPham($_GET['id']);
        $isUpdating = isset($_POST['submit']);
        if ($isUpdating) {
            $trangthai = $_POST['trang_thai'];
            (new DonHang)->update($_POST['id'], $trangthai);
            return header('location: /admin-don-hang');
        }
        return $this->renderAdmin('donhang/detail', ['title' => $title, 'donhang' => $donhang, 'ttdonhang' => $ttdonhang, 'thanhtoans' => $thanhtoans, 'ctdonhangs' => $ctdonhangs]);
    }
}
