<?php

namespace MVC\Models;

use MVC\Model;

class DonHang extends Model
{
    protected $table = "don_hangs";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function add($id_tai_khoans, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_ma_giam_gias, $thanh_toan, $trang_thai)
    {
        $sql = "INSERT INTO $this->table(id_tai_khoans, ten_nguoi_nhan, dia_chi, email, so_dien_thoai, tong_tien, ngay_dat_hang, id_ma_giam_gias,id_thanh_toans, trang_thai)
         VALUES('$id_tai_khoans', '$ten_nguoi_nhan', '$dia_chi', '$email', '$so_dien_thoai', '$tong_tien', '$ngay_dat_hang', '$id_ma_giam_gias', '$thanh_toan', '$trang_thai')";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function one($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
