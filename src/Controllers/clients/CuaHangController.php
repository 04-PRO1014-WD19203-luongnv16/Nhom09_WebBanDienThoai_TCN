<?php
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\DanhMuc;
use MVC\Models\GioHang;
use MVC\Models\SanPham;

class CuaHangController extends Controller
{
    protected $sanphams;
    public function __construct()
    {
        $this->sanphams = (new SanPham);
    }
    public function index()
    {
        $data['title'] = "Danh sách sản phẩm";
        $data['sanphams'] = $this->sanphams->sanPham();
        return $this->render('client/sanpham/index', $data);
    }
    public function detail()
    {

        if (isset($_GET['id'])) {
            $data = [];
            $data['sanphams'] =
                $data['sanpham'] = $this->sanphams->chiTietSanPham($_GET['id']);
            $data['title'] = $data['sanpham']['ten_san_pham'];
            $data['danhmucs'] = (new DanhMuc)->all();
            $data['bienthes'] = (new BienThe)->selectBy($_GET['id']);
            $data['mausacs'] = $this->sanphams->mauSac($_GET['id']);
            $data['dungluongs'] = $this->sanphams->dungLuong($_GET['id']);
            if (isset($_POST['submit'])) {
                $bienthe = (new BienThe())->getId($_POST['id'], $_POST['mau_sac'], $_POST['dung_luong']);
                // var_dump($bienthe);
                if ($bienthe) {
                    if ($_POST['so_luong'] > $bienthe['so_luong']) {
                        $data['error'] = "Số lượng tồn kho không đủ";
                    } else {
                        if (isset($_SESSION['tai_khoan']) || isset($_SESSION['id'])) {
                            (new GioHang)->add($bienthe['id'], $_POST['so_luong'], $_SESSION['id']);
                            return header('location: /gio-hang');
                        }
                        else {
                            header('location: /login');
                            echo"<script>confirm('Bạn cần đăng nhập để sử dụng giỏ hàng!')</script>";
                        }
                    }
                }
            }
            return $this->render('client/sanpham/detail', $data);
        } else {
            return header('location: /');
        }
    }
}
?>