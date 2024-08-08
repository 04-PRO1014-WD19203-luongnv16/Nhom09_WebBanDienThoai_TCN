<?php 
namespace MVC\Controllers\clients;

use LengthException;
use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\ChiTietDonHang;
use MVC\Models\DanhGia;
use MVC\Models\DonHang;
use MVC\Models\SanPham;
use MVC\Models\TaiKhoan;

class DanhGiaSanPhamController extends Controller {

    public function index() {
        if(isset($_SESSION['id'])) {
            $data['title'] = "Đánh giá";
            $data['taiKhoan'] = (new TaiKhoan)->findOne($_SESSION['id']);
            $data['donHangs'] = (new DonHang)->selectAll();
            $data['sanPhams'] = (new SanPham)->all();
            $data['bienThes'] = (new BienThe)->all();
            $data['chiTietDonHangs'] = (new ChiTietDonHang)->all();
            return $this->render("client/danhgia/index", $data);
        }
        else {
            return header("location: /login");
        }
    }
    public function createDanhGia() {
        if(isset($_SESSION["id"])) {
            $data['title'] = "Viết đánh giá";
            $chiTietDonHang = (new ChiTietDonHang)->find($_POST["id_Chi_Tiet_Don_Hang"]);
            $data['chiTietDonHang'] = $chiTietDonHang;
            $data["sanPham"] = (new SanPham)->chiTietSanPham($chiTietDonHang['id_san_phams']);
            $data["bienThe"] = (new BienThe)->find($chiTietDonHang['id_bien_thes']);
            $data["diemSo"] = (new DanhGia)->diemSoAVG($chiTietDonHang['id_san_phams']);
            if(isset($_POST['btn-submit'])) {
                $check = true;
                // Validate điểm số
                if(isset($_POST['diem_so']) && $_POST['diem_so'] == "") {
                    $data['valida_Diem_So'] = "Không thể bỏ trống trường điểm số!";
                    $check = false;
                }else{
                    $data['valida_Diem_So'] = NULL;
                    if (!is_float($_POST['diem_so'])) {
                        $data['valida_Diem_So'] = "Điểm số phải là chữ";
                        if ($_POST['diem_so']>5 || $_POST['diem_so']<1) {
                            $data['valida_Diem_So'] = "Điểm số không thể lớn hơn 5 hoặc nhỏ hơn 1";
                            $check = false;
                        }
                    }
                    
                }
                // Validate nội dung
                if(isset($_POST['noi_dung']) && $_POST['noi_dung'] == "") {
                    $data['valida_Noi_Dung'] = "Không thể bỏ trống trường nội dung!";
                    $check = false;
                }else {
                    $data['valida_Noi_Dung'] = NULL;
                    if(strlen($_POST['noi_dung'])>255) {
                        $data['valida_Noi_Dung'] = "Nội dung không thể vượt quá 255 ký tự!";
                        $check = false;
                    }
                }
                // Gửi đánh giá
                if($check) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    if($chiTietDonHang['danh_gia']==NULL) {
                        (new DanhGia)->insertDanhGia($_POST['diem_so'],$_POST['noi_dung'],$date,$_SESSION['id'],$_POST['id_bien_the'],$_POST['id_san_phams']);
                        (new ChiTietDonHang)->trangThaiDanhGia($_POST['id_Chi_Tiet_Don_Hang']);
                        $data['success'] = "Gửi đánh giá thành công!";
                    }else {
                        $data['error'] = "Bạn đá đánh giá đơn này rồi!";
                    }
                    return (new TaiKhoanController)->index($data);
                }
            }
            return $this->render("client/danhgia/create",$data);
        }
        else{
            return header("location: /login");
        }
    }
}
?>