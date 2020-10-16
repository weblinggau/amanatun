<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller 
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
  		$nama= htmlspecialchars($this->input->post('nama', true));
  		$lokasi = htmlspecialchars($this->input->post('lokasi', true));
  		$honor = htmlspecialchars($this->input->post('honor', true));
  		$ket = htmlspecialchars($this->input->post('ket', true));

  		$this->Panelmodel->addkepanitiaan($nip,$tgl,$nama,$lokasi,$honor,$ket);

  		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      	<span aria-hidden="true">&times;</span>
    		</button>
  		</div>');
  		redirect('Panel/panitia');
		}
		
	}
	public function hapus($panitia,$idall){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapuspanitia($panitia,$idall);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/panitia');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('panitia', true));
    		$panit = $this->Panelmodel->panitiaedit($id);
			
	    		echo '<div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="hidden" name="idpanitia" value="'.$panit->id_kepanitiaan.'">
                  <input type="hidden" name="idall" value="'.$panit->id_detail_kepanitiaan.'">
                  <input type="text" class="form-control"  name="nip" value="'.$panit->nip_pegawai.'">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="nama" value="'.$panit->nama.'">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control"  name="tgl" value="'.$panit->tanggal.'">
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <input type="text" class="form-control"  name="lokasi" value="'.$panit->lokasi.'">
                </div>
                <div class="form-group">
                  <label>Honor</label>
                  <input type="number" class="form-control"  name="honor" value="'.$panit->honor.'">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control"  name="ket" value="'.$panit->keterangan.'">
                </div>';

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    	$nip = htmlspecialchars($this->input->post('nip', true));
      $tgl = htmlspecialchars($this->input->post('tgl', true));
      $nama= htmlspecialchars($this->input->post('nama', true));
      $lokasi = htmlspecialchars($this->input->post('lokasi', true));
      $honor = htmlspecialchars($this->input->post('honor', true));
      $ket = htmlspecialchars($this->input->post('ket', true));
			$panitia = htmlspecialchars($this->input->post('idpanitia', true));
			$idall = htmlspecialchars($this->input->post('idall', true));
    		$this->Panelmodel->panitiaupdate($nip,$tgl,$nama,$lokasi,$honor,$ket,$panitia,$idall);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/panitia');
    	}
	}

}