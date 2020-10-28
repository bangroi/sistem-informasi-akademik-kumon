<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walimurid extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('model_wali_murid');
        $this->load->model('model_siswa');
        $this->load->model('model_kemajuan_belajar');
        
    }

    public function index(){
        error_reporting(0);
        
        if (isset($_POST['submit'])) {
            $emailwm = $this->input->post('emailwm');
            $passwordwm = $this->input->post('passwordwm');

            $loginwm = $this->db->get_where('db_wali_murid',
             array('email_wali_murid'=>$emailwm,
              'pass_wali_murid'=>$passwordwm));

            if ($loginwm->num_rows()>0) {
                $this->session->set_userdata('dataauthwm', TRUE);
                $this->session->set_userdata('datawm', $emailwm);
            }
        }

        if ($this->session->userdata('dataauthwm')==TRUE) {
            redirect('walimurid/dashboard','refresh');
        }
        else 

            redirect('walimurid/login','refresh');

    }


    public function login()
    {
        if($this->session->userdata('dataauthwm') == TRUE){
            redirect('walimurid');
        }

        $this->load->view('walimurid/view_loginwm');
    }

    public function logout(){
            $this->session->unset_userdata('dataauthwm');
            $this->session->unset_userdata('datawm');
            $url=base_url('walimurid/login');
            redirect($url);
        }

     public function dashboard(){
        if($this->session->userdata('dataauthwm') != TRUE){
            redirect('walimurid/login');
        }


        $wm = $this->db->get_where('db_wali_murid', ['email_wali_murid' =>$this->session->userdata('datawm')])->row_array();

    
        $id = $wm['id_wali_murid'];
        $ds['title'] = 'Data Siswa';

        $ds['datasiswa']= $this->model_wali_murid->lihatdata($id);
        $ds['databayar'] =$this->model_wali_murid->lihatBayarwm($id);
        $this->load->view('walimurid/view_headerwm',$ds);
        $this->load->view('walimurid/view_dashboardwm', $ds);
        $this->load->view('walimurid/view_sidebarwm');
     }   

     public function daftar_siswa(){

        $a = $this->session->userdata('datawm');
        $wm = $this->db->get_where('db_wali_murid', ['email_wali_murid' =>$this->session->userdata('datawm')])->row_array();
        $idwm = $wm['id_wali_murid'];
        $upload_gambar = $_FILES['fotosiswa']['name'];
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
                redirect('walimurid');
    
            }
            else{
                echo  $this->upload->display_errors();
            }
        }
        else{
                $foto_siswa= 'default.png';
               $this->model_siswa->tambah_siswa($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa, $id_wali_murid);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$nama.' telah terdaftar.</div>');
                redirect('walimurid');
        }

     }

     public function updatesiswawm(){
        
        $upload_gambar = $_FILES['fotosiswa']['name'];
        $ds['datasiswa']= $this->model_siswa->lihatdata();
        $id=str_replace("'", "", $this->input->post('idsiswa'));
        $nama=str_replace("'", "", $this->input->post('namasiswa'));
        $tgllhr=str_replace("'", "", $this->input->post('tgllahir'));
        $kelas=str_replace("'", "", $this->input->post('kelas'));
        $tgldftr=str_replace("'", "", $this->input->post('tgldaftar'));
        $sekolah=str_replace("'", "", $this->input->post('sekolah'));
        //validasi gambar
        if (!empty($upload_gambar)) {
            
            $nmfile = $nama."_".$kelas;
            
                $config['upload_path'] = './assets/foto_siswa/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['file_name'] = $nmfile;
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fotosiswa')){
                
                $foto = $this->upload->data();
                $foto_siswa=$foto['file_name'];
                $this->model_siswa->update_siswa_foto($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data '.$nama.' berhasil diupdate.</div>');
                redirect('walimurid');
    
            }
            else{
                echo  $this->upload->display_errors();
            }
        }
        else{
                $this->model_siswa->update_siswa($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data '.$nama.' berhasil diupdate.</div>');
                redirect('walimurid');
    
        }
    }

    public function kemajuanBelajar()
    {
        if($this->session->userdata('dataauthwm') != TRUE){
            redirect('walimurid/login');
        }


        $wm = $this->db->get_where('db_wali_murid', ['email_wali_murid' =>$this->session->userdata('datawm')])->row_array();

    
        $id = $wm['id_wali_murid'];

        $datawm['title'] = 'Kemajuan Belajar';
        $datasiswa['datawm'] = $this->model_wali_murid->kemajuanBelajarwm($id);
        $this->load->view('walimurid/view_headerwm', $datawm);
        $this->load->view('walimurid/view_kemajuanBelajarwm', $datasiswa);
        $this->load->view('walimurid/view_sidebarwm');
    }
    public function filterKbWm(){

        if($this->session->userdata('dataauthwm') != TRUE){
            redirect('walimurid/login');
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
    public function pembayaran()
    {
        if($this->session->userdata('dataauthwm') != TRUE){
            redirect('walimurid/login');
        }


        $wm = $this->db->get_where('db_wali_murid', ['email_wali_murid' =>$this->session->userdata('datawm')])->row_array();

    
        $id = $wm['id_wali_murid'];

        $datawm['title'] = 'Pembayaran';
        $datasiswa['dtbayar'] = $this->model_wali_murid->lihatBayarwm($id);
        $this->load->view('walimurid/view_headerwm', $datawm);
        $this->load->view('walimurid/view_bayarwm', $datasiswa);
        $this->load->view('walimurid/view_sidebarwm');
    }

}

