<?php

class login_model extends CI_Model {

	public function get_user($mail, $password) {
		$query = $this->db->get_where('users', array('mail'=>$mail, 'password'=>$password));
		$data = new StdClass();
		if($query->num_rows == 0) {
			$data->check = false;
		}
		else {
			$result = $query->result();
			$data->serial = $result[0]->id;
			$data->check = true;
		}
		return $data;
	}
}