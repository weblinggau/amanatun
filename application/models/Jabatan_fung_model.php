<?php

/**
 * 
 */
class Jabatan_fung_model extends CI_model
{
	public function getAlljabatan_fung()
	{
		$this->db->select('*');
		$this->db->from('jabatan_fungsional');
		$query = $this->db->get();
		return $query->result();	
	}
	public function tambahDatajabatan_fung($data)
	{
		$this->db->insert('jabatan_fungsional', $data);
		return TRUE;
	}
	public function getAlljabatan_fungbyid($id_jabatan_fungsional)
	{
		return $this->db->where('id_jabatan_fungsional', $id_jabatan_fungsional)->get('jabatan_fungsional')->row();
	}
	public function ubahDatajabatan_fung($data, $id_jabatan_fungsional)
	{
		$this->db->where('id_jabatan_fungsional', $id_jabatan_fungsional)->update('jabatan_fungsional', $data);
		return TRUE;
	}
	public function hapusDatajabatan_fung($id_jabatan_fungsional)
	{
		// $this->db->where('id', $id);
		$this->db->delete('jabatan_fungsional', ['id_jabatan_fungsional' => $id_jabatan_fungsional]);
	}
}

?>