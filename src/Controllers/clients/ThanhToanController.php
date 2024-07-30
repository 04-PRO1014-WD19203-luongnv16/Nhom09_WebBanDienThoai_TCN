<?php 
namespace MVC\Controllers\clients;
use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\ChiTietDonHang;
use MVC\Models\DonHang;
use MVC\Models\GioHang;
use MVC\Models\MaGiamGia;
use MVC\Models\SanPham;
use MVC\Models\TaiKhoan;
use MVC\Models\ThanhToan;

class ThanhToanController extends Controller {
    public function index() {
        if (isset($_SESSION['id'])) {
            $giohangs = (new GioHang)->selectAll();
            if(empty($giohangs)) {
                $data['error'] = "Giỏ hàng của bạn đang trống";
                (new GioHangController)->index($data);
            }
            $data['title'] = "Thanh tóan";
            $data['trang_thais'] = (new ThanhToan)->all();
            $data['tai_khoan'] = (new TaiKhoan)->findOne($_SESSION['id']);
                if (isset($_POST['shortcode']) && $_POST['shortcode'] != "") {
                    $ma_giam_gias = (new MaGiamGia)->all();
                    foreach($ma_giam_gias as $ma_giam_gia) {
                        if($ma_giam_gia['shortcode'] === $_POST['shortcode']) {
                            $data['giam_gia'] = $ma_giam_gia['muc_giam'];
                            $data['id_ma_giam_gias'] = $ma_giam_gia['id'];
                            break;
                        }
                    }
                }
                else {
                    $data['giam_gia'] = 0;
                    $data['id_ma_giam_gias'] = NULL;
                }
            $data['checkForm'] = [
                'ten_nguoi_nhan' => false,
                'dia_chi' => false,
                'email' => false,
                'so_dien_thoai' => false,
                'thanh_toan' => false,
            ];
            if(isset($_POST['btn-submit'])) {
                $check = true;
                if(!isset($_POST['ten_nguoi_nhan']) || $_POST['ten_nguoi_nhan'] == "") {
                    $data['checkForm']['ten_nguoi_nhan'] = true;
                    $check = false;
                }
                if(!isset($_POST['dia_chi']) || $_POST['dia_chi'] == "") {
                    $data['checkForm']['dia_chi'] = true;
                    $check = false;
                }
                if(!isset($_POST['email']) || $_POST['email'] == "") {
                    $data['checkForm']['email'] = true;
                    $check = false;
                }
                if(!isset($_POST['so_dien_thoai']) || $_POST['so_dien_thoai'] == "") {
                    $data['checkForm']['so_dien_thoai'] = true;
                    $check = false;
                }
                if(!isset($_POST['thanh_toan'])) {
                    $data['checkForm']['thanh_toan'] = true;
                    $check = false;
                }
                if($check) {
                    $this->payment();
                }
                
            }
            $this->render("client/thanhtoan/index",$data);
        }
        else{
            header('location: /login');
        }
        
    }
    public function payment() {
        if (isset($_SESSION['id'])) {
            if (isset($_POST['btn-submit'])) {

                // die;
                $id_tai_khoan = $_SESSION['id'];
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
                $dia_chi = $_POST['dia_chi'];
                $email = $_POST['email'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $tong_tien = $_POST['tong_tien'];
                // Đặt thời gian
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay_dat_hang = date('Y-m-d H:i:s');
                $id_thanh_toan = $_POST['thanh_toan'];
                if(!isset($_POST['id_ma_giam_gias']) || $_POST['id_ma_giam_gias'] == "") {
                //    Khi không sử dụng mã giảm giá
                (new DonHang)->create1($id_tai_khoan, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_thanh_toan);
                }
                else{
                //    Khi có sử dụng mã giảm giá
                $id_ma_giam_gias = $_POST['id_ma_giam_gias'];
                (new DonHang)->create2($id_tai_khoan, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_ma_giam_gias, $id_thanh_toan);
                }
                $donHang = (new DonHang)->selectNew();
                $gioHangs = (new GioHang)->selectAll();
                $bienThes = (new BienThe)->all();
                foreach ($gioHangs as $gioHang) {
                    foreach ($bienThes as $bienThe) {
                        if($gioHang['id_bien_thes'] == $bienThe['id']) {
                            (new ChiTietDonHang)->insert($donHang['id'], $gioHang['id_bien_thes'], $bienThe['id_san_phams'], $gioHang['so_luong'], $bienThe['gia_ban']);
                            $so_luong = $bienThe['so_luong'] - $gioHang['so_luong'];
                            (new BienThe)->updateSoLuong($gioHang['id_bien_thes'],$so_luong);
                        }
                    }
                }
                (new GioHang)->resetGioHang($_SESSION['id']);
                return header('location: /check-out');
            }
            else{
                return $this->render('layouts/error/404');
            }
        }else{
            header('location: /login');
        }
    }
    public function checkout() {
        $data['title'] = "Thanh toán thành công";
        return $this->render('client/thanhtoan/checkout',$data);
    }
}
?>