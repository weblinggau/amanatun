<?php

/**
 * 
 */
class Absen_p_model extends CI_model
{
	public function getAllabsen_p()
	{
		$this->db->select('*');
		$this->db->from('absen_pegawai');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlldetail_absen_p()
	{
		$this->db->select('*');
		$this->db->from('detail_absen_pegawai');
		$query = $this->db->get();
		return $query->result();	
	}
	function getjam($id){
		$this->db->select('jam');
		$this->db->where('id_detail_absen_pegawai',$id);
		$data = $this->db->get('detail_absen_pegawai');
		return $data->result_array();
	}
	function getketerangan($id){
		$this->db->select('keterangan');
		$this->db->where('id_detail_absen_pegawai',$id);
		$data = $this->db->get('detail_absen_pegawai');
		return $data->result_array();
	}
	public function tambahDataabsen_p($data)
	{
		$this->db->insert('absen_pegawai', $data);
		return TRUE;
	}
	public function getAllabsen_pbyid($id_absen_pegawai)
	{
		return $this->db->where('id_absen_pegawai', $id_absen_pegawai)->get('absen_pegawai')->row();
	}
	public function ubahDataabsen_p($data, $id_absen_pegawai)
	{
		$this->db->where('id_absen_pegawai', $id_absen_pegawai)->update('absen_pegawai', $data);
		return TRUE;
	}
	public function hapusDataabsen_p($id_absen_pegawai)
	{
		// $this->db->where('id', $id);
		$this->db->delete('absen_pegawai', ['id_absen_pegawai' => $id_absen_pegawai]);
	}
}

?>