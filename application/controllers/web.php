<?php
class Web extends CI_Controller{
    private $limit=20;
	
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template'));
        $this->load->model(array('m_pengguna','m_jadwal','m_boking','m_mobil'));

    }
    
    function index(){
         $this->template->display('web/index');
    }

	function kat_mobil($offset=0,$order_column='flat_travel',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='flat_travel';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['travel']=$this->m_mobil->semua($this->limit,$offset,$order_column,$order_type)->result();
        
        $config['total_rows']=$this->m_mobil->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		else if($this->uri->segment(3)=="adit_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diubah</div>";
        else
            $data['message']='';
            $this->template->display('data_mobil/kat_mobil',$data);
    }
	function cari_dt(){
        $cari=$this->input->post('cari');
        $cek=$this->m_mobil->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['travel']=$cek->result();
           redirect('web/kat_mobil');
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['travel']=$cek->result();
            $this->template->display('data_mobil/kat_mobil',$data);
        }
    }

    function jadwal()
    {
        $data['jadwal']=$this->m_jadwal->semua()->result();
		$data['kursi']=$this->m_jadwal->get_kursi()->result();
		if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		else if($this->uri->segment(3)=="adit_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diubah</div>";
        else
            $data['message']='';
			$this->template->display('web/jadwal',$data);
    }
    	
	function tambah(){
        
            $info=array(
					'nama_kendaraan'=>$this->input->post('nama_kendaraan'),
					'tujuan'=>$this->input->post('tujuan'),
					'jam_keberangkatan'=>$this->input->post('jam_keberangkatan'),
					'kelas'=>$this->input->post('kelas'),
					'harga'=>$this->input->post('harga'),
                    'nama_lengkap'=>$this->input->post('nama_lengkap'),
                    'alamat'=>$this->input->post('alamat'),
                    'no_kursi'=>$this->input->post('no_kursi'),
					'status'=>'Belum bayar',
                    'email'=>$this->input->post('email')
                );
                $this->m_boking->simpan($info);
			echo"<script>window.alert('Data Telah Dikirim dan Kursi Telah di boking segera kirim uang lewat sms banking jika ingin melihat konfirmasi silakan register');
				window.location=('jadwal')</script>";
    }
    
    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
			$level=$this->input->post('level');
            $cek=$this->m_pengguna->cek($username,$level,md5($password));			
			if($level=='admin'){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                redirect('dashboard');
			}if($level=='user'){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                redirect('web');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web');
            }
        }
    }
	
	function cari_jadwal(){
        $cari=$this->input->post('cari');
        $cek=$this->m_jadwal->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['jadwal']=$cek->result();
            redirect('web/jadwal',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['jadwal']=$cek->result();
            $this->template->display('web/jadwal',$data);
        }
    }
	
	public function get_all() 
	{ 
		$kode = $this->input->post('kode',TRUE);	//variabel kunci yang di bawa dari input text id kode
        $query = $this->m_jadwal->get_all();	//query model
		$jdw = array(); foreach($query as $d) {
		$jdw[]	= array(
				'label'=>$d->tujuan,	//variabel array yg dibawa ke label ketikan kunci
                'keberangkatan'=>$d->keberangkatan,	//variabel yg dibawa ke id nama
				'nama_kendaraan'=>$d->nama_kendaraan,	//variabel yg dibawa ke id nama
                'jam_keberangkatan' =>$d->jam_keberangkatan,	//variabel yang dibawa ke id ibukota
				'kelas' =>$d->kelas,	//variabel yang dibawa ke id ibukota
                'harga' =>$d->harga	//variabel yang dibawa ke id keterangan
            );
        }
        echo json_encode($jdw);	//data array yang telah jdw deklarasikan dibawa menggunakan json
    }
}