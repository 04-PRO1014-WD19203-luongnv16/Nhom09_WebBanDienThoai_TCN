<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\DanhMuc;
use MVC\Models\SanPham;

class CuaHangController extends Controller {
    protected $sanphams;
    public function __construct()
    {
        $this->sanphams = (new SanPham);
    }
    public function index() {
        $data['title'] = "Danh sách sản phẩm";
        $data['sanphams'] = $this->sanphams->sanPham();
        return $this->render('client/sanpham/index',$data);
    }
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