<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_wali_murid extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_wali_murid');
		$this->load->model('model_siswa');
	}

	public function index()
	{
		if ($this->session->userdata('dataauth')!=TRUE) {
            redirect('auth','refresh');
        }
		$dw['title'] = 'Data Wali Murid';
		$dw['datawalimurid'] = $this->model_wali_murid->datawalimurid();
		$this->load->view('admin/view_header', $dw);
		$this->load->view('admin/view_data_walimurid', $dw);
		$this->load->view('admin/view_sidebar');
	}
	public function daftarWalimurid()
	{
		$namawm=str_replace("'", "", $this->input->post('namawm'));
		$alamatwm=str_replace("'", "", $this->input->post('alamatwm'));
		$notlpwm=str_replace("'", "", $this->input->post('notlpwm'));
		$emailwm=str_replace("'", "", $this->input->post('emailwm'));
		$passwm=str_replace("'", "", $this->input->post('passwm'));

		$cekwm = $this->model_wali_murid->cekwm($emailwm, $passwm);
		
		if ($cekwm != 1) {
			$this->model_wali_murid->daftarWalimurid($namawm, $alamatwm, $notlpwm, $emailwm, $passwm);
			echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$namawm.' telah berhasil didaftarkan.</div>');
                redirect('admin/C_wali_murid');
		} else {
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$namawm.' sebelumnya telah terdaftar.</div>');
                redirect('admin/C_wali_murid');
		}
    }
    public function editWalimurid()
    {
        $namawm=str_replace("'", "", $this->input->post('namawm'));
        $alamatwm=str_replace("'", "", $this->input->post('alamatwm'));
        $notlpwm=str_replace("'", "", $this->input->post('notlpwm'));
        $emailwm=str_replace("'", "", $this->input->post('emailwm'));
        $passwm=str_replace("'", "", $this->input->post('passwm'));

        $this->model_wali_murid->editWalimurid($namawm, $alamatwm, $notlpwm, $emailwm, $passwm);
            echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$namawm.' telah berhasil didaftarkan.</div>');
                redirect('admin/C_wali_murid');
        
		
	}
	public function daftarSiswa(){

        $upload_gambar = $_FILES['fotosiswa']['name'];
        $idwm=str_replace("'", "", $this->input->post('idwm'));
        $nama=str_replace("'", "", $this->input->post('namasiswa'));
        $tgllhr=str_replace("'", "", $this->input->post('tgllahir'));
        $kelas=str_replace("'", "", $this->input->post('kelas'));
        $tgldftr = date('d-m-Y');
        $id= $idwm.date('i'.'d'.'m'.'Y');
        $id_wali_murid=$idwm;
        $sekolah=str_replace("'", "", $this->input->post('sekolah'));
        
        if (!empty($upload_gambar)) {
            
            $nmfile = $nama."_".$kelas;
            $config['upload_path'] = './assets/foto_siswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name'] = $nmfile;
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fotosiswa')){
                
                $foto = $this->upload->data();
                $foto_siswa=$foto['file_name'];
                $this->model_siswa->tambah_siswa($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa, $id_wali_murid);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$nama.' telah terdaftar.</div>');
                redirect('admin/C_wali_murid');
    
            }
            else{
                echo  $this->upload->display_errors();
            }
        }
        else{
                $foto_siswa= 'default.png';
               $this->model_siswa->tambah_siswa($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa, $id_wali_murid);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$nama.' telah terdaftar.</div>');
                redirect('admin/C_wali_murid');
        }

     }

}

/* End of file C_wali_murid.php */
/* Location: ./application/controllers/admin/C_wali_murid.php */