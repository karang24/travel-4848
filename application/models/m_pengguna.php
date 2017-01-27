<?php
class M_pengguna extends CI_Model{
    private $table="tb_pengguna";
    
    function cek($username,$password,$level){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
		$this->db->where("level",$level);
        return $this->db->get("tb_pengguna");
    }
    
    function semua(){
        return $this->db->get("tb_pengguna");
    }
    
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("tb_pengguna");
    }
    
    function cekId($kode){
        $this->db->where("user_id",$kode);
        return $this->db->get("tb_pengguna");
    }
    
    function update($id,$info){
        $this->db->where("user_id",$id);
        $this->db->update("tb_pengguna",$info);
    }
    
    function simpan($info){
        $this->db->insert("tb_pengguna",$info);
    }
    
    function hapus($id){
        $this->db->where("user_id",$id);
        $this->db->delete("tb_pengguna");
    }
}