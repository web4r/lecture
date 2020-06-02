<?php 


class RegistrasiModel extends CI_Model {

	public function create_user($data)
	{
		$insert = $this->db->insert('tm_users',$data);
		return $insert;
	}

	
}

?>
