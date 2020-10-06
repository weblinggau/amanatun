<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		// menyeting validasi username & password
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false){
			$data['title'] = 'Login Page';
			$this->load->view('auth/login');
		}else{
			$this->_login();
		}
				// selesai
	}

	private function _login()
	{
		// mengambil data yang di pos
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// selesai

		// mengambil data dari table login
		$login = $this->db->get_where('login', ['username'=> $username])->row_array();
		// selesai

		// membuat logika login jika berhasil di direct kemana jika gagal di direct kemana
		if($login) {
			if($password ==  $login['password']){
				$data = [
					'username' => $login['username'],
					'role_id' => $login['role_id']
				];
				$this->session->set_userdata($data);
				if($login['role_id']==1){
					redirect('admin');	
				}else{
					redirect('user');
				}
								
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah</div>');
                redirect('auth');
			}

		}

		
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username tidak ada</div>');
            redirect('auth');
		}
		// selesai
	}

	public function logout()
    {
    	// membuat logika logout dengan cara menghapus session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        // selesai

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Logout</div>');
        redirect('auth');
    }

}