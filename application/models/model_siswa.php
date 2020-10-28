<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model {

	public function lihatdata(){
		$this->db->order_by('tanggal_daftar', 'asc');
		$ds= $this->db->get('db_siswa');
		return $ds;
	}
	
public function dataSiswa(){
    	$hsl=$this->db->query("SELECT * FROM db_siswa left JOIN db_wali_murid ON db_siswa.id_wali_murid = db_wali_murid.id_wali_murid");
		return $hsl;

		
    }
    public function detailSiswa(){
    	$hsl=$this->db->query("SELECT * FROM db_siswa left JOIN db_wali_murid ON db_siswa.id_wali_murid = db_wali_murid.id_wali_murid left JOIN  db_subyek_siswa ON db_siswa.id_siswa = db_subyek_siswa.id_siswa");
		return $hsl;

		
    }
    public function subyekBelajar(){
    	$hsl=$this->db->query("SELECT * FROM db_subyek_siswa left JOIN db_siswa ON db_subyek_siswa.id_siswa = db_siswa.id_siswa ORDER BY tgl_awal_daftar asc");
		return $hsl;
    }
    public function hapusSubyek($idsubyek){
    	$tabel = array( 'db_bayarr','db_subyek_siswa', 'db_kemajuan_belajar');
    	$this->db->where('id_subyek_siswa', $idsubyek);
		$this->db->delete($tabel);
    }
    public function kemajuanBelajar(){
    	$hsl=$this->db->query("SELECT * FROM db_kemajuan_belajar left JOIN db_subyek_siswa ON db_kemajuan_belajar.id_subyek_siswa = db_subyek_siswa.id_subyek_siswa left join db_siswa ON db_subyek_siswa.id_siswa = db_siswa.id_siswa ORDER BY tgl_kb desc ");
		return $hsl;

		
    }

	public function tambah_siswa($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa, $id_wali_murid){
		$this->db->set('foto_siswa', $foto_siswa);
		$this->db->set('id_siswa', $id);
		$this->db->set('nama_siswa', $nama);
        $this->db->set('tgl_lahir', $tgllhr); 
        $this->db->set('kelas', $kelas);
        $this->db->set('tanggal_daftar', $tgldftr);
        $this->db->set('sekolah', $sekolah);
        $this->db->set('id_wali_murid', $id_wali_murid);
        $this->db->set('kelas', $kelas);
        $this->db->insert('db_siswa');
	}

	public function update_siswa_foto($id, $nama, $tgllhr, $kelas, $tgldftr, $sekolah, $foto_siswa){
		$this->db->set('foto_siswa', $foto_siswa);
		$this->db->set('nama_siswa', $nama);
        $this->db->set('tgl_lahir', $tgllhr); 
        $this->db->set('kelas', $kelas);
        $this->db->set('tanggal_daftar', $tgldftr);
        $this->db->set('sekolah', $sekolah);
        $this->db->set('kelas', $kelas);
		$this->db->where('id_siswa', $id);
		$this->db->update('db_siswa');

	}
	public function update_siswa($id, $nama, $tgllhr, $kelas, $sekolah){
		$this->db->set('nama_siswa', $nama);
        $this->db->set('tgl_lahir', $tgllhr); 
        $this->db->set('kelas', $kelas);
        $this->db->set('sekolah', $sekolah);
        $this->db->set('kelas', $kelas);
		$this->db->where('id_siswa', $id);
		$this->db->update('db_siswa');

	}
	public function tambah_subyek_siswa($idsubyek,$id, $subyek, $level, $jenistp, $statussiswa, $tgldftrsubyek,$imgQrName){
		$this->db->set('id_subyek_siswa', $idsubyek);
		$this->db->set('id_siswa',$id);
		$this->db->set('subyek',$subyek);
		$this->db->set('level',$level);
		$this->db->set('jenis_tp',$jenistp);
		$this->db->set('status_subyek_siswa',$statussiswa);
		$this->db->set('tgl_awal_daftar',$tgldftrsubyek);
		$this->db->set('img_qrcode',$imgQrName);
		$this->db->insert('db_subyek_siswa');
	} 
	public function cekSiswa($id)
	{
		$cek = $this->db->get_where('db_subyek_siswa', ['id_siswa' => $id]);
		return $cek;
	}
	public function hapusSiswa($id)
	{
		$this->db->where('id_siswa', $id);
		$this->db->delete('db_siswa');
	}
	public function cekId($idbaru){
	$cekid = $this->db->get_where('db_siswa', ['id_siswa' => $idbaru]);
		return $cekid;
	}
	public function idSubyek($idsubyek){
		$id = $this->db->get_where('db_subyek_siswa', ['id_subyek_siswa'=>$idsubyek]);
		return $id;
	}
}

/* End of file model_siswa.php */
/* Location: ./application/models/model_siswa.php */