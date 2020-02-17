<?php 

class Admin extends CI_Controller {

	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_loggedin')) {

			$this->session->set_flashdata('no_access','maaf silahkan login terlebih dahulu');

		redirect('Login');
		}
	

		if ($this->session->userdata('status_akun')==2) {

			$this->session->set_flashdata('no_account_verify','maaf akun anda belum terverifikasi');

		redirect('Login');
		}
		
	}

	public function index() 
	{
		$data['totalUser'] = $this->UserModel->totalUser();
		$data['notif'] = $this->UserModel->notifUser();	
		$data['totalPortofolio'] = $this->PortofolioModel->totalPortofolio();
		$data['totalNomorSurat'] = $this->SuratModel->totalNomorSurat();
		$data['totalCloudFile'] = $this->CloudModel->totalCloudFile();
		$id_user = $this->session->userdata('id_user');
		$data['item'] = $this->UserModel->getById($id_user);

		$data['main_admin'] = "backend/dashboard";
		$this->load->view('layouts/admin',$data);
		
		
	}


}


?>
