<?php


class Registration_model extends CI_Model{
	
	public function insert_user($serial, $first_name, $last_name, $mobile, $mail, $password){
		$password = md5($password);
		
		$data = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'mobile' => $mobile,
				'mail' => $mail,
				'password' => $password
				);
		$this->db->where('id', $serial);
		$this->db->update('users', $data);	
	}

}