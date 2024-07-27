<?php 
namespace MVC\Controllers\Clients;
use MVC\Controller;
use MVC\Models\DonHang;

class TaiKhoanController extends Controller {

    public function index($data = []) {
        if(isset($_SESSION['id'])) {
            $data['title'] = "Tài khoản";
            $data['donhangs'] = (new DonHang)->selectAll();
            if(isset($_GET['btn-search'])) {
                $data['donhangs'] = (new DonHang)->selectSearch($_GET['search']);
                if(empty($data['donhangs'])) {
                    $data['donhangs'] = (new DonHang)->selectAll();
                    $data['error'] = "Không tìm thấy mã đơn!";
                }
            }
        return $this->render("client/taikhoan/index", $data);
        }
    }
}
?>