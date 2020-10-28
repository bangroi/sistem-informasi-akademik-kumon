<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_absensi extends CI_Model {

	public function lihatDataAbsensi($time){
		$hsl = $this->db->query("SELECT * FROM db_absensi left JOIN db_subyek_siswa ON db_absensi.id_subyek_siswa = db_subyek_siswa.id_subyek_siswa LEFT JOIN db_siswa ON  db_subyek_siswa.id_siswa = db_siswa.id_siswa  where db_absensi.tanggal_absensi =$time ORDER BY tanggal_absensi DESC");
		return $hsl;

	}
	function totalabsensi(){

		$tgl = date('d');
		$hsl=$this->db->query("SELECT COUNT(id_absensi) AS total_siswa FROM db_absensi where tanggal_absensi = '$tgl'");
		return $hsl;

	}
	public function tambahAbsen($idabsen, $tgl, $bln, $tahun, $waktu)
	{
		$this->db->set('id_subyek_siswa', $idabsen);
		$this->db->set('tanggal_absensi', $tgl);
		$this->db->set('bulan_absensi', $bln);
		$this->db->set('tahun_absensi', $tahun);
		$this->db->set('waktu', $waktu);
		$this->db->insert('db_absensi');
	}

	public function cekAbsen($idabsen)
	{
		$cek= $this->db->get_where('db_subyek_siswa',['id_subyek_siswa' => $idabsen]);
		return $cek;

	}public function cekDoubleAbsen($idabsen, $tgl)
	{
		$cek= $this->db->get_where('db_absensi',
			[	
				'id_subyek_siswa' => $idabsen,
		 		'tanggal_absensi' => $tgl]);
		return $cek;
	}
	

}



/* End of file model_absensi.php */
/* Location: ./application/models/model_absensi.php */