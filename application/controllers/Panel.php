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
            $data['pegawai'] = count($this->Panelmodel->getpegawai()->result());
            $data['laki'] = count($this->Panelmodel->widged('laki')->result());
            $data['perempuan'] = count($this->Panelmodel->widged('perempuan')->result());
    		$this->load->view('templates/panel_header');
		    $this->load->view('templates/panel_menu');
		    $this->load->view('public/home', $data);
		    $this->load->view('templates/panel_footer');
    	}
    	
    }

    public function user(){
        if ($this->session->userdata('login') != 'zpmlogin') {
            redirect('Auth');
        }else{
            $data['usera']= $this->Panelmodel->getusera()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('user/index.php',$data);
            $this->load->view('templates/panel_footer');
        }
        
    }

    public function pegawai(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
            redirect('Auth');
        }else{
            $data['pega']= $this->Panelmodel->getpegawai()->result();
            $data['pegawai'] = count($this->Panelmodel->getpegawai()->result());
            $data['laki'] = count($this->Panelmodel->widged('laki')->result());
            $data['perempuan'] = count($this->Panelmodel->widged('perempuan')->result());
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('pegawai/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function izin(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
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
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3')  {
            redirect('Auth');
        }else{
            $data['panitia']= $this->Panelmodel->getpanitia()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('panitia/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    // public function absenpegawai(){
    //     if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    //         redirect('Auth');
    //     }else{
    //         $data['abspeg']= $this->Panelmodel->getabspeg()->result();
    //         $this->load->view('templates/panel_header');
    //         $this->load->view('templates/panel_menu');
    //         $this->load->view('abspegawai/index',$data);
    //         $this->load->view('templates/panel_footer');
    //     }
    // }

    // public function absendosen(){
    //     if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '4' && $this->session->userdata('role_id') != '3') {
    //         redirect('Auth');
    //     }else{
    //         $data['absdos']= $this->Panelmodel->getabsdos()->result();
    //         $this->load->view('templates/panel_header');
    //         $this->load->view('templates/panel_menu');
    //         $this->load->view('absdosen/index',$data);
    //         $this->load->view('templates/panel_footer');
    //     }
    // }

    public function peringatan(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
            redirect('Auth');
        }else{
            $data['peringatan']= $this->Panelmodel->getperingatan()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('peringatan/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function fungsional(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
            redirect('Auth');
        }else{
            $data['fungsi']= $this->Panelmodel->getfungsi()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('fungsi/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function laporan(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '2') {
            redirect('Auth');
        }else{
            $data['fungsi']= $this->Panelmodel->getfungsi()->result();
            $data['peringatan']= $this->Panelmodel->getperingatan()->result();
            $data['absdos']= $this->Panelmodel->getabsdos()->result();
            $data['abspeg']= $this->Panelmodel->getabspeg()->result();
            $data['panitia']= $this->Panelmodel->getpanitia()->result();
            $data['pega']= $this->Panelmodel->getpegawai()->result();
            $data['izin']= $this->Panelmodel->getizin()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('laporan/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }
}