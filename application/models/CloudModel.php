<?php 

class CloudModel extends CI_Model{

	public function totalCloudFile()
	{
		return $this->db->get('tm_cloud')->num_rows();
		
	}

	public function get()
	{
		return $this->db->get('tm_cloud')->result();
	}

	public function getById($id)
	{
		return $this->db->where('id_cloud',$id)->get('tm_cloud')->row();
	}

	public function add($data)
	{
		return $this->db->insert('tm_cloud',$data);
	}

	public function delete($id)
	{
		return $this->db->delete('tm_cloud',array('id_cloud'=>$id));
	}
	public function update($iddata,$data)
	{
		return $this->db->where('id_cloud',$iddata)->update('tm_cloud',$data);
	}
}
?>
