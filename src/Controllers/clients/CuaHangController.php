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
    protected $danhmucs;
    public function __construct()
    {
        $this->sanphams = (new SanPham);
        $this->danhmucs = new DanhMuc();
    }


    public function index() {
        $data['danhmucs'] = $this->danhmucs->all();
        $data['title'] = "Danh sách sản phẩm";
        if(isset($_POST['submit'])){
            // var_dump($_POST['id_danhmuc']);
            $id_danhmuc=$_POST['id_danhmuc'];
            $data['sanphams'] = $this->sanphams->allSanPhamDanhMucs($id_danhmuc);
            // return 'ok';
        }else{
            $data['sanphams'] = $this->sanphams->sanPham();
        }
        // echo '<pre>';
        // print_r($data['sanphams']);
        // echo '</pre>';

// echo $$data['sanphams'][0]['id'];
        return $this->render('client/sanpham/index',$data);
    }
    // public function index2(){
    //     echo 1;
    // }
    public function detail() {
        
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