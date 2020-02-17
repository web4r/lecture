<?php 


class UserModel extends CI_Model {

	public function getAll()
	{
		$query = $this->db->get('tm_user');
		return $query->result();
	}

	

	public function getVerify()
	{	
		$this->db->where('stat_akun',1);
		$query = $this->db->get('tm_user');
		return $query->result();
	}

	public function getById($id_user)
	{
		$query = $this->db->where('id_user',$id_user)->get('tm_user');
		return $query->row();
	}

	public function verifyUserStatus()
	{
		$query = $this->db->where('stat_akun',2)->get('tm_user');
		return $query->result();
	}

	public function notifUser()
	{
		return $this->db->where('stat_akun',2)->get('tm_user')->num_rows();
		
	}

	public function totalUser()
	{
		return $this->db->get('tm_user')->num_rows();
		
	}

	public function updateVerify($id_user,$data)
	{
		$this->db->where('id_user',$id_user);
		$this->db->update('tm_user',$data);
		return true;
	}

	public function updateAuthPassword($id_user,$data)
	{
		$this->db->where('id_user',$id_user);
		$this->db->update('tm_user',$data);
		return true;
	}

	public function update($idperson,$data)
	{
		$this->db->where('id_user',$idperson);
		$this->db->update('tm_user',$data);
		return true;
	}

	public function delete($idperson)
	{
		$this->db->delete('tm_user',array('id_user'=>$idperson));
	}


}


?>
