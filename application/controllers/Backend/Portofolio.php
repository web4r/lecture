<?php 

class Portofolio extends CI_Controller{
	
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
		$data['total_kontrak'] = $this->PortofolioModel->getKontrakAll();
		$data['total_nilai'] = $this->PortofolioModel->getNilaiKontrakAll();
		$data['portofolio'] = $this->PortofolioModel->get();
		$data['main_admin'] = "backend/portofolio/portofolio";
		$this->load->view('layouts/admin',$data);
	}

	public function post()
	{
		
		$data['main_admin'] = "backend/portofolio/add";
		$this->load->view('layouts/admin',$data);
		
	}

	public function do_post()
	{
			$this->form_validation->set_rules('tahun','Tahun','trim|required');
			$this->form_validation->set_rules('pekerjaan','Pekerjaan','trim');
			$this->form_validation->set_rules('sub_bidang','Sub Bidang','trim');
			$this->form_validation->set_rules('lokasi','Lokasi','trim');
			$this->form_validation->set_rules('nama_pejabat','Nama Pejabat','trim');
			$this->form_validation->set_rules('alamat_pejabat','Alamat Penjabat','trim');
			$this->form_validation->set_rules('nomor_kontrak','Nomor Kontrak','trim');
			$this->form_validation->set_rules('nilai','Nilai','trim');

			if($this->form_validation->run()==FALSE)
			{
				$error = array('errors' => validation_errors());
				$this->session->set_flashdata($error);
				$data['main_admin'] = "backend/portofolio/add";
				$this->load->view('layouts/admin',$data);
			}else {
				$data = array(
					'tahun' =>$this->input->post('tahun'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'sub_bidang' => $this->input->post('sub_bidang'),
					'lokasi' => $this->input->post('lokasi'),
					'nama_pejabat' => $this->input->post('nama_pejabat'),
					'alamat_pejabat' => $this->input->post('alamat_pejabat'),
					'nomor_kontrak' => $this->input->post('nomor_kontrak'),
					'tgl_kontrak' => $this->input->post('tgl_kontrak'),
					'nilai' => $this->input->post('nilai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'tgl_ba' => $this->input->post('tgl_ba')
				);
	
				if($this->PortofolioModel->add($data))
				{
					$this->session->set_flashdata('success','Tambah Pertofolio Berhasil');
					redirect('Backend/Portofolio/post');
				}
			}
			
		

	}

	public function print()
	{

		
			$tahun  = $this->input->post('tahun');
			$cektahun = $this->PortofolioModel->getTahun($tahun);
			
			if($cektahun == $tahun)
			{
				$data['portofolio'] = $this->PortofolioModel->getByTahun($tahun);
				$data['total_nilai_tahun'] = $this->PortofolioModel->getNilaiByTahun($tahun);
				$mpdf = new \Mpdf\Mpdf([
					'mode' => 'utf-8',
					'orientation' => 'L'
				]);
				$html = '<h2 style="text-align:center;">Data Pengalaman Perusahaan</h2>';
				$html .= '<h2 style="text-align:center;">PT ANDHU ADHA PERKASA TECHMIL</h2>';
				$data = $this->load->view('backend/portofolio/print',$data,TRUE);
				$mpdf->WriteHTML($html);
				$mpdf->WriteHTML($data);
				$mpdf->Output();
			}
			else
			{
				
				$this->session->set_flashdata('no_data','tidak ada data');
				redirect('Backend/Portofolio');
			}
	}

	public function delete($id)
	{
		$this->PortofolioModel->delete($id);
		$this->session->set_flashdata('delete','Hapus Data Berhasil');
		redirect('Backend/Portofolio');
	}

	public function view($id)
	{
		$data['portofolio'] = $this->PortofolioModel->getById($id);
		$data['main_admin'] = "backend/portofolio/view";
		$this->load->view('layouts/admin',$data);
	}

	public function edit($id)
	{
		$data['portofolio'] = $this->PortofolioModel->getById($id);
		$data['main_admin'] = "backend/portofolio/edit";
		$this->load->view('layouts/admin',$data);
	}

	public function do_update($id)
	{
		$id = $this->PortofolioModel->getById($id);
		$idPortofolio = $id->id_portofolio;

		$data = array(
			'tahun' =>$this->input->post('tahun'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'sub_bidang' => $this->input->post('sub_bidang'),
			'lokasi' => $this->input->post('lokasi'),
			'nama_pejabat' => $this->input->post('nama_pejabat'),
			'alamat_pejabat' => $this->input->post('alamat_pejabat'),
			'nomor_kontrak' => $this->input->post('nomor_kontrak'),
			'tgl_kontrak' => $this->input->post('tgl_kontrak'),
			'nilai' => $this->input->post('nilai'),
			'tgl_selesai' => $this->input->post('tgl_selesai'),
			'tgl_ba' => $this->input->post('tgl_ba')
		);
		$update = $this->PortofolioModel->update($idPortofolio,$data);
		if($update)
		{
			$this->session->set_flashdata('success','Update data Sukses');
			redirect('Backend/Portofolio/edit/'.$idPortofolio);
		}
	}




}

?>
