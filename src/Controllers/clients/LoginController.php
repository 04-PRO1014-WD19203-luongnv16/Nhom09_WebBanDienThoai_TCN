<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\DanhMuc;
use MVC\Models\TaiKhoan;

class LoginController extends Controller { 
    protected $taikhoan;
    protected $danhmucs;
    public function __construct(){
        $this->taikhoan = new TaiKhoan;
        $this->danhmucs = new DanhMuc;
    }


     public function dangky(){
        $data['danhmucs'] = $this->danhmucs->all();
        if(isset($_POST['submit'])){
            $errors=[];
            $tai_khoan = $_POST['tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'] ?? 1;
            $so_dien_thoai = $_POST['so_dien_thoai'];

            if(empty(trim($tai_khoan))){
                $errors['tai_khoan']='Không được để trống tài khoản';
            }
            if(empty($mat_khau)){
                $errors['mat_khau'] = 'Không được để trống mật khẩu';
            }
            if(empty($email)){
                $errors['email'] = 'Không được để trống email';
            }
            if(empty($dia_chi)){
                $errors['dia_chi'] = 'Không được để trống địa chỉ';
            }
            if(empty($so_dien_thoai)){
                $errors['so_dien_thoai'] = 'Không được để trống số điện thoại';
            }

            // var_dump($tai_khoan,$mat_khau,$email,$dia_chi,$gioi_tinh,$ngay_sinh);
            if(!$errors){
               $this->taikhoan->insert_taikhoan($tai_khoan,$mat_khau,$email,$dia_chi,$gioi_tinh,$so_dien_thoai);
               echo "<script>alert('Đăng ký thành công')</script>";
               return $this->render('dangky');
            }else{
                return $this->render('dangky',compact('errors'));  
            }
        }
        return $this->render('dangky',compact('data'));
    }


    public function index() {
        $data['danhmucs'] = $this->danhmucs->all();
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
            return $this->render('/login', ['validate'=>$validate, 'checkForm'=>$checkForm,'data'=>$data]);
        }
        }
    public function logout() {
        session_destroy();
        return header("location: /");
    }

   
}
?>