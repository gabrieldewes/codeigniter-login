<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userModel extends CI_Model {

	var $table = 'users';
	var $max_idle_time = 300;

	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	public function save($user) {
		return $this->db->insert($this->table, $user);
	}

	public function delete($user) {
		return $this->db->delete($this->table, $user);
	}

	public function update($user_data) {
		return $this->db->update($this->table, $user_data);
	}

	public function getByUsername($username)
	{
		$user = array('username' => $username);
		$query = $this->db->get_where($this->table, $user, 1);
		if ($query->num_rows() > 0) 
			return $query->row_array();
		return false;
	}

	public function getById($id) {
		$user = array('id' => $id);
		$query = $this->db->get_where($this->table, $user, 1);
		if ($query->num_rows() > 0) 
			return $query->row_array();
		return false;
	}

	public function getAll() {
        return $this->db->get('users')->result_array();
	}

	public function isLoggedIn() {
		$last_activity = $this->session->userdata('last_activity');
		$logged_in = $this->session->userdata('logged_in');
		$user = $this->session->userdata('user');
		
		if (($logged_in == TRUE) 
		&& ((time() - $last_activity) < $this->max_idle_time) ) 
		{
			$this->allowPass($user);
			return true;
		} 
		return false;
	}

	public function allowPass($user_data) {
		$this->session->set_userdata(array('last_activity' => time(), 'logged_in' => TRUE, 'user' => $user_data));
	}

	public function emailExists($email) {
		$user = array('email' => $email);
		$query = $this->db->get_where($this->table, $user, 1);
		if ($query->num_rows() > 0) 
			return true;
		return false;
	}

	public function usernameExists($username) {
		$user = array('username' => $username);
		$query = $this->db->get_where($this->table, $user, 1);
		if ($query->num_rows() > 0) 
			return true;
		return false;
	}

	public function checkPassword($password, $hashed_password) {
		list($salt, $hash) = explode('.', $hashed_password);
		$hashed_cover = $salt.'.'.md5($salt.$password);
		return ($hashed_password == $hashed_cover);
	}

	public function hashPassword($password) 
	{
		$salt = $this->generateSalt();
		return $salt.'.'.md5($salt.$password);
	}

	private function generateSalt() {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length = 10;
        $i = 0;
        $salt = "";
        while ($i < $length) {
            $salt .= $characters{mt_rand(0, (strlen($characters) - 1))};
            $i++;
        }
        return $salt;
	}

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */