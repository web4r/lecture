<?php 


class UserModel extends CI_Model {

	public function getAll()
	{
		$query = $this->db->get('tm_users');
		return $query->result();
	}

	public function getRole()
	{
		return $this->db->get('tm_role_user')->result();
	}

	public function getVerify()
	{	
		
		$query = $this->db->get('tm_users');
		return $query->result();
	}

	public function getById($id)
	{
		$query = $this->db->where('id_users',$id)->get('tm_users');
		return $query->row();
	}

	public function verifyUserStatus()
	{
		$query = $this->db->where('is_active',2)->get('tm_users');
		return $query->result();
	}

	public function notifUser()
	{
		return $this->db->where('is_active',2)->get('tm_users')->num_rows();
		
	}

	public function totalUser()
	{
		return $this->db->get('tm_users')->num_rows();
		
	}

	public function updateVerify($id,$data)
	{
		$this->db->where('id_users',$id);
		$this->db->update('tm_users',$data);
		return true;
	}

	public function updateAuthPassword($id,$data)
	{
		$this->db->where('id_users',$id);
		$this->db->update('tm_users',$data);
		return true;
	}

	public function update($idperson,$data)
	{
		$this->db->where('id_users',$idperson);
		$this->db->update('tm_users',$data);
		return true;
	}

	public function delete($idperson)
	{
		$this->db->delete('tm_users',array('id_users'=>$idperson));
	}


}


?>
