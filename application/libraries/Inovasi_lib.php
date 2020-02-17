<?php 

class Inovasi_Lib {

	private $CI = NULL;

    public function __construct() {
        $this->CI =& get_instance();
	}

	public function get_id_penilaian_all($soal,$id_produk) {
		$data = '';
		$this->CI->db->select('*');
		$this->CI->db->from('tm_penilaian');
		$this->CI->db->where('id_soal', $soal);
		$this->CI->db->where('id_produk', $id_produk);
		$query = $this->CI->db->get();
		if($query->num_rows() > 0){
				foreach ($query->result() as $key) {
				$data = $key->id_penilaian;
			}    
		}
		return $data;
	}

	public function get_jawaban_kuisioner_all($soal,$id_produk) {
		$data = '';
		$this->CI->db->select('nilai');
		$this->CI->db->from('tm_penilaian');
		$this->CI->db->where('id_soal', $soal);
		$this->CI->db->where('id_produk', $id_produk);
		$this->CI->db->limit(1);
		$query = $this->CI->db->get()->row();
		return $query;
	}

	public function get_id_penilaian($peserta,$soal,$id_produk) {
		$data = '';
		$this->CI->db->select('*');
		$this->CI->db->from('tm_penilaian');
		$this->CI->db->where('id_user', $peserta);
		$this->CI->db->where('id_soal', $soal);
		$this->CI->db->where('id_produk', $id_produk);
		$query = $this->CI->db->get();
		if($query->num_rows() > 0){
				foreach ($query->result() as $key) {
				$data = $key->id_penilaian;
			}    
		}
		return $data;
	}
	
	public function get_id_penilaian_pdf() {
		$data = '';
		$this->CI->db->select('*');
		$this->CI->db->from('tm_penilaian');
		$query = $this->CI->db->get();
		if($query->num_rows() > 0){
				foreach ($query->result() as $key) {
				$data = $key->id_penilaian;
			}    
		}
		return $data;
	}
	
	
	public function get_jawaban_kuisioner($peserta,$soal,$id_produk) {
		$data = '';
		$this->CI->db->select('nilai');
		$this->CI->db->from('tm_penilaian');
		$this->CI->db->where('id_user', $peserta);
		$this->CI->db->where('id_soal', $soal);
		$this->CI->db->where('id_produk', $id_produk);
		$this->CI->db->limit(1);
		$query = $this->CI->db->get()->row();
		return $query;
	}

	public function get_id_produk($id_user) {
		$data = '';
		$this->CI->db->select('id_produk');
		$this->CI->db->from('tm_produk');
		$this->CI->db->where('id_user', $id_user);
		$query = $this->CI->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result() as $key) {
			   $data = $key->id_produk;
		   }    
	   }
	   return $data;
	}
}

?>
