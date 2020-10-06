<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	
	public function __construct() //kodingan untuk parent
	{
		// mendefinisikan model
		parent::__construct();
		$this->load->model('Kepegawaian_model');
		$this->load->model('Izin_model');
		$this->load->model('Kepanitiaan_model');
		$this->load->model('Sp_model');
		$this->load->model('Absen_p_model');
		$this->load->model('Jabatan_fung_model');
		$this->load->model('Absen_d_model');
		$this->load->library('form_validation');
		// selesai

	}
	public function index() //fungsi halaman index
	{
		$data['title'] = 'Home'; //mendefinisikan title home
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array(); //memanggil session login 
		
		
		$this->load->view('admin/index', $data); //memanggil view
	}
	public function kepegawaian()
	{
		$data['kepegawaian'] = $this->Kepegawaian_model->getAllpegawai();
		
		$data['title'] = 'Kepegawaian';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();

		
		$this->load->view('kepegawaian/index', $data);
	}
	public function tambahkepegawaian()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['jabatan_pegawai'] = $this->Kepegawaian_model->getAlljabatan_pegawai();//memanggil database dari model
		$data['jabatan'] = $this->Kepegawaian_model->getAlljabatan();
		$data['masa_kerja'] = $this->Kepegawaian_model->getAllmasakerja();
		$data['jenjang'] = $this->Kepegawaian_model->getAlljenjang();
		$data['setting_gaji'] = $this->Kepegawaian_model->getAllsettinggaji();
		$this->form_validation->set_rules('id_kepegawaain','Id Pegawai', 'required'); //mendefinisikan form validation

		if($this->form_validation->run())
		{
			$id_kepegawaain = $this->input->post('id_kepegawaain'); //menangkap data yang dikirim menggunakan method post
			$id_jabatan_pegawai = $this->input->post('id_jabatan_pegawai');
			$get_nip_pegawai = $this->Kepegawaian_model->getnippegawai($id_jabatan_pegawai);
			$nip_pegawai = $get_nip_pegawai[0]['nip_pegawai'];
			$id_jabatan = $this->input->post('id_jabatan');
			$get_nama = $this->Kepegawaian_model->getnama($id_jabatan);
			$nama = $get_nama[0]['nama'];
			$get_sks_wajib = $this->Kepegawaian_model->getskswajib($id_jabatan);
			$sks_wajib = $get_sks_wajib[0]['sks_wajib'];
			$id_masa_kerja = $this->input->post('id_masa_kerja');
			$get_nominal = $this->Kepegawaian_model->getnominal($id_masa_kerja);
			$nominal = $get_nominal[0]['nominal'];
			$id_jenjang = $this->input->post('id_jenjang');
			$id_setting_gaji = $this->input->post('id_setting_gaji');
			$get_gapok = $this->Kepegawaian_model->getgapok($id_setting_gaji);
			$gapok = $get_gapok[0]['gapok'];
			$get_tunjangan = $this->Kepegawaian_model->gettunjangan($id_setting_gaji);
			$tunjangan = $get_tunjangan[0]['tunjangan'];
			$get_transport = $this->Kepegawaian_model->gettransport($id_setting_gaji);
			$transport = $get_transport[0]['transport'];
			
			

 
		$relasi = array('id_kepegawaain'=>$id_kepegawaain,'id_jabatan_pegawai'=>$id_jabatan_pegawai,'id_jabatan'=>$id_jabatan,'id_masa_kerja'=>$id_masa_kerja,'id_jenjang'=>$id_jenjang,'id_setting_gaji'=>$id_setting_gaji,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'sks_wajib'=>$sks_wajib,'nominal'=>$nominal,'gapok'=>$gapok,'tunjangan'=>$tunjangan,'transport'=>$transport);
		$data = array_merge($relasi); 
		if($this->Kepegawaian_model->tambahDataKepegawaian($data) == TRUE)//memasukkan data yang ditangkap ke database
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/kepegawaian');
		}
				}else{
			$this->load->view('kepegawaian/tambah', $data);	
		}
	}
	public function ubahkepegawaian($id_kepegawaain)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['jabatan_pegawai'] = $this->Kepegawaian_model->getAlljabatan_pegawai();
		$data['jabatan'] = $this->Kepegawaian_model->getAlljabatan();
		$data['masa_kerja'] = $this->Kepegawaian_model->getAllmasakerja();
		$data['jenjang'] = $this->Kepegawaian_model->getAlljenjang();
		$data['setting_gaji'] = $this->Kepegawaian_model->getAllsettinggaji();
		$data['pegawai'] = $this->Kepegawaian_model->getkepegawaainById($id_kepegawaain);
		$this->form_validation->set_rules('id_kepegawaain','Id Pegawai', 'required');

		if($this->form_validation->run())
		{
			$id_kepegawaain = $this->input->post('id_kepegawaain');
			$id_jabatan_pegawai = $this->input->post('id_jabatan_pegawai');
			$get_nip_pegawai = $this->Kepegawaian_model->getnippegawai($id_jabatan_pegawai);
			$nip_pegawai = $get_nip_pegawai[0]['nip_pegawai'];
			$id_jabatan = $this->input->post('id_jabatan');
			$get_nama = $this->Kepegawaian_model->getnama($id_jabatan);
			$nama = $get_nama[0]['nama'];
			$get_sks_wajib = $this->Kepegawaian_model->getskswajib($id_jabatan);
			$sks_wajib = $get_sks_wajib[0]['sks_wajib'];
			$id_masa_kerja = $this->input->post('id_masa_kerja');
			$get_nominal = $this->Kepegawaian_model->getnominal($id_masa_kerja);
			$nominal = $get_nominal[0]['nominal'];
			$id_jenjang = $this->input->post('id_jenjang');
			$id_setting_gaji = $this->input->post('id_setting_gaji');
			$get_gapok = $this->Kepegawaian_model->getgapok($id_setting_gaji);
			$gapok = $get_gapok[0]['gapok'];
			$get_tunjangan = $this->Kepegawaian_model->gettunjangan($id_setting_gaji);
			$tunjangan = $get_tunjangan[0]['tunjangan'];
			$get_transport = $this->Kepegawaian_model->gettransport($id_setting_gaji);
			$transport = $get_transport[0]['transport'];
			
			

 
		$relasi = array('id_kepegawaain'=>$id_kepegawaain,'id_jabatan_pegawai'=>$id_jabatan_pegawai,'id_jabatan'=>$id_jabatan,'id_masa_kerja'=>$id_masa_kerja,'id_jenjang'=>$id_jenjang,'id_setting_gaji'=>$id_setting_gaji,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'sks_wajib'=>$sks_wajib,'nominal'=>$nominal,'gapok'=>$gapok,'tunjangan'=>$tunjangan,'transport'=>$transport);
		$data = array_merge($relasi);
		if($this->Kepegawaian_model->UbahKepegawaian($data,$id_kepegawaain) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/kepegawaian');
		}
				}else{
			$this->load->view('kepegawaian/ubah', $data);	
		}
	}
	public function hapuskepegawaian($id_kepegawaain)
	{
		$this->Kepegawaian_model->hapusDatakepegawaian($id_kepegawaain);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/kepegawaian');
	}
	public function izin()
	{
		$data['izin'] = $this->Izin_model->getAllizin();
		
		$data['title'] = 'Izin';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();

		
		$this->load->view('izin/index', $data);
	}
	public function tambahizin()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['detail_izin'] = $this->Izin_model->getAlldetail_izin();
		$this->form_validation->set_rules('id_izin','Id Izin', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');

		if($this->form_validation->run())
		{
			$id_izin = $this->input->post('id_izin');
			$nip_pegawai = $this->input->post('nip_pegawai');
			$id_detail_izin = $this->input->post('id_detail_izin');
			$get_tgl_izin = $this->Izin_model->gettgl_izin($id_detail_izin);
			$tgl_izin = $get_tgl_izin[0]['tgl_izin'];
			$get_jenis = $this->Izin_model->getjenis($id_detail_izin);
			$jenis = $get_jenis[0]['jenis'];
			$get_lama = $this->Izin_model->getlama($id_detail_izin);
			$lama = $get_lama[0]['lama'];
			$get_keperluan = $this->Izin_model->getkeperluan($id_detail_izin);
			$keperluan = $get_keperluan[0]['keperluan'];
			$get_rentang_tanggal = $this->Izin_model->getrentang_tgl($id_detail_izin);
			$rentang_tanggal = $get_rentang_tanggal[0]['rentang_tanggal'];
			$get_keterangan = $this->Izin_model->getketerangan($id_detail_izin);
			$keterangan = $get_keterangan[0]['keterangan'];
			$get_status = $this->Izin_model->getstatus($id_detail_izin);
			$status = $get_status[0]['status'];
			
			

 
		$relasi = array('id_izin'=>$id_izin,'nip_pegawai'=>$nip_pegawai,'id_detail_izin'=>$id_detail_izin,'tgl_izin'=>$tgl_izin,'jenis'=>$jenis,'lama'=>$lama,'keperluan'=>$keperluan,'rentang_tanggal'=>$rentang_tanggal,'keterangan'=>$keterangan,'status'=>$status);
		$data = array_merge($relasi);
		if($this->Izin_model->tambahDataIzin($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/izin');
		}
				}else{
			$this->load->view('izin/tambah', $data);	
		}
	}
	public function ubahizin($id_izin)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['izin'] = $this->Izin_model->getAllizinbyid($id_izin);
		$data['detail_izin'] = $this->Izin_model->getAlldetail_izin();
		$this->form_validation->set_rules('id_izin','Id Izin', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');

		if($this->form_validation->run())
		{
			$id_izin = $this->input->post('id_izin');
			$nip_pegawai = $this->input->post('nip_pegawai');
			$id_detail_izin = $this->input->post('id_detail_izin');
			$get_tgl_izin = $this->Izin_model->gettgl_izin($id_detail_izin);
			$tgl_izin = $get_tgl_izin[0]['tgl_izin'];
			$get_jenis = $this->Izin_model->getjenis($id_detail_izin);
			$jenis = $get_jenis[0]['jenis'];
			$get_lama = $this->Izin_model->getlama($id_detail_izin);
			$lama = $get_lama[0]['lama'];
			$get_keperluan = $this->Izin_model->getkeperluan($id_detail_izin);
			$keperluan = $get_keperluan[0]['keperluan'];
			$get_rentang_tanggal = $this->Izin_model->getrentang_tgl($id_detail_izin);
			$rentang_tanggal = $get_rentang_tanggal[0]['rentang_tanggal'];
			$get_keterangan = $this->Izin_model->getketerangan($id_detail_izin);
			$keterangan = $get_keterangan[0]['keterangan'];
			$get_status = $this->Izin_model->getstatus($id_detail_izin);
			$status = $get_status[0]['status'];
			
			

 
		$relasi = array('id_izin'=>$id_izin,'nip_pegawai'=>$nip_pegawai,'id_detail_izin'=>$id_detail_izin,'tgl_izin'=>$tgl_izin,'jenis'=>$jenis,'lama'=>$lama,'keperluan'=>$keperluan,'rentang_tanggal'=>$rentang_tanggal,'keterangan'=>$keterangan,'status'=>$status);
		$data = array_merge($relasi);
		if($this->Izin_model->ubahDataIzin($data, $id_izin) == TRUE)//mengupdate data di database
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/izin');
		}
				}else{
			$this->load->view('izin/ubah', $data);	
		}
	}
	public function hapusizin($id_izin)
	{
		$this->Izin_model->hapusDataizin($id_izin);//fungsi menghapus data di database
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/izin');
	}
	public function kepanitian()
	{
		$data['kepanitiaan'] = $this->Kepanitiaan_model->getAllkepanitiaan();
		
		$data['title'] = 'Kepanitiaan';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();

		
		$this->load->view('kepanitiaan/index', $data);
	}
	public function tambahkepanitiaan()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['detail_kepanitiaan'] = $this->Kepanitiaan_model->getAlld_kepanitiaan();
		$data['peran_kepanitiaan'] = $this->Kepanitiaan_model->getAllp_kepanitiaan();
		$this->form_validation->set_rules('id_kepanitiaan','Id Kepanitiaan', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('lokasi','Lokasi', 'required');
		$this->form_validation->set_rules('keterangan','Keterangan', 'required');

		if($this->form_validation->run())
		{
			$id_kepanitiaan = $this->input->post('id_kepanitiaan');
			$id_detail_kepanitiaan = $this->input->post('id_detail_kepanitiaan');
			$get_nip_pegawai = $this->Kepanitiaan_model->getnip_pegawai($id_detail_kepanitiaan);
			$nip_pegawai = $get_nip_pegawai[0]['nip_pegawai'];
			$get_honor = $this->Kepanitiaan_model->gethonor($id_detail_kepanitiaan);
			$honor = $get_honor[0]['honor'];
			$id_peran_kepanitiaan = $this->input->post('id_peran_kepanitiaan');
			$get_nama = $this->Kepanitiaan_model->getnama($id_detail_kepanitiaan);
			$nama = $get_nama[0]['nama'];
			$tanggal = $this->input->post('tanggal');
			$lokasi = $this->input->post('lokasi');
			$keterangan = $this->input->post('keterangan');
			
			
			

 
		$relasi = array('id_kepanitiaan'=>$id_kepanitiaan,'id_detail_kepanitiaan'=>$id_detail_kepanitiaan,'id_peran_kepanitiaan'=>$id_peran_kepanitiaan,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'tanggal'=>$tanggal,'lokasi'=>$lokasi,'honor'=>$honor,'keterangan'=>$keterangan);
		$data = array_merge($relasi);
		if($this->Kepanitiaan_model->tambahDatakepanitiaan($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/kepanitian');
		}
				}else{
			$this->load->view('kepanitiaan/tambah', $data);	
		}
	}
	public function ubahkepanitiaan($id_kepanitiaan)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['kepanitiaan'] = $this->Kepanitiaan_model->getAllkepanitiaanbyid($id_kepanitiaan);
		$data['detail_kepanitiaan'] = $this->Kepanitiaan_model->getAlld_kepanitiaan();
		$data['peran_kepanitiaan'] = $this->Kepanitiaan_model->getAllp_kepanitiaan();
		$this->form_validation->set_rules('id_kepanitiaan','Id Kepanitiaan', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('lokasi','Lokasi', 'required');
		$this->form_validation->set_rules('keterangan','Keterangan', 'required');

		if($this->form_validation->run())
		{
			$id_kepanitiaan = $this->input->post('id_kepanitiaan');
			$id_detail_kepanitiaan = $this->input->post('id_detail_kepanitiaan');
			$get_nip_pegawai = $this->Kepanitiaan_model->getnip_pegawai($id_detail_kepanitiaan);
			$nip_pegawai = $get_nip_pegawai[0]['nip_pegawai'];
			$get_honor = $this->Kepanitiaan_model->gethonor($id_detail_kepanitiaan);
			$honor = $get_honor[0]['honor'];
			$id_peran_kepanitiaan = $this->input->post('id_peran_kepanitiaan');
			$get_nama = $this->Kepanitiaan_model->getnama($id_detail_kepanitiaan);
			$nama = $get_nama[0]['nama'];
			$tanggal = $this->input->post('tanggal');
			$lokasi = $this->input->post('lokasi');
			$keterangan = $this->input->post('keterangan');
			
			
			

 
		$relasi = array('id_kepanitiaan'=>$id_kepanitiaan,'id_detail_kepanitiaan'=>$id_detail_kepanitiaan,'id_peran_kepanitiaan'=>$id_peran_kepanitiaan,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'tanggal'=>$tanggal,'lokasi'=>$lokasi,'honor'=>$honor,'keterangan'=>$keterangan);
		$data = array_merge($relasi);
		if($this->Kepanitiaan_model->ubahDatakepanitiaan($data,$id_kepanitiaan) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/kepanitian');
		}
				}else{
			$this->load->view('kepanitiaan/ubah', $data);	
		}
	}
	public function hapuskepanitiaan($id_kepanitiaan)
	{
		$this->Kepanitiaan_model->hapusDatakepanitiaan($id_kepanitiaan);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/kepanitian');
	}
	public function sp()
	{
		$data['sp'] = $this->Sp_model->getAllsp();
		
		$data['title'] = 'Surat Peringatan';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();

		
		$this->load->view('sp/index', $data);
	}
	public function tambahsp()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['jenis_sp'] = $this->Sp_model->getAlljenis_sp();
		$this->form_validation->set_rules('id_surat_peringatan','Id Sp', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('jenis_sp','Jenis Sp', 'required');
		$this->form_validation->set_rules('perihal','Perihal', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('file','File', 'required');

		if($this->form_validation->run())
		{
			$id_surat_peringatan = $this->input->post('id_surat_peringatan');
			$id_jenis_sp = $this->input->post('id_jenis_sp');
			$get_nama = $this->Sp_model->getnama($id_jenis_sp);
			$nama = $get_nama[0]['nama'];
			$nip_pegawai = $this->input->post('nip_pegawai');
			$jenis_sp = $this->input->post('jenis_sp');
			$tanggal = $this->input->post('tanggal');
			$perihal = $this->input->post('perihal');
			$file = $this->input->post('file');
			
			
			
			

 
		$relasi = array('id_surat_peringatan'=>$id_surat_peringatan,'id_jenis_sp'=>$id_jenis_sp,'id_jenis_sp'=>$id_jenis_sp,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'jenis_sp'=>$jenis_sp,'perihal'=>$perihal,'tanggal'=>$tanggal,'file'=>$file);
		$data = array_merge($relasi);
		if($this->Sp_model->tambahDatasp($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/sp');
		}
				}else{
			$this->load->view('sp/tambah', $data);	
		}
	}
	public function ubahsp($id_surat_peringatan)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Ubah Data';
		$data['jenis_sp'] = $this->Sp_model->getAlljenis_sp();
		$data['sp'] = $this->Sp_model->getAllspbyid($id_surat_peringatan);
		$this->form_validation->set_rules('id_surat_peringatan','Id Sp', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('jenis_sp','Jenis Sp', 'required');
		$this->form_validation->set_rules('perihal','Perihal', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('file','File', 'required');

		if($this->form_validation->run())
		{
			$id_surat_peringatan = $this->input->post('id_surat_peringatan');
			$id_jenis_sp = $this->input->post('id_jenis_sp');
			$get_nama = $this->Sp_model->getnama($id_jenis_sp);
			$nama = $get_nama[0]['nama'];
			$nip_pegawai = $this->input->post('nip_pegawai');
			$jenis_sp = $this->input->post('jenis_sp');
			$tanggal = $this->input->post('tanggal');
			$perihal = $this->input->post('perihal');
			$file = $this->input->post('file');
			
		$relasi = array('id_surat_peringatan'=>$id_surat_peringatan,'id_jenis_sp'=>$id_jenis_sp,'id_jenis_sp'=>$id_jenis_sp,'nip_pegawai'=>$nip_pegawai,'nama'=>$nama,'jenis_sp'=>$jenis_sp,'perihal'=>$perihal,'tanggal'=>$tanggal,'file'=>$file);
		$data = array_merge($relasi);
		if($this->Sp_model->ubahDatasp($data,$id_surat_peringatan) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/sp');
		}
				}else{
			$this->load->view('sp/ubah', $data);	
		}
	}
	public function hapussp($id_surat_peringatan)
	{
		$this->Sp_model->hapusDatasp($id_surat_peringatan);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/sp');
	}
	public function absen_p()
	{
		$data['absen_p'] = $this->Absen_p_model->getAllabsen_p();
		
		$data['title'] = 'Absen Pegawai';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();

		$this->load->view('absen_p/index', $data);
	}
	public function tambahabsen_p()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$data['detail_absen_pegawai'] = $this->Absen_p_model->getAlldetail_absen_p();
		$this->form_validation->set_rules('id_absen_pegawai','Id Absen Pegawai', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');

		if($this->form_validation->run())
		{
			$id_absen_pegawai = $this->input->post('id_absen_pegawai');
			$id_detail_absen_pegawai = $this->input->post('id_detail_absen_pegawai');
			$get_jam = $this->Absen_p_model->getjam($id_detail_absen_pegawai);
			$jam = $get_jam[0]['jam'];
			$get_keterangan = $this->Absen_p_model->getketerangan($id_detail_absen_pegawai);
			$keterangan = $get_keterangan[0]['keterangan'];
			$nip_pegawai = $this->input->post('nip_pegawai');
			$tanggal = $this->input->post('tanggal');
			$hari = $this->input->post('hari');
			
			
			
			
			

 
		$relasi = array('id_absen_pegawai'=>$id_absen_pegawai,'id_detail_absen_pegawai'=>$id_detail_absen_pegawai,'jam'=>$jam,'keterangan'=>$keterangan,'nip_pegawai'=>$nip_pegawai,'tanggal'=>$tanggal,'hari'=>$hari);
		$data = array_merge($relasi);
		if($this->Absen_p_model->tambahDataabsen_p($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/absen_p');
		}
				}else{
			$this->load->view('absen_p/tambah', $data);	
		}
	}
	public function ubahabsen_p($id_absen_pegawai)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Ubah Data';
		$data['detail_absen_pegawai'] = $this->Absen_p_model->getAlldetail_absen_p();
		$data['absen_p'] = $this->Absen_p_model->getAllabsen_pbyid($id_absen_pegawai);
		$this->form_validation->set_rules('id_absen_pegawai','Id Absen Pegawai', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');

		if($this->form_validation->run())
		{
			$id_absen_pegawai = $this->input->post('id_absen_pegawai');
			$id_detail_absen_pegawai = $this->input->post('id_detail_absen_pegawai');
			$get_jam = $this->Absen_p_model->getjam($id_detail_absen_pegawai);
			$jam = $get_jam[0]['jam'];
			$get_keterangan = $this->Absen_p_model->getketerangan($id_detail_absen_pegawai);
			$keterangan = $get_keterangan[0]['keterangan'];
			$nip_pegawai = $this->input->post('nip_pegawai');
			$tanggal = $this->input->post('tanggal');
			$hari = $this->input->post('hari');
			
			
			
			
			

 
		$relasi = array('id_absen_pegawai'=>$id_absen_pegawai,'id_detail_absen_pegawai'=>$id_detail_absen_pegawai,'jam'=>$jam,'keterangan'=>$keterangan,'nip_pegawai'=>$nip_pegawai,'tanggal'=>$tanggal,'hari'=>$hari);
		$data = array_merge($relasi);
		if($this->Absen_p_model->ubahDataabsen_p($data,$id_absen_pegawai) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/absen_p');
		}
				}else{
			$this->load->view('absen_p/ubah', $data);	
		}
	}
	public function hapusabsen_p($id_absen_pegawai)
	{
		$this->Absen_p_model->hapusDataabsen_p($id_absen_pegawai);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/absen_p');
	}
	public function jabatan_fung()
	{
		$data['jabatan_fung'] = $this->Jabatan_fung_model->getAlljabatan_fung();
		
		$data['title'] = 'Jabatan Fungsional';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		
		$this->load->view('jabatan_fung/index', $data);
	}
	public function tambahajabatan_fung()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$this->form_validation->set_rules('id_jabatan_fungsional','Id Jabatan Fungsional', 'required');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');
		$this->form_validation->set_rules('nomor_sk','Nomor SK', 'required');
		$this->form_validation->set_rules('tgl_mulai','Tanggal mulai', 'required');
		$this->form_validation->set_rules('tgl_berakhir','Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('status','Status', 'required');
		$this->form_validation->set_rules('nip_dosen','Nip Dosen', 'required');

		if($this->form_validation->run())
		{
			$id_jabatan_fungsional = $this->input->post('id_jabatan_fungsional');
			$jabatan = $this->input->post('jabatan');
			$nomor_sk = $this->input->post('nomor_sk');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_berakhir = $this->input->post('tgl_berakhir');
			$status = $this->input->post('status');
			$nip_dosen = $this->input->post('nip_dosen');
			
		$relasi = array('id_jabatan_fungsional'=>$id_jabatan_fungsional,'jabatan'=>$jabatan,'nomor_sk'=>$nomor_sk,'tgl_mulai'=>$tgl_mulai,'tgl_berakhir'=>$tgl_berakhir,'status'=>$status,'nip_dosen'=>$nip_dosen);
		$data = array_merge($relasi);
		if($this->Jabatan_fung_model->tambahDatajabatan_fung($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/jabatan_fung');
		}
				}else{
			$this->load->view('jabatan_fung/tambah', $data);	
		}
	}
	public function ubahjabatan_fung($id_jabatan_fungsional)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Ubah Data';
		$data['jabatan_fung'] = $this->Jabatan_fung_model->getAlljabatan_fungbyid($id_jabatan_fungsional);
		$this->form_validation->set_rules('id_jabatan_fungsional','Id Jabatan Fungsional', 'required');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');
		$this->form_validation->set_rules('nomor_sk','Nomor SK', 'required');
		$this->form_validation->set_rules('tgl_mulai','Tanggal mulai', 'required');
		$this->form_validation->set_rules('tgl_berakhir','Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('status','Status', 'required');
		$this->form_validation->set_rules('nip_dosen','Nip Dosen', 'required');

		if($this->form_validation->run())
		{
			$id_jabatan_fungsional = $this->input->post('id_jabatan_fungsional');
			$jabatan = $this->input->post('jabatan');
			$nomor_sk = $this->input->post('nomor_sk');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_berakhir = $this->input->post('tgl_berakhir');
			$status = $this->input->post('status');
			$nip_dosen = $this->input->post('nip_dosen');
			
		$relasi = array('id_jabatan_fungsional'=>$id_jabatan_fungsional,'jabatan'=>$jabatan,'nomor_sk'=>$nomor_sk,'tgl_mulai'=>$tgl_mulai,'tgl_berakhir'=>$tgl_berakhir,'status'=>$status,'nip_dosen'=>$nip_dosen);
		$data = array_merge($relasi);
		if($this->Jabatan_fung_model->ubahDatajabatan_fung($data,$id_jabatan_fungsional) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/jabatan_fung');
		}
				}else{
			$this->load->view('jabatan_fung/ubah', $data);	
		}
	}
	public function hapusjabatan_fung($id_jabatan_fungsional)
	{
		$this->Jabatan_fung_model->hapusDatajabatan_fung($id_jabatan_fungsional);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/jabatan_fung');
	}
	public function absen_d()
	{
		$data['absen_d'] = $this->Absen_d_model->getAllabsen_d();
		
		$data['title'] = 'Absen Dosen';
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		
		$this->load->view('absen_d/index', $data);
	}
	public function tambahaabsen_d()
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Tambah Data';
		$this->form_validation->set_rules('id_absen_dosen','Id Absen Dosen', 'required');
		$this->form_validation->set_rules('id_jadwal_kuliah','Id Jadwal Kuliah', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');
		$this->form_validation->set_rules('masuk','Masuk', 'required');
		$this->form_validation->set_rules('keterangan','keterangan Dosen', 'required');

		if($this->form_validation->run())
		{
			$id_absen_dosen = $this->input->post('id_absen_dosen');
			$id_jadwal_kuliah = $this->input->post('id_jadwal_kuliah');
			$nip_pegawai = $this->input->post('nip_pegawai');
			$tanggal = $this->input->post('tanggal');
			$hari = $this->input->post('hari');
			$masuk = $this->input->post('masuk');
			$keterangan = $this->input->post('keterangan');
			
		$relasi = array('id_absen_dosen'=>$id_absen_dosen,'id_jadwal_kuliah'=>$id_jadwal_kuliah,'nip_pegawai'=>$nip_pegawai,'tanggal'=>$tanggal,'hari'=>$hari,'masuk'=>$masuk,'keterangan'=>$keterangan);
		$data = array_merge($relasi);
		if($this->Absen_d_model->tambahDataabsen_d($data) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/absen_d');
		}
				}else{
			$this->load->view('absen_d/tambah', $data);	
		}
	}
	public function ubahabsen_d($id_absen_dosen)
	{
		$data['login'] = $this->db->get_where('login', ['username' =>$this->session->userdata('username')])->row_array();
		$data['title'] = 'Form Ubah Data';
		$data['absen_d'] = $this->Absen_d_model->getAllabsen_dbyid($id_absen_dosen);
		$this->form_validation->set_rules('id_absen_dosen','Id Absen Dosen', 'required');
		$this->form_validation->set_rules('id_jadwal_kuliah','Id Jadwal Kuliah', 'required');
		$this->form_validation->set_rules('nip_pegawai','Nip Pegawai', 'required');
		$this->form_validation->set_rules('tanggal','Tanggal', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');
		$this->form_validation->set_rules('masuk','Masuk', 'required');
		$this->form_validation->set_rules('keterangan','keterangan Dosen', 'required');

		if($this->form_validation->run())
		{
			$id_absen_dosen = $this->input->post('id_absen_dosen');
			$id_jadwal_kuliah = $this->input->post('id_jadwal_kuliah');
			$nip_pegawai = $this->input->post('nip_pegawai');
			$tanggal = $this->input->post('tanggal');
			$hari = $this->input->post('hari');
			$masuk = $this->input->post('masuk');
			$keterangan = $this->input->post('keterangan');
			
		$relasi = array('id_absen_dosen'=>$id_absen_dosen,'id_jadwal_kuliah'=>$id_jadwal_kuliah,'nip_pegawai'=>$nip_pegawai,'tanggal'=>$tanggal,'hari'=>$hari,'masuk'=>$masuk,'keterangan'=>$keterangan);
		$data = array_merge($relasi);
		if($this->Absen_d_model->ubahDataabsen_d($data, $id_absen_dosen) == TRUE)
		{
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/absen_d');
		}
				}else{
			$this->load->view('absen_d/ubah', $data);	
		}
	}
	public function hapusabsen_d($id_absen_dosen)
	{
		$this->Absen_d_model->hapusDataabsen_d($id_absen_dosen);
		$this->session->set_flashdata('hapus', 'Dihapus');
		redirect('admin/absen_d');
	}
}