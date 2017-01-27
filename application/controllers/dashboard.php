<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_pengguna');
        $this->load->library(array('form_validation','template'));
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $this->template->display('dashboard/index');
    }
    
    function pengguna(){
        $data['pengguna']=$this->m_pengguna->semua()->result();
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		else if($this->uri->segment(3)=="adit_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diubah</div>";
        else
            $data['message']='';
        $this->template->display('dashboard/pengguna',$data);
    }
    
    function add_pengguna(){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $user=$this->input->post('user');
            $cek=$this->m_pengguna->cekKode($user);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-danger'>Username sudah digunakan</div>";
                $this->template->display('dashboard/add_pengguna',$data);
            }else{
                $info=array(
                    'user'=>$this->input->post('user'),
                    'password'=>md5($this->input->post('password'))
                );
                $this->m_pengguna->simpan($info);
                redirect('dashboard/pengguna/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('dashboard/add_pengguna',$data);
        }
    }
    
    function edit($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'user'=>$this->input->post('user'),
                'password'=>md5($this->input->post('password'))
            );
            $this->m_pengguna->update($id,$info);
            $data['pengguna']=$this->m_pengguna->cekId($id)->row_array();
            redirect('dashboard/pengguna/adit_success');
        }else{
            $data['message']="";
            $data['pengguna']=$this->m_pengguna->cekId($id)->row_array();
            $this->template->display('dashboard/edit_pengguna',$data);
        }
    }
    
    function hapus($id){
        $this->m_pengguna->hapus($id);
		redirect('dashboard/pengguna/delete_success');
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('user','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}