<?php 

class Main extends CI_Controller{

	function __construct() { 
        parent::__construct(); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('is_loggedin'); 
    }

    public function index(){
		$id = $this->session->userdata('id_student');
		$data["profile"] = $this->ContentModel->cek($id);
		$data['contentClass'] = $this->ContentModel->getAll();
		$data['total_class'] = $this->ContentModel->get_statistic_class();
		$data['total_student'] = $this->ContentModel->get_statistic_student();
		$data['total_materi'] = $this->ContentModel->get_statistic_materi();
		
		
        $data['content'] = "app/content";
        $this->load->view('layouts/main',$data);

    }

    public function register(){
		if($this->isUserLoggedIn){
            redirect('Frontend/Student');
        }else {
			$data['content'] = "app/page/register";
			$this->load->view('layouts/main',$data);
		}
    }



    public function showClassWeb(){
        $data['content'] = "app/page/class/web/display";
        $this->load->view('layouts/main',$data);
    }

    public function activateAccount($hash)
    {
        

        if($this->UsersModel->verifyEmail($hash)){
            $this->UsersModel->getByIdStudent($hash);
            $this->session->set_flashdata('accountActive','Selamat Akun anda Sudah Aktif, Silahkan Login');
            // redirect('Main/activateAccount/'.$hash->is_token);
            $data['content'] = "app/page/activation";
            $this->load->view('layouts/main',$data);
        }
        
	}


 


















}
?>
