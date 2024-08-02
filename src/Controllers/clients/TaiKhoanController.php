<?php 
namespace MVC\Controllers\Clients;
use MVC\Controller;
use MVC\Models\DanhMuc;
use MVC\Models\DonHang;

class TaiKhoanController extends Controller {

    public function index() {
        $data['danhmucs'] = (new DanhMuc)->all();
        if(isset($_SESSION['id'])) {
            $data['title'] = "Tài khoản";
            $data['donhangs'] = (new DonHang)->selectAll();
        return $this->render("client/taikhoan/index", $data);
        }
        
    }
}
?>