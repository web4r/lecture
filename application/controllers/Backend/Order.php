<?php 


class Order extends CI_Controller{

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
		$data['orderList'] = $this->OrderModel->get($id);
		$data['main_admin'] = "backend/class/order/order";
		$this->load->view('layouts/admin',$data);
	}

	public function orderAdmin(){
		$data['orderAdminList'] = $this->OrderModel->getAdmin();
		$data['main_admin'] = "backend/class/order/order";
		$this->load->view('layouts/admin',$data);
	}

	public function activateOrder($idOrder){
		$id_student_order = $this->OrderModel->getByOrder($idOrder);
		$idOrderStudent = $id_student_order->id_student_lecture;
		
			$data = array('status_order' => 2);
			if($data)
			{
				$this->OrderModel->updateOrder($idOrderStudent,$data);
				$this->session->set_flashdata('order_update','Sukses Aktifkan Kelas');
				redirect('Backend/Order/orderAdmin');
			}
		
		
	}
	public function nonOrder($idOrder){
		$id_student_order = $this->OrderModel->getByOrder($idOrder);
		$idOrderStudent = $id_student_order->id_student_lecture;

		
			$data = array('status_order' => 1);
			if($data)
			{
				$this->OrderModel->updateOrder($idOrderStudent,$data);
				$this->session->set_flashdata('order_non_update','Sukses Non Aktifkan Kelas');
				redirect('Backend/Order/orderAdmin');
			}
		
	}


}
?>
