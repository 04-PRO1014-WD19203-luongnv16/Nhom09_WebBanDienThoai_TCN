<?php

namespace MVC\Models;

use MVC\Model;

class ChiTietDonHang extends Model
{
    protected $table = "chi_tiet_don_hangs";

    public function all() {

    }
    public function insert($id_don_hangs, $id_bien_thes, $id_san_pham, $so_luong, $gia_san_pham) {
        $sql = "INSERT INTO $this->table(id_don_hangs, id_bien_thes, id_san_phams, so_luong, gia_san_pham) VALUE($id_don_hangs, $id_bien_thes, $id_san_pham, $so_luong, $gia_san_pham)";
        $this->setQuery($sql);
        return $this->Execute();
    }
    
    public function delete() {
        
    }
}