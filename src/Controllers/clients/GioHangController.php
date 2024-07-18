<?php 
namespace MVC\Controllers\clients;
use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\GioHang;
use MVC\Models\SanPham;

class GioHangController extends Controller {
    protected $giohang;
    public function __construct() {
        $this->giohang = new GioHang();
    }
    
    public function index() {
        if (isset($_SESSION['id'])) {
            $data['title'] = "Giỏ  hàng";
        $data['giohangs'] = $this->giohang->selectAll();
        $data['bienthes'] = (new BienThe)->all();
        $data['sanphams'] = (new SanPham)->all();
             $this->render("client/giohang/index",$data);
        }
        else {
            return header('location: /login');
        }
    }
    public function delete() {
        if (isset($_SESSION['id'])) {
            echo "hihi";
            if (isset($_POST['submit'])) {
                echo "hihi";
                $giohangs = $this->giohang->selectAll();
                foreach ($giohangs as $giohang) {
                    if ($giohang['id'] == $_POST['id']) {
                        (new GioHang)->delete($_POST['id']);
                        header('location: /gio-hang');
                    }
                }
            }
        }
    }
}
?>