<?php
class C_siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_siswa');
		$this->load->model('model_kemajuan_belajar');
		$this->load->model('model_bayar');
		
	}
	public function index(){
		if ($this->session->userdata('dataauth')!=TRUE) {
            redirect('auth','refresh');
        }

		$ds['title']= 'Data Semua Siswa';
		$ds['dtsiswa']= $this->model_siswa->datasiswa();
		$ds['datasiswa']= $this->model_siswa->detailSiswa();
		$this->load->view('admin/view_header',$ds);
		$this->load->view('admin/view_siswa',$ds);
		$this->load->view('admin/view_sidebar');
	}

	public function subyekBelajar(){
		$ds['title'] = 'Subyek Belajar Siswa';
		$ds['dtsubyek'] = $this->model_siswa->subyekBelajar(); 
		$this->load->view('admin/view_header',$ds);
		$this->load->view('admin/view_subyekBelajar',$ds);
		$this->load->view('admin/view_sidebar');
	}
	public function hapusSubyek($idsubyek){
		$this->model_siswa->hapusSubyek($idsubyek);
		echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Data telah Berhasil Dihapus.</div>');
			redirect('admin/c_siswa/subyekBelajar');
	}
	public function updateSiswa(){
		
		$upload_gambar = $_FILES['fotosiswa']['name'];
		$ds['datasiswa']= $this->model_siswa->lihatdata();
		$id=str_replace("'", "", $this->input->post('idsiswa'));
        $nama=str_replace("'", "", $this->input->post('namasiswa'));
        $tgllhr=str_replace("'", "", $this->input->post('tgllahir'));
        $kelas=str_replace("'", "", $this->input->post('kelas'));
        $idbaru = str_replace("'", "", $this->input->post('idbaru'));
        
        $sekolah=str_replace("'", "", $this->input->post('sekolah'));
        $cekid = $this->db->get_where('db_siswa',
             						array('id_siswa'=>$idbaru));
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
	            
	            if ($cekid = 1) {
	            	$this->model_siswa->update_siswa_foto($id, $nama, $tgllhr, $kelas, $sekolah, $foto_siswa);
				echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data '.$nama.' berhasil diupdate.</div>');
				redirect('admin/c_siswa');
	
	            } else {
	            	echo "id tdk sama";
	            }
	            


				
			}
			else{
				echo  $this->upload->display_errors();
			}
		}
		else{
			$cekid = $this->model_siswa->cekId($idbaru)->num_rows();

			if ($cekid == 1) {
				$this->model_siswa->update_siswa($id, $nama, $tgllhr, $kelas, $sekolah);
				echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data '.$nama.' berhasil diupdate.</div>');
				redirect('admin/c_siswa');
			} else {
				$subyekbr = $this->db->query("SELECT subyek from db_subyek_siswa where id_siswa = '$id'");

				echo $subyekbr;
				$replace1 = $this->db->query("UPDATE db_siswa SET id_siswa = REPLACE(id_siswa, '$id', '$idbaru')");
				$replace2 = $this->db->query("UPDATE db_subyek_siswa SET id_subyek_siswa = REPLACE(id_subyek_siswa, '$id', '$idbaru')");
				$replace3 = $this->db->query("UPDATE db_absensi SET id_subyek_siswa = REPLACE(id_subyek_siswa, '$id', '$idbaru')");
				$replace4 = $this->db->query("UPDATE db_bayar SET id_subyek_siswa = REPLACE(id_subyek_siswa, '$id', '$idbaru')");
				$replace5 = $this->db->query("UPDATE db_kemajuan_belajar SET id_subyek_siswa = REPLACE(id_subyek_siswa, '$id', '$idbaru')");
				$replace6 = $this->db->query("UPDATE db_subyek_siswa SET img_qrcode = REPLACE(img_qrcode, '$id', '$idbaru')");
				$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']	= true; //boolean, the default is true
				$config['cachedir']		= './assets/'; //string, the default is application/cache/
				$config['errorlog']		= './assets/'; //string, the default is application/logs/
				$config['imagedir']		= './assets/imgqrcode/'; //direktori penyimpanan qr code
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224,255,255); // array, default is array(255,255,255)
				$config['white']		= array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
				$imgQrName=$subyekbr.$idbaru.'.png'; //buat name dari qr code sesuai dengan nim
		
				$params['data'] = $subyek.$id; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$imgQrName; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


				echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Id '.$subyekbr.' berhasil diupdate.</div>');
				redirect('admin/c_siswa');


			}
			
				
	
		}
	}


	public function tambahSubyekBelajar(){
		$id=str_replace("'", "", $this->input->post('idsiswa'));
        $subyek=str_replace("'", "", $this->input->post('subyek'));
        $targetlevel=str_replace("'", "", $this->input->post('targetlevel'));
        $nomertargetlevel=str_replace("'", "", $this->input->post('nomertargetlevel'));
        $reallevel=str_replace("'", "", $this->input->post('reallevel'));
        $nomerreallevel=str_replace("'", "", $this->input->post('nomerreallevel'));
        $jenistp=str_replace("'", "", $this->input->post('jnstp'));
        $statussiswa=str_replace("'", "", $this->input->post('status'));
        
        $tgldftrsubyek = date('d-m-Y');
       
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/imgqrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$imgQrName=$subyek.$id.'.png'; //buat name dari qr code sesuai dengan nim
		
		$params['data'] = $subyek.$id; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$imgQrName; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$idsubyek=$subyek.$id;
		$tglKb =date('m');
        $thnKb =date('Y');
        $s= $tglKb.$thnKb.$idsubyek;
        $level = $reallevel.$nomerreallevel;

		$this->model_kemajuan_belajar->kbAwal($idsubyek, $subyek, $tglKb, $reallevel, $nomerreallevel,  $thnKb);
		$this->model_siswa->tambah_subyek_siswa($idsubyek, $id, $subyek, $level, $jenistp, $statussiswa, $tgldftrsubyek,$imgQrName); //simpan ke database
		$this->model_bayar->bayarPendaftaran($idsubyek, $tglKb, $thnKb);
		
		redirect('admin/c_siswa'); //redirect ke mahasiswa usai simpan data
	}

	public function hapusSiswa($id)
	{
		$cekSiswa = $this->model_siswa->cekSiswa($id)->num_rows(); 

		if ($cekSiswa < 1 ) {
			$this->model_siswa->hapusSiswa($id);
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Data telah Berhasil Dihapus.</div>');
			redirect('admin/c_siswa');
		} else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Data tidak dapat dihapus, harap menghapus SEMUA SUBYEK BELAJAR Terlebih Dahulu.</div>');
			redirect('admin/c_siswa');
		}
		
	}

}
