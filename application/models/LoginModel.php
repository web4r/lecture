<?php 
class LoginModel extends CI_Model {

	public function login_user($email,$password)
	{
		$this->db->where('email',$email);
		$result = $this->db->get('tm_users')->result();
		$dbpassword = $result->row(5)->password;
		if(password_verify($password,$dbpassword))
		{
			return $result->row(0)->id_users;
		}
		else {
			return false;
		}

		
	}

	public function login($email,$password)
	{
		$this->db->where('email',$email);
		$account = $this->db->get('tm_users')->row();
		if($account != NULL)
		{
			if(password_verify($password,$account->password))
			{
				$_SESSION['role_id'] = $account->role_id;
				$_SESSION['fullname'] = $account->fullname;
				$_SESSION['email'] = $account->email;
				$_SESSION['is_active'] = $account->is_active;
				return $account->id_users;
			}
			else {
				$this->session->set_flashdata('failed_login','Username / Password Anda Salah');
				redirect('Login');
			}
		}else {
			$this->session->set_flashdata('no_account','Akun anda belum terdaftar');
			redirect('Login');
		}
	}

}



?>
