<?php 

class DashboardModel extends CI_Model{


	public function getLectureByIdStudent($id){
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_class_type','tm_class_type.id_type = tm_class.class_type_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.student_id',$id);
		$result  = $this->db->get();
		if($result){
            return $result->result();
        }else {
            redirect('Frontend/student');
        }
	}

	public function getTotalKelas($id)
	{
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->where('tm_student_lecture.student_id',$id);
		$totalsm = $this->db->get();
		if($totalsm){
			return $totalsm->num_rows();
		}else {

			return 0; 
		}
	}

	public function getProfile($id){
		$this->db->select('*');
		$this->db->from('tm_students');
		$this->db->where('tm_students.id_student',$id);
		$result  = $this->db->get();
		return $result->row();
		
	}

	public function deleteLectureStudent($id)
	{
		return $this->db->delete('tm_student_lecture',array('id_student_lecture'=>$id));
	}

	/**
	 * Feedback Model
	 */

	 public function createFeedback($data){
		return $this->db->insert('tm_feedback',$data);
	 }



}
?>
