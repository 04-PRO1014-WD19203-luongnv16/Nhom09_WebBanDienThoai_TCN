<?php
namespace MVC\Models;

use MVC\Model;

class DanhGia extends Model
{
    protected $table = "danh_gias";
    public function listDanhGia()
    {
        $sql = "SELECT * FROM $this->table";
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