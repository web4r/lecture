<?php 

class OrderModel extends CI_Model{

	public function get($id){
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.user_id',$id);
		return $this->db->get()->result();
	}

	public function getAdmin(){
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

	/**
	 * CRUD CUPON
	 */
	public function create($data){
		return $this->db->insert('tm_cupon',$data);
	}

	public function getCupon(){
		return $this->db->get('tm_cupon')->result();	
	}
	public function getCuponRow($input_kode_kupon){
		$this->db->where('cupon_name',$input_kode_kupon);
		$query = $this->db->get('tm_cupon');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}
	}


	public function update_price($idstudent,$data){
		return $this->db->where('id_student_lecture',$idstudent)->update('tm_student_lecture',$data);
	}

	public function deleteCuponClass($id)
	{
		$result = $this->db->delete('tm_cupon',array('id_cupon'=> $id));
		if($result){
			return true;
		}
		else {
			return false;
		}
	}

}
?>
