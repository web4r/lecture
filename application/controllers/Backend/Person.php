<?php 

require FCPATH . 'vendor/autoload.php';
use Mailgun\Mailgun;


class Person extends CI_Controller {

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
		
		$data['person'] = $this->UserModel->getVerify();
		$data['main_admin'] = "backend/person/person";
		$this->load->view('layouts/admin',$data);
	}

	public function show($id_user)
	{
		$data['person'] = $this->UserModel->getById($id_user);
		$data['main_admin'] = "backend/person/view";
		$this->load->view('layouts/admin',$data);
	}

	public function verifyUser()
	{
		$data['person'] = $this->UserModel->verifyUserStatus();
		$data['main_admin'] = "backend/person/verifyUser";
		$this->load->view('layouts/admin',$data);
	}

	public function updateVerivication($id_user)
	{
		
		$id = $this->UserModel->getById($id_user);
		$id_user = $id->id_user;
		$data = array(
					
			'stat_akun' => 1
		);

		$update = $this->UserModel->updateVerify($id_user,$data);
		if($update)
		{
			

			$this->load->library('email');

			// $config = Array(
			// 	'protocol' => 'smtp',
			// 	'smtp_host' => 'smtp.mailtrap.io',
			// 	'smtp_port' => 2525,
			// 	'smtp_user' => 'dfd72c86a992f7',
			// 	'smtp_pass' => '66eccfe70ed7a1',
			// 	'crlf' => "\r\n",
			// 	'newline' => "\r\n"
			//   );

			
			
			
			$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.mailgun.org',
					'smtp_port' => 587,
					'smtp_user' => 'postmaster@katsinov.techinfo.id',
					'smtp_pass' => '646d00795c5290ca56c0ac546b31632d-7238b007-e5d9f2c0',
					
				  );


			$this->email->initialize($config);

			$this->email->from('adirahman@aaptechmil.com', 'Adi Rahman');
			$this->email->to($id->email);
			  
			
			$this->email->subject('AKTIVASI AKUN E-OFFICE AAPT');
			$this->email->message('Akun Anda Telah Aktif, silahkan login dengan Email ' .$id->email. ' dan Password Default adalah 123456 , Segera Ganti Password Anda');
		
			$this->email->send();
			
			$this->session->set_flashdata('update','Update Verification Success');
			redirect('Backend/Person/show/'.$id_user);
		}		
	}

	public function upateNonActivation($id_user)
	{
		$id = $this->UserModel->getById($id_user);
		$id_user = $id->id_user;
		$data = array(
					
			'stat_akun' => 2
		);

		$update = $this->UserModel->updateVerify($id_user,$data);
		if($update)
		{
			$this->load->library('email');

			// $config = Array(
			// 	'protocol' => 'smtp',
			// 	'smtp_host' => 'smtp.mailtrap.io',
			// 	'smtp_port' => 2525,
			// 	'smtp_user' => 'dfd72c86a992f7',
			// 	'smtp_pass' => '66eccfe70ed7a1',
			// 	'crlf' => "\r\n",
			// 	'newline' => "\r\n"
			//   );

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.mailgun.org',
				'smtp_port' => 587,
				'smtp_user' => 'postmaster@katsinov.techinfo.id',
				'smtp_pass' => '646d00795c5290ca56c0ac546b31632d-7238b007-e5d9f2c0',
				
			  );

			
			
			$this->email->initialize($config);

			$this->email->from('adirahman@aaptechmil.com', 'Adi Rahman');
			$this->email->to($id->email);
			
			$this->email->subject('NON AKTIVASI AKUN E-OFFICE AAPT');
			$this->email->message('Akun Anda Telah di NON AKTIFKAN oleh administrator');

			$this->email->send();

			

			
			$this->session->set_flashdata('update','Non Activation Success');
			redirect('Backend/Person/show/'.$id_user);
		}		
	}

	public function showPassword($id_user)
	{
		$data['person'] = $this->UserModel->getById($id_user);
		$data['main_admin'] = "backend/person/resetPassword";
		$this->load->view('layouts/admin',$data);
		
	}
	public function updatePassword($id_user)
	{
		$id = $this->UserModel->getById($id_user);
		$options = ['cost' => 12];
		$encrypt_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$options);
		
		$data = array(
			'password' => $encrypt_pass
		);
		$update = $this->UserModel->updateAuthPassword($id_user,$data);
		if($update)
		{
			$this->session->set_flashdata('password_change','Password Update Successfully');
			redirect('Backend/Person/showPassword/'.$id->id_user);
		}
	}

	public function edit($id_user)
	{
		$data['person'] = $this->UserModel->getById($id_user);
		$data['main_admin'] = "backend/person/edit";
		$this->load->view('layouts/admin',$data);
	}

	public function updateUser($id_user)
	{
		$person = $this->UserModel->getById($id_user);
		$idperson = $person->id_user;
		$data = array(
			'role_akun' => $this->input->post('role_akun'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'fax' => $this->input->post('fax'),
			'approval' => $this->input->post('approval')
		);

		$update = $this->UserModel->update($idperson,$data);
		if($update)
		{
			$this->session->set_flashdata('success','Update data Sukses');
			redirect('Backend/Person/edit/'.$idperson);
		}

	}

	public function delete($idperson)
	{
		$this->UserModel->delete($idperson);
		$this->session->set_flashdata('success','Delete data Sukses');
		redirect('Backend/Person/');
	}
}

?>
