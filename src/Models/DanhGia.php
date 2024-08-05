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
    public function selectSoLuot()
    {
        $sql = "SELECT so_luot AS COUNT(*) FROM $this->table WHERE";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    public function diemSoAVG($id_san_phams) {
        $sql = "SELECT AVG(diem_so) AS diem_so FROM $this->table WHERE id_san_phams=$id_san_phams";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
