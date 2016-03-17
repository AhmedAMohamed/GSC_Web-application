<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class entry_check extends CI_Controller {
		public function index() {
			$this->load->view('welcome_message');
		}
		
		public function check_serial () {
			$serial = $this->input->get('serial_num');
			$this->load->model('entry_check_model');
			$value = $this->entry_check_model->serial_exists($serial);
			
			$data = array(
				'serial' => $serial,
				'session_check' => "true"
			);
			
			
			if($value == -1) {
				$this->load->view('welcome_message');
			}
			else if($value == 0) {
				$this->session->set_userdata($data);
				$this->load->view('login_view');
			}
			else if($value == 1) {
				$this->session->set_userdata($data);
				$this->load->view('registration_view');
			}
			else {
				$this->load->view('welcome_message');
			}
		}
	}

?>