<?php 

class Cloud extends CI_Controller {
	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_loggedin')) {

			$this->session->set_flashdata('no_access','maaf silahkan login terlebih dahulu');

			redirect('Login');
		}



		if ($this->session->userdata('status_akun')==2) {

			$this->session->set_flashdata('no_account_verify','maaf akun anda belum terverifikasi');

		redirect('Login');
		}	
	}

	public function index()
	{
		$data['cloud'] = $this->CloudModel->get();
		$data['main_admin'] = "backend/cloud/cloud";
		$this->load->view('layouts/admin',$data);
	}

	public function do_post()
	{
		$config = array(
			'upload_path' => './assets/cloud/public',
			'allowed_types' => 'pdf',
			'max_size' => 30000,
			'encrypt_name' => TRUE
		);
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('file_upload'))
		{
			$errors = array('errors'=>$this->upload->display_errors());
			$this->session->set_flashdata($errors);
			redirect('Backend/Cloud');
		}
		else {
			$file = $this->upload->data();
			$data = array(
				'tgl_upload' => $this->input->post('tgl_upload'),
				'nama_file' => $this->input->post('nama_file'),	
				'file_upload' => $file['file_name'],
				'keterangan_file' => $this->input->post('keterangan_file')
			);
		}

		if($this->CloudModel->add($data))
		{
			$this->session->set_flashdata('success','Tambah data berhasil');
			redirect('Backend/Cloud');
		}
	}

	public function delete($id)
	{
		$query = $this->CloudModel->getById($id);

		unlink('assets/cloud/public/'.$query->file_upload);
		$this->CloudModel->delete($id);
		$this->session->set_flashdata('delete','Delete data berhasil');
		redirect('Backend/Cloud');
	}

	public function edit($id)
	{
		$data['cloud'] = $this->CloudModel->getById($id);
		$data['main_admin'] = "backend/cloud/edit";
		$this->load->view('layouts/admin',$data);
	}

	public function do_update($id)
	{
		$idcloud = $this->CloudModel->getById($id);
		$iddata = $idcloud->id_cloud;

			//do this upload image
			if ($_FILES AND $_FILES['file_upload']['name']) {
				
				//start upload image
				$config = array(

				'upload_path' => './assets/cloud/public',
				'allowed_types' => 'pdf',
				'max_size' => 30000,
				'encrypt_name' => TRUE

			);
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('file_upload')) {
					$errors = array('errors'=>$this->upload->display_errors());
					$this->session->set_flashdata($errors);
					redirect('Backend/Cloud/edit/'.$idcloud->id_cloud);
				}
				else {

					//remove image on folder using unlink
					//unlink() using for delete files like image

					unlink('assets/cloud/public/'.$idcloud->file_upload);

					//upload file
					$file = $this->upload->data();

					$data = array(

							'tgl_upload' => $this->input->post('tgl_upload'),
							'nama_file' => $this->input->post('nama_file'),
							'file_upload' => $file['file_name'],
							'keterangan_file' => $this->input->post('keterangan_file')
					);

					$this->CloudModel->update($iddata,$data);
				}



			}
			else {

				// No file upload
			
				$data = array(

					'tgl_upload' => $this->input->post('tgl_upload'),
					'nama_file' => $this->input->post('nama_file'),
					'keterangan_file' => $this->input->post('keterangan_file')
				);
				$this->CloudModel->update($iddata,$data);
			}
			$this->session->set_flashdata('success', 'Update Data Berhasil');
			redirect('Backend/Cloud/edit/'.$idcloud->id_cloud);

	}
}

?>
