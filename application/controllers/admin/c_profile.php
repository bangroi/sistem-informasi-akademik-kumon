<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$email = $this->session->userdata('dataadmin');
		$dtprofile['title'] = 'Data Diri Admin';
		$dtadmin['dtprofile'] = $this->m_admin->showProfile($email); 

		$this->load->view('admin/view_header', $dtprofile);
		$this->load->view('admin/view_profile', $dtadmin);
		$this->load->view('admin/view_sidebar');
	}
	public function editAdmin()
	{
		$namaadmin=str_replace("'", "", $this->input->post('namaadmin'));
		$notlpadmin=str_replace("'", "", $this->input->post('notlpadmin'));
		$email=str_replace("'", "", $this->input->post('email'));
		$passadmin=str_replace("'", "", $this->input->post('passadmin'));

		$edit = $this->m_admin->editAdmin($namaadmin, $notlpadmin, $email, $passadmin);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data berhasil diupdate!</div>');
			redirect('admin/C_profile');
		
		
	}

}

/* End of file c_profil.php */
/* Location: ./application/controllers/admin/c_profil.php */