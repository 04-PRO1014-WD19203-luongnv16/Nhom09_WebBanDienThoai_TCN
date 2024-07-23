<?php 
namespace MVC\Models;

use MVC\Model;

class TrangThaiDonHang extends Model {

    protected $table = "trang_thai_don_hangs";
    public function all(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
   
}
?>