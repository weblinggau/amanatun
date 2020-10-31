<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class Abspeg extends CI_Controller 
// {
// 	public function __construct(){
// 		parent::__construct();

// 		$this->load->model('Panelmodel');
// 	}


// 	public function add(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//       $nip = htmlspecialchars($this->input->post('nip', true));
//   		$tgl = htmlspecialchars($this->input->post('tgl', true));
//   		$hari= htmlspecialchars($this->input->post('hari', true));
//   		$jam = htmlspecialchars($this->input->post('jam', true));
//   		$ket = htmlspecialchars($this->input->post('ket', true));

//   		$this->Panelmodel->addabspeg($nip,$tgl,$hari,$jam,$ket);

//   		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
//     		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       	<span aria-hidden="true">&times;</span>
//     		</button>
//   		</div>');
//   		redirect('Panel/absenpegawai');
// 		}
		
// 	}
// 	public function hapus($idabs,$iddetail){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
// 			$this->Panelmodel->hapusabspeg($idabs,$iddetail);
// 			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
//   		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     	<span aria-hidden="true">&times;</span>
//   		</button>
// 		</div>');
// 			redirect('Panel/absenpegawai');
// 		}
// 	}

// 	public function praedit(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//     		$id = htmlspecialchars($this->input->post('abspeg', true));
//     		$absp = $this->Panelmodel->abspegedit($id);
			
// 	    		echo '<div class="form-group">
//                   <label>Nip Pegawai</label>
//                   <input type="hidden" name="idabs" value="'.$absp->id_absen_pegawai.'">
//                   <input type="hidden" name="iddetail" value="'.$absp->id_detail_absen_pegawai.'">
//                   <input type="text" class="form-control"  name="nip" value="'.$absp->nip_pegawai.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Tanggal</label>
//                   <input type="date" class="form-control"  name="tgl" value="'.$absp->tanggal.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Hari</label>
//                   <input type="text" class="form-control"  name="hari" value="'.$absp->hari.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Jam</label>
//                   <input type="text" class="form-control"  name="jam" value="'.$absp->jam.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Keterangan</label>
//                   <input type="text" class="form-control"  name="ket" value="'.$absp->keterangan.'">
//                 </div>';

//         }
           
// 	}

// 	public function update(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//     	$nip = htmlspecialchars($this->input->post('nip', true));
//       $tgl = htmlspecialchars($this->input->post('tgl', true));
//       $hari= htmlspecialchars($this->input->post('hari', true));
//       $jam = htmlspecialchars($this->input->post('jam', true));
//       $ket = htmlspecialchars($this->input->post('ket', true));
// 			$idabs = htmlspecialchars($this->input->post('idabs', true));
// 			$iddetail = htmlspecialchars($this->input->post('iddetail', true));
//     	$this->Panelmodel->abspegupdate($nip,$tgl,$hari,$jam,$ket,$idabs,$iddetail);
// 			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
//   		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     	<span aria-hidden="true">&times;</span>
//   		</button>
// 		</div>');
			
// 		redirect('Panel/absenpegawai');
//     	}
// 	}

// }