<?php

namespace MVC\Models;

use MVC\Model;

class MauSac extends Model
{
    protected $table = "mau_sacs";
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
