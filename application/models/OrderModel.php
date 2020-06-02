<?php 

class OrderModel extends CI_Model{

	public function get(){
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		
		return $this->db->get()->result();
	}

	public function getByOrder($idOrder){
		return $this->db->where('id_student_lecture',$idOrder)->get('tm_student_lecture')->row();
	}

	public function updateOrder($idOrderStudent,$data){
		return $this->db->where('id_student_lecture',$idOrderStudent)->update('tm_student_lecture',$data);
	}


}
?>
