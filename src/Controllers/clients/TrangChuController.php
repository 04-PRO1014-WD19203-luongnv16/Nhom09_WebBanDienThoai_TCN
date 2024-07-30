<?php 
namespace MVC\Controllers\clients;

use MVC\Controller;
use MVC\Models\DanhMuc;
use MVC\Models\TrangChu;

class TrangChuController extends Controller {
    protected $home;
    protected $danhmucs;

    public function __construct(){
        $this->home = new TrangChu();
        $this->danhmucs = new DanhMuc();
    }

    public function index() {
        $trangchu=$this->home->get_sanphamHome();
        $data['danhmucs'] = $this->danhmucs->all();
        $this->render('client/index',compact('trangchu','data'));
    } 

    
}
?>