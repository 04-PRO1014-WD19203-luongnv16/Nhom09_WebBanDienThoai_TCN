<?php 
namespace MVC\Controllers\admins;
use MVC\Controller;
use MVC\Models\DanhGia;

    class DanhGiaController extends Controller{
        protected $danhgia;
        public function __construct(){
            $this->danhgia = new DanhGia();
        }

        public function AllDanhGia(){
            $title = "Quản lý đánh giá";
            $danhgia = $this->danhgia->listDanhGia();
            return $this->renderAdmin('danhgia/index', compact('danhgia','title'));
        }

        public function thongKe(){
            $title = "Thông kê đánh giá";
            $thongke = $this->danhgia->thongKeDanhGia();

            //  var_dump($thongke);
            return $this->renderAdmin('danhgia/thongke', compact('title','thongke'));
        }
    }

?>