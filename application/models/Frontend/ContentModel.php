<?php 

class ContentModel extends CI_Model{

	/**
	 * 
	 * statistic
	 */

	public function get_statistic_class(){
		$totalclass = $this->db->get('tm_class');
		if($totalclass){
			return $totalclass->num_rows();
		}else{
			return 0;
		}
	}

	public function get_statistic_student(){
		$totalstudent = $this->db->get('tm_students');
		if($totalstudent){
			return $totalstudent->num_rows();
		}else{
			return 0;
		}
	}

	public function get_statistic_materi(){
		$totalmateri = $this->db->get('tm_class_detail_lecture');
		if($totalmateri){
			return $totalmateri->num_rows();
		}else{
			return 0;
		}
	}



	public function getTotalModul($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class_detail_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_class_detail_lecture.class_id','inner');
		$this->db->where('tm_class_detail_lecture.class_id',$id);
		$totalsm = $this->db->get();
		if($totalsm){
			return $totalsm->num_rows();
		}else {

			return 0; 
		}
	}

    public function getAll(){
		$this->db->select('*');
		$this->db->from('tm_class');
		$this->db->where('tm_class.class_status','1');
		$result = $this->db->get();
		return $result->result();
		
		
	}
	
	public function getById($id){
		$this->db->select('*');
		$this->db->from('tm_class');
		$this->db->join('tm_class_type','tm_class_type.id_type = tm_class.class_type_id','inner');
		$this->db->join('tm_users','tm_users.id_users = tm_class.user_id','inner');
		$this->db->join('tm_class_category','tm_class_category.id_category = tm_class.class_category_id', 'inner');
		$this->db->where('tm_class.id_class',$id);
		$result  = $this->db->get();
		
            return $result->row();
        
	}
	

	public function getMateriId($id){
		$this->db->select('*');
		$this->db->from('tm_class_theory');
		$this->db->join('tm_class','tm_class.id_class = tm_class_theory.class_id','inner');
		$this->db->where('tm_class_theory.class_id',$id);
		$result  = $this->db->get();
		
        return $result->result();
	}

	public function getConditionId($id){
		$this->db->select('*');
		$this->db->from('tm_class_condition');
		$this->db->join('tm_class','tm_class.id_class = tm_class_condition.class_id','inner');
		$this->db->where('tm_class_condition.class_id',$id);
		$result  = $this->db->get();
		return $result->result();
        
	}

	

	public function playlist($id)
	{
		$this->db->select('*');
		$this->db->from('tm_class_detail_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_class_detail_lecture.class_id','inner');
		$this->db->where('tm_class_detail_lecture.class_id',$id);
		$result  = $this->db->get();
		
            return $result->result();
        
	}

	public function play($idclass,$idmateri){
		$this->db->select('*');
		$this->db->from('tm_class_detail_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_class_detail_lecture.class_id','inner');
		$this->db->where('tm_class_detail_lecture.class_id',$idclass);
		$this->db->where('tm_class_detail_lecture.id_detail_lecture',$idmateri);
		$result  = $this->db->get();
		
            return $result->row();
        
		
		
	}

	/**
	 * Complete Order
	 */

	



	public function confirmClass($id){
		
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.id_student_lecture',$id);
		$result  = $this->db->get();
		return $result->row();
		
        
	}


	public function chechkLectureStudent($id){
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.class_id',$id);
		
		$result  = $this->db->get();
		if($result->num_rows() <= 1){
            return $result->row_array();
		}
	}

	public function cekClass($idkelas){
		
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.class_id',$idkelas);
		$result  = $this->db->get();
		if($result->num_rows() > 0){
            return $result->row_array();
		}
		
        
	}

	public function cek($id){
		$this->db->select('*');
		$this->db->from('tm_student_lecture');
		$this->db->join('tm_class','tm_class.id_class = tm_student_lecture.class_id','inner');
		$this->db->join('tm_students','tm_students.id_student = tm_student_lecture.student_id','inner');
		$this->db->where('tm_student_lecture.class_id',$id);
		$result  = $this->db->get();
		
        if($result){
			return $result->row_array();
		}else {
			return false;
		}

	}

	



	public function addOrder($data){
		return $this->db->insert('tm_student_lecture',$data);
	}



}
?>
