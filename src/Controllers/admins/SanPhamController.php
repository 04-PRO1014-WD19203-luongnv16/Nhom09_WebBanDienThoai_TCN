<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\SanPham;
use MVC\Models\DanhMuc;

class SanPhamController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = "Quản lý sản phẩm";
        $data['sanphams'] = (new SanPham)->all();

        return $this->renderAdmin('sanpham/index', $data);
    }
    public function suaSanPham()
    {
        $title = "Sửa sản phẩm";
        $sanpham = (new SanPham)->one($_GET['id']);
        $check = false;
        $checkForm = false;
        $danhmucs = (new DanhMuc)->all();
        $anh_chinh = $_FILES['anh_chinh']['name'] ?? null;
        $anh1 = $_FILES['anh_phu_1']['name'] ?? null;
        $anh2 = $_FILES['anh_phu_2']['name']  ?? null;
        $anh3 = $_FILES['anh_phu_3']['name'] ?? null;
        $motangan = $_POST['mo_ta_ngan'];
        $mota = $_POST['mo_ta'];
        $ngaysua = date('d-m-y h:i:s');
        $idDm = $_POST['id_danh_mucs'];
        $isUpdating = isset($_POST['submit']);

        if ($isUpdating) {
            if ($_POST['ten_san_pham'] == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new SanPham)->update($_POST['id'], $_POST['ten_san_pham'], $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaysua, $idDm);
                    header('location: /admin-san-pham');
                }
            }
        }

        return $this->renderAdmin('sanpham/update', ['title' => $title, 'sanpham' => $sanpham, 'check' => $check, 'checkForm' => $checkForm, 'danhmucs' => $danhmucs]);
    }

    public function detailSanPham()
    {
        $title = "Chi tiết sản phẩm";
        $sanpham = (new SanPham)->one($_GET['id']);
        $danhmucs = (new DanhMuc)->all();


        return $this->renderAdmin('sanpham/detail', ['title' => $title, 'sanpham' => $sanpham, 'danhmucs' => $danhmucs]);
    }

    public function deleteSanPham()
    {
        if (isset($_POST['id'])) {
            (new SanPham)->delete($_POST['id']);
            header('location: /admin-san-pham');
        } else {
            header('location: /admin-san-pham');
        }
    }
    public function addSanPham()
    {
        $title = "Thêm mới sản phẩm";
        $check = false;
        $checkForm = false;
        $danhmucs = (new DanhMuc)->all();
        if (isset($_POST['submit'])) {
            $tenSp = $_POST['ten_san_pham'];
            $anh_chinh = $_FILES['anh_chinh']['name'] ?? null;
            $anh1 = $_FILES['anh_phu_1']['name'] ?? null;
            $anh2 = $_FILES['anh_phu_2']['name']  ?? null;
            $anh3 = $_FILES['anh_phu_3']['name'] ?? null;
            $motangan = $_POST['mo_ta_ngan'];
            $mota = $_POST['mo_ta'];
            $ngaytao = date('d-m-y h:i:s');
            $idDm = $_POST['id_danh_mucs'];
            $sanphams = (new SanPham)->all();
            foreach ($sanphams as $key => $sanpham) {
                if ($_POST['ten_san_pham'] == $sanpham['ten_san_pham']) {
                    $checkForm = true;
                }
            }
            if ($_POST['ten_san_pham'] == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new SanPham)->add($tenSp, $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaytao, $idDm);
                    return header('location: /admin-san-pham');
                }
            }
        }
        return $this->renderAdmin('sanpham/add', ['title' => $title, 'check' => $check, 'checkForm' => $checkForm, 'danhmucs' => $danhmucs]);
    }

}
