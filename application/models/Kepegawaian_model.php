<?php

/**
 * 
 */
class Kepegawaian_model extends CI_model
{
	public function getAllpegawai()
	{
		$this->db->select('*');
		$this->db->from('kepegawaian');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlljabatan()
	{
		$this->db->select('*');
		$this->db->from('jabatan');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlljabatan_pegawai()
	{
		$this->db->select('*');
		$this->db->from('jabatan_pegawai');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAllmasakerja()
	{
		$this->db->select('*');
		$this->db->from('masa_kerja');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlljenjang()
	{
		$this->db->select('*');
		$this->db->from('jenjang');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAllsettinggaji()
	{
		$this->db->select('*');
		$this->db->from('setting_gaji');
		$query = $this->db->get();
		return $query->result();	
	}
	function getnippegawai($id){
		$this->db->select('nip_pegawai');
		$this->db->where('id_jabatan_pegawai',$id);
		$data = $this->db->get('jabatan_pegawai');
		return $data->result_array();
	}
	function getnama($id){
		$this->db->select('nama');
		$this->db->where('id_jabatan',$id);
		$data = $this->db->get('jabatan');
		return $data->result_array();
	}
	function getskswajib($id){
		$this->db->select('sks_wajib');
		$this->db->where('id_jabatan',$id);
		$data = $this->db->get('jabatan');
		return $data->result_array();
	}
	function getnominal($id){
		$this->db->select('nominal');
		$this->db->where('id_masa_kerja',$id);
		$data = $this->db->get('masa_kerja');
		return $data->result_array();
	}
	function getgapok($id){
		$this->db->select('gapok');
		$this->db->where('id_setting_gaji',$id);
		$data = $this->db->get('setting_gaji');
		return $data->result_array();
	}
	function gettunjangan($id){
		$this->db->select('tunjangan');
		$this->db->where('id_setting_gaji',$id);
		$data = $this->db->get('setting_gaji');
		return $data->result_array();
	}
	function gettransport($id){
		$this->db->select('transport');
		$this->db->where('id_setting_gaji',$id);
		$data = $this->db->get('setting_gaji');
		return $data->result_array();
	}
	public function tambahDataKepegawaian($data)
	{
		$this->db->insert('kepegawaian', $data);
		return TRUE;
	}
	public function getkepegawaainById($id_kepegawaain)
	{
		return $this->db->where('id_kepegawaain', $id_kepegawaain)->get('kepegawaian')->row();
	}
	public function UbahKepegawaian($data, $id_kepegawaain)
	{
		$this->db->where('id_kepegawaain', $id_kepegawaain)->update('kepegawaian', $data);
		return TRUE;
	}
	public function hapusDatakepegawaian($id_kepegawaain)
	{
		// $this->db->where('id', $id);
		$this->db->delete('kepegawaian', ['id_kepegawaain' => $id_kepegawaain]);
	}
}

?>