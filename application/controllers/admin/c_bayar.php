<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_bayar');
	}

	public function index()
	{
		$dtbayar['title'] = 'Pembayaran';
		$dtbayar['dtbayar'] = $this->model_bayar->lihatBayar();
		$this->load->view('admin/view_header', $dtbayar);
		$this->load->view('admin/view_bayar', $dtbayar);
		$this->load->view('admin/view_sidebar');
	}
	public function editBayar()
	{
		$id=str_replace("'", "", $this->input->post('id'));
		$jumlahBayar=str_replace("'", "", $this->input->post('jmlbyr'));

		$this->model_bayar->editBayar($id, $jumlahBayar);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Pembayaran '.$nama.' berhasil diupdate.</div>');
				redirect('admin/c_bayar');
	}

}

/* End of file c_bayar.php */
/* Location: ./application/controllers/admin/c_bayar.php */