<?php
class M_boking extends CI_Model{
    private $table="tb_pemesanan";
    private $primary="id_pemesan";
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
}