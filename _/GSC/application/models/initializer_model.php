<?php


class Initializer_model extends CI_Model
{	
	public function get_all_serials() {	
		$query = $this->db->get('serials');
		return $query->result();
	}
	public function insert_into_users($serials) {
		foreach($serials as $row) {
			$data = array(
				'id' => $row->serial
			);
			$data_admins = array();
			$data_members = array();
			$data_money_user = array();
			$data_user_exp = array();
			if($row->serial[3] == "0") {
				if($row->serial[5] == "0") {
					$data['position'] = "president";
					$data['committe'] = "president";
				}
				if($row->serial[5] == "1" || $row->serial[5] == "2" || $row->serial[5] == "3" ) {
					$data['position'] = "project manager";
					$data['committe'] = "project manager";
				}
				if($row->serial[5] == "4" || $row->serial[5] == "5" || $row->serial[5] == "6" || $row->serial[5] == "7" ) {
					$data['position'] = "Head";
					$data['committe'] = "Game Developers";
				}
				if($row->serial[5] == "8" || $row->serial[5] == "9" || ($row->serial[5] == "0" && $row->serial[4] == "1" )) {
					$data['position'] = "Head";
					$data['committe'] = "Problem Solver Developers";
				}
				if($row->serial[5] == "1" || $row->serial[5] == "2"  && $row->serial[4] == "1" ) {
					$data['position'] = "Head";
					$data['committe'] = "Marketing";
				}
				if(($row->serial[5] == "3" || $row->serial[5] == "4") && $row->serial[4] == "1" ) {
					$data['position'] = "Head";
					$data['committe'] = "People operation";
				}
				if(($row->serial[5] == "5" || $row->serial[5] == "6") && $row->serial[4] == "1" ) {
					$data['position'] = "Head";
					$data['committe'] = "People Relation";
				}
				if(($row->serial[5] == "7" || $row->serial[5] == "8") && $row->serial[4] == "1" ) {
					$data['position'] = "Head";
					$data['committe'] = "Decoration and Material";
				}
				if($row->serial[5] == "9" && $row->serial[4] == "1") {
					$data['position'] = "Head";
					$data['committe'] = "Advertising";
				}
				$data_admins['id'] = $row->serial; 
				$data['profile_img_path'] = "assets/img/default-user.jpg";
			}
			else {
				$data_members['id'] = $row->serial;
				if($row->serial[3] == "1") { // games committee
					$data['position'] = "Member";
					$data['committe'] = "Game Developer";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}	
				else if($row->serial[3] == "2") { // problem solver committee
					$data['position'] = "Member";
					$data['committe'] = "Problem Solving";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
				else if($row->serial[3] == "3") { // po committee
					$data['position'] = "Member";
					$data['committe'] = "People Operation";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
				else if($row->serial[3] == "4") { // pr committee
					$data['position'] = "Member";
					$data['committe'] = "People Relations";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
				else if($row->serial[3] == "5") { // marketing committee
					$data['position'] = "Member";
					$data['committe'] = "Marketing";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
				else if($row->serial[3] == "6") { // Decoration & Materials committee
					$data['position'] = "Member";
					$data['committe'] = "Decoration & Material";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
				else if($row->serial[3] == "7") { // Advertising committee
					$data['position'] = "Member";
					$data['committe'] = "Advertising";
					$data['profile_img_path'] = "assets/img/default-user.jpg";
				}
			}
			
			$data_money_user['id'] = $row->serial;
			$data_money_user['money'] = 0;
			
			$data_user_exp['id'] = $row->serial;
			$data_user_exp['rank_id'] = 1;
			$data_user_exp['exp'] = 200;
			
			$this->db->trans_strict(FALSE);
			$this->db->trans_start();
				$this->db->insert('users',$data);
				$this->db->insert('money_user',$data_money_user);
				$this->db->insert('users_exp_ranks',$data_user_exp);
			$this->db->trans_complete();
			$this->db->insert('admins',$data_admins);
			$this->db->insert('members',$data_members);
		}
	}
}
