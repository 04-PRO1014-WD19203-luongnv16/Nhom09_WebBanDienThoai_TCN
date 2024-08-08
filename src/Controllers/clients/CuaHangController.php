<?php
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\DanhGia;
use MVC\Models\DanhMuc;
use MVC\Models\GioHang;
use MVC\Models\SanPham;
use MVC\Models\TaiKhoan;

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
        $data["danhGias"] = (new DanhGia)->allDanhGia();
        // var_dump($data['danhGias']);
        if(isset($_POST['submit'])){
            $id_danhmuc=$_POST['id_danhmuc'];
            if($id_danhmuc == 'all'){
                $data['sanphams'] = $this->sanphams->sanPham();
            }else{
                $data['sanphams'] = $this->sanphams->allSanPhamDanhMucs($id_danhmuc);
            }
        }else{
            $data['sanphams'] = $this->sanphams->sanPham();
        }
        if(isset($_GET['btn-search'])) {
            $search = $_GET['search'];
            $data['sanphams'] = $this->sanphams->searchSanPham($search);
            if(empty($data['sanphams'])) {
                $data['sanphams'] = $this->sanphams->sanPham();
            }
        }
        return $this->render('client/sanpham/index',$data);

    }

    public function loadListDM(){
        // echo $_GET['id'];
        $data['danhmucs'] = $this->danhmucs->all();
        if($_GET['id']){
            $id_danhmuc=$_GET['id'];
            $data['sanphams'] = $this->sanphams->allSanPhamDanhMucs($id_danhmuc);
        }
        return $this->render('client/sanpham/index',compact('data'));
    }

        
    public function detail()
    {
        if (isset($_GET['id'])) {
            $data['taiKhoans'] = (new TaiKhoan)->all();
            $data['sanpham'] = $this->sanphams->chiTietSanPham($_GET['id']);
            $data['title'] = $data['sanpham']['ten_san_pham'];
            $data['danhmucs'] = (new DanhMuc)->all();
            $data['bienthes'] = (new BienThe)->selectBy($_GET['id']);//Biến thể của sản phẩm
            $data['bienTheS'] = (new BienThe)->all();//Tất cả biến thể
            $data['mausacs'] = $this->sanphams->mauSac($_GET['id']);
            $data['dungluongs'] = $this->sanphams->dungLuong($_GET['id']);

            // Hiển thị đánh giá
            $data['danhGias'] = (new DanhGia)->list();
            if (isset($_POST['submit'])) {
                $bienthe = (new BienThe())->getId($_POST['id'], $_POST['mau_sac'], $_POST['dung_luong']);
                // var_dump($bienthe);
                if ($bienthe) {
                    if ($_POST['so_luong'] > $bienthe['so_luong']) {
                        $data['error'] = "Số lượng tồn kho không đủ!";
                    } else {
                        if (isset($_SESSION['tai_khoan']) || isset($_SESSION['id'])) {
                            $check = true;
                            $gioHangs = (new GioHang)->selectAll();
                            $inSanPham = [];
                            foreach ($gioHangs as $gioHang) {
                                if ($gioHang['id_bien_thes'] == $bienthe['id']) {
                                    $check = false;
                                    // $data['error'] = "Sản phẩm đã có trong giỏ hàng"; 
                                    $inSanPham = (new GioHang)->selectOne($gioHang['id']);
                                    break;
                                }
                            }
                            if($check) {
                                (new GioHang)->add($bienthe['id'], $_POST['so_luong'], $_SESSION['id']);
                                $data['success'] = "Thêm vào giỏ hàng thành công!";
                            }
                            else {
                                $so_luong = $inSanPham['so_luong']+$_POST['so_luong'];
                                if($so_luong > $bienthe['so_luong']) {
                                    $data['error'] = "Số lượng tồn kho không đủ!";
                                }
                                else {
                                    (new GioHang)->updateSoLuong($so_luong,$inSanPham['id']);
                                    $data['success'] = "Tăng số lượng thành công!";
                                }
                            }

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