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



		if ($this->session->userdata('is_active')==1) {

			$this->session->set_flashdata('no_account_verify','maaf akun anda belum terverifikasi');

			redirect('Login');
		}
		
		
	}
	
	public function index() 
	{
		$data['role_user'] = $this->UserModel->getRole();
		$data['person'] = $this->UserModel->getVerify();
		$data['main_admin'] = "backend/person/person";
		$this->load->view('layouts/admin',$data);
	}

	public function student() 
	{
		// $data['role_user'] = $this->UserModel->getRole();
		$data['student'] = $this->UserModel->getStudent();
		$data['main_admin'] = "backend/person/student";
		$this->load->view('layouts/admin',$data);
	}

	public function show($id)
	{
		$data['person'] = $this->UserModel->getById($id);
		$data['main_admin'] = "backend/person/view";
		$this->load->view('layouts/admin',$data);
	}

	public function verifyUser()
	{
		$data['person'] = $this->UserModel->verifyUserStatus();
		$data['main_admin'] = "backend/person/verifyUser";
		$this->load->view('layouts/admin',$data);
	}

	public function updateVerivication($id)
	{
		
		$id = $this->UserModel->getById($id);
		
		$data = array(
					
			'is_active' => 2
		);

		$update = $this->UserModel->updateVerify($id->id_users,$data);
		if($update)
		{
			

			// $this->load->library('email');

			// $config = Array(
			// 	'protocol' => 'smtp',
			// 	'smtp_host' => 'smtp.mailtrap.io',
			// 	'smtp_port' => 2525,
			// 	'smtp_user' => 'dfd72c86a992f7',
			// 	'smtp_pass' => '66eccfe70ed7a1',
			// 	'crlf' => "\r\n",
			// 	'newline' => "\r\n"
			//   );

			
			
			
			// $config = Array(
			// 		'protocol' => 'smtp',
			// 		'smtp_host' => 'smtp.mailgun.org',
			// 		'smtp_port' => 587,
			// 		'smtp_user' => 'postmaster@katsinov.techinfo.id',
			// 		'smtp_pass' => '2e912bff8357fd8bfd32fd9651a67b8f-9dda225e-0d61c1fe',
					
			// 	  );


			// $this->email->initialize($config);

			// $this->email->from('hello.devapps@gmail.com', 'Techinfo.id');
			// $this->email->to($id->email);
			  
			
			// $this->email->subject('AKTIVASI AKUN Pengajar Kelas Techinfo');
			// $this->email->message('Akun Anda Telah Aktif, silahkan login dengan Email ' .$id->email. ' dan Password Default adalah 123456 , Segera Ganti Password Anda');
		
			// $this->email->send();
			
			$this->session->set_flashdata('update','Update Verification Success');
			redirect('Backend/Person/');
		}		
	}

	public function upateNonActivation($id)
	{
		$id = $this->UserModel->getById($id);
		
		$data = array(
					
			'is_active' => 1
		);

		$update = $this->UserModel->updateVerify($id->id_users,$data);
		if($update)
		{
			// $this->load->library('email');

			// $config = Array(
			// 	'protocol' => 'smtp',
			// 	'smtp_host' => 'smtp.mailtrap.io',
			// 	'smtp_port' => 2525,
			// 	'smtp_user' => 'dfd72c86a992f7',
			// 	'smtp_pass' => '66eccfe70ed7a1',
			// 	'crlf' => "\r\n",
			// 	'newline' => "\r\n"
			//   );

			// $config = Array(
			// 	'protocol' => 'smtp',
			// 	'smtp_host' => 'smtp.mailgun.org',
			// 	'smtp_port' => 587,
			// 	'smtp_user' => 'postmaster@katsinov.techinfo.id',
			// 	'smtp_pass' => '2e912bff8357fd8bfd32fd9651a67b8f-9dda225e-0d61c1fe',
				
			//   );

			
			
			// $this->email->initialize($config);

			// $this->email->from('hello.devapps@gmail.com', 'Techinfo.id');
			// $this->email->to($id->email);
			
			// $this->email->subject('NON AKTIVASI AKUN Pengajar Kelas Techinfo');
			// $this->email->message('Akun Anda Telah di NON AKTIFKAN oleh administrator');

			// $this->email->send();

			

			
			$this->session->set_flashdata('update','Non Activation Success');
			redirect('Backend/Person/');
		}		
	}

	public function showPassword($id)
	{
		$data['person'] = $this->UserModel->getById($id);
		$data['main_admin'] = "backend/person/resetPassword";
		$this->load->view('layouts/admin',$data);
		
	}
	public function updatePassword($id)
	{
		$iduser = $this->UserModel->getById($id);
		$options = ['cost' => 12];
		$encrypt_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$options);
		
		$data = array(
			'password' => $encrypt_pass
		);
		$update = $this->UserModel->updateAuthPassword($id,$data);
		if($update)
		{
			$this->session->set_flashdata('password_change','Password Update Successfully');
			redirect('Backend/Person/showPassword/'.$iduser->id_users);
		}
	}

	public function edit($id)
	{
		$data['person'] = $this->UserModel->getById($id);
		$data['main_admin'] = "backend/person/edit";
		$this->load->view('layouts/admin',$data);
	}

	public function updateUser($id)
	{
		$person = $this->UserModel->getById($id);
		$idperson = $person->id_users;
		$data = array(
			'role_id' => $this->input->post('role_id'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
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
