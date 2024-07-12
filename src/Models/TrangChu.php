<?php 
namespace MVC\Models;

use MVC\Model;

class TrangChu extends Model {

    public function get_sanphamHome(){
        $sql = "SELECT * FROM san_phams WHERE 1 ORDER BY ngay_tao DESC LIMIT 0,5 ";
        $this->setQuery($sql);
        return $this->GetAll();

    }
   
}
?>