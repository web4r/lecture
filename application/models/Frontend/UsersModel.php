<?php 
class UsersModel extends CI_Model{

    public function getByIdStudent($hash){

        $verified =  $this->db->where('is_token',$hash)->get('tm_students')->row();
        if($verified){
            return $verified;
        }
        
    }

    public function create_user($data){
        return $this->db->insert('tm_students',$data);
    }

    public function verifyEmail($hash){
        $data = array('is_active' => 2 );
        $this->db->where('is_token',$hash);
        return $this->db->update('tm_students',$data);
    }

    /**
     * Login Model
     */

	public function login($email,$password)
	{
        $this->db->where('email',$email);
		$account = $this->db->get('tm_students')->row();
		if($account != NULL)
		{
			if(password_verify($password,$account->password))
			{    
                    $_SESSION['fullname'] = $account->fullname;
                    $_SESSION['role_id'] = $account->role_id;
                    $_SESSION['is_active'] = $account->is_active;
                    return $account;
                    // print_r($account);
			}
			else {
				$this->session->set_flashdata('failed_login','Username / Password Anda Salah');
				redirect('Frontend/Login');
			}
        }
        else {
			$this->session->set_flashdata('no_account','Akun anda belum terdaftar');
			redirect('Frontend/Login');
		}
	}
















}
?>
