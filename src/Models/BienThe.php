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
    public function find($id)
    {
        $sql = "SELECT bien_thes.*,mau_sacs.ten_mau_sac,dung_luongs.ten_dung_luong
         FROM bien_thes
        INNER JOIN mau_sacs ON bien_thes.id_mau_sacs = mau_sacs.id 
-- <<<<<<< HEAD
        INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id WHERE bien_thes.id = $id;";
        $this->setQuery($sql);
        return $this->GetOne();
        // =======
        //         INNER JOIN dung_luongs ON bien_thes.id_dung_luongs = dung_luongs.id
        //         INNER JOIN san_phams ON  bien_thes.id_san_phams = san_phams.id
        //         WHERE bien_thes.id_san_phams = '$id_san_pham'  ";
        //         $this->setQuery($sql);
        //         return $this->GetAll();
        // >>>>>>> ec5ecb110c42200980d69e329409b1daa1bd97d5
    }

    public function selectByID($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->setQuery($sql);
        return $this->GetOne();
    }

    // SELECT by id_san_phams
    public function selectBy($id_san_phams)
    {
        $sql = "SELECT * FROM $this->table WHERE id_san_phams = $id_san_phams";
        $this->setQuery($sql);
        return $this->GetAll();
    }
    public function getId($id_san_phams = "", $id_mau_sacs = "", $id_dung_luongs = "")
    {
        $sql = "SELECT * FROM $this->table WHERE id_san_phams = '$id_san_phams' AND id_mau_sacs = '$id_mau_sacs' AND id_dung_luongs = '$id_dung_luongs'";
        $this->setQuery($sql);
        return $this->GetOne();
    }
    public function add($idSps, $id_dung_luongs, $id_mau_sacs, $so_luong, $gia_goc, $gia_ban)
    {
        $sql = "INSERT INTO $this->table(id_san_phams,id_dung_luongs,id_mau_sacs,so_luong,gia_goc,gia_ban) 
        VALUES('$idSps','$id_dung_luongs','$id_mau_sacs','$so_luong','$gia_goc','$gia_ban')";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function update($id, $idSps, $id_dung_luongs, $id_mau_sacs, $so_luong, $gia_goc, $gia_ban)
    {
        $sql = "UPDATE $this->table SET id_san_phams = '$idSps',id_mau_sacs= '$id_mau_sacs ',id_dung_luongs= '$id_dung_luongs ',so_luong ='$so_luong',gia_goc= '$gia_goc',gia_ban='$gia_ban ' WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
    public function updateSoLuong($id, $so_luong)
    {
        $sql = "UPDATE $this->table SET so_luong = $so_luong WHERE id = $id";
        $this->setQuery($sql);
        return $this->Execute();
    }
}
