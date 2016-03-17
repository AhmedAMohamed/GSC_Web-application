<?php

class Xp extends CI_Controller {
	
	public function index() {
		$this->load->view("Not_valid_user_view");	
	}
	
	public function add_xp() {
		$member_serial = $this->input->post('memberId');
		$ammount = $this->input->post('xpAmount');
		if($this->session->userdata('session_check') == "true") {
			$serial = $this->session->all_userdata();
			$serial = $serial[0];
			$serial = $serial->id;
			$this->load->model("user_helper_model");
			$valid = $this->user_helper_model->check_admin($serial);
			if($valid) {
				if($this->user_helper_model->is_layer_member($member_serial, $serial)) {
					$this->load->model('xp_model');
					$done = $this->xp_model->add_xp_to_user($ammount, $member_serial);
					if($done) {
						echo "true";
					}
					else {
						echo "false";
					}
				}
			}
			else {
				echo "false";
				$url = base_url("logout");
				redirect($url);
			}
		}
		else {
			echo "false";
			$url = base_url("logout");
			redirect($url);
		}
	}
	public function get_members_serials() {
		$this->load->model("user_helper_model");
		return $this->user_helper_model->get_serials();
	}
	public function get_members_data() {
		$this->load->model("user_helper_model");
		$data = $this->user_helper_model->get_members_data();
		return $data;
	}
	public function xp_addition_form($member_serial) {
		$data = new StdClass();
		$data->serial = $member_serial;
		$this->load->view('form_xp_addition',$data);
	}
	public function validate_xp_form() {
		 $serial=$this->input->post('user_serial');
		 $xp = $this->input->post('xp_adition');
		 $this->load->model('xp_model');
		 $done = $this->xp_model->add_xp_to_user($xp, $serial);
		 if($done) {
			$this->load->view('Admins/xp_done_view');
		}
		else {
			$this->load->view('Admins/xp_failed_view');
		}
	}
}