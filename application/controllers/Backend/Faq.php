<?php

class Faq extends CI_Controller{

	function index(){

		$data['main_admin'] = "backend/class/faq/faq";
		$this->load->view('layouts/admin',$data);
	}
	
}

?>
