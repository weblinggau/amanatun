<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}


	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
		$nip = htmlspecialchars($this->input->post('nip', true));
		$mas = htmlspecialchars($this->input->post('mas', true));
		$nama= htmlspecialchars($this->input->post('nama', true));
    $gender= htmlspecialchars($this->input->post('gender', true));
		$sks = htmlspecialchars($this->input->post('sks', true));
		$nom = htmlspecialchars($this->input->post('nom', true));
		$gapok = htmlspecialchars($this->input->post('gapok', true));
		$tunjangan = htmlspecialchars($this->input->post('tunjangan', true));
		$trans = htmlspecialchars($this->input->post('trans', true));

		$this->Panelmodel->addpegawai($nip,$mas,$nama,$sks,$nom,$gapok,$tunjangan,$trans,$gender);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/pegawai');
		}
		
	}
	public function hapus($idind,$idall){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapuspegawai($idind,$idall);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/pegawai');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('pegawai', true));
    		$peg = $this->Panelmodel->pegawaiedit($id);
			
	    		echo '<div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="hidden" name="idpegawai" value="'.$peg->id_kepegawaian.'">
                  <input type="hidden" name="idall" value="'.$peg->id_jabatan.'">
                  <input type="text" class="form-control"  name="nip" value="'.$peg->nip_pegawai.'">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="nama" value="'.$peg->nama.'">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="gender" class="form-control">
                    <option>'.$peg->gender.'</option>
                    <option>laki-laki</option>
                    <option>perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>SKS Wajib</label>
                  <input type="text" class="form-control"  name="sks" value="'.$peg->sks_wajib.'">
                </div>
                <div class="form-group">
                  <label>Masa Kerja</label>
                  <input type="text" class="form-control"  name="mas" value="'.$peg->masa_kerja.'">
                </div>
                <div class="form-group">
                  <label>Nominal</label>
                  <input type="text" class="form-control"  name="nom" value="'.$peg->nominal.'">
                </div>
                <div class="form-group">
                  <label>Gapok</label>
                  <input type="number" class="form-control"  name="gapok" value="'.$peg->gapok.'">
                </div>
                <div class="form-group">
                  <label>Tunjangan</label>
                  <input type="number" class="form-control"  name="tunjangan" value="'.$peg->tunjangan.'">
                </div>
                <div class="form-group">
                  <label>Transport</label>
                  <input type="number" class="form-control"  name="trans" value="'.$peg->transport.'">
                </div>';

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$nip = htmlspecialchars($this->input->post('nip', true));
			$mas = htmlspecialchars($this->input->post('mas', true));
			$nama= htmlspecialchars($this->input->post('nama', true));
			$sks = htmlspecialchars($this->input->post('sks', true));
			$nom = htmlspecialchars($this->input->post('nom', true));
      $gender = htmlspecialchars($this->input->post('gender', true));
			$gapok = htmlspecialchars($this->input->post('gapok', true));
			$tunjangan = htmlspecialchars($this->input->post('tunjangan', true));
			$trans = htmlspecialchars($this->input->post('trans', true));
			$idind = htmlspecialchars($this->input->post('idpegawai', true));
			$idall = htmlspecialchars($this->input->post('idall', true));
    		$this->Panelmodel->pegawaiupdate($nip,$mas,$nama,$sks,$nom,$gapok,$tunjangan,$trans,$idall,$gender,$idind);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/pegawai');
    	}
	}

} 