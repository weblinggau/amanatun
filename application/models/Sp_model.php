<?php

/**
 * 
 */
class Sp_model extends CI_model
{
	public function getAllsp()
	{
		$this->db->select('*');
		$this->db->from('surat_peringatan');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlljenis_sp()
	{
		$this->db->select('*');
		$this->db->from('jenis_surat_peringatan');
		$query = $this->db->get();
		return $query->result();	
	}
	function getnama($id){
		$this->db->select('nama');
		$this->db->where('id_jenis_sp',$id);
		$data = $this->db->get('jenis_surat_peringatan');
		return $data->result_array();
	}
	public function tambahDatasp($data)
	{
		$this->db->insert('surat_peringatan', $data);
		return TRUE;
	}
	public function getAllspbyid($id_surat_peringatan)
	{
		return $this->db->where('id_surat_peringatan', $id_surat_peringatan)->get('surat_peringatan')->row();
	}
	public function ubahDatasp($data, $id_surat_peringatan)
	{
		$this->db->where('id_surat_peringatan', $id_surat_peringatan)->update('surat_peringatan', $data);
		return TRUE;
	}
	public function hapusDatasp($id_surat_peringatan)
	{
		// $this->db->where('id', $id);
		$this->db->delete('surat_peringatan', ['id_surat_peringatan' => $id_surat_peringatan]);
	}
}

?>