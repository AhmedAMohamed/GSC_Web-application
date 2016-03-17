<?php 

class Profile_model extends CI_Model {
	public function index() {
		
	}
	public function edit_img_logo_path($img_path, $serial) {
		
		$query="UPDATE users SET `profile_img_path`= '".$img_path." ' WHERE `users`.id=".$serial;
		$query = $this->db->query($query);
		if($query)
		{
			return true;
		}
		else
		{
			
			return false;
		}
	}
}