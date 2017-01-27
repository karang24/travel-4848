<?php class Laporan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template'));
        $this->load->model('m_laporan');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function pemesan(){
        $data['title']="Data Pemesan";
        $data['pemesan']=$this->m_laporan->semuaAnggota()->result();
        $this->template->display('laporan/pemesan',$data);
    }
    
}