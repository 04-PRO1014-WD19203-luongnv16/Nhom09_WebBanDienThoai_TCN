<?php
namespace MVC\Models;

use MVC\Model;

class DanhGia extends Model
{
    protected $table = "danh_gias";

    public function insertDanhGia($diem_so,$noi_dung,$ngay_danh_gia,$id_tai_khoans,$id_bien_thes ,$id_san_phams,$trang_thai = 1) {
        $sql = "INSERT INTO $this->table(diem_so,noi_dung,ngay_danh_gia,id_tai_khoans,id_bien_thes ,id_san_phams,trang_thai) VALUES ('$diem_so','$noi_dung','$ngay_danh_gia','$id_tai_khoans','$id_bien_thes','$id_san_phams','$trang_thai')";
        $this->setQuery( $sql );
        return $this->Execute();
    }
    public function listDanhGia()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    public function diemSoAVG($id_san_phams) {
        $sql = "SELECT AVG(diem_so) AS diem_so FROM $this->table WHERE id_san_phams=$id_san_phams";
        $this->setQuery($sql);
        return $this->GetOne();
    }
    public function allDanhGia() {
        $sql = "SELECT id_san_phams, AVG(diem_so) AS diem_so FROM danh_gias GROUP BY id_san_phams";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function list() {
        $sql = "SELECT * FROM $this->table WHERE trang_thai = 1";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function thongKeDanhGia()
    {
        $sql = "SELECT id_san_phams,ten_san_pham,anh_chinh, AVG(diem_so) AS danh_gia_trung_binh, COUNT(*) AS tong_trung_binh 
        FROM danh_gias JOIN san_phams ON danh_gias.id_san_phams=san_phams.id GROUP BY id_san_phams";
        $this->setQuery($sql);
        return $this->GetAll();
    }

}
?>
.