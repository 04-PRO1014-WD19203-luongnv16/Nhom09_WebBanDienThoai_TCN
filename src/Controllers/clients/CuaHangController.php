<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;

class CuaHangController extends Controller {
    public function index() {
        $data['title'] = "Danh sách sản phẩm";
        return $this->render('client/sanpham/index',$data);
    }
}
?>