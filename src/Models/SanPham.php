<?php

namespace MVC\Models;

use MVC\Model;

class SanPham extends Model
{
    protected $table = "san_phams";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    public function one($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
    public function update($id, $ten_san_pham, $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaysua, $idDm)
    {
        $sql = "UPDATE $this->table SET ten_san_pham = '$ten_san_pham',anh_chinh= '$anh_chinh ',anh_phu_1= '$anh1 ',anh_phu_2 ='$anh2',anh_phu_3= '$anh3',mo_ta_ngan='$motangan ',mo_ta=' $mota',ngay_tao='$ngaysua',id_danh_mucs='$idDm' WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function add($ten_san_pham, $anh_chinh, $anh1, $anh2, $anh3, $motangan, $mota, $ngaytao, $idDm)
    {
        $sql = "INSERT INTO $this->table(ten_san_pham,anh_chinh,anh_phu_1,anh_phu_2,anh_phu_3,mo_ta_ngan,mo_ta,ngay_tao,id_danh_mucs) VALUES('$ten_san_pham','$anh_chinh','$anh1','$anh2','$anh3','$motangan','$mota','$ngaytao','$idDm')";
        $this->setQuery($sql);
        return $this->Execute();
    }

    public function sanPham()
    {

        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) AS so_luong_ton FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams GROUP BY san_phams.id";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    public function chiTietSanPham($id)
    {
        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) AS so_luong_tong FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams WHERE san_phams.id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
