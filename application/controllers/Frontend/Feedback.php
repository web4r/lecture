<?php 

class Feedback extends CI_Controller{

	function __construct() { 
        parent::__construct(); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('is_loggedin'); 
	}
	
	public function addFeedback(){
		$id_student = $this->session->userdata('id_student');
		$data = array(
			'id_student' => $id_student,
			'feedback_message' => $this->input->post('feedback_message')
		);

		$this->DashboardModel->createFeedback($data);
		$this->session->set_flashdata('create_feedback','Terima kasih telah mengirimkan feedback anda.');
		redirect('Frontend/Student');
	}
	




}
?>
