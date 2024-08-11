<?php

namespace MVC\Models;

use MVC\Model;

class MaGiamGia extends Model
{

    protected $table = "ma_giam_gias";
    public function all()
    {
        $sql = "SELECT * FROM $this->table WHERE trang_thai=1";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function all2()
    {
        $sql = "SELECT * FROM $this->table WHERE trang_thai=0";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function all1()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function add($tenma, $shortcode, $mucgiam, $trangthai, $ngaytao, $ngayhh)
    {
        $sql = "INSERT INTO $this->table(ten_ma,shortcode,muc_giam,trang_thai,ngay_tao,ngay_het_han)
         VALUES('$tenma','$shortcode','$mucgiam','$trangthai','$ngaytao','$ngayhh')";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function delete($id)
    {
        $sql = "UPDATE $this->table SET trang_thai = 0 WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function return($id)
    {
        $sql = "UPDATE $this->table SET trang_thai = 1 WHERE id = $id";
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
