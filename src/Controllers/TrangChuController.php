<?php 
namespace MVC\Controllers;

use MVC\Controller;

class TrangChuController extends Controller {
    public function index() {
        $title = "trang chủ";
        $this->render('client/index',['title'=>$title]);
    }
}
?>