<?php 
class LoginModel extends CI_Model {

	public function login_user($email,$password)
	{
		$this->db->where('email',$email);
		$result = $this->db->get('tm_user')->result();
		$dbpassword = $result->row(5)->password;
		if(password_verify($password,$dbpassword))
		{
			return $result->row(0)->id_user;
		}
		else {
			return false;
		}

		
	}

	public function login($email,$password)
	{
		$this->db->where('email',$email);
		$account = $this->db->get('tm_user')->row();
		if($account != NULL)
		{
			if(password_verify($password,$account->password))
			{
				$_SESSION['fullname'] = $account->fullname;
				$_SESSION['status_akun'] = $account->stat_akun;
				$_SESSION['role_akun'] = $account->role_akun;
				$_SESSION['approval'] = $account->approval;
				return $account->id_user;
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
