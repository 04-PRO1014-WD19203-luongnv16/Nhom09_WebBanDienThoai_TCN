<?php

namespace MVC\Models;

use MVC\Model;

class BienThe extends Model
{
    protected $table = "bien_thes";
    public function all()
    {
        $sql = "SELECT bien_thes.id,bien_thes.id_san_phams,bien_thes.id_mau_sacs,mau_sacs.ten_mau_sac,bien_thes.id_dung_luongs,dung_luongs.ten_dung_luong,bien_thes.so_luong,bien_thes.gia_goc,bien_thes.gia_ban FROM $this->table 
        INNER JOIN mau_sacs ON bien_thes.id_mau_sacs = mau_sacs.id
        INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id";
        $this->setQuery($sql);
        return $this->GetAll();
    }

    // SELECT by id
    public function one($id) {
        $sql = "SELECT bien_thes.id,bien_thes.id_san_phams,bien_thes.id_mau_sacs,mau_sacs.ten_mau_sac,bien_thes.id_dung_luongs,dung_luongs.ten_dung_luong,bien_thes.so_luong,bien_thes.gia_goc,bien_thes.gia_ban FROM $this->table
        INNER JOIN mau_sacs ON bien_thes.id_mau_sacs = mau_sacs.id 
        INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id WHERE bien_thes.id = $id;";
    }

    public function selectByID($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }

    // SELECT by id_san_phams
    public function selectBy($id_san_phams) {
        $sql = "SELECT * FROM $this->table WHERE id_san_phams = $id_san_phams";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function getId($id_san_phams = "", $id_mau_sacs = "", $id_dung_luongs = "") {
        $sql = "SELECT * FROM $this->table WHERE id_san_phams = '$id_san_phams' AND id_mau_sacs = '$id_mau_sacs' AND id_dung_luongs = '$id_dung_luongs'";
        $this->setQuery($sql);
        return $this->GetOne();
    }
}
