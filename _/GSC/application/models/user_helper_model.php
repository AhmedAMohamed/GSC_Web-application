<?php

 class User_helper_model extends CI_Model{
	
	public function get_user_data($serial){
		
		  $query = $this->db->query(
								     '
									  SELECT * 
									  FROM  `users` 
									  JOIN  `money_user` 
									  JOIN  `users_exp_ranks` ON `users`.id =  `money_user`.id
									  AND  `users`.id =  `users_exp_ranks`.id
									  WHERE  `users`.id = '.$serial.' 
									  LIMIT 0 , 200
								     '
								    );
		  $query = $query->result();
		 return $query;
	 }

	 public function check_admin($serial) {
		 $query = $this->db->get_where('admins', array('id' => $serial));
		 
		 if($query->num_rows == 0) {
			 return false;
		 }
		 else {
			 return true;
		 }
	 }

	 public function get_serials() {
		 $query = 'select * from members';
		 $query = $this->db->query($query);
		 $query = $query->result();
		 return $query;
	}
	 
	public function get_members_data() {
		 $query = '	SELECT first_name, last_name, id, mail
					 FROM `users`
					 WHERE EXISTS 
						 (SELECT *
						  FROM `members`
						  WHERE `users`.id = `members`.id
						  );
				  ';
		 $query = $this->db->query($query);
		 $query = $query->result();
		 return $query;
	}
	
	public function is_layer_member ($serial, $admin_serial) {
		$query = $this->db->get_where('admins' , array('id' => $admin_serial));
		$query = $query->result();
		
		$query = $query[0];
		if($query->layer == "1") {
			return true;
		}
		else if ($query->layer == "3") {
			return true; 
		}
		else{
			$q = "select count(*) as number from members where layer = ". $query->layer." and id = ". $serial;
			$q = $this->db->query($q);
			$q = $q->result();
			if($q[0]->number >= 1) {
				return true;
			}
			else{
				return false;
			}
		}
	}
	
	public function get_all_users_data () {
		$q = "select * from users";
		$q = $this->db->query($q);
		$q = $q->result();
		return $q;
	}
}