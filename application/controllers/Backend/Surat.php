<?php 

class Surat extends CI_Controller {


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
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->UserModel->getAll();
		$data['nomor_terakhir'] = $this->SuratModel->getNomorTerakhir();
		$data['totalSurat'] = $this->SuratModel->getTotalSurat();
		$data['mysurat'] = $this->SuratModel->getMySurat($id);	
		$data['surat'] = $this->SuratModel->get();
		$data['main_admin'] = "backend/surat/surat";
		$this->load->view('layouts/admin',$data);
	}

	public function post()
	{
		$this->form_validation->set_rules('tgl_surat','Tanggal Surat','required|trim');
		$this->form_validation->set_rules('nomor_surat','Nomor Surat','trim');
		$this->form_validation->set_rules('tujuan_surat','Tujuan Surat','trim');
		$this->form_validation->set_rules('perihal_surat','Perihal Surat','trim');
		$this->form_validation->set_rules('keterangan_surat','Keteranga Surat','trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['main_admin'] = "backend/surat/surat";
			$this->load->view('layouts/admin',$data);
		}else {
			$data  = array(
				'id_user' => $this->input->post('id_user'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'tujuan_surat' => $this->input->post('tujuan_surat'),
				'perihal_surat' => $this->input->post('perihal_surat'),
				'keterangan_surat' => $this->input->post('keterangan_surat')
			);

				if($this->SuratModel->add($data))
				{
					$this->session->set_flashdata('success','Sukses Tambah Surat');
					redirect('Backend/Surat');
				}
		}

	}

	public function delete($id)
	{
		$this->SuratModel->delete($id);
		$this->session->set_flashdata('delete','Hapus Data Berhasil');
		redirect('Backend/Surat');
	}

	public function show($id)
	{
		$data['surat'] = $this->SuratModel->getById($id);
		$data['main_admin'] = "backend/surat/view";
		$this->load->view('layouts/admin',$data);
	}
	public function edit($id)
	{
		$data['surat'] = $this->SuratModel->getById($id);
		$data['main_admin'] = "backend/surat/edit";
		$this->load->view('layouts/admin',$data);
	 }
	 
	 public function do_update($id)
	 {
		 $surat = $this->SuratModel->getById($id);
		 $idsurat = $surat->id_surat;
		 $data  = array(
			'tgl_surat' => $this->input->post('tgl_surat'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'tujuan_surat' => $this->input->post('tujuan_surat'),
			'perihal_surat' => $this->input->post('perihal_surat'),
			'keterangan_surat' => $this->input->post('keterangan_surat')
		);

		$update = $this->SuratModel->update($idsurat,$data);
		if($update)
		{
			$this->session->set_flashdata('success','Update Surat Berhasil');
			redirect('Backend/Surat/edit/'.$idsurat);
		}

	 }
	
}

?>
