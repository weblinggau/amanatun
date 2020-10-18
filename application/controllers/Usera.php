<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usera extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}


	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' ) {
    		redirect('Auth');
    	}else{
      $email = htmlspecialchars($this->input->post('email', true));
  		$role = htmlspecialchars($this->input->post('role', true));
  		$pass = password_hash($this->input->post('pas'), PASSWORD_DEFAULT);
  		$this->Panelmodel->addusera($email,$role,$pass);
  		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      	<span aria-hidden="true">&times;</span>
    		</button>
  		</div>');
  		redirect('Panel/user');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapususer($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/user');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('user', true));
    		$utr = $this->Panelmodel->useredit($id);
			
	    		echo '<div class="form-group">
                  <label>Email</label>
                  <input type="hidden" name="id" value="'.$utr->id.'">
                  <input type="email" class="form-control"  name="email" value="'.$utr->username.'">
                </div>
                <div class="form-group">
                  <label>Jenis User</label>
                  <select class="form-control" name="role">
                    <option value="'.$utr->role_id.'">'.$utr->role.' (Sedang Aktif) </option>
                    <option value="1">Admin</option>
                    <option value="2">Pimpinan</option>
                    <option value="3">Dosen</option>
                    <option value="4">Absensi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control"  name="pas">
                </div>';

      }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    	$email = htmlspecialchars($this->input->post('email', true));
      $role = htmlspecialchars($this->input->post('role', true));
      $id = htmlspecialchars($this->input->post('id', true));
        if (empty($this->input->post('pas'))) {
          $this->Panelmodel->userupdate($email,$role,$id);
        }else{
          $pass = password_hash($this->input->post('pas'), PASSWORD_DEFAULT);
          $this->Panelmodel->userupdatepass($email,$role,$pass,$id);
        }
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		  redirect('Panel/user');
    }
	}

}