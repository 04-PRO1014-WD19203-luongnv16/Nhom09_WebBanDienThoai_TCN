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
    public function allSanPhamDanhMucs($danhmuc)
    {
        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) 
        AS so_luong_ton FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams where san_phams.id_danh_mucs= $danhmuc GROUP BY san_phams.id ";
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
    public function mauSac($id)
    {
        $sql = "SELECT bien_thes.id_san_phams, bien_thes.id_mau_sacs, mau_sacs.ten_mau_sac FROM bien_thes JOIN mau_sacs ON bien_thes.id_mau_sacs = mau_sacs.id WHERE id_san_phams = $id GROUP BY bien_thes.id_san_phams, bien_thes.id_mau_sacs";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function dungLuong($id)
    {
        $sql = "SELECT bien_thes.id_san_phams, bien_thes.id_dung_luongs, dung_luongs.ten_dung_luong FROM bien_thes JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id WHERE id_san_phams = $id GROUP BY bien_thes.id_san_phams, bien_thes.id_dung_luongs";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    // tìm id sản phẩm mới nhất
    public function idSanPham()
    {
        $sql = "SELECT MAX(id) AS id_san_pham FROM san_phams";
        $this->setQuery($sql);
        return $this->GetOne();
    }

    public function searchSanPham($search)
    {
        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) AS so_luong_ton FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams WHERE ten_san_pham LIKE '%$search%' GROUP BY san_phams.id";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
