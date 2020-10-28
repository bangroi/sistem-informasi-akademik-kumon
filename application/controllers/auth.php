<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){

        if (isset($_POST['submit'])) {
            error_reporting(0);
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $login = $this->db->get_where('admin',
             array('email_admin'=>$email,
              'password_admin'=>$password));

            if ($login->num_rows()>0) {
                $this->session->set_userdata('dataauth', TRUE);
                $this->session->set_userdata('dataadmin', $email);
            }
        }

        if ($this->session->userdata('dataauth')==TRUE) {
            redirect('admin/dashboard','refresh');
        }
        else 
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Akun dengan Email '.$email.' belum terdaftar atau password yang anda masukkan salah.</div>');

            redirect('auth/login','refresh');

    }


    public function login()
    {
        if($this->session->userdata('dataauth') == TRUE){
            redirect('admin','refresh');
        }

        $this->load->view('admin/view_login');
    }
    public function logout(){
            $this->session->sess_destroy('dataauth');
            $url=base_url('auth/login');
            redirect($url);
        }

    

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */