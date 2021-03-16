<?php 


class Register extends CI_Controller{

    function  __construct(){
        parent::__construct();
    }


    // public function __construct() { 
    //             parent::__construct(); 
            
    //         // require APPPATH.'libraries/phpmailer/src/Exception.php';
    //         // require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
    //         // require APPPATH.'libraries/phpmailer/src/SMTP.php';

                
             
    //             }

  //   public function saveUser(){

  //       $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tm_students.email]');

  //       if($this->form_validation->run() == FALSE)
		// {
  //           $errors = array('errors' => validation_errors());
		// 	$this->session->set_flashdata($errors);
		// 	redirect('Main/register');
		// }

  //       $options = ['cost' => 12];
  //       $encrypt_pass = password_hash(123456,PASSWORD_BCRYPT,$options);
  //       $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  //       $data = array(
  //           'role_id' => 4,
  //           'fullname' => $this->input->post('fullname'),
  //           'email' => $this->input->post('email'),
  //           'password' => $encrypt_pass,
  //           'phone' => $this->input->post('phone'),
  //           'created_at' => date('Y-m-d'),
  //           'is_active' => 1,
  //           'is_token' => substr(str_shuffle($permitted_chars),0,32)
  //       );
        
  //       if($this->UsersModel->create_user($data))
  //       {

  //           $this->load->library('email');
				
  //           $config = Array(
  //                   'protocol' => 'smtp',
  //                   'smtp_host' => 'smtp.mailgun.org',
  //                   'smtp_port' => 587,
  //                   'smtp_user' => 'postmaster@katsinov.techinfo.id',
  //                   'smtp_pass' => '3245a3d39a2f6ffe8a8824d2e0d47891-8b34de1b-602b263b',
                    
  //               );


  //           $this->email->initialize($config);

  //           $this->email->from('no-reply@techinfo.id');
  //           $this->email->to($data['email']);
            
            
  //           $this->email->subject('Aktivasi akun');
  //           $this->email->message('Silahkan klik link ini untuk aktivasi http://localhost/codeigniter-project/techinfoClass/myclass/Register/activation/'.$data['is_token']);
        
  //           $this->email->send();

  //           $this->session->set_flashdata('user_register','Registratsi Berhasil Silahkan Klik Verifikasi Pada Email Anda');
  //           redirect('Main/register');
  //       }
  //       else {
  //           $this->session->set_flashdata('user_failed','Registrasi Gagal Silahkan Isi Data Sesuai Form');
  //           redirect('Main/register');
  //       }
  //   }

    public function saveUser(){

        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tm_students.email]');

        if($this->form_validation->run() == FALSE)
        {
            $errors = array('errors' => validation_errors());
            $this->session->set_flashdata($errors);
            redirect('Main/register');
        }

        $options = ['cost' => 12];
        $encrypt_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$options);
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
            // Load PHPMailer library
        $this->load->library('phpmailer_lib');// PHPMailer object
        $mail = $this->phpmailer_lib->load();




            // PHPMailer object
                   
            
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
                    $mail->SMTPAuth = true;
                    $mail->Username = 'netkom2013@gmail.com'; // user email
                    $mail->Password = 'Develop93'; // password email
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
            
                    $mail->setFrom('netkom2013@gmail.com', 'no-reply@techinfo.id'); // user email
                    
            
                    // Add a recipient
                    // $mail->addAddress($data['email']); //email tujuan pengiriman email
                    $mail->addAddress($data['email']); //email tujuan pengiriman email
                    // Email subject
                    $mail->Subject = 'Aktivasi akun'; //subject email
            
                    // Set email format to HTML
                    $mail->isHTML(true);
            
                    // Email body content
                    // $mailContent = 'Silahkan klik link ini untuk aktivasi http://localhost/superclass/Main/Register/activation/'.$data['is_token'];

                    $mailContent = 'Silahkan klik link ini untuk aktivasi http://localhost/superclass/Main/activateAccount/'.$data['is_token'];
                    $mail->Body = $mailContent;
                    $mail->send();
            
                    

                     $this->session->set_flashdata('user_register','Registratsi Berhasil Silahkan Klik Verifikasi Pada Email Anda');
            redirect('Main/register');


        }
        else {
            $this->session->set_flashdata('user_failed','Registrasi Gagal Silahkan Isi Data Sesuai Form');
            redirect('Main/register');
        }
    }

    public function activation($hash){



        if($this->UsersModel->verifyEmail($hash)){
            $this->UsersModel->getByIdStudent($hash);
            $this->session->set_flashdata('accountActive','Selamat Akun anda Sudah Aktif, Silahkan Login');
            redirect('Main/activateAccount/'.$hash->is_token);
        } else{
            $this->session->set_flashdata('accountFailed','gagal');
            redirect('Main/activateAccount/');
        }

        
    }





    
}
?>
