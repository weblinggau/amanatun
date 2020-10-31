<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Absdosen extends CI_Controller 
// {
// 	public function __construct(){
// 		parent::__construct();

// 		$this->load->model('Panelmodel');
// 	}


// 	public function add(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '4' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//       $nip = htmlspecialchars($this->input->post('nip', true));
//   		$tgl = htmlspecialchars($this->input->post('tgl', true));
//   		$hari= htmlspecialchars($this->input->post('hari', true));
//   		$mas = htmlspecialchars($this->input->post('masuk', true));
//   		$ket = htmlspecialchars($this->input->post('ket', true));

//   		$this->Panelmodel->addabsdos($nip,$tgl,$hari,$mas,$ket);

//   		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
//     		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       	<span aria-hidden="true">&times;</span>
//     		</button>
//   		</div>');
//   		redirect('Panel/absendosen');
// 		}
		
// 	}
// 	public function hapus($id){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '4' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
// 			$this->Panelmodel->hapusabsdos($id);
// 			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
//   		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     	<span aria-hidden="true">&times;</span>
//   		</button>
// 		</div>');
// 			redirect('Panel/absendosen');
// 		}
// 	}

// 	public function praedit(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '4' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//     		$id = htmlspecialchars($this->input->post('absdos', true));
//     		$absds = $this->Panelmodel->absdosedit($id);
			
// 	    		echo '<div class="form-group">
//                   <label>Nip Pegawai</label>
//                   <input type="hidden" name="id" value="'.$absds->id_absen_dosen.'">
//                   <input type="text" class="form-control"  name="nip" value="'.$absds->nip_pegawai.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Tanggal</label>
//                   <input type="date" class="form-control"  name="tgl" value="'.$absds->tanggal.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Hari</label>
//                   <input type="text" class="form-control"  name="hari" value="'.$absds->hari.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Jam</label>
//                   <input type="text" class="form-control"  name="masuk" value="'.$absds->masuk.'">
//                 </div>
//                 <div class="form-group">
//                   <label>Keterangan</label>
//                   <input type="text" class="form-control"  name="ket" value="'.$absds->keterangan.'">
//                 </div>';

//       }
           
// 	}

// 	public function update(){
// 		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '4' && $this->session->userdata('role_id') != '3') {
//     		redirect('Auth');
//     	}else{
//     	$nip = htmlspecialchars($this->input->post('nip', true));
//       $tgl = htmlspecialchars($this->input->post('tgl', true));
//       $hari= htmlspecialchars($this->input->post('hari', true));
//       $mas = htmlspecialchars($this->input->post('masuk', true));
//       $ket = htmlspecialchars($this->input->post('ket', true));
// 			$id = htmlspecialchars($this->input->post('id', true));
//     	$this->Panelmodel->absdosupdate($nip,$tgl,$hari,$mas,$ket,$id);
// 			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
//   		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     	<span aria-hidden="true">&times;</span>
//   		</button>
// 		</div>');
			
// 		redirect('Panel/absendosen');
//     	}
// 	}

// }