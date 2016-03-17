<?php

class Registration extends CI_Controller {

	public function index(){
		if($this->session->userdata('session_check') == "true"){

			if($this->not_registered($this->session->userdata('serial'))){
				$this->register_user();
			}
			else{
				$url = base_url("/login");
				redirect($url);
			}
		}else{
			$url = base_url("/logout");
			redirect($url);
		}
	}
	
	public function register_user(){
		if($this->session->userdata('session_check') == "true"){
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$mail = $this->input->post('mail');
			$password = $this->input->post('password');
			$this->load->model('registration_model');
			$data = $this->session->userdata('serial');
			$this->registration_model->insert_user($data, $first_name, $last_name, $mobile, $mail, $password);
			$url = base_url("/login");
			redirect($url);
		}else{
			$url = base_url("/logout");
			redirect($url);
		}
	}
	
	public function mobile_register_user(){
		$serial = $this->input->post('serial');
		$this->load->model('entry_check_model');
		$serial_exists = $this->entry_check_model->serial_exists($serial);
		
		if($serial_exists == -1){
			//serial does not exist
			$json = "{'message' : 'failure', 'cause' : 'wrong_serial'}";
				echo $json;
		}else if($serial_exists == 0){
			//Registered go to login
			$json = "{'message' : 'failure', 'cause' : 'user_exists'}";
				echo $json;
		}else if($serial_exists == 1){
			//not registered go to registration
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$mail = $this->input->post('mail');
			$password = $this->input->post('password');
			
			$this->load->model('registration_model');
			$this->registration_model->insert_user($serial, $first_name, $last_name, $mobile, $mail, $password);
			
			$data = new StdClass();
			$this->load->model('user_helper_model');
			$data = $this->user_helper_model->get_user_data($serial);
			
			$json = "{'message' : 'success', 'data' : ".json_encode($data)."}";
				echo $json;
		}
	}
	
	
	
	public function not_registered($serial){
		$this->load->model('entry_check_model');
		return $this->entry_check_model->serial_exists($serial)==0?false:true;
	}
}
