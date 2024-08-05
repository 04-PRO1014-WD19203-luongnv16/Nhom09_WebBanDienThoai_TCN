<?php 
namespace MVC\Controllers\clients;
use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\ChiTietDonHang;
use MVC\Models\DonHang;
use MVC\Models\SanPham;
use MVC\Models\TrangThaiDonHang;

class ChiTietDonHangController extends Controller {

    public function detail($data = []) {
        if(isset($_SESSION['id'])) {
            if(isset($_GET['id']) && $_GET['id']!="") {
                $data['hoadons'] = (new DonHang)->find($_GET['id']);
                if(!empty($data['hoadons'])){
                    if($data['hoadons']['id_tai_khoans'] == $_SESSION['id']) {
                        $data['chiTietDonHangs'] = (new ChiTietDonHang)->selectByIdDonHang($_GET['id']);
                        $data['bienthes'] = (new BienThe)->all();
                        $data['sanphams'] = (new SanPham)->all();
                        $data['trangthais'] = (new TrangThaiDonHang)->all();
                        $data['title'] = "Chi tiết hóa đơn";
                        if(isset($_POST['btn-submit'])) {
                            if($data['hoadons']['trang_thai'] == 1) {
                                (new DonHang)->huyDon($_POST['id']);
                                $data['success'] = "Hủy đơn hàng thành công!";
                                return (new TaiKhoanController)->index($data);
                            }else {
                                $data['error'] = "Đơn hàng đã được xác nhận, bạn không thể hủy nó!";
                            }
                        }
                        return $this->render('/client/hoadon/detail', $data);
                    }
                }
                else {
                    $data['error'] = "Hóa đơn không tồn tại";
                    return (new TaiKhoanController)->index($data);
                }
            }
        }
    }
}
?>