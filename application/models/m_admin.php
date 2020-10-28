<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function simpandata($datasimpan){

		
		$hasil = $this->db->insert('db_siswa',  $datasimpan);
		return $hasil;
	} 
 
	public function lihatdata(){
		$ds= $this->db->get('db_siswa');
		return $ds;
	}
	function totalsiswa(){
		
		$hsl=$this->db->query("SELECT COUNT(id_subyek_siswa) AS total_siswa FROM db_subyek_siswa where status_subyek_siswa = 'aktif'");
		return $hsl;

	}
	function totalAbsensi(){
		$tgl = date('d');
		$bulan = date('m');
		$tahun = date('Y');
		$hsl=$this->db->query("SELECT COUNT(id_subyek_siswa) AS total_absensi FROM db_absensi where tanggal_absensi LIKE '%$tgl%' AND bulan_absensi LIKE '%$bulan%' AND tahun_absensi LIKE '%$tahun%'");
		return $hsl;

	}
	function totalBayar(){
		$bulan = date('m');
		$tahun = date('Y');
		$hsl=$this->db->query("SELECT SUM(jumlah_tagihan) AS total_tagihan, SUM(jumlah_bayar)AS total_bayar FROM db_bayarr where bulan_bayar >= '$bulan' AND tahun_bayar LIKE '%$tahun%'");
		return $hsl;

	}
	 public function getbyid($id)
	{
        return $this->db->get_where('db_siswa', ['id_siswa' => $id])->row();
    }

	public function updatesiswa($id){

		$hsl=$this->db->query("SELECT * FROM db_siswa where id_siswa='$'");
		return $hsl;
	}
	public function showProfile($email){
		return $this->db->get_where('admin', ['email_admin' => $email]);
	}
	public function editAdmin($namaadmin, $notlpadmin, $email, $passadmin){
		$this->db->set('nama_admin', $namaadmin);
		$this->db->set('no_tlp_admin', $notlpadmin);
		$this->db->set('password_admin', $passadmin);
		$this->db->where('email_admin', $email);
		$this->db->update('admin');
	}
	public function tambahAdminp($namaadmin, $notlpadmin, $email, $passadmin){
		$this->db->set('nama_admin', $namaadmin);
		$this->db->set('no_tlp_admin', $notlpadmin);
		$this->db->set('password_admin', $passadmin);
		$this->db->insert('admin');
	}
	public function hapusAdmin($id){
		$this->db->where('id_admin', $id);
		$this->db->delete('admin');
	}
		
	
}
/* End of file modelName.php */
/* Location: ./application/models/modelName.php */