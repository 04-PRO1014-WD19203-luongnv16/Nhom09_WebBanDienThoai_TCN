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
    public function sanPham()
    {
        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) AS so_luong_ton FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams GROUP BY san_phams.id";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function chiTietSanPham($id)
    {
        $sql = "SELECT san_phams.*, MIN(bien_thes.gia_ban) AS gia_thap_nhat, MAX(bien_thes.gia_ban) AS gia_cao_nhat, SUM(bien_thes.so_luong) AS so_luong_ton FROM san_phams JOIN bien_thes ON san_phams.id = bien_thes.id_san_phams WHERE san_phams.id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
?>