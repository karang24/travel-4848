<?php
class Jadwal extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','upload'));
        $this->load->model('m_jadwal');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index() {
		$data['jadwal']=$this->m_jadwal->semua()->result();
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		else if($this->uri->segment(3)=="adit_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diubah</div>";
        else
            $data['message']='';
            $this->template->display('jadwal/index',$data);
    }
	
	function cari(){
        $cari=$this->input->post('cari');
        $cek=$this->m_jadwal->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['jadwal']=$cek->result();
            redirect('jadwal/index',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['jadwal']=$cek->result();
            $this->template->display('jadwal/index',$data);
        }
    }
    
    function edit($id){
        $this->_set_rules();
        $data['title']="Edit Data Anggota";
        if($this->form_validation->run()==true){
            $id_jadwal=$this->input->post('id_jadwal');
            //setting konfiguras upload image
            $info=array(
                'keberangkatan'=>$this->input->post('keberangkatan'),
                'nama_kendaraan'=>$this->input->post('nama_kendaraan'),
                'tujuan'=>$this->input->post('tujuan'),
                'jam_keberangkatan'=>$this->input->post('jam_keberangkatan'),
				'kelas'=>$this->input->post('kelas'),
                'harga'=>$this->input->post('harga'),
            );
			
            $this->m_jadwal->update($id_jadwal,$info); 
            $data['jadwal']=$this->m_jadwal->cek($id)->row_array();
            redirect('jadwal/index/adit_success');
        }else{
            $data['jadwal']=$this->m_jadwal->cek($id)->row_array();
            $data['message']="";
            $this->template->display('jadwal/edit',$data);
        }
    }
    
    
    function tambah(){
        $data['title']="Tambah Data Anggota";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_jadwal=$this->input->post('id_jadwal');
            $cek=$this->m_jadwal->cek($id_jadwal);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>id_jadwal sudah digunakan</div>";
                $this->template->display('jadwal/tambah',$data);
            }else{
                $info=array(
                'keberangkatan'=>$this->input->post('keberangkatan'),
                'nama_kendaraan'=>$this->input->post('nama_kendaraan'),
                'tujuan'=>$this->input->post('tujuan'),
                'jam_keberangkatan'=>$this->input->post('jam_keberangkatan'),
				'kelas'=>$this->input->post('kelas'),
                'harga'=>$this->input->post('harga'));
                $this->m_jadwal->simpan($info);
                redirect('jadwal/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('jadwal/tambah',$data);
        }
    }
    
    
    function hapus($id)
	{
        $this->m_jadwal->hapus($id);
		redirect('jadwal/index/delete_success');
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('keberangkatan','keberangkatan','required|max_length[50]');
        $this->form_validation->set_rules('nama_kendaraan','nama_kendaraan','required|max_length[50]');
        $this->form_validation->set_rules('tujuan','tujuan','required');
        $this->form_validation->set_rules('jam_keberangkatan','jam_keberangkatan','required|max_length[50]');
		$this->form_validation->set_rules('kelas','kelas','required|max_length[50]');
		$this->form_validation->set_rules('harga','harga','required|max_length[50]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}