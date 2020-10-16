<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}


	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' ) {
    		redirect('Auth');
    	}else{
      $nip = htmlspecialchars($this->input->post('nip', true));
  		$tgl = htmlspecialchars($this->input->post('tgl', true));
  		$jenis= htmlspecialchars($this->input->post('jenis', true));
  		$kep = htmlspecialchars($this->input->post('kep', true));
  		$ren = htmlspecialchars($this->input->post('ren', true));
      $lama = htmlspecialchars($this->input->post('lama', true));
  		$ket = htmlspecialchars($this->input->post('ket', true));
  		$status = htmlspecialchars($this->input->post('status', true));

  		$this->Panelmodel->addizin($nip,$tgl,$jenis,$kep,$ren,$lama,$ket,$status);

  		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      	<span aria-hidden="true">&times;</span>
    		</button>
  		</div>');
  		redirect('Panel/izin');
		}
		
	}
	public function hapus($idind,$idall){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapusizin($idind,$idall);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/izin');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('izin', true));
    		$izin = $this->Panelmodel->izinedit($id);
			
	    		echo '<div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="hidden" name="idind" value="'.$izin->id_izin.'">
                  <input type="hidden" name="idall" value="'.$izin->id_detail_izin.'">
                  <input type="text" class="form-control"  name="nip" value="'.$izin->nip_pegawai.'">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control"  name="tgl" value="'.$izin->tgl_izin.'">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control"  name="jenis" value="'.$izin->jenis.'">
                </div>
                <div class="form-group">
                  <label>Lama</label>
                  <input type="text" class="form-control"  name="lama" value="'.$izin->lama.'">
                </div>
                <div class="form-group">
                  <label>Keperluan</label>
                  <input type="text" class="form-control"  name="kep" value="'.$izin->keperluan.'">
                </div>
                <div class="form-group">
                  <label>Rentang Tanggal</label>
                  <input type="text" class="form-control"  name="ren" value="'.$izin->rentang_tanggal.'">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control"  name="ket" value="'.$izin->keterangan.'">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" class="form-control"  name="status" value="'.$izin->status.'">
                </div>';

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$nip = htmlspecialchars($this->input->post('nip', true));
      $tgl = htmlspecialchars($this->input->post('tgl', true));
      $jenis= htmlspecialchars($this->input->post('jenis', true));
      $kep = htmlspecialchars($this->input->post('kep', true));
      $ren = htmlspecialchars($this->input->post('ren', true));
      $lama = htmlspecialchars($this->input->post('lama', true));
      $ket = htmlspecialchars($this->input->post('ket', true));
      $status = htmlspecialchars($this->input->post('status', true));
			$idind = htmlspecialchars($this->input->post('idind', true));
			$idall = htmlspecialchars($this->input->post('idall', true));
    		$this->Panelmodel->izinupdate($nip,$tgl,$jenis,$kep,$ren,$lama,$ket,$status,$idind,$idall);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/izin');
    	}
	}

}