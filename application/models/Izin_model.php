<?php

/**
 * 
 */
class Izin_model extends CI_model
{
	public function getAllizin()
	{
		$this->db->select('*');
		$this->db->from('izin');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getAlldetail_izin()
	{
		$this->db->select('*');
		$this->db->from('detail_izin');
		$query = $this->db->get();
		return $query->result();	
	}
	function gettgl_izin($id){
		$this->db->select('tgl_izin');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getjenis($id){
		$this->db->select('jenis');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getlama($id){
		$this->db->select('lama');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getrentang_tgl($id){
		$this->db->select('rentang_tanggal');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getketerangan($id){
		$this->db->select('keterangan');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getstatus($id){
		$this->db->select('status');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	function getkeperluan($id){
		$this->db->select('keperluan');
		$this->db->where('id_detail_izin',$id);
		$data = $this->db->get('detail_izin');
		return $data->result_array();
	}
	public function tambahDataIzin($data)
	{
		$this->db->insert('izin', $data);
		return TRUE;
	}
	public function getAllizinbyid($id_izin)
	{
		return $this->db->where('id_izin', $id_izin)->get('izin')->row();
	}
	public function ubahDataIzin($data, $id_izin)
	{
		$this->db->where('id_izin', $id_izin)->update('izin', $data);
		return TRUE;
	}
	public function hapusDataizin($id_izin)
	{
		// $this->db->where('id', $id);
		$this->db->delete('izin', ['id_izin' => $id_izin]);
	}
}


?>
