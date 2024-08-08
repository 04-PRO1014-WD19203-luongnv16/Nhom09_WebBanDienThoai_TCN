<?php

namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\DanhGia;
use MVC\Models\SanPham;
use MVC\Models\DanhMuc;
use MVC\Models\DungLuong;
use MVC\Models\MauSac;
use MVC\Models\BienThe;

class SanPhamController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = "Quản lý sản phẩm";
        $data['sanphams'] = (new SanPham)->all();
        $data['damhmucs'] = (new DanhMuc)->all();
        $data['danhGias'] = (new DanhGia)->allDanhGia();
        return $this->renderAdmin('sanpham/index', $data);
    }
    public function suaSanPham()
    {
        $title = "Sửa sản phẩm";
        $sanpham = (new SanPham)->one($_GET['id']);
        $check = false;
        $checkForm = false;
        $danhmucs = (new DanhMuc)->all();
        $dungluongs = (new DungLuong)->all();
        $mausacs = (new MauSac)->all();
        $isUpdating = isset($_POST['submit']);

        if ($isUpdating) {
            $anh_chinh = $_FILES['anh_chinh'];
            $anh1 = $_FILES['anh_phu_1'] ?? null;
            $anh2 = $_FILES['anh_phu_2']  ?? null;
            $anh3 = $_FILES['anh_phu_3'] ?? null;
            $target_filec = "./public/images/"  . basename($anh_chinh['name']);
            $target_file1 = "./public/images/"  . basename($anh1['name']);
            $target_file2 = "./public/images/"  . basename($anh2['name']);
            $target_file3 = "./public/images/"  . basename($anh3['name']);
            if (move_uploaded_file($anh_chinh["tmp_name"], $target_filec)) {
                $anh_chinh = $target_filec;
            } else {
                $anh_chinh = $sanpham['anh_chinh'];
            }
            if (move_uploaded_file($anh1["tmp_name"], $target_file1)) {
                $anh1 = $target_file1;
            } else {
                $anh1 = null;
            }
            if (move_uploaded_file($anh2["tmp_name"], $target_file2)) {
                $anh2 = $target_file2;
            } else {
                $anh2 = null;
            }
            if (move_uploaded_file($anh3["tmp_name"], $target_file3)) {
                $anh3 = $target_file3;
            } else {
                $anh3 = null;
            }
            $motangan = $_POST['mo_ta_ngan'];
            $mota = $_POST['mo_ta'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaysua = date('Y-m-d H:i:s');
            $idDm = $_POST['id_danh_mucs'];
            if ($_POST['ten_san_pham'] == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new SanPham)->update($_POST['id'], $_POST['ten_san_pham'], $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaysua, $idDm);
                    header('location: /admin-san-pham');
                }
            }
        }

        return $this->renderAdmin('sanpham/update', ['title' => $title, 'sanpham' => $sanpham, 'check' => $check, 'checkForm' => $checkForm, 'danhmucs' => $danhmucs, 'dungluongs' => $dungluongs, 'mausacs' => $mausacs]);
    }

    public function detailSanPham()
    {
        $title = "Chi tiết sản phẩm";
        $sanpham = (new SanPham)->one($_GET['id']);
        $danhmucs = (new DanhMuc)->all();
        $bienthes = (new BienThe)->all();

        return $this->renderAdmin('sanpham/detail', ['title' => $title, 'sanpham' => $sanpham, 'danhmucs' => $danhmucs, 'bienthes' => $bienthes]);
    }

    public function updateBienThe()
    {

        $title = "Chi tiết sản phẩm biến thể";
        $check = false;
        $checkForm = false;
        $bienthe = (new BienThe)->find($_GET['id']);
        // print_r($bienthe);
        // die;
        // $bienthes = (new BienThe)->all();
        $dungluongs = (new DungLuong)->all();
        $mausacs = (new MauSac)->all();
        $isUpdating = isset($_POST['submit']);
        if ($isUpdating) {
            $idSps = $_POST['id_san_phams'];
            $id_dung_luongs = $_POST['id_dung_luongs'];
            $id_mau_sacs = $_POST['id_mau_sacs'];
            $so_luong = $_POST['so_luong'];
            $gia_goc = $_POST['gia_goc'];
            $gia_ban = $_POST['gia_ban'];
            if ($id_dung_luongs == "" || $id_mau_sacs == "" || $so_luong == "" || $gia_goc == "" || $gia_ban == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new BienThe)->update($_POST['id'], $idSps, $id_dung_luongs, $id_mau_sacs, $so_luong, $gia_goc, $gia_ban);

                    return header('location: /admin-san-pham');
                }
            }
        }

        return $this->renderAdmin('sanpham/updateVariant', ['bienthe' => $bienthe, 'title' => $title, 'check' => $check, 'checkForm' => $checkForm, 'dungluongs' => $dungluongs, 'mausacs' => $mausacs]);
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
        $dungluongs = (new DungLuong)->all();
        $mausacs = (new MauSac)->all();

        if (isset($_POST['submit'])) {
            $tenSp = $_POST['ten_san_pham'];

            $anh_chinh = $_FILES['anh_chinh'] ?? null;
            $anh1 = $_FILES['anh_phu_1'] ?? null;
            $anh2 = $_FILES['anh_phu_2']  ?? null;
            $anh3 = $_FILES['anh_phu_3'] ?? null;
            $target_filec = "./public/images/"  . basename($anh_chinh['name']);
            $target_file1 = "./public/images/"  . basename($anh1['name']);
            $target_file2 = "./public/images/"  . basename($anh2['name']);
            $target_file3 = "./public/images/"  . basename($anh3['name']);
            if (move_uploaded_file($anh_chinh["tmp_name"], $target_filec)) {
                $anh_chinh = $target_filec;
            } else {
                $anh_chinh = null;
            }
            if (move_uploaded_file($anh1["tmp_name"], $target_file1)) {
                $anh1 = $target_file1;
            } else {
                $anh1 = null;
            }
            if (move_uploaded_file($anh2["tmp_name"], $target_file2)) {
                $anh2 = $target_file2;
            } else {
                $anh2 = null;
            }
            if (move_uploaded_file($anh3["tmp_name"], $target_file3)) {
                $anh3 = $target_file3;
            } else {
                $anh3 = null;
            }
            $motangan = $_POST['mo_ta_ngan'];
            $mota = $_POST['mo_ta'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaytao = date('Y-m-d H:i:s');
            $idDm = $_POST['id_danh_mucs'];

            //bien the
            $idMss = $_POST['id_mau_sacs'];
            $idDls = $_POST['id_dung_luongs'];
            $soluong = $_POST['so_luong'];
            $giagoc = $_POST['gia_goc'];
            $giaban = $_POST['gia_ban'];

            $sanphams = (new SanPham)->all();
            foreach ($sanphams as $key => $sanpham) {
                if ($_POST['ten_san_pham'] == $sanpham['ten_san_pham']) {
                    $checkForm = true;
                }
            }
            if ($_POST['ten_san_pham'] == "" || $idDm == "" || $idMss == "" || $idDls == "" || $soluong == "" || $giagoc == "" || $giaban == "") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new SanPham)->add($tenSp, $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaytao, $idDm);
                    $idSps = (new SanPham)->idSanPham();
                    for ($i = 0; $i < count($idDls); $i++) {
                        $id_dung_luongs = $idDls[$i];
                        $id_mau_sacs = $idMss[$i];
                        $so_luong = $soluong[$i];
                        $gia_goc = $giagoc[$i];
                        $gia_ban = $giaban[$i];
                        (new BienThe)->add($idSps['id_san_pham'], $id_dung_luongs, $id_mau_sacs, $so_luong, $gia_goc, $gia_ban);
                    }
                    return header('location: /admin-san-pham');
                }
            }
        }
        return $this->renderAdmin('sanpham/add', ['title' => $title, 'check' => $check, 'checkForm' => $checkForm, 'danhmucs' => $danhmucs, 'dungluongs' => $dungluongs, 'mausacs' => $mausacs]);
    }
}
