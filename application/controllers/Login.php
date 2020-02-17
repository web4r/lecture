<?php 

class Login extends CI_Controller {

	

	public function index()
	{
		$this->load->view('layouts/login');
	}

	

	public function authUser()
	{

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE)
		{
			$data = array('errors' => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Login');
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$access = $this->LoginModel->login($email,$password);
			if($access)
			{
					$user_data = array(
						'id_user' => $access,
						'email' => $email,
						'password' => $password,
						'is_loggedin' => TRUE
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_success','Login Success');
					redirect('Admin');
			}
			else {
					$data = array('login_failed' => 'maaf email dan password anda salah');
					$this->session->set_flashdata($data);
					redirect('Login');
			}
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');

	}

	
}



?>
