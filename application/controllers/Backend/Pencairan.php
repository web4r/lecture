<?php 

class Pencairan extends CI_Controller{

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
		$iduser = $this->session->userdata('role_akun');
		$data['pencairan'] = $this->PencairanModel->getByUser($iduser);
		$data['pencairanAll'] = $this->PencairanModel->get();
		$data['main_admin'] = "backend/pengajuan/pencairan/pencairan";
		$this->load->view('layouts/admin',$data);
	 }
	 
	 public function post()
	 {
		 $id_user = $this->session->userdata('id_user');
		 $data['item'] = $this->UserModel->getById($id_user);
		 $data['main_admin'] = "backend/pengajuan/pencairan/add";
		 $this->load->view('layouts/admin',$data);
	 }

	 public function do_post()
	 {
		 $iduser = $this->session->userdata('id_user');
		 $data = array(
			'id_user' => $iduser,
			'nomor_pencairan' => $this->input->post('nomor_pencairan'),
			'nama_pemohon' => $this->input->post('nama_pemohon'),
			'bagian' => $this->input->post('bagian'),
			'nama_project' => $this->input->post('nama_project'),
			'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
		 );	
		 if($data)
		 {
			 $this->PencairanModel->add($data);
			 $this->session->set_flashdata('success','Sukses tambah Pengajuan');
			 redirect('Backend/Pencairan');
		 }
	 }

	 public function edit($id)
	 {
		 $data['pencairan'] = $this->PencairanModel->getById($id);
		 $data['main_admin'] = "backend/pengajuan/pencairan/edit";
		 $this->load->view('layouts/admin',$data);
	 }

	 public function do_update($id)
	 {
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'nomor_pencairan' => $this->input->post('nomor_pencairan'),
			'nama_pemohon' => $this->input->post('nama_pemohon'),
			'bagian' => $this->input->post('bagian'),
			'nama_project' => $this->input->post('nama_project'),
			'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Update Data Berhasil');
			 redirect('Backend/Pencairan');
		 }
	 }

	 public function delete($id)
	 {
		 $this->PencairanModel->delete($id);
		 $this->session->set_flashdata('success','Delete Data Berhasil');
		 redirect('Backend/Pencairan');
	 }

	 

	 /**
	  * Approval Section
	  */

	 public function do_approve($id)
	 {
		$fullname = $this->session->userdata('fullname');
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_user' => $fullname,
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Approve Data Berhasil');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	 public function do_approve_finance($id)
	 {
		$fullname = $this->session->userdata('fullname');
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_finance' => $fullname,
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Approve Data Berhasil');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	 public function do_approve_dk($id)
	 {
		$fullname = $this->session->userdata('fullname');
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_dk' => $fullname,
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Approve Data Berhasil');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	 public function do_approve_du($id)
	 {
		$fullname = $this->session->userdata('fullname');
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_du' => $fullname,
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Approve Data Berhasil');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	 /**
	  * Method for unapprove
	  */

	public function do_unapprove_dk($id)
	 {
		
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_dk' => '',
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Data Pengajuan Tidak Di Setujui');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	public function do_unapprove_finance($id)
	 {
		
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_finance' => '',
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Data Pengajuan Tidak Di Setujui');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	public function do_unapprove_user($id)
	 {
		
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_user' => '',
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Data Pengajuan Tidak Di Setujui');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }

	public function do_unapprove_du($id)
	 {
		
		$idpencairan = $this->PencairanModel->getById($id);
		$id = $idpencairan->id_pencairan;
		$data = array(
			'approve_du' => '',
		 );	
		 if($data)
		 {
			 $this->PencairanModel->update($id,$data);
			 $this->session->set_flashdata('success','Data Pengajuan Tidak Di Setujui');
			 redirect('Backend/Pencairan/show/'.$id);
		 }
	 }
	
	 public function print($id)
	 {
		$data['pencairan'] = $this->PencairanModel->getRincianPrint($id);
		$data['rincian'] = $this->PencairanModel->getRincian($id);
		$data['total'] = $this->PencairanModel->getSumTotal($id);
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8', 
			'orientation' => 'L'
		]);
		$html = '<h2 style="text-align:center;">PT ANDHU ADHA PERKASA TECHMIL</h2>';
		$html .= '<h5 style="text-align:center;">Graha Turangga, Jl. Raya Mabes Hankam No.7, Setu, Cipayung, Indonesia</h5>';
		$html .= '<h2 style="text-align:center;">FORM PERMOHONAN PENGAJUAN PENCAIRAN</h2>';
		$data = $this->load->view('backend/pengajuan/pencairan/print',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	 }

	 /**
	  * Crud rincian
	  */

	  public function show($id)
	 {

		
		$data['rincian'] = $this->PencairanModel->getRincian($id);
		$data['total_rincian'] = $this->PencairanModel->getSumTotal($id);
		$data['pencairan'] = $this->PencairanModel->getById($id);

		$data['main_admin'] = "backend/pengajuan/pencairan/rincian";
		$this->load->view('layouts/admin',$data);
	 }

	 public function do_rincian($id)
	 {
		$idPencarian = $this->PencairanModel->getById($id);
		$postid = $idPencarian->id_pencairan;
		
		$jumlah = $this->input->post('jumlah');
		$hargaSatuan = $this->input->post('harga_satuan');
		$total = $jumlah * $hargaSatuan;


		$data = array(
			'id_pencairan' => $postid,
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $jumlah,
			'satuan' => $this->input->post('satuan'),
			'harga_satuan' => $hargaSatuan,
			'total' => $total
		); 

		if($data)
		{
			$this->PencairanModel->addRincian($data);
			$this->session->set_flashdata('success','Sukses Tambah Rincian');
			redirect('Backend/Pencairan/show/'.$postid);
		}
	 }

	 public function deleteRincian($idrincian)
	 {
		$pencairanid = $this->PencairanModel->getByIdRincian($idrincian);
		$postid = $pencairanid->id_pencairan;
		    $this->PencairanModel->deleteRincian($idrincian);

			
			$this->session->set_flashdata('delete_rincian','Delete Data Rincian Berhasil');
			redirect('Backend/Pencairan/show/'.$postid);
		
	 }

	 public function editRincian($idrincian)
	 {	

		 $data['pencairan'] = $this->PencairanModel->getByIdRincian($idrincian);
		 $data['main_admin'] = "backend/pengajuan/pencairan/editRincian";
		 $this->load->view('layouts/admin',$data);
	 }

	 public function do_update_rincian($id,$idrincian)
	 {
		$idPencarian = $this->PencairanModel->getById($id);
		$postid = $idPencarian->id_pencairan;

		$idpencairan = $this->PencairanModel->getByIdRincian($idrincian);
		$idrincian = $idpencairan->id_rincian_pencairan;


		$jumlah = $this->input->post('jumlah');
		$hargaSatuan = $this->input->post('harga_satuan');
		$total = $jumlah * $hargaSatuan;


		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'satuan' => $this->input->post('satuan'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'total' => $total
		 );	
		 if($data)
		 {
			 $this->PencairanModel->updateRincian($idrincian,$data);
			 
			 $this->session->set_flashdata('success','Update Data Rincian Berhasil');
			 redirect('Backend/Pencairan/show/'.$postid);
		 }
	 }

	 






}
?>
