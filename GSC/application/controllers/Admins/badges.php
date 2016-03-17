<?php


class Badges extends CI_Controller {

	public function index ($member) {
		if ($this->session->userdata('session_check') == "true") {
			$data = $this->session->all_userdata();
			$data = $data[0];
			$data = $data->id ;			
			$this->load->model('user_helper_model');
			$admin = $this->user_helper_model->check_admin($data);
			$data_sent = new stdClass();
			$data_sent->member = $member;			
			if ($admin) {
				if($this->user_helper_model->is_layer_member($member, $data)) {
					$this->load->view('add_badge_member_view', $data_sent);
				}
				else {
					echo 'go to hell';
				}
			}
			else {
				echo 'hhhhhhhhhh';
			}		
		}
		else {
			echo 'why??';
		}			
	}

	public function add_badge_to_member ($member) {
		// add badges form response :D 
	}
}
