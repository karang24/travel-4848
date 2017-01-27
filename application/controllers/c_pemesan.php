<?php
class C_pemesan extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','upload'));
        $this->load->model('m_pemesan');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index() {
		$data['pemesan']=$this->m_pemesan->semua()->result();
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
		elseif($this->uri->segment(3)=="edit_success")
            $data['message']="<div class='alert alert-success'>Data berhasil diubah</div>";
        else
            $data['message']='';
            $this->template->display('pemesan/v_index',$data);
	}
	
	function cari(){
        $cari=$this->input->post('cari');
        $cek=$this->m_pemesan->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['pemesan']=$cek->result();
            redirect('c_pemesan/index',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['pemesan']=$cek->result();
            $this->template->display('pemesan/v_index',$data);
        }
    }
    
    function hapus($id)
	{
        $this->m_pemesan->hapus($id);
		redirect('c_pemesan/index/delete_success');
    }
	
	function edit($id_pemesan){
            $info=array(
                'status'=>'Sudah bayar');
			
            $this->m_pemesan->update($id_pemesan,$info); 
            redirect('c_pemesan/index/adit_success');
        }
	
}