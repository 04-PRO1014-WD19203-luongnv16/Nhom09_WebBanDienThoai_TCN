<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\SanPham;

class CuaHangController extends Controller {
    protected $sanphams;
    public function __construct()
    {
        $this->sanphams = (new SanPham);
    }
    public function index() {
        $data['title'] = "Danh sách sản phẩm";
        $data['sanphams'] = $this->sanphams->chiTietSanPham();
        return $this->render('client/sanpham/index',$data);
    }
}
?>