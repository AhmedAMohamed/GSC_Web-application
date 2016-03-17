<?php

class Login extends CI_Controller{
	public function index(){
		$this->load->View('login_view');
	}
	public function login_verification(){
		$data = array(
			'session_check' => "true",
		);
		$this->session->set_userdata($data);
		$email = $this->input->post('mail');
		$password = md5($this->input->post('password'));
		$this->load->model('login_model');
		$user_info = new StdClass();
		$user_info = $this->login_model->get_user($email, $password) ;
		$this->load->library('user_agent');
		
		if($this->agent->is_browser()){
			if($user_info->check) {
				$data = new StdClass();
				$this->load->model('user_helper_model');
				$data = $this->user_helper_model->get_user_data($user_info->serial);
				$this->session->set_userdata($data);
				$url = base_url("profile");
				redirect($url);
			}
			else {
				$url = base_url("welcome");
				redirect($url);
			}
			
		}else if($this->agent->is_mobile()){
			if($user_info->check) {
				$data = new StdClass();
				$this->load->model('user_helper_model');
				$data = $this->user_helper_model->get_user_data($user_info->serial);
				$json = "{'message' : 'success', 'data' : ".json_encode($data)."}";
				echo $json;
			}
			else {
				$json = "{'message' : 'failure', 'cause' : }";
				echo $json;
			}
		}else{
			$json = "{'message' : 'failure', 'cause' : 'user_agent'}";
				echo $json;
		}
	}
}