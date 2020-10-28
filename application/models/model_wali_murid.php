<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wali_murid extends CI_Model {

	public function lihatdata($id){
		$ds= $this->db->get_where('db_siswa',['id_wali_murid' => $id]);
		return $ds;
	}
	public function datawalimurid(){
		$dw = $this->db->get('db_wali_murid');
		return $dw;

	}
	public function kemajuanBelajarwm($id)
	{
		$this->db->select('*');
		$this->db->from('db_kemajuan_belajar');
		$this->db->join('db_subyek_siswa', 'db_subyek_siswa.id_subyek_siswa = db_kemajuan_belajar.id_subyek_siswa', 'left');
		$this->db->join('db_siswa', 'db_siswa.id_siswa = db_subyek_siswa.id_siswa', 'left');
		$this->db->where('db_siswa.id_wali_murid', $id);
		$query = $this->db->get();
		return $query;
	}
	public function lihatBayarwm($id)
	{
		$this->db->select('*');
		$this->db->from('db_bayarr');
		$this->db->join('db_subyek_siswa', 'db_subyek_siswa.id_subyek_siswa = db_bayarr.id_subyek_siswa', 'left');
		$this->db->join('db_siswa', 'db_siswa.id_siswa = db_subyek_siswa.id_siswa', 'left');
		$this->db->where('db_siswa.id_wali_murid', $id);
		$query = $this->db->get();
		return $query;
	}
	public function cekwm($emailwm, $passwm)
	{
		return $this->db->get_where('db_wali_murid', ['email_wali_murid' => $emailwm, 'pass_wali_murid' => $passwm])->row();

	}
	public function daftarWalimurid($namawm, $alamatwm, $notlpwm, $emailwm, $passwm)
	{
		$this->db->set('nama_wali_murid', $namawm);
		$this->db->set('alamat_wali_murid', $alamatwm);
		$this->db->set('no_tlp_wali_murid', $notlpwm);
		$this->db->set('email_wali_murid', $emailwm);
		$this->db->set('pass_wali_murid', $passwm);
		$this->db->insert('db_wali_murid');
	}
	public function editWalimurid($namawm, $alamatwm, $notlpwm, $emailwm, $passwm)
	{
		$this->db->set('nama_wali_murid', $namawm);
		$this->db->set('alamat_wali_murid', $alamatwm);
		$this->db->set('no_tlp_wali_murid', $notlpwm);
		$this->db->set('pass_wali_murid', $passwm);
		$this->db->where('email_wali_murid', $emailwm);
		$this->db->update('db_wali_murid');
	}


}

/* End of file model_wali_murid.php */
/* Location: ./application/models/model_wali_murid.php */