<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\TrangChu;

class TrangChuController extends Controller {
    protected $home;
    public function __construct(){
        $this->home = new TrangChu();
    }

    public function index() {
        $trangchu=$this->home->get_sanphamHome();
        $this->render('client/index',compact('trangchu'));
    }

    
}
?>