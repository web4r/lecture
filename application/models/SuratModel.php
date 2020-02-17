<?php 

class SuratModel extends CI_Model {


	public function totalNomorSurat()
	{
		return $this->db->get('tm_surat')->num_rows();
		
	}

	public function get()
	{
		// return $this->db->join('tm_user','tm_user.id_user = tm_surat.id_user','inner')->order_by('nomor_surat','DESC')->get('tm_surat')->result();
		$this->db->select('*');
		$this->db->from('tm_surat');
		$this->db->join('tm_user','tm_user.id_user = tm_surat.id_user','inner');
		$this->db->order_by('nomor_surat','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function getMySurat($id)
	{
		return $this->db->where('id_user',$id)->get('tm_surat')->result();
	}

	public function getTotalSurat()
	{
		return $this->db->get('tm_surat')->num_rows();
	}

	public function getNomorTerakhir()
	{
		return $this->db->order_by('nomor_surat','DESC')->limit(1)->get('tm_surat')->row();
	}

	public function getById($id)
	{
		// return $this->db->where('id_surat',$id)->get('tm_surat')->row();
		$this->db->select('*');
		$this->db->from('tm_surat');
		$this->db->join('tm_user','tm_user.id_user = tm_surat.id_user','inner');
		$this->db->where('id_surat',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		return $this->db->insert('tm_surat',$data);
	}

	public function delete($id)
	{
		$this->db->delete('tm_surat',array('id_surat'=>$id));
		// $this->db->delete('tm_user.id_user',	);
		// $this->db->from('tm_surat')
	}

	public function update($idsurat,$data)
	{
		return $this->db->where('id_surat',$idsurat)->update('tm_surat',$data);
	}
	
}


?>
