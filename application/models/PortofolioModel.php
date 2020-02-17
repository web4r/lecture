<?php 

class PortofolioModel extends CI_Model {


	public function totalPortofolio()
	{
		return $this->db->get('tm_portofolio')->num_rows();
		
	}

	public function get()
	{
		return $this->db->get('tm_portofolio')->result();
	}

	public function getById($id)
	{
		return $this->db->where('id_portofolio',$id)->get('tm_portofolio')->row();
		
	}


	public function getKontrakAll()
	{
		return $this->db->get('tm_portofolio')->num_rows();
	}
	public function getTahun($tahun)
	{
		
		$this->db->where('tahun',$tahun);
		$query = $this->db->get('tm_portofolio');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}

	
	}

	public function getByTahun($tahun)
	{
		return $this->db->where('tahun',$tahun)->get('tm_portofolio')->result();
	}
	public function getNilaiByTahun($tahun)
	{
		return $this->db->select_sum('nilai')->where('tahun',$tahun)->get('tm_portofolio')->row()->nilai;
	}
	public function getNilaiKontrakAll()
	{
		$this->db->select_sum('nilai');
		$query = $this->db->get('tm_portofolio');
		return $query->row()->nilai; 
	}

	public function add($data)
	{
		return $this->db->insert('tm_portofolio',$data);
	}
	
	public function delete($id)
	{
		$this->db->delete('tm_portofolio',array('id_portofolio'=> $id));
	}

	public function update($idPortofolio,$data)
	{
		$this->db->where('id_portofolio',$idPortofolio);
		$this->db->update('tm_portofolio',$data);
		return true;
	}





}
?>
