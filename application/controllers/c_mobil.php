<?php
class C_mobil extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->model('m_mobil');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='flat_travel',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='flat_travel';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['travel']=$this->m_mobil->semua($this->limit,$offset,$order_column,$order_type)->result();
        
        $config['total_rows']=$this->m_mobil->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		else if($this->uri->segment(3)=="adit_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diubah</div>";
        else
            $data['message']='';
            $this->template->display('data_mobil/index',$data);
    }
    
    
    function tambah(){
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $flat_travel=$this->input->post('flat_travel'); // mendapatkan input dari kode
            $cek=$this->m_mobil->cek($flat_travel); // cek kode di database
            if($cek->num_rows()>0){ // jika kode sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>Flat No travel sudah ada</div>";
                $this->template->display('data_mobil/tambah',$data);
            }else{ // jika kode travel belum ada, maka simpan
                
                //setting konfiguras upload image
        $config['upload_path'] = './assets/images_travel/';
		$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';         
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'flat_travel'=>$this->input->post('flat_travel'),
                    'nama_travel'=>$this->input->post('nama_travel'),
                    'jenis_travel'=>$this->input->post('jenis_travel'),
                    'keterangan'=>$this->input->post('keterangan'),
					'jumlah_kursi'=>$this->input->post('jumlah_kursi'),
                    'image'=>$gambar
                );
                $this->m_mobil->simpan($info);
                redirect('c_mobil/index/add_success');

            }
        }else{
            $data['message']="";
            $this->template->display('data_mobil/tambah',$data);
        }
    }
    
    function edit($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $flat_travel=$this->input->post('flat_travel');
            
            //setting konfiguras upload image
        $config['upload_path'] = './assets/images_travel/';
	    $config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
               
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
                'flat_travel'=>$this->input->post('flat_travel'),
                'nama_travel'=>$this->input->post('nama_travel'),
                'jenis_travel'=>$this->input->post('jenis_travel'),
                'keterangan'=>$this->input->post('keterangan'),
				'jumlah_kursi'=>$this->input->post('jumlah_kursi'),
                'image'=>$gambar           
				);
            $this->m_mobil->update($flat_travel,$info);
            
            $data['travel']=$this->m_mobil->cek($id)->row_array();
            redirect('c_mobil/index/add_success');
        }else{
            $data['message']="";
            $data['travel']=$this->m_mobil->cek($id)->row_array();
            $this->template->display('data_mobil/edit',$data);
        }
    }
    
    function hapus($id){
        $kode=$this->input->post('kode');
        $detail=$this->m_mobil->cek($kode)->result();
	foreach($detail as $det):
	    unlink("assets/imgages_travel/".$det->image);
	endforeach;
        $this->m_mobil->hapus($id);
		redirect('c_mobil/index/delete_success');
    }
    
    function cari(){
        $cari=$this->input->post('cari');
        $cek=$this->m_mobil->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['travel']=$cek->result();
           redirect('c_mobil/index');
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['travel']=$cek->result();
            $this->template->display('data_mobil/index',$data);
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('flat_travel','flat_travel','required|max_length[50]');
        $this->form_validation->set_rules('nama_travel','nama_travel','required|max_length[25]');
        $this->form_validation->set_rules('jenis_travel','jenis_travel','required|max_length[25]');
        $this->form_validation->set_rules('keterangan','keterangan','required|max_length[150]');
		$this->form_validation->set_rules('jumlah_kursi','jumlah_kursi','required|max_length[150]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}