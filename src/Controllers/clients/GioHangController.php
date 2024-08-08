<?php 
namespace MVC\Controllers\clients;
use MVC\Controller;
use MVC\Models\BienThe;
use MVC\Models\DanhMuc;
use MVC\Models\GioHang;
use MVC\Models\SanPham;

class GioHangController extends Controller {
    protected $giohang;
    protected $danhmucs;
    public function __construct() {
        $this->giohang = new GioHang();
        $this->danhmucs = new DanhMuc();
    }
    


    public function index($data = []) {

        if (isset($_SESSION['id'])) {
            $data['title'] = "Giỏ  hàng";
        $data['giohangs'] = $this->giohang->selectAll();
        $data['danhmucs'] = $this->danhmucs->all();
        $data['bienthes'] = (new BienThe)->all();
        $data['sanphams'] = (new SanPham)->all();
            if (isset($_POST['reduce']) || isset($_POST['increase'])) {
                if(isset($_POST['id'])) {
                    $gioHang = $this->giohang->selectOne($_POST['id']);
                    $bienThe = (new BienThe)->selectByID($gioHang['id_bien_thes']);
                    if (isset($_POST['reduce'])) {
                        if($gioHang['so_luong']>1) {
                            $so_luong = --$gioHang['so_luong'];
                            $this->giohang->updateSoLuong($so_luong,$_POST['id']);
                        }
                    }
                    else if(isset($_POST['increase'])) {
                        if($gioHang['so_luong']<$bienThe['so_luong']) {
                            $so_luong = ++$gioHang['so_luong'];
                            $this->giohang->updateSoLuong($so_luong,$_POST['id']);
                        }
                        
                    }
                    return header('location: /gio-hang');
                }
                
            }
        $this->render("client/giohang/index",$data);
        }
        else {
            return header('location: /login');
        }
    }
    public function delete() {
        if (isset($_SESSION['id'])) {
            if (isset($_POST['submit'])) {
                $giohangs = $this->giohang->selectAll();
                foreach ($giohangs as $giohang) {
                    if ($giohang['id'] == $_POST['id'] && $_SESSION['id'] == $giohang['id_tai_khoans']) {
                        (new GioHang)->delete($_POST['id']);
                        header('location: /gio-hang');
                    }
                    else {
                        return header('location: /gio-hang');
                    }
                }
            }
        }
    }
    public function billdetal() {
    
    }
}
?>