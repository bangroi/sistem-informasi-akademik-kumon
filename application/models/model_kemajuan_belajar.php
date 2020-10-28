<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kemajuan_belajar extends CI_Model {
	public function kbAwal($idsubyek, $subyek,  $tglKb, $reallevel, $nomerreallevel, $thnKb){
		$this->db->set('id_subyek_siswa', $idsubyek);
		$this->db->set('subyek', $subyek);
		$this->db->set('tgl_kb', $tglKb);
		$this->db->set('real_level_kb',$reallevel);
		$this->db->set('r_no_level_kb',$nomerreallevel);
		$this->db->set('tahun_kb', $thnKb);
		$this->db->insert('db_kemajuan_belajar');
	}
	public function tambahKb($idsubyek,$tgl_kb, $tahun_kb, $target_level_kb, $nomertargetlevel, $real_level_kb, $nomerreallevel, $catatan_kb, $subyek){
		$this->db->set('id_subyek_siswa', $idsubyek);
		$this->db->set('subyek', $subyek);
		$this->db->set('tgl_kb', $tgl_kb);
		$this->db->set('target_level_kb', $target_level_kb);
		$this->db->set('t_no_level_kb', $nomertargetlevel);
		$this->db->set('real_level_kb', $real_level_kb);
		$this->db->set('r_no_level_kb', $nomerreallevel);
		$this->db->set('catatan_kb', $catatan_kb);
		$this->db->set('real_level_kb', $real_level_kb);
		$this->db->set('tahun_kb', $tahun_kb);
		$this->db->insert('db_kemajuan_belajar');
	}

	 public function getSiswaById($idsubyek)
    {
    	$this->db->order_by('tgl_kb', 'DESC');
        return $this->db->get_where('db_kemajuan_belajar', ['id_subyek_siswa' => $idsubyek]);

        
    }
    public function getAbsensiById($idsubyek)
    {
    	$hsl=$this->db->query("SELECT COUNT(id_subyek_siswa) AS total_absensi FROM db_absensi where id_subyek_siswa = '$idsubyek'");
		return $hsl;

        
    }
    
    /*public function chartSiswaById($idsubyek){

    $query = $this->db->query("SELECT * FROM db_kemajuan_belajar where id_subyek_siswa = '$idsubyek' order by tgl_kb asc");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }*/

    public function filterKB($subyek, $level, $bulan, $tahun){
    	$hsl=$this->db->query("SELECT * FROM db_kemajuan_belajar left JOIN db_subyek_siswa ON db_kemajuan_belajar.id_subyek_siswa = db_subyek_siswa.id_subyek_siswa left join db_siswa ON db_subyek_siswa.id_siswa = db_siswa.id_siswa where db_subyek_siswa.subyek like '%$subyek%' and db_kemajuan_belajar.tgl_kb like '%$bulan%' AND db_kemajuan_belajar.real_level_kb LIKE '$level%' AND db_kemajuan_belajar.tahun_kb LIKE '%$tahun%' ORDER BY tgl_kb desc ");
		return $hsl;

    }
    public function hapusKemajuanBelajar($id_kb){

    	$this->db->where('id_kb', $id_kb);
		$this->db->delete('db_kemajuan_belajar');

		
    }


}

/* End of file model_kemajuan_belajar.php */
/* Location: ./application/models/model_kemajuan_belajar.php */

