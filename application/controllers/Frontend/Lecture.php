<?php 

class Lecture extends CI_Controller{

	function __construct() { 
        parent::__construct(); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('is_loggedin'); 
    }

	public function detailClassWeb($id){
		// if($this->isUserLoggedIn){
		// 	$data['a'] = $this->ContentModel->cek($id);
		// 	$data['detailClass'] = $this->ContentModel->getById($id);
		// 	$data['content'] = "app/page/class/web/detail";
		// 	$this->load->view('layouts/main',$data);
		// }else {
		// 	$data['detailClass'] = $this->ContentModel->getById($id);
		// 	$data['content'] = "app/page/class/web/detail";
		// 	$this->load->view('layouts/main',$data);
		// // }
		// $idprofile = $this->session->userdata('id_student');
		// $data["profile"] = $this->ContentModel->cek($idprofile);
		// $data["a"] = $this->ContentModel->cek($id);
		
		// print_r($a->class_id);
		$data['detailClass'] = $this->ContentModel->getById($id);
		$data['listMateri'] = $this->ContentModel->getMateriId($id);
		$data['listCondition'] = $this->ContentModel->getConditionId($id);
		

		$data['content'] = "app/page/class/web/detail";
		$this->load->view('layouts/main',$data);
		
		
		
	}
	
	public function playClass($id){
		if($this->isUserLoggedIn){
			$data['detailClass'] = $this->ContentModel->getById($id);
			$data['listMateri'] = $this->ContentModel->playlist($id);
			$data['content'] = "app/page/class/web/playlist";
			$this->load->view('layouts/main',$data);
        }else {
			$this->session->set_flashdata('permission_denied','Maaf anda tidak di izinkan akses halaman tersebut, Silahkan login terlebih dahulu');
			redirect('Main');
		}
		
	}

	public function playVideo($idclass,$idmateri){
		if($this->isUserLoggedIn){ 
			$data['listMateri'] = $this->ContentModel->playlist($idclass);
			$data['materiVideo'] = $this->ContentModel->play($idclass,$idmateri);
			$data['content'] = "app/page/class/web/materi";
			$this->load->view('layouts/main',$data);
		}else {
			$this->session->set_flashdata('permission_denied','Maaf anda tidak di izinkan akses halaman tersebut, Silahkan login terlebih dahulu');
			redirect('Main');
		}
		
	}

	public function buy($id){
		
		if($this->session->userdata('fullname')){
			$data['a'] = $this->ContentModel->chechkLectureStudent($id);
			$data['detailClass'] = $this->ContentModel->getById($id);
			$data['content'] = "app/page/class/buy/lecture";
			$this->load->view('layouts/main',$data);
		
		}else {
			$this->session->set_flashdata('no_registered','Harap Login untuk membeli kelas ini');
			redirect('Frontend/login');
		}
	}

	public function completeOrder($id){
		
		$checkClass =  $this->ContentModel->cek($id);
		
		

			$id = $this->ContentModel->getById($id);
			$data = array(
				'class_id' => $id->id_class,
				'student_id' => $this->session->userdata('id_student'),
				'date_order' => date('Y-m-d')
			);
			
			if($data){
				$this->ContentModel->addOrder($data);
				$this->session->set_flashdata('success_order','Terima kasih pembelian anda berhasil, silahkan cek email anda dan tunggu aktivasi oleh pengajar kami');
				redirect('Frontend/student');
			}
			
		
		
			

		
	}


	







}
?>
