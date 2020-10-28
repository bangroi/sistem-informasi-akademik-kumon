<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_absensi');
	}

	public function index()
	{
		$dtabsensi['title'] = 'Absensi Siswa'; 
		$time= date('d');
		$dtabsensi['dtabsensi']= $this->model_absensi->lihatDataAbsensi($time);
		$dtabsensi['totaldatasiswa']= $this->model_absensi->totalabsensi();
		$this->load->view('siswa/view_absen', $dtabsensi);
	}

	public function tambahAbsen()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idabsen=str_replace("'", "", $this->input->post('idabsen'));
		
		$hariIni = new DateTime();
		$tgl = $hariIni->format('d');
		$bln = $hariIni->format('m');
		$tahun = $hariIni->format('Y');
		$waktu = $hariIni->format('H i s');

		$cekabsen = $this->model_absensi->cekAbsen($idabsen)->num_rows();
		$cekdoubleabsen = $this->model_absensi->cekDoubleAbsen($idabsen, $tgl)->num_rows();

		if ($cekabsen == 1) {
			if ($cekdoubleabsen != 1) {
				$absen= $this->model_absensi->tambahAbsen($idabsen, $tgl, $bln, $tahun, $waktu);
			redirect('C_absensi');
			} else {
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Hari ini Anda Sudah Melakukan Presensi.</div>');
				redirect('C_absensi');
			}
			
		} else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Anda Belum Terdaftar Sebagai Murid..</div>');
			redirect('C_absensi');
	}
		

		
		
		
	}

}

/* End of file coba.php */
/* Location: ./application/controllers/coba.php */
