<?php 
    namespace MVC\Models;

use MVC\Model;

class DanhMuc extends Model {
    protected $table = "danh_mucs";
    public function all() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function one($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }
    public function update($id, $ten_danh_muc) {
        $sql = "UPDATE $this->table SET ten_danh_muc = '$ten_danh_muc' WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function add($ten_danh_muc) {
        $sql = "INSERT INTO $this->table(ten_danh_muc) VALUES('$ten_danh_muc')";
        $this->setQuery($sql);
        return $this->Execute();
    }
}
?>