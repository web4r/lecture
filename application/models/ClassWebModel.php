<?php 

class ClassWebModel extends CI_Model{

	public function getAllClass(){
		$this->db->select('*');
		$this->db->from('tm_class');
		$this->db->join('tm_class_type','tm_class_type.id_type = tm_class.class_type_id','inner');
		$this->db->join('tm_users','tm_users.id_users = tm_class.user_id','inner');
		$this->db->join('tm_class_category','tm_class_category.id_category = tm_class.class_category_id', 'inner');
		$result  = $this->db->get();
		return $result->result();
	}

	public function getByUsers($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class');
		$this->db->join('tm_class_type','tm_class_type.id_type = tm_class.class_type_id','inner');
		$this->db->join('tm_users','tm_users.id_users = tm_class.user_id','inner');
		$this->db->where('tm_class.user_id',$id);
		return $this->db->get()->result();
	}

	public function getInfoClass($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class');
		$this->db->join('tm_class_type','tm_class_type.id_type = tm_class.class_type_id','inner');
		$this->db->join('tm_users','tm_users.id_users = tm_class.user_id','inner');
		$this->db->join('tm_class_category','tm_class_category.id_category = tm_class.class_category_id', 'inner');
		$this->db->where('tm_class.id_class',$id);
		$result  = $this->db->get();
		if($result->num_rows() > 0){
            return $result->row();
        }
	}

	public function getTypeClass()
	{
		return $this->db->get('tm_class_type')->result();
	}

	public function getCategoryClass()
	{
		return $this->db->get('tm_class_category')->result();
	}

	public function save($data)
	{
		return $this->db->insert('tm_class',$data);
	}

	public function delete($id)
	{
		$result = $this->db->delete('tm_class',array('id_class'=> $id));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}
	public function update($id,$data)
	{
		return $this->db->where('id_class',$id)->update('tm_class',$data);
	}

	/**
	 * Model Video Lecture
	 */

	public function getVideoLecture($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class_detail_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_class_detail_lecture.class_id','inner');
		$this->db->where('tm_class_detail_lecture.class_id',$id);
		$result  = $this->db->get();
		return $result->result();
	}


	
	public function getByIdDetailVideo($id)
	{
		return $this->db->where('id_detail_lecture',$id)->get('tm_class_detail_lecture')->row();
	}
	 public function saveVideo($data)
	{
		return $this->db->insert('tm_class_detail_lecture',$data);
	}

	public function updateVideo($id_rincian,$data)
	{
		return $this->db->where('id_detail_lecture',$id_rincian)->update('tm_class_detail_lecture',$data);
	}

	public function deleteVideo($id_rincian)
	{
		$result = $this->db->delete('tm_class_detail_lecture',array('id_detail_lecture'=> $id_rincian));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}


	/**
	 * Model Materi Lecture
	 */

	public function getMateriLecture($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class_theory');
		$this->db->join('tm_class','tm_class.id_class = tm_class_theory.class_id','inner');
		$this->db->where('tm_class_theory.class_id',$id);
		$result  = $this->db->get();
		return $result->result();
	}
	public function getByIdDetailMateri($id)
	{
		return $this->db->where('id_history',$id)->get('tm_class_theory')->row();
	}
	
	public function saveMateri($data)
	{
		return $this->db->insert('tm_class_theory',$data);
	}

	public function updateMateri($id_materi,$data)
	{
		return $this->db->where('id_history',$id_materi)->update('tm_class_theory',$data);
	}

	public function deleteMateri($id_materi)
	{
		$result = $this->db->delete('tm_class_theory',array('id_history'=> $id_materi));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Model Condition Lecture
	 */

	public function getConditionLecture($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class_condition');
		$this->db->join('tm_class','tm_class.id_class = tm_class_condition.class_id','inner');
		$this->db->where('tm_class_condition.class_id',$id);
		$result  = $this->db->get();
		return $result->result();
	}
	public function getByIdDetailCondition($id)
	{
		return $this->db->where('id_condition',$id)->get('tm_class_condition')->row();
	}
	
	public function saveCondition($data)
	{
		return $this->db->insert('tm_class_condition',$data);
	}

	public function updateCondition($id_condition,$data)
	{
		return $this->db->where('id_condition',$id_condition)->update('tm_class_condition',$data);
	}

	public function deleteCondition($id_condition)
	{
		$result = $this->db->delete('tm_class_condition',array('id_condition'=> $id_condition));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}


}
?>
