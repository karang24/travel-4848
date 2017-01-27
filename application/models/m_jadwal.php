<?php
class M_jadwal extends CI_Model{
    private $table="tb_jadwal";
	private $tb="tb_kursi";
	var $tabel ='tb_jadwal';  //variabel tabelnya
    private $primary="id_jadwal";
    
    function semua(){
		return $this->db->get("tb_jadwal");
	}
	
	function get_kursi(){
		return $this->db->get("tb_kursi");
	}
    
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
    
    function update($kode,$jenis){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
    }
    
    function hapus($id){
        $this->db->where($this->primary,$id);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("tujuan",$cari);
        return $this->db->get($this->table);
    }
	
	function get_all() {
        $this->db->from(
		$this->tabel);
        $query = $this->db->get();	//cek apakah ada data
        if($query->num_rows() > 0) {	//jika ada maka jalankan
            return
			$query->result();
        }
    }
    
}