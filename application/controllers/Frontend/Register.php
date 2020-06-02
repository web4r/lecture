<?php 

class Register extends CI_Controller{

    public function saveUser(){

        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tm_students.email]');

        if($this->form_validation->run() == FALSE)
		{
            $errors = array('errors' => validation_errors());
			$this->session->set_flashdata($errors);
			redirect('Main/register');
		}

        $options = ['cost' => 12];
        $encrypt_pass = password_hash(123456,PASSWORD_BCRYPT,$options);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $data = array(
            'role_id' => 4,
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => $encrypt_pass,
            'phone' => $this->input->post('phone'),
            'created_at' => date('Y-m-d'),
            'is_active' => 1,
            'is_token' => substr(str_shuffle($permitted_chars),0,32)
        );
        
        if($this->UsersModel->create_user($data))
        {

            $this->load->library('email');
				
            $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.mailgun.org',
                    'smtp_port' => 587,
                    'smtp_user' => 'postmaster@katsinov.techinfo.id',
                    'smtp_pass' => '2e912bff8357fd8bfd32fd9651a67b8f-9dda225e-0d61c1fe',
                    
                );


            $this->email->initialize($config);

            $this->email->from('no-reply@techinfo.id');
            $this->email->to($data['email']);
            
            
            $this->email->subject('Aktivasi akun');
            $this->email->message('Silahkan klik link ini untuk aktivasi http://localhost/codeigniter-project/techinfoClass/myclass/Register/activation/'.$data['is_token']);
        
            $this->email->send();

            $this->session->set_flashdata('user_register','Registratsi Berhasil Silahkan Klik Verifikasi Pada Email Anda');
            redirect('Main/register');
        }
        else {
            $this->session->set_flashdata('user_failed','Registrasi Gagal Silahkan Isi Data Sesuai Form');
            redirect('Main/register');
        }
    }

    public function activation($hash=NULL){

        if($this->UsersModel->verifyEmail($hash)){
            $hash = $this->UsersModel->getByIdStudent($hash);
            $this->session->set_flashdata('accountActive','Selamat Akun anda Sudah Aktif, Silahkan Login');
            redirect('Main/activateAccount/'.$hash->is_token);
        } 

        
    }





    
}
?>
