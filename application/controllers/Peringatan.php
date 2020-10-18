<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peringatan extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}

  private function uploadFile(){

      $config['upload_path']          = './upload/peringatan/';
      $config['allowed_types']        = 'pdf';
      $config['file_name']            = uniqid();
      $config['overwrite']      = true;
      $config['max_size']             = 2024; // 1MB

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('berkas')) {
          return $this->upload->data("file_name");
      }else{
         return "nofiles.pdf";
      }
  }

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
      $nip = htmlspecialchars($this->input->post('nip', true));
  		$tgl = htmlspecialchars($this->input->post('tgl', true));
  		$nama = htmlspecialchars($this->input->post('num', true));
  		$sp = htmlspecialchars($this->input->post('sp', true));
  		$ket = htmlspecialchars($this->input->post('ket', true));
      $file = $this->uploadFile();

  		$this->Panelmodel->addperingatan($nip,$tgl,$nama,$sp,$ket,$file);

  		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      	<span aria-hidden="true">&times;</span>
    		</button>
  		</div>');
  		redirect('Panel/peringatan');
		}
		
	}
	public function hapus($id1,$id2){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapusperingatan($id1,$id2);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/peringatan');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('sps', true));
    		$spss = $this->Panelmodel->peringatanedit($id);
			
	    		echo '<div class="form-group">
                  <label>Nip Pegawai</label>
                  <input type="hidden" name="idsurat" value="'.$spss->id_surat_peringatan.'">
                  <input type="hidden" name="idjenis" value="'.$spss->id_jenis_sp.'">
                  <input type="hidden" name="file" value="'.$spss->file.'">
                  <input type="text" class="form-control"  name="nip" value="'.$spss->nip_pegawai.'">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control"  name="tgl" value="'.$spss->tanggal.'">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="num" value="'.$spss->nama.'">
                </div>
                <div class="form-group">
                  <label>Jenis SP</label>
                  <input type="text" class="form-control"  name="sp" value="'.$spss->jenis_sp.'">
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control"  name="ket" value="'.$spss->perihal.'">
                </div>
                <div class="form-group">
                    <label>File Aktif Saat Ini</label>
                    <a href="'.base_url("upload/peringatan/").$spss->file.'">
                        <span class="badge badge-warning">View File '.$spss->file.'</span>
                      </a>
                </div>
                <div class="form-group">
                    <label>Tipe file .pdf maksimal ukuran 2MB</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="berkas" >
                      <label class="custom-file-label" for="customFile">Lampiran</label>
                    </div>
                </div>';
      }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    	$nip = htmlspecialchars($this->input->post('nip', true));
      $tgl = htmlspecialchars($this->input->post('tgl', true));
      $nama = htmlspecialchars($this->input->post('num', true));
      $sp = htmlspecialchars($this->input->post('sp', true));
      $ket = htmlspecialchars($this->input->post('ket', true));
      $idsurat = htmlspecialchars($this->input->post('idsurat', true));
      $idjenis = htmlspecialchars($this->input->post('idjenis', true));
      if (!empty($_FILES["berkas"]["name"])) {
        $file = $this->uploadFile();
      }else{
        $file = htmlspecialchars($this->input->post('file', true));
      }
    	$this->Panelmodel->peringatanupdate($nip,$tgl,$nama,$sp,$ket,$idsurat,$idjenis,$file);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/peringatan');
    	}
	}

}