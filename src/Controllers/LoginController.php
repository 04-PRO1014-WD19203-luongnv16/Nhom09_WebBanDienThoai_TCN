<?php 
namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\TaiKhoan;

class LoginController extends Controller {
    public function index() {
        if (isset($_SESSION['id'])) {
            return header("location: /");
        }
        else {
            $validate = [
                "tai_khoan" => false,
                "mat_khau" => false
            ];
            $check = true;
            $checkForm = false;
            if (isset($_POST['btn-submit'])) {
                if ($_POST['tai_khoan'] == "") {
                    $validate['tai_khoan'] = true;
                    $check = false;
                }
                if ($_POST['mat_khau'] == "") {
                    $validate['mat_khau'] = true;
                    $check = false;
                }
                if ($check) {
                    $tai_khoans = (new TaiKhoan)->all();
                    foreach ($tai_khoans as $tai_khoan) {
                        if ($tai_khoan['tai_khoan'] != $_POST['tai_khoan']) {
                            $checkForm = true;
                            }
                            else {
                                if ($_POST['mat_khau'] != $tai_khoan['mat_khau']) {
                                    $checkForm = true;
                                }
                                else {
                                    $taikhoan = (new TaiKhoan)->findOne($tai_khoan['id']);
                                    $_SESSION['tai_khoan'] = $taikhoan['tai_khoan'];
                                    $_SESSION['id'] = $taikhoan['id'];
                                    $_SESSION['trang_thai'] = $tai_khoan['trang_thai'];
                                    if ($_SESSION['trang_thai'] == 2) {
                                        return $this->renderAdmin('thongke');
                                    }
                                    elseif ($_SESSION['trang_thai'] == 1) {
                                        return header("location: /");
                                    }
                                    break;
                            }
                        }
                    }
                }
            }
            return $this->render('/login', ['validate'=>$validate, 'checkForm'=>$checkForm]);
        }
        }
    public function logout() {
        session_destroy();
        return header("location: /");
    }
}
?>