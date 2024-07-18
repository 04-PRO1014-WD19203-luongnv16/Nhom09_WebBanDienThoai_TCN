<?php 
namespace MVC\Models;
use MVC\Model;

class GioHang extends Model {
    protected $table = "gio_hangs";

    public function selectAll() {
        $sql="SELECT * FROM $this->table WHERE id_tai_khoans = $_SESSION[id]";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    public function add($id_bien_thes = "", $so_luong = "", $id_tai_khoans = "") {
        $sql = "INSERT INTO $this->table(id_bien_thes, so_luong, id_tai_khoans) VALUES ($id_bien_thes, $so_luong, $id_tai_khoans)";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
}
?>