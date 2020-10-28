<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kemajuanBelajar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_siswa');
		$this->load->model('model_kemajuan_belajar');
		$this->load->model('model_bayar');
		    		
	}

	public function index()
	{
		if ($this->session->userdata('dataauth')!=TRUE) {
            redirect('auth','refresh');
        }
		$ds['title']= 'Kemajuan Belajar';
		$ds['datasiswa']= $this->model_siswa->kemajuanBelajar();
		$this->load->view('admin/view_header',$ds);
		$this->load->view('admin/view_kemajuanBelajar',$ds);
		$this->load->view('admin/view_sidebar');
	}
	
	
	public function tambahKemajuanBelajar(){
		$idsubyek=str_replace("'", "", $this->input->post('idsubyek'));
		$tgl_kb=str_replace("'", "", $this->input->post('tgl_kb'));
		$tahun_kb=str_replace("'", "", $this->input->post('tahun_kb'));
		$target_level_kb=str_replace("'", "", $this->input->post('tlevel'));
        $nomertargetlevel=str_replace("'", "", $this->input->post('nomertargetlevel'));
        $real_level_kb=str_replace("'", "", $this->input->post('rlevel'));
        $nomerreallevel=str_replace("'", "", $this->input->post('nomerreallevel'));
		$catatan_kb=str_replace("'", "", $this->input->post('catatan_kb'));
		$subyek=str_replace("'", "", $this->input->post('subyek'));
		
		
		$this->model_kemajuan_belajar->tambahKb($idsubyek,$tgl_kb, $tahun_kb, $target_level_kb, $nomertargetlevel, $real_level_kb, $nomerreallevel, $catatan_kb, $subyek);
		$this->model_bayar->bayarSpp($idsubyek, $tgl_kb, $tahun_kb);
			echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data berhasil diupdate!</div>');
			redirect('admin/C_kemajuanBelajar');
	}

	public function kbDetail($idsubyek){
		if ($this->session->userdata('dataauth')!=TRUE) {
            redirect('auth','refresh');
        }
		$data['dtsiswa'] = $this->model_kemajuan_belajar->getSiswaById($idsubyek);
		/*$data['data'] = $this->model_kemajuan_belajar->chartSiswaById($idsubyek);*/
		$data['dtabsensi'] = $this->model_kemajuan_belajar->getAbsensiById($idsubyek);
	 	$data['title'] = 'Detail Kemajuan Belajar Siswa';

	 	$this->load->view('admin/view_header', $data);
		$this->load->view('admin/view_kbDetail',$data);
		$this->load->view('admin/view_sidebar');


	}
	public function filterKB(){

		if ($this->session->userdata('dataauth')!=TRUE) {
            redirect('auth','refresh');
        }
		$subyek=str_replace("'", "", $this->input->post('subyek'));
		$level=str_replace("'", "", $this->input->post('level'));
		$bulan=str_replace("'", "", $this->input->post('bulan'));
		$tahun=str_replace("'", "", $this->input->post('tahun'));

		$ds['title']= 'Kemajuan Belajar';
		$ds['datasiswa']= $this->model_kemajuan_belajar->filterKB($subyek, $level, $bulan, $tahun);
		$this->load->view('admin/view_header',$ds);
		$this->load->view('admin/view_kemajuanBelajar',$ds);
		$this->load->view('admin/view_sidebar');


	}
	public function hapusKemajuanBelajar($id_kb)
	{
		$this->model_kemajuan_belajar->hapusKemajuanBelajar($id_kb);
		redirect('admin/C_kemajuanBelajar');
	}

}

/* End of file kemajuanBelajar.php */
/* Location: ./application/controllers/admin/kemajuanBelajar.php */ 