<?php
class M_pemesan extends CI_Model{
    private $table="tb_pemesanan";
    private $primary="id_pemesan";
    
    function semua(){
		return $this->db->get("tb_pemesanan");
	}
    
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    function hapus($id){
        $this->db->where($this->primary,$id);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("email",$cari);
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
	
	function update($id_pemesan,$info){
        $this->db->where($this->primary,$id_pemesan);
        $this->db->update($this->table,$info);
    }
    
}