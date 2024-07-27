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

    // public function add($id_tai_khoans, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_ma_giam_gias, $thanh_toan, $trang_thai)
    // {
    //     $sql = "INSERT INTO $this->table(id_tai_khoans, ten_nguoi_nhan, dia_chi, email, so_dien_thoai, tong_tien, ngay_dat_hang, id_ma_giam_gias,id_thanh_toans, trang_thai)
    //      VALUES('$id_tai_khoans', '$ten_nguoi_nhan', '$dia_chi', '$email', '$so_dien_thoai', '$tong_tien', '$ngay_dat_hang', '$id_ma_giam_gias', '$thanh_toan', '$trang_thai')";
    //     $this->setQuery($sql);
    //     return $this->Execute();
    // }
    public function update($id, $trangthai)
    {
        $sql = "UPDATE $this->table SET trang_thai = '$trangthai' WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }

    public function find($id)
    {

        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
    public function create1($id_tai_khoan, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_thanh_toan, $trang_thai = 1)
    {
        $sql = "INSERT INTO $this->table(id_tai_khoans, ten_nguoi_nhan, dia_chi, email, so_dien_thoai, tong_tien, ngay_dat_hang, id_thanh_toans, trang_thai) 
            VALUE('$id_tai_khoan', '$ten_nguoi_nhan', '$dia_chi', '$email', '$so_dien_thoai', '$tong_tien', '$ngay_dat_hang', '$id_thanh_toan', '$trang_thai')";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function create2($id_tai_khoan, $ten_nguoi_nhan, $dia_chi, $email, $so_dien_thoai, $tong_tien, $ngay_dat_hang, $id_ma_giam_gias, $id_thanh_toan, $trang_thai = 1)
    {
        $sql = "INSERT INTO $this->table(id_tai_khoans, ten_nguoi_nhan, dia_chi, email, so_dien_thoai, tong_tien, ngay_dat_hang, id_ma_giam_gias, id_thanh_toans, trang_thai) 
            VALUE('$id_tai_khoan', '$ten_nguoi_nhan', '$dia_chi', '$email', '$so_dien_thoai', '$tong_tien', '$ngay_dat_hang', '$id_ma_giam_gias', '$id_thanh_toan', '$trang_thai')";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function selectNew()
    {
        $sql = "SELECT * FROM $this->table ORDER BY id  DESC";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
