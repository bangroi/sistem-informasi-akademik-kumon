<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembimbing extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('model_absensi');
		$this->load->model('model_bayar');
		$this->load->model('model_kemajuan_belajar');
		$this->load->model('model_siswa');
		$this->load->model('model_wali_murid');
	}

	public function index()
	{
		error_reporting(0);
        
        if (isset($_POST['submit'])) {
            $usernamep = $this->input->post('usernamep');
            $passwordp = $this->input->post('passwordp');

            $loginp = $this->db->get_where('db_pembimbing',
             array('username_pembimbing'=>$usernamep,
              'pass_pembimbing'=>$passwordp));

            if ($loginp->num_rows()>0) {
                $this->session->set_userdata('dataauthp', TRUE);
                $this->session->set_userdata('datap', $usernamep);
            }
        }

        if ($this->session->userdata('dataauthp')==TRUE) {
            redirect('c_pembimbing/dashboard','refresh');
        }
        else 

            redirect('c_pembimbing/login','refresh');

    }


    public function login()
    {
        if($this->session->userdata('dataauthp') == TRUE){
            redirect('c_pembimbing/dashboard');
        }

        $this->load->view('pembimbing/view_loginp');
    }

    public function logout(){
            $this->session->unset_userdata('dataauthp');
            $this->session->unset_userdata('datap');
            $url=base_url('c_pembimbing/login');
            redirect($url);
    }
    public function dashboard(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }

    	$ds['title']= 'Dashboard';
		$ds['datasiswa']= $this->m_admin->lihatdata();
		$ds['totalabsensi'] = $this->m_admin->totalabsensi();
		$ds['totalsiswa']= $this->m_admin->totalsiswa();
		$ds['totaldata']= $this->m_admin->totalBayar();
		$time= date('d');
		$ds['dtabsensi']= $this->model_absensi->lihatDataAbsensi($time);
		$ds['dtbayar'] = $this->model_bayar->lihatBayar2();
		$this->load->view('pembimbing/view_header',$ds);
		$this->load->view('pembimbing/view_dashboard',$ds);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function bayarPembimbing(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }
    	$dtbayar['title'] = 'Pembayaran';
		$dtbayar['dtbayar'] = $this->model_bayar->lihatBayar();
		$this->load->view('pembimbing/view_header', $dtbayar);
		$this->load->view('pembimbing/view_bayar', $dtbayar);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function kemajuanBelajarPembimbing(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }
		$ds['title']= 'Kemajuan Belajar';
		$ds['datasiswa']= $this->model_siswa->kemajuanBelajar();
		$this->load->view('pembimbing/view_header',$ds);
		$this->load->view('pembimbing/view_kemajuanBelajar',$ds);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function filterKBPembimbing(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }
		$subyek=str_replace("'", "", $this->input->post('subyek'));
		$level=str_replace("'", "", $this->input->post('level'));
		$bulan=str_replace("'", "", $this->input->post('bulan'));
		$tahun=str_replace("'", "", $this->input->post('tahun'));

		$ds['title']= 'Kemajuan Belajar';
		$ds['datasiswa']= $this->model_kemajuan_belajar->filterKB($subyek, $level, $bulan, $tahun);
		$this->load->view('pembimbing/view_header',$ds);
		$this->load->view('pembimbing/view_kemajuanBelajar',$ds);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function dataSiswaPembimbing(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }

		$ds['title']= 'Data Semua Siswa';
		$ds['dtsiswa']= $this->model_siswa->datasiswa();
		$ds['datasiswa']= $this->model_siswa->detailSiswa();
		$this->load->view('pembimbing/view_header',$ds);
		$this->load->view('pembimbing/view_siswa',$ds);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function subyekBelajarPembimbing(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }
    	$ds['title'] = 'Subyek Belajar Siswa';
		$ds['dtsubyek'] = $this->model_siswa->subyekBelajar(); 
		$this->load->view('pembimbing/view_header',$ds);
		$this->load->view('pembimbing/view_subyekBelajar',$ds);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function dataWalimurid(){
    	if($this->session->userdata('dataauthp') != TRUE){
            redirect('c_pembimbing/login');
        }
		$dw['title'] = 'Data Wali Murid';
		$dw['datawalimurid'] = $this->model_wali_murid->datawalimurid();
		$this->load->view('pembimbing/view_header', $dw);
		$this->load->view('pembimbing/view_data_walimurid', $dw);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function dataAdmin(){
    	$dtprofile['title'] = 'Data Diri Admin';
		$dtadmin['dtprofile'] = $this->db->get('admin'); 

		$this->load->view('pembimbing/view_header', $dtprofile);
		$this->load->view('pembimbing/view_profile', $dtadmin);
		$this->load->view('pembimbing/view_sidebar');
    }
    public function editAdminp()
	{
		$namaadmin=str_replace("'", "", $this->input->post('namaadmin'));
		$notlpadmin=str_replace("'", "", $this->input->post('notlpadmin'));
		$email=str_replace("'", "", $this->input->post('email'));
		$passadmin=str_replace("'", "", $this->input->post('passadmin'));

		$edit = $this->m_admin->editAdmin($namaadmin, $notlpadmin, $email, $passadmin);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data berhasil diupdate!</div>');
			redirect('c_pembimbing/dataAdmin');
		
	}
	public function tambahAdminp()
	{
		$namaadmin=str_replace("'", "", $this->input->post('namaadmin'));
		$notlpadmin=str_replace("'", "", $this->input->post('notlpadmin'));
		$email=str_replace("'", "", $this->input->post('email'));
		$passadmin=str_replace("'", "", $this->input->post('passadmin'));

		$edit = $this->m_admin->tambahAdminp($namaadmin, $notlpadmin, $email, $passadmin);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data telah berhasil didaftarkan!</div>');
			redirect('c_pembimbing/dataAdmin');
		
	}
	public function hapusAdminp($id){
		$this->m_admin->hapusAdmin($id);
		echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Data berhasil dihapus!</div>');
		redirect('c_pembimbing/dataAdmin');
	}
}

/* End of file c_pembimbing.php */
/* Location: ./application/controllers/c_pembimbing.php */