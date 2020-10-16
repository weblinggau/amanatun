<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Panelmodel');
        
	}

    public function index(){
    	if ($this->session->userdata('login') != 'zpmlogin') {
    		redirect('Auth');
    	}else{
    		$this->load->view('templates/panel_header');
		    $this->load->view('templates/panel_menu');
		    $this->load->view('public/home');
		    $this->load->view('templates/panel_footer');
    	}
    	
    }

    public function pegawai(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') == '1') {
            redirect('Auth');
        }else{
            $data['pega']= $this->Panelmodel->getpegawai()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('pegawai/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function izin(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') == '1') {
            redirect('Auth');
        }else{
            $data['izin']= $this->Panelmodel->getizin()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('izin/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function panitia(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1') {
            redirect('Auth');
        }else{
            $data['panitia']= $this->Panelmodel->getpanitia()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('panitia/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }
}