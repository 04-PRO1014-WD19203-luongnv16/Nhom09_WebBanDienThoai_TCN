<?php 
namespace MVC\Models;

use MVC\Model;

class BienThe extends Model {
    protected $table = "bien_thes";
    public function all() {
        $sql = "SELECT bien_thes.id,bien_thes.id_san_phams,bien_thes.id_mau_sacs,mau_sacs.ten_mau_sac,bien_thes.id_dung_luongs,dung_luongs.ten_dung_luong,bien_thes.so_luong,bien_thes.gia_goc,bien_thes.gia_ban FROM $this->table 
        INNER JOIN mau_sacs ON bien_thes.id_mau_sacs = mau_sacs.id
        INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id";
        $this->setQuery($sql);
        return $this->GetAll();
    }
}
?>