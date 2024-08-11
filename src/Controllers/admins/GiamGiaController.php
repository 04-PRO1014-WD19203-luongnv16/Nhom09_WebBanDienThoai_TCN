<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\MaGiamGia;

class GiamGiaController extends Controller
{
    public function index()
    {
        $title = "Quản lý mã giảm giá";
        $giamgias = (new MaGiamGia)->all();
        return $this->renderAdmin('giamgia/index', ['title' => $title, 'giamgias' => $giamgias]);
    }
    public function index1()
    {
        $title = "Quản lý mã giảm giá";
        $giamgias = (new MaGiamGia)->all2();
        return $this->renderAdmin('giamgia/index1', ['title' => $title, 'giamgias' => $giamgias]);
    }

    public function deleteGiamGia()
    {
        if (isset($_POST['id'])) {
            (new MaGiamGia())->delete($_POST['id']);
            header('location: /admin-giam-gia');
        } else {
            header('location: /admin-giam-gia');
        }
    }
    public function returnGiamGia()
    {
        if (isset($_POST['id'])) {
            (new MaGiamGia())->return($_POST['id']);
            header('location: /admin-giam-gia');
        } else {
            header('location: /admin-giam-gia');
        }
    }
    public function addGiamGia()
    {
        $title = "Thêm mới mã giảm giá";
        $check = false;
        $checkForm = false;
        if (isset($_POST['submit'])) {
            $tenma = $_POST['ten_ma'];
            $shortcode = $_POST['shortcode'];
            $mucgiam = $_POST['muc_giam'];
            $ngaytao = $_POST['ngay_tao'];
            $ngayhh = $_POST['ngay_het_han'];
            $$giamgias = (new MaGiamGia)->all1();
            foreach ($giamgias as $key => $giamgia) {
                if ($_POST['ten_ma'] == $giamgia['ten_ma']) {
                    $checkForm = true;
                }
            }
            if ($_POST['ten_ma'] == "" || $tenma == "" || $shortcode == "" || $mucgiam == "" || $ngaytao == "" || $ngayhh == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new MaGiamGia)->add($tenma, $shortcode, $mucgiam, 1, $ngaytao, $ngayhh);
                    return header('location: /admin-giam-gia');
                }
            }
        }
        return $this->renderAdmin('giamgia/add', ['title' => $title, 'check' => $check, 'checkForm' => $checkForm]);
    }
}
