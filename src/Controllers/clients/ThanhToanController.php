<?php 
namespace MVC\Controllers\clients;
use MVC\Controller;
use MVC\Models\MaGiamGia;
use MVC\Models\TaiKhoan;
use MVC\Models\ThanhToan;
use MVC\Models\TrangThaiDonHang;

class ThanhToanController extends Controller {
    public function index() {
        if (isset($_SESSION['id'])) {
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
            $this->render("client/thanhtoan/index",$data);
        }
        else{
            header('location: /login');
        }
        
    }
    public function payment() {
        if (isset($_SESSION['id'])) {
            if (isset($_POST['btn-submit'])) {
                echo "<pre>";
                var_dump($_POST);
            }
        }else{
            header('location: /login');
        }
    }
}
?>