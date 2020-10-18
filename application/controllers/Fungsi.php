<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Controller 
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
  		$tglstr = htmlspecialchars($this->input->post('tglstr', true));
  		$tglend = htmlspecialchars($this->input->post('tglend', true));
  		$jabatan = htmlspecialchars($this->input->post('jabatan', true));
  		$sk = htmlspecialchars($this->input->post('sk', true));
      $status = htmlspecialchars($this->input->post('status', true));
  		$this->Panelmodel->addfungsi($nip,$tglstr,$tglend,$jabatan,$sk,$status);

  		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      	<span aria-hidden="true">&times;</span>
    		</button>
  		</div>');
  		redirect('Panel/fungsional');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapusfungsi($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/fungsional');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('jbt', true));
    		$ftr = $this->Panelmodel->fungsiedit($id);
			
	    		echo '<div class="form-group">
                  <label>Nip Dosen</label>
                  <input type="hidden"  name="id" value="'.$ftr->id_jabatan_fungsional.'">
                  <input type="text" class="form-control"  name="nip" value="'.$ftr->nip_dosen.'">
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control"  name="tglstr" value="'.$ftr->tgl_mulai.'">
                </div>
                <div class="form-group">
                  <label>Tanggal Berakhir</label>
                  <input type="date" class="form-control"  name="tglend" value="'.$ftr->tgl_berakhir.'">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control"  name="jabatan" value="'.$ftr->jabatan.'"
                </div>
                <div class="form-group">
                  <label>Nomor Sk</label>
                  <input type="text" class="form-control"  name="sk" value="'.$ftr->nomor_sk.'">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" class="form-control"  name="status" value="'.$ftr->status.'">
                </div>';

      }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    	$nip = htmlspecialchars($this->input->post('nip', true));
      $tglstr = htmlspecialchars($this->input->post('tglstr', true));
      $tglend = htmlspecialchars($this->input->post('tglend', true));
      $jabatan = htmlspecialchars($this->input->post('jabatan', true));
      $sk = htmlspecialchars($this->input->post('sk', true));
      $status = htmlspecialchars($this->input->post('status', true));
			$id = htmlspecialchars($this->input->post('id', true));
    	$this->Panelmodel->fungsiupdate($nip,$tglstr,$tglend,$jabatan,$sk,$status,$id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/fungsional');
    	}
	}

}