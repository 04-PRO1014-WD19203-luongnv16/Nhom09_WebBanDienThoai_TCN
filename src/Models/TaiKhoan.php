<?php 
namespace MVC\Models;

use MVC\Model;

class TaiKhoan extends Model {
    protected $table = "tai_khoans";
    public function all() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll($sql);
    }
    public function findOne($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne($sql);
    }
    public function insert_taikhoan($tai_khoan,$mat_khau,$email,$dia_chi,$gioi_tinh,$so_dien_thoai){
        $sql = "INSERT INTO `tai_khoans`(`tai_khoan`, `mat_khau`, `email`, `dia_chi`, `gioi_tinh`, `so_dien_thoai`,`trang_thai`)
        VALUES ('$tai_khoan','$mat_khau','$email','$dia_chi','$gioi_tinh','$so_dien_thoai',1)";
        $this->setQuery($sql);
        $this->Execute();
    }
}
?>