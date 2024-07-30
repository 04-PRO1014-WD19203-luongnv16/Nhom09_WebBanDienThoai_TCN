<?php

namespace MVC\Models;

use MVC\Model;

class TrangThaiTaiKHoan extends Model
{

    protected $table = "trang_thai_tai_khoans";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
