<?php 
namespace MVC\Models;
use MVC\Model;

class GioHang extends Model {
    protected $table = "gio_hangs";

    public function selectAll() {
        $sql="SELECT * FROM $this->table WHERE id_tai_khoans = $_SESSION[id] ORDER BY id DESC";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function selectOne($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
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
    public function updateSoLuong ($so_luong,$id) {
        $sql = "UPDATE $this->table SET so_luong = $so_luong WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
}
?>