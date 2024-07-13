<?php 
namespace MVC\Controllers\admins;

use MVC\Controller;
use MVC\Models\SanPham;

class SanPhamController extends Controller {
    public function index() {
        $data = [];
        $data['title'] = "Quản lý sản phẩm";
        $data['sanphams'] = (new SanPham)->all();
        return $this->renderAdmin('sanpham/index',$data);
    }

}
?>