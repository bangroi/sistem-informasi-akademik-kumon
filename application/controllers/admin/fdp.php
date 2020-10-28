<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fdp extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('model_siswa');
    }
    
	function index($idsubyek){
        $pdf = new FPDF('P','mm','legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
       
        $qr = $this->model_siswa->idSubyek($idsubyek);

        foreach ($qr->result() as $row){
        $pdf->image(base_url().'assets/imgqrcode/'.$row->img_qrcode,8,22,40,0,'PNG');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,10,$row->id_subyek_siswa);

        }
        $pdf->Output();
    }
}
