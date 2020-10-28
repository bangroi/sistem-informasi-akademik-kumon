<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bayar extends CI_Model {

	public function lihatBayar()
	{
		$this->db->select('*');
		$this->db->from('db_bayarr');
		$this->db->join('db_subyek_siswa', 'db_subyek_siswa.id_subyek_siswa = db_bayarr.id_subyek_siswa', 'left');
		$this->db->join('db_siswa', 'db_siswa.id_siswa = db_subyek_siswa.id_siswa', 'left');
		$query = $this->db->get();
		return $query;
	}
	public function lihatBayar2()
	{
		$this->db->select('*');
		$this->db->from('db_bayarr');
		$this->db->join('db_subyek_siswa', 'db_subyek_siswa.id_subyek_siswa = db_bayarr.id_subyek_siswa', 'left');
		$this->db->join('db_siswa', 'db_siswa.id_siswa = db_subyek_siswa.id_siswa', 'left');
		$this->db->where('db_bayarr.jumlah_bayar < db_bayarr.jumlah_tagihan');
		$query = $this->db->get();
		return $query;
	}
	public function bayarSpp($idsubyek, $tgl_kb, $tahun_kb)
	{
		$this->db->set('id_subyek_siswa', $idsubyek);
		$this->db->set('bulan_bayar', $tgl_kb);
		$this->db->set('tahun_bayar', $tahun_kb);
		$this->db->set('jumlah_tagihan', '400000');
		$this->db->set('jenis_bayar','spp');
		$this->db->set('jumlah_bayar', '0');
		$this->db->insert('db_bayarr');
	}
	public function bayarPendaftaran($idsubyek, $tgl_kb, $tahun_kb)
	{
		$this->db->set('id_subyek_siswa', $idsubyek);
		$this->db->set('bulan_bayar', $tgl_kb);
		$this->db->set('tahun_bayar', $tahun_kb);
		$this->db->set('jumlah_tagihan', '280000');
		$this->db->set('jenis_bayar','pendaftaran');
		$this->db->set('jumlah_bayar', '0');
		$this->db->insert('db_bayarr');
	}
	public function editBayar($id, $jumlahBayar)
	{
		$this->db->set('jumlah_bayar', $jumlahBayar);
		$this->db->where('id_bayar', $id);
		$this->db->update('db_bayarr');
	}
	
}
