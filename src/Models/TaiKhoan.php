<?php

namespace MVC\Models;

use MVC\Model;

class TaiKhoan extends Model
{
    protected $table = "tai_khoans";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll($sql);
    }
    public function findOne($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne($sql);
    }
    public function update($id, $trang_thai)
    {
        $sql = "UPDATE $this->table SET trang_thai = '$trang_thai' WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function insert_taikhoan($tai_khoan, $mat_khau, $email, $dia_chi, $gioi_tinh, $so_dien_thoai)
    {
        $sql = "INSERT INTO `tai_khoans`(`tai_khoan`, `mat_khau`, `email`, `dia_chi`, `gioi_tinh`, `so_dien_thoai`,`trang_thai`)
        VALUES ('$tai_khoan','$mat_khau','$email','$dia_chi','$gioi_tinh','$so_dien_thoai',1)";
        $this->setQuery($sql);
        $this->Execute();
    }
    public function updateAll($tai_khoan, $mat_khau, $hinh_anh, $email, $so_dien_thoai, $dia_chi, $gioi_tinh) {
        $sql = "UPDATE $this->table SET tai_khoan='$tai_khoan', mat_khau='$mat_khau', hinh_anh='$hinh_anh', email='$email', so_dien_thoai='$so_dien_thoai', dia_chi='$dia_chi', gioi_tinh='$gioi_tinh' WHERE id=$_SESSION[id]";
        $this->setQuery($sql);
        $this->Execute();
    }
}
