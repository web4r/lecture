<?php 

class PencairanModel extends CI_Model
{
	public function get()
	{
		$this->db->select('*');
		$this->db->from('tm_pencairan');
		$this->db->join('tm_user','tm_user.id_user=tm_pencairan.id_user','inner');
		$query = $this->db->get();
		return $query->result();
		
	}

	public function getByUser($iduser)
	{
		$this->db->select('*');
		$this->db->from('tm_pencairan');
		$this->db->join('tm_user','tm_user.id_user=tm_pencairan.id_user','inner');
		$this->db->where('tm_user.role_akun',$iduser);
		$query = $this->db->get();
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->where('id_pencairan',$id)->get('tm_pencairan')->row();
	}

	public function add($data)
	{
		return $this->db->insert('tm_pencairan',$data);
	}

	public function update($id,$data)
	{
		return $this->db->where('id_pencairan',$id)->update('tm_pencairan',$data);
	}

	

	public function delete($id)
	{
		$this->db->delete('tm_pencairan',array('id_pencairan'=>$id));
	}

	/**
	 * Rincian Model
	 */

	 public function getRincian($id)
	 {
		$this->db->select('*');
		$this->db->from('tm_rincian_pencairan');
		$this->db->join('tm_pencairan','tm_pencairan.id_pencairan=tm_rincian_pencairan.id_pencairan','inner');
		$this->db->where('tm_rincian_pencairan.id_pencairan',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getRincianPrint($id)
	 {
		$this->db->select('*');
		$this->db->from('tm_rincian_pencairan');
		$this->db->join('tm_pencairan','tm_pencairan.id_pencairan=tm_rincian_pencairan.id_pencairan','inner');
		$this->db->where('tm_rincian_pencairan.id_pencairan',$id);
		$query = $this->db->get();
		return $query->row();
	}

	

	public function getSumTotal($id)
	{
		$this->db->select_sum('total');
		$this->db->from('tm_rincian_pencairan');
		$this->db->join('tm_pencairan','tm_pencairan.id_pencairan=tm_rincian_pencairan.id_pencairan','inner');
		$this->db->where('tm_rincian_pencairan.id_pencairan',$id);
		$query = $this->db->get();
		return $query->row()->total;
		
	}

	 public function addRincian($data)
	 {
		 return $this->db->insert('tm_rincian_pencairan',$data);
	 }


	public function deleteRincian($idrincian)
	{
		$result = $this->db->delete('tm_rincian_pencairan',array('id_rincian_pencairan'=> $idrincian));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}

	public function getByIdRincian($idrincian)
	{
		return $this->db->where('id_rincian_pencairan',$idrincian)->get('tm_rincian_pencairan')->row();
	}

	public function updateRincian($idrincian,$data)
	{
		return $this->db->where('id_rincian_pencairan',$idrincian)->update('tm_rincian_pencairan',$data);
	}

}
?>
