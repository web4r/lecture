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
		$data['orderList'] = $this->OrderModel->get();
		$data['main_admin'] = "backend/class/order/order";
		$this->load->view('layouts/admin',$data);
	}

	public function activateOrder($idOrder){
		$id_student_order = $this->OrderModel->getByOrder($idOrder);
		$idOrderStudent = $id_student_order->id_student_lecture;
		if($id_student_order->class_status == 1){
			$data = array('class_status' => 2);
			if($data)
			{
				$this->OrderModel->updateOrder($id_student_order->id_student_lecture,$data);
				$this->session->set_flashdata('order_update','Sukses Aktifkan Kelas');
				redirect('Backend/Order');
			}
		}
		if($id_student_order->class_status == 2){
			$data = array('class_status' => 1);
			if($data)
			{
				$this->OrderModel->updateOrder($idOrderStudent,$data);
				$this->session->set_flashdata('order_update','Sukses Non Aktifkan Kelas');
				redirect('Backend/Order');
			}
		}
	}


}
?>
