<?php 
namespace MVC\Models;

use MVC\Model;

class ThanhToan extends Model {

    protected $table = "thanh_toans";
    public function all(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
   
}
?>