<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('dataauth') != TRUE){
			redirect('auth/login');
		}
		$this->load->model('m_admin');
		$this->load->model('model_absensi');
		$this->load->model('model_bayar');
	}

	function index(){
		error_reporting(0);
		$ds['title']= 'Dashboard';
		$ds['datasiswa']= $this->m_admin->lihatdata();
		$ds['totalabsensi'] = $this->m_admin->totalabsensi();
		$ds['totalsiswa']= $this->m_admin->totalsiswa();
		$ds['totaldata']= $this->m_admin->totalBayar();
		$time= date('d');
		$ds['dtabsensi']= $this->model_absensi->lihatDataAbsensi($time);
		$ds['dtbayar'] = $this->model_bayar->lihatBayar2();
		$this->load->view('admin/view_header',$ds);
		$this->load->view('admin/view_dashboard',$ds);
		$this->load->view('admin/view_sidebar');
	}
}