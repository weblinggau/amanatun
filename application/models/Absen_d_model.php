<?php

/**
 * 
 */
class Absen_d_model extends CI_model
{
	public function getAllabsen_d()
	{
		$this->db->select('*');
		$this->db->from('absen_dosen');
		$query = $this->db->get();
		return $query->result();	
	}
	public function tambahDataabsen_d($data)
	{
		$this->db->insert('absen_dosen', $data);
		return TRUE;
	}
	public function getAllabsen_dbyid($id_absen_dosen)
	{
		return $this->db->where('id_absen_dosen', $id_absen_dosen)->get('absen_dosen')->row();
	}
	public function ubahDataabsen_d($data, $id_absen_dosen)
	{
		$this->db->where('id_absen_dosen', $id_absen_dosen)->update('absen_dosen', $data);
		return TRUE;
	}
	public function hapusDataabsen_d($id_absen_dosen)
	{
		// $this->db->where('id', $id);
		$this->db->delete('absen_dosen', ['id_absen_dosen' => $id_absen_dosen]);
	}
}

?>