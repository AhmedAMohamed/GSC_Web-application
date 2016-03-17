<?php 

class Xp_model extends CI_Model {
	public function index() {
		
	}
	public function add_xp_to_user($xp, $serial) {
		$query = 'select exp from users_exp_ranks where `users_exp_ranks`.id = '.$serial;
		$query = $this->db->query($query);
		$query = $query->result();
		$pre_xp = $query[0]->exp;
		$xp = $pre_xp + $xp;
		$xp_row = array(
			'exp' => $xp
		);
		$update_xp_query="UPDATE users_exp_ranks SET `exp`='".$xp."' WHERE `users_exp_ranks`.id='".$serial."'";
		$update_xp_query = $this->db->query($update_xp_query);

		// $rank_query = "SELECT id FROM ranks WHERE `ranks`.from_exp < ".$xp." AND  `ranks`.to_exp > ".$xp;

		$conditions = array('from_exp <=' => $xp,'to_exp >=' => $xp);

		$this->db->select('*');
		$this->db->from('ranks');
		$this->db->where($conditions);
		$rank_query = $this->db->get();
		$rank_query = $rank_query->result();
		
		if($rank_query)
		{$rank_id = $rank_query[0]->id;}
		else{
			$rank_id=1;
			echo "error";
		}
		// echo $rank_id;
		// $rank_row = array(
		// 	'rank_id' => $rank_id
		// );

		$update_rank_query="UPDATE users_exp_ranks SET `rank_id`='".$rank_id."' WHERE `users_exp_ranks`.id='".$serial."'";
		$update_rank_query = $this->db->query($update_rank_query);
		//$query = $query->result();
		if($update_xp_query)
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