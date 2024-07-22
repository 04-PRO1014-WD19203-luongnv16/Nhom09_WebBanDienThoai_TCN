<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\DanhMuc;
use MVC\Models\SanPham;

class CuaHangController extends Controller {
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
        
        if (isset($_GET['id'])) {
            $data = [];
            $data['sanphams'] = 
            $data['sanpham'] = $this->sanphams->chiTietSanPham($_GET['id']);
            $data['title']= $data['sanpham']['ten_san_pham'];
            $data['danhmucs'] = (new DanhMuc)->all();
            $data['bienthes'] = (new BienThe)->all();
            return $this->render('client/sanpham/detail', $data);
        }
        else {
            return header('location: /');
        }
    }
}
?>