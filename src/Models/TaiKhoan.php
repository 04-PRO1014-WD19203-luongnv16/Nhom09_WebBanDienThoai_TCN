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
}
?>