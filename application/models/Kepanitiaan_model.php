<?php

/**
 * 
 */
class Kepanitiaan_model extends CI_model
{
	public function getAllkepanitiaan()
	{
		$this->db->select('*');
		$this->db->from('kepanitiaan');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlld_kepanitiaan()
	{
		$this->db->select('*');
		$this->db->from('detail_kepanitiaan');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAllp_kepanitiaan()
	{
		$this->db->select('*');
		$this->db->from('peran_kepanitiaan');
		$query = $this->db->get();
		return $query->result();	
	}
	function gethonor($id){
		$this->db->select('honor');
		$this->db->where('id_detail_kepanitiaan',$id);
		$data = $this->db->get('detail_kepanitiaan');
		return $data->result_array();
	}
	function getnip_pegawai($id){
		$this->db->select('nip_pegawai');
		$this->db->where('id_detail_kepanitiaan',$id);
		$data = $this->db->get('detail_kepanitiaan');
		return $data->result_array();
	}
	function getnama($id){
		$this->db->select('nama');
		$this->db->where('id_peran_kepanitiaan',$id);
		$data = $this->db->get('peran_kepanitiaan');
		return $data->result_array();
	}
	public function tambahDatakepanitiaan($data)
	{
		$this->db->insert('kepanitiaan', $data);
		return TRUE;
	}
	public function getAllkepanitiaanbyid($id_kepanitiaan)
	{
		return $this->db->where('id_kepanitiaan', $id_kepanitiaan)->get('kepanitiaan')->row();
	}
	public function ubahDatakepanitiaan($data, $id_kepanitiaan)
	{
		$this->db->where('id_kepanitiaan', $id_kepanitiaan)->update('kepanitiaan', $data);
		return TRUE;
	}
	public function hapusDatakepanitiaan($id_kepanitiaan)
	{
		// $this->db->where('id', $id);
		$this->db->delete('kepanitiaan', ['id_kepanitiaan' => $id_kepanitiaan]);
	}
}

?>