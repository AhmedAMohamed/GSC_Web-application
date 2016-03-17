<?php

class Entry_check_model extends CI_Model{
	
	public function index(){
	
	}
	
	public function serial_exists($id){
		$query = $this->db->get_where('users', array('id'=>$id));
		//var_dump($query->num_rows());
		if($query->num_rows() == 0){
			return -1;//serial does not exist
		}else{
			$result = $query->result();
			if($result[0]->first_name != ""){

				return 0;//Registered go to login

			}else{

				return 1;//not registered go to registration

			}
		}
	}
	
	
}

