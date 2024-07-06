<?php 
namespace MVC\Controllers;

use MVC\Controller;

class LoginController extends Controller {
    public function index() {
        $validate = [
            "tai_khoan" => false,
            "mat_khau" => false
        ];
        if (isset($_POST['btn-submit'])) {
            if ($_POST['tai_khoan'] == "") {
                $validate['tai_khoan'] = true;
            }
            if ($_POST['mat_khau'] == "") {
                $validate['mat_khau'] = true;
            }
            
        }
        $this->render('/login', ['validate'=>$validate]);
    }
}
?>