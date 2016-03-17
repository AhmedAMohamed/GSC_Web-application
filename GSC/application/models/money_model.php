<?php 

class Money_model extends CI_Model {
	public function index() {
		
	}
	public function add_money_to_user($money, $serial) {
		$query = 'select money from money_user where `money_user`.id = '.$serial;
		$query = $this->db->query($query);
		$query = $query->result();
		$pre_money = $query[0]->money;
		$money = $pre_money + $money;
		$money_row = array(
			'money' => $money
		);
		$query="UPDATE money_user SET `money`='".$money."' WHERE `money_user`.id='".$serial."'";
		$query = $this->db->query($query);
		//$query = $query->result();
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
		//$this->db->update('money_user', $money_row);
		//return true;
	}
}