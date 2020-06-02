<?php 

class Login extends CI_Controller{


    function __construct() { 
        parent::__construct(); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('is_loggedin'); 
    }


    public function index()
    {
        if($this->isUserLoggedIn){
            redirect('Frontend/Student');
        }else {
            $data['content'] = "app/page/login";
            $this->load->view('layouts/main',$data);
        }
    }
        
    public function authUser()
	{

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE)
		{
			$data = array('errors' => validation_errors());
			$this->session->set_flashdata($data);
			redirect('Frontend/Login');
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$access = $this->UsersModel->login($email,$password);
            // print_r($access);
            if($access)
			{
                if($access->is_active == 2){
					$user_data = array(
						'id_student' => $access->id_student,
						'email' => $email,
						'password' => $password,
						'is_loggedin' => TRUE
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_success','Login Success');
					redirect('Frontend/Student');
                }else {
                    $this->session->set_flashdata('activation_account','Silahkan klik link aktivasi pada email anda');
                    redirect('Frontend/Login');
                }
			}
			
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Frontend/Login');

	}


}
?>
