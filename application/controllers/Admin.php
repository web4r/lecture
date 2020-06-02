<?php 

class Admin extends CI_Controller {

	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_loggedin')) {

			$this->session->set_flashdata('no_access','maaf silahkan login terlebih dahulu');

		redirect('Login');
		}
	

		if ($this->session->userdata('is_active')==1) {

			$this->session->set_flashdata('no_account_verify','maaf akun anda belum terverifikasi');

			redirect('Login');
		}
		
	}

	public function index() 
	{
		$id = $this->session->userdata('id_users');
		$data['user'] = $this->UserModel->getById($id);
		$data['main_admin'] = "backend/dashboard";
		$this->load->view('layouts/admin',$data);
		
		
	}

	
}


?>
