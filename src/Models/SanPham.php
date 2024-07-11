<?php 
namespace MVC\Models;

use MVC\Model;

class SanPham extends Model {
    protected $table = "san_phams";
    public function all() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
?>