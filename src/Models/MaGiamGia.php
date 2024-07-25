<?php 
namespace MVC\Models;

use MVC\Model;

class MaGiamGia extends Model {

    protected $table = "ma_giam_gias";
    public function all(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
   
}
?>