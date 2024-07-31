<?php
namespace MVC\Controllers\Clients;

use MVC\Controller;
use MVC\Models\DonHang;
use MVC\Models\TaiKhoan;

class TaiKhoanController extends Controller
{

    public function index($data = [])
    {
        if (isset($_SESSION['id'])) {
            $data['title'] = "Tài khoản";
            $data['donhangs'] = (new DonHang)->selectAll();
            $data['taiKhoan'] = (new TaiKhoan)->findOne($_SESSION['id']);
            if (isset($_GET['btn-search'])) {
                $data['donhangs'] = (new DonHang)->selectSearch($_GET['search']);
                if (empty($data['donhangs'])) {
                    $data['donhangs'] = (new DonHang)->selectAll();
                    $data['error'] = "Không tìm thấy mã đơn!";
                }
            }
            return $this->render("client/taikhoan/index", $data);
        }
    }
    public function update()
    {
        $taiKhoan = (new TaiKhoan)->findOne($_SESSION['id']);
        $data['taiKhoan'] = $taiKhoan;
        if (isset($_SESSION["id"])) {
            $data["title"] = "Chỉnh sửa hồ sơ";
            $data['checkPass'] = true;
            $taiKhoans = (new TaiKhoan)->all();
            if ($data['checkPass']) {
                $data['success'] = "Điền mật khẩu của bạn!";
                if (isset($_POST['btn-check'])) {
                    if ($taiKhoan['mat_khau'] == $_POST['password']) {
                        $data['success'] = NULL;
                        $data['checkPass'] = false;
                        $data['taiKhoan'] = $taiKhoan;
                    } else {
                        $data['success'] = NULL;
                        $data['error'] = "Mật khẩu không đúng!";
                        $data['checkPass'] = true;
                    }
                }
            }
            if (isset($_POST['btn-update'])) {
                $check = true;
                $data["checkForm"] = [
                    "tai_khoan" => true,//required
                    "tai_khoan_2" => false,//Kiểm tra trùng lặp
                    "email" => true,//required
                    "so_dien_thoai" => true,//required
                    "dia_chi" => true,//required
                ];
                if ($_POST["tai_khoan"] !== "") {
                    $data["checkForm"]["tai_khoan"] = false;//Tài khoản đã được điền
                    if ($taiKhoan['tai_khoan'] === $_POST['tai_khoan']) {
                        $data["checkForm"]["tai_khoan_2"] = false;
                        $tai_khoan = $_POST["tai_khoan"];
                    } else {
                        $tai_khoan = $_POST["tai_khoan"];
                        foreach ($taiKhoans as $value) {
                            if ($value['tai_khoan'] === $_POST['tai_khoan']) {
                                $data["checkForm"]["tai_khoan_2"] = true;//Nếu có tài khoản đã tồn tại
                                $check = false;
                                break;
                            }
                        }
                    }
                } else {
                    $check = false;
                }
                if ($_POST["mat_khau"] == "") {
                    $mat_khau = $taiKhoan['mat_khau'];
                } else {
                    $mat_khau = $_POST['mat_khau'];
                }
                if ($_FILES['anh_chinh']['name']!="") {
                    $location_file = "./public/images/" . $_FILES['anh_chinh']['name'];
                    $hinh_anh = $location_file;
                    move_uploaded_file($_FILES['anh_chinh']['tmp_name'], $location_file);
                } else {
                    $hinh_anh = $taiKhoan['hinh_anh'];
                }
                if ($_POST["email"] !== "") {
                    $email = $_POST["email"];
                    $data["checkForm"]["email"] = false;//Email đã được điền
                } else {
                    $check = false;
                }
                if ($_POST["so_dien_thoai"] !== "") {
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                    $data['checkForm']['so_dien_thoai'] = false;//Số điện thoại đã được điền
                } else {
                    $check = false;
                }
                if ($_POST["dia_chi"] !== "") {
                    $dia_chi = $_POST['dia_chi'];
                    $data['checkForm']['dia_chi'] = false;//Số điện thoại đã được điền
                } else {
                    $check = false;
                }
                $gioi_tinh = $_POST['gioi_tinh'];
                if ($check) {
                    (new TaiKhoan)->updateAll($tai_khoan, $mat_khau, $hinh_anh, $email, $so_dien_thoai, $dia_chi, $gioi_tinh);
                    $data['success'] = "Sửa thành công!";
                    return $this->index($data);
                }
            }

            return $this->render("client/taikhoan/update", $data);
        } else {
            return header('location: /');
        }
    }
}
?>