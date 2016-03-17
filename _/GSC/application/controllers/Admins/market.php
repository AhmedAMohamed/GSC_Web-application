<?php

class Market extends CI_Controller {
	
	public function index() {
		
		if($this->session->userdata('session_check') == "true") {
			$user_data = $this->session->all_userdata();
			$user_data = $user_data[0];
			$user_serial = $user_data->id;
			
			$this->load->model("user_helper_model");
			$valid = $this->user_helper_model->check_admin($user_serial);
			if($valid) {
				
			}
			else {
				$user_serial = $this->session->all_userdata();
				$user_serial = $user_serial[0];
				$user_data = $this->get_theuser_data($user_serial->id);
				$user_data=$user_data[0];
				$this->load->view("includes/header", $user_data);
				$this->load->view('member_profile_view', $data);
				$this->load->view("includes/footer");
			}
			
		}
		else {
			$url = base_url("welcome");
			redirect($url);
		}

		
	}
}