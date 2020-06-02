<?php 

class Student extends CI_Controller{

    public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_loggedin')) {

			$this->session->set_flashdata('no_access','maaf silahkan login terlebih dahulu');

		    redirect('Frontend/Login');
		}
		
    }
    public function index() 
	{
		$id = $this->session->userdata('id_student');
		$data['myClass'] = $this->DashboardModel->getLectureByIdStudent($id);
		$data['user'] = $this->DashboardModel->getProfile($id);
		$data['total'] = $this->DashboardModel->getTotalKelas($id);
		$data['content'] = "app/page/dashboard/main";
		$this->load->view('layouts/main',$data);
		
		
	}



}
?>
