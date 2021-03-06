<?php 

class Registrasi extends CI_Controller {
	
	public function index()
	{
		$data['institution'] = $this->RegistrasiModel->getInstitution();
		$this->load->view('layouts/registrasi',$data);
	}

	public function addUser()
	{
		    
			$this->form_validation->set_rules('role_id','Pilih Divisi','required');
			$this->form_validation->set_rules('fullname','Nama Lengkap','required');
			$this->form_validation->set_rules('email','Email','required');
			
			
			

			if($this->form_validation->run()==FALSE)
			{
				$data = array('errors' => validation_errors());
				$data['person'] = $this->UserModel->getVerify();
				$data['main_admin'] = "backend/person/person";
				$this->session->set_flashdata($data);
				$this->load->view('layouts/admin',$data);
			}else {
				
				
					$options = ['cost' => 12];
					$encrypt_pass = password_hash(123456,PASSWORD_BCRYPT,$options);

					$data = array(
						'role_id' => $this->input->post('role_id'),
						'fullname' => $this->input->post('fullname'),
						'email' => $this->input->post('email'),
						'password' => $encrypt_pass,
						'phone' => $this->input->post('phone'),
						'is_active' => 1,
						'created_at' => date('Y-m-d')
					);
					
					if($this->RegistrasiModel->create_user($data))
					{
						$this->session->set_flashdata('user_register','Registration Success');
						redirect('Backend/Person');
					}
					else {
						$this->session->set_flashdata('user_failed','Registrasi Gagal');
						redirect('Backend/Person');
					}
				

				
			}
	}


}



?>
