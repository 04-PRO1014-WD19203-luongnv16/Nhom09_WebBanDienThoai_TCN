<?php 
namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\DanhMuc;

class DanhMucController extends Controller {
    public function index () {
        $title = "Quản lý danh muc";
        $danhmucs = (new DanhMuc)->all();

        return $this->renderAdmin('danhmuc/index',['title'=>$title,'danhmucs'=>$danhmucs]);
    }
    public function suaDanhMuc() {
        $title = "Sửa danh mục";
        $danhmuc = (new DanhMuc)->one($_GET['id']);
        $check = false;
        $checkForm = false;
        $isUpdating = isset($_POST['submit']); 
    
        if ($isUpdating) {
            $danhmucs = (new DanhMuc)->all();
            foreach ($danhmucs as $key => $danhmuc) {
                if ($danhmuc['id'] == $_GET['id'] && $danhmuc['ten_danh_muc'] == $_POST['ten_danh_muc']) {
                    $checkForm = false;
                    break;
                }
                else {
                    $checkForm = true;
                }
            }
            if ($_POST['ten_danh_muc']=="") {
                $check = true;
            } else {
                if (!$checkForm) {
                    (new DanhMuc)->update($_POST['id'], $_POST['ten_danh_muc']);
                    header('location: /admin-danhmuc');
                }
            }
        }
    
        return $this->renderAdmin('danhmuc/update', ['title'=>$title, 'danhmuc'=>$danhmuc, 'check'=>$check, 'checkForm'=>$checkForm]);
    }
    
    public function deleteDanhMuc() {
        if (isset($_POST['id'])) {
            (new DanhMuc)->delete($_POST['id']);
            header('location: /admin-danhmuc');
        }
        else {
            header('location: /admin-danhmuc');
        }
    }
    public function addDanhMuc() {
        $title = "Thêm mới danh muc";
        $check = false;
        $checkForm = false;
        if (isset($_POST['submit'])) {
            $danhmucs = (new DanhMuc)->all();
            foreach ($danhmucs as $key => $danhmuc) {
                if ($_POST['ten_danh_muc'] == $danhmuc['ten_danh_muc']) {
                    $checkForm = true;
                }
            }
            if ($_POST['ten_danh_muc']=="") {
                $check = true;
            }
            else {
                if (!$checkForm) {
                    (new DanhMuc)->add($_POST['ten_danh_muc']);
                    return header('location: /admin-danhmuc');
                }
            }
        }
        return $this->renderAdmin('danhmuc/add', ['title'=>$title, 'check'=>$check, 'checkForm'=>$checkForm]);
    }
}
?>