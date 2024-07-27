<?php

namespace MVC\Models;

use MVC\Model;

class ChiTietDonHang extends Model
{
    protected $table = "chi_tiet_don_hangs";

    public function all()
    {

    }

    public function insert($id_don_hangs, $id_bien_thes, $id_san_pham, $so_luong, $gia_san_pham) {
        $sql = "INSERT INTO $this->table(id_don_hangs, id_bien_thes, id_san_phams, so_luong, gia_san_pham) VALUE($id_don_hangs, $id_bien_thes, $id_san_pham, $so_luong, $gia_san_pham)";
        $this->setQuery($sql);
        return $this->Execute();
    }

    public function delete()
    {
    }
    public function showSanPham($id_don_hang)
    {
        $sql = "SELECT chi_tiet_don_hangs.*,bien_thes.gia_ban,san_phams.ten_san_pham,san_phams.anh_chinh,mau_sacs.ten_mau_sac,dung_luongs.ten_dung_luong,don_hangs.tong_tien FROM chi_tiet_don_hangs
        INNER JOIN bien_thes ON chi_tiet_don_hangs.id_bien_thes=bien_thes.id
        INNER JOIN san_phams ON chi_tiet_don_hangs.id_san_phams =san_phams.id
        INNER JOIN mau_sacs ON bien_thes.id_mau_sacs =mau_sacs.id
        INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id 
        INNER JOIN don_hangs ON chi_tiet_don_hangs.id_don_hangs = don_hangs.id
        WHERE chi_tiet_don_hangs.id_don_hangs='$id_don_hang'  ";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function selectByIdDonHang($id_don_hangs) {
        $sql = "SELECT * FROM $this->table WHERE id_don_hangs = $id_don_hangs";
        $this->setQuery($sql);
        return $this->GetAll();
    }

}
