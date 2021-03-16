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
		$idclass = $this->session->userdata('id_class');
		
		$data['a'] = $this->ContentModel->chechkLectureStudent($id);
		
		$data['detailClass'] = $this->ContentModel->getById($id);
		
		$data['listMateri'] = $this->ContentModel->getMateriId($id);
		$data['listCondition'] = $this->ContentModel->getConditionId($id);
		$data['total'] = $this->ContentModel->getTotalModul($id);
		

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

	//===================COMPLETE ORDER=========================//
	
	public function completeOrder($id){
		if($this->session->userdata('fullname')){

			
				$id = $this->ContentModel->getById($id);
				$data = array(
					'class_id' => $id->id_class,
					'user_id' => $id->user_id,
					'student_id' => $this->session->userdata('id_student'),
					'status_order' => 2,
					'date_order' => date('Y-m-d')
				);

				

				$this->ContentModel->addOrder($data);
				
				redirect('Frontend/Student');				
		
			
		}else {
			$this->session->set_flashdata('no_registered','Harap Login untuk membeli kelas ini');
			redirect('Frontend/login');
		}
		
	}

	public function completeOrderPremium($id){
		if($this->session->userdata('fullname')){

			
		
				$id = $this->ContentModel->getById($id);
				$data = array(
					'class_id' => $id->id_class,
					'user_id' => $id->user_id,
					'student_id' => $this->session->userdata('id_student'),
					'date_order' => date('Y-m-d')
				);

				$this->ContentModel->addOrder($data);
				redirect('Frontend/Student');				
		
			
		}else {
			$this->session->set_flashdata('no_registered','Harap Login untuk membeli kelas ini');
			redirect('Frontend/login');
		}
		
	}

	//===================END COMPLETE ORDER=========================//

	public function confirm($id){
		$data['detailClass'] = $this->ContentModel->confirmClass($id);
		$data['cuponlist'] = $this->OrderModel->getCupon();
		$data['content'] = "app/page/class/buy/lecture";
		$this->load->view('layouts/main',$data);
	}

	public function update_cupon($id){
		 $id_student_lecture = $this->ContentModel->confirmClass($id);
		 $idstudent = $id_student_lecture->id_student_lecture;
		 $input_kode_kupon = $this->input->post('cupon_name');
		 $datacupon = $this->OrderModel->getCupon();
		 $datacuponrow = $this->OrderModel->getCuponRow($input_kode_kupon);
		  
		 if($input_kode_kupon != $datacuponrow){
			
			$this->session->set_flashdata('no_cupon','Kupon anda tidak terdaftar, harap masukan kupon dengan benar');
			redirect('Frontend/Lecture/confirm/'.$idstudent);
			 
		}
		 
		 	foreach($datacupon as $cupon){
				 $cuponname = $cupon->cupon_name;
				 $potongan = $cupon->diskon;
				 if($cuponname == $input_kode_kupon){
					 $resultcupon = $potongan;
					 $data  = array(
						 'cupon_name' => $input_kode_kupon,
						 'price_diskon' => $resultcupon,
						 
					 );
			 
					 
						 $this->OrderModel->update_price($idstudent,$data);
						 $this->session->set_flashdata('success_update','Update Harga Berhasil');
						 redirect('Frontend/Lecture/confirm/'.$idstudent);
						 
				 }
			 }
	
	}

	public function deleteLectureStudent($id){

		$this->DashboardModel->deleteLectureStudent($id);
		$this->session->set_flashdata('delete','Delete data berhasil');
		redirect('Frontend/Student');
	}


	







}
?>
