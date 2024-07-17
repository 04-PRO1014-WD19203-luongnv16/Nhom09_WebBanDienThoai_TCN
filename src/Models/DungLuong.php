<?php

namespace MVC\Models;

use MVC\Model;

class DungLuong extends Model
{
    protected $table = "dung_luongs";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
