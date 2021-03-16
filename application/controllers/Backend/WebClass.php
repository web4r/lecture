<?php 

class WebClass extends CI_Controller{

	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_loggedin')) {

			$this->session->set_flashdata('no_access','maaf silahkan login terlebih dahulu');

			redirect('Login');
		}



		if ($this->session->userdata('is_active')==1) {

			$this->session->set_flashdata('no_account_verify','maaf akun anda belum terverifikasi');

			redirect('Login');
		}
		
	}


	public function index()
	{
		$id = $this->session->userdata('id_users');
		$data['class_data'] = $this->ClassWebModel->getByUsers($id);
		$data['main_admin'] = "backend/class/web/index";
		$this->load->view('layouts/admin',$data);
	}


	/**
	 * Class CRUD
	 */

	public function AllClass(){
		$data['all_class_data'] = $this->ClassWebModel->getAllClass();
		$data['main_admin'] = "backend/class/web/all";
		$this->load->view('layouts/admin',$data);
	}

	public function updateKelasAktif($id){
		$id = $this->ClassWebModel->getInfoClass($id);
		
		$data = array(
					
			'class_status' => 1
		);

		$update = $this->ClassWebModel->update($id->id_class,$data);
		if($update)
		{

			$this->session->set_flashdata('update','Kelas berhasil di aktivasi');
			redirect('Backend/WebClass/AllClass');
		}	
	}

	public function updateKelasNonAktif($id){
		$id = $this->ClassWebModel->getInfoClass($id);
		
		$data = array(
					
			'class_status' => 0
		);

		$update = $this->ClassWebModel->update($id->id_class,$data);
		if($update)
		{

			$this->session->set_flashdata('failed','Kelas berhasil di non aktivasi');
			redirect('Backend/WebClass/AllClass');
		}	
	}



	public function add()
	{
		
		$data['categoryClass'] = $this->ClassWebModel->getCategoryClass();
		$data['typeClass'] = $this->ClassWebModel->getTypeClass();
		$data['main_admin'] = "backend/class/web/add";
		$this->load->view('layouts/admin',$data);
	}

	public function saveClass()
	{
		$user_id = $this->session->userdata('id_users');

		if($_FILES AND $_FILES['class_banner']['name']){
			$config = array(
				'upload_path' => './assets/img/bannerClass',
				'allowed_types' => 'jpeg|jpg|png',
				'max_size' => 1000,
				'encrypt_name' => TRUE
			);
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('class_banner')){
				$error = array('errors' => $this->upload->display_errors());
				$this->session->set_flashdata($error);
				redirect('Backend/WebClass/add');
			}
			$file = $this->upload->data();
			$data = array(
				'user_id' => $user_id,
				'class_type_id' => $this->input->post('class_type_id'),
				'class_category_id' => $this->input->post('class_category_id'),
				'class_name' => $this->input->post('class_name'),
				'class_banner' => $file['file_name'],
				'class_link_video_preview' => $this->input->post('class_link_video_preview'),
				'class_description' => $this->input->post('class_description'),
				'class_price' => $this->input->post('class_price'),
				'class_created' => date('Y-m-d')
	
			);
			if($data){
				$this->ClassWebModel->save($data);
				$this->session->set_flashdata('class_register','Berhasil membuat kelas');
				redirect('Backend/WebClass');
			}else{
				$this->session->set_flashdata('class_failed','Gagal membuat kelas');
				redirect('Backend/WebClass');
			}
		}
	}

	public function deleteClass($id)
	{
		$this->ClassWebModel->delete($id);
		$this->session->set_flashdata('delete','Delete data Sukses');
		redirect('Backend/WebClass');
	}

	public function update($id){
		$idClass  = $this->ClassWebModel->getInfoClass($id);
		$classId = $idClass->id_class;

		if($_FILES AND $_FILES['class_banner']['name'])
		{
			$config = array(
				'upload_path' => './assets/img/bannerClass',
				'allowed_types' => 'jpeg|jpg|png',
				'max_size' => 1000,
				'encrypt_name' => TRUE
			);

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('class_banner')) {
				$errors = array('errors'=>$this->upload->display_errors());
				$this->session->set_flashdata($errors);
				redirect('Backend/WebClass/classInfo/'.$classId);
			}else {
				unlink('./assets/img/bannerClass/'.$idClass->class_banner);

				//upload file
				$file = $this->upload->data();

				$data = array(

					'class_name' => $this->input->post('class_name'),
					'class_banner' => $file['file_name'],
					'class_link_video_preview' => $this->input->post('class_link_video_preview'),
					'class_description' => $this->input->post('class_description'),
					'class_price' => $this->input->post('class_price')
				);

				$this->ClassWebModel->update($id,$data);
			}
		}
		else {

			// No file upload
		
			$data = array(
				'class_name' => $this->input->post('class_name'),
				'class_link_video_preview' => $this->input->post('class_link_video_preview'),
				'class_description' => $this->input->post('class_description'),
				'class_price' => $this->input->post('class_price')
			);
			$this->ClassWebModel->update($id,$data);
		}
		$this->session->set_flashdata('success', 'Update Data Berhasil');
		redirect('Backend/WebClass/classInfo/'.$classId);
	}

	/**
	 * 
	 * Class Video CRUD
	 */

	 public function saveVideo($id){
		 $id  = $this->ClassWebModel->getInfoClass($id);

		 $data = array(
			'class_id' => $id->id_class,
			'lecture_name' => $this->input->post('lecture_name'),
			'lecture_video_link' => $this->input->post('lecture_video_link'),
			'created_at' => date('Y-m-d')
		 );

		 if($data){
			 $this->ClassWebModel->saveVideo($data);
			 $this->session->set_flashdata('success_add','Berhasil menambahkan materi');
			 redirect('Backend/WebClass/classVideo/'.$id->id_class);
		 }else {
			$this->session->set_flashdata('failed_add','Gagal menambahkan materi');
			redirect('Backend/WebClass/classVideo'.$id->id_class);
		 }
	 }

	 public function deleteVideoClass($id_rincian){
		$idDetail = $this->ClassWebModel->getByIdDetailVideo($id_rincian);
		$videoId = $idDetail->class_id;
		$this->ClassWebModel->deleteVideo($id_rincian);
		$this->session->set_flashdata('delete','Delete data Sukses');
		redirect('Backend/WebClass/classVideo/'.$videoId);
	}

	public function editVideoClass($id_rincian)
	{
		
		$data['video'] = $this->ClassWebModel->getByIdDetailVideo($id_rincian);
		$data['main_admin'] = "backend/class/web/info/video/edit";
		$this->load->view('layouts/admin',$data);
	 }
	 
	 public function do_update_video($id,$id_rincian)
	 {
		 $idClass = $this->ClassWebModel->getInfoClass($id);

		 $video_id = $this->ClassWebModel->getByIdDetailVideo($id_rincian);
		 $videoID = $video_id->id_detail_lecture;
		 $data  = array(
			'lecture_name' => $this->input->post('lecture_name'),
			'lecture_video_link' => $this->input->post('lecture_video_link'),
			
		);

		$update = $this->ClassWebModel->updateVideo($videoID,$data);
		if($update)
		{
			$this->session->set_flashdata('success_update','Update video Berhasil');
			redirect('Backend/WebClass/classVideo/'.$idClass->id_class);
		}

	 }


	 /**
	 * 
	 * Class Materi CRUD
	 */
	public function saveMateri($id){
		$id  = $this->ClassWebModel->getInfoClass($id);

		$data = array(
		   'class_id' => $id->id_class,
		   'theory_name' => $this->input->post('theory_name'),
		   'created_at' => date('Y-m-d')
		);

		if($data){
			$this->ClassWebModel->saveMateri($data);
			$this->session->set_flashdata('success_add','Berhasil menambahkan materi');
			redirect('Backend/WebClass/classMateri/'.$id->id_class);
		}else {
		   $this->session->set_flashdata('failed_add','Gagal menambahkan materi');
		   redirect('Backend/WebClass/classMateri'.$id->id_class);
		}
	}

	public function deleteMateriClass($id_materi){
		$idDetail = $this->ClassWebModel->getByIdDetailMateri($id_materi);
		$materiId = $idDetail->class_id;
		$this->ClassWebModel->deleteMateri($id_materi);
		$this->session->set_flashdata('delete','Delete data Sukses');
		redirect('Backend/WebClass/classMateri/'.$materiId);
	}

	public function editMateriClass($id_materi)
	{
		
		$data['materi'] = $this->ClassWebModel->getByIdDetailMateri($id_materi);
		$data['main_admin'] = "backend/class/web/info/materi/edit";
		$this->load->view('layouts/admin',$data);
	 }
	 
	 public function do_update_materi($id,$id_materi)
	 {
		 $idClass = $this->ClassWebModel->getInfoClass($id);

		 $materi_id = $this->ClassWebModel->getByIdDetailMateri($id_materi);
		 $materiID = $materi_id->id_history;
		 $data  = array(
			'theory_name' => $this->input->post('theory_name'),
		);

		$update = $this->ClassWebModel->updateMateri($materiID,$data);
		if($update)
		{
			$this->session->set_flashdata('success_update','Update Materi Berhasil');
			redirect('Backend/WebClass/classMateri/'.$idClass->id_class);
		}

	 }


	 /**
	 * 
	 * Class Condition CRUD
	 */
	public function saveCondition($id){
		$id  = $this->ClassWebModel->getInfoClass($id);

		$data = array(
		   'class_id' => $id->id_class,
		   'condition_name' => $this->input->post('condition_name'),
		   'created_at' => date('Y-m-d')
		);

		if($data){
			$this->ClassWebModel->saveCondition($data);
			$this->session->set_flashdata('success_add','Berhasil menambahkan Persyaratan');
			redirect('Backend/WebClass/classCondition/'.$id->id_class);
		}else {
		   $this->session->set_flashdata('failed_add','Gagal menambahkan Persyaratan');
		   redirect('Backend/WebClass/classCondition'.$id->id_class);
		}
	}

	public function deleteConditionClass($id_condition){
		$idDetail = $this->ClassWebModel->getByIdDetailCondition($id_condition);
		$conditionId = $idDetail->class_id;
		$this->ClassWebModel->deleteCondition($id_condition);
		$this->session->set_flashdata('delete','Delete Persyaratan Sukses');
		redirect('Backend/WebClass/classCondition/'.$conditionId);
	}

	public function editConditionClass($id_condtion)
	{
		
		$data['condition'] = $this->ClassWebModel->getByIdDetailCondition($id_condtion);
		$data['main_admin'] = "backend/class/web/info/condition/edit";
		$this->load->view('layouts/admin',$data);
	 }
	 
	 public function do_update_condition($id,$id_condtion)
	 {
		 $idClass = $this->ClassWebModel->getInfoClass($id);

		 $condition_id = $this->ClassWebModel->getByIdDetailCondition($id_condtion);
		 $conditionID = $condition_id->id_condition;
		 $data  = array(
			'condition_name' => $this->input->post('condition_name'),
		);

		$update = $this->ClassWebModel->updateCondition($conditionID,$data);
		if($update)
		{
			$this->session->set_flashdata('success_update','Update Persyaratan Berhasil');
			redirect('Backend/WebClass/classCondition/'.$idClass->id_class);
		}

	 }
	 

	/**
	 * Information Class
	 */

	 public function classInfo($id)
	 {
		
		$data['classInfo'] = $this->ClassWebModel->getInfoClass($id);
		$data['main_admin'] = 'backend/class/web/info/classInfo';
		$this->load->view('layouts/admin',$data);
	 }

	 public function classVideo($id)
	 {	
		
		$data['classInfo'] = $this->ClassWebModel->getInfoClass($id);
		$data['classVideoLecture'] = $this->ClassWebModel->getVideoLecture($id);
		
		$data['main_admin'] = 'backend/class/web/info/classVideoLecture';
		$this->load->view('layouts/admin',$data);
	 }

	 public function classMateri($id)
	 {
		
		$data['classMateri'] = $this->ClassWebModel->getInfoClass($id);
		$data['classMateriLecture'] = $this->ClassWebModel->getMateriLecture($id);

		$data['main_admin'] = 'backend/class/web/info/classMateri';
		$this->load->view('layouts/admin',$data);
	 }

	 public function classCondition($id)
	 {
		
		$data['classCondition'] = $this->ClassWebModel->getInfoClass($id);
		$data['classConditionLecture'] = $this->ClassWebModel->getConditionLecture($id);

		$data['main_admin'] = 'backend/class/web/info/classCondition';
		$this->load->view('layouts/admin',$data);
	 }
	 



}
?>
