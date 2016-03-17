<?php

class Profile extends CI_Controller{

	public function index(){

		if($this->session->userdata('session_check') == "true"){
			$serial = $this->session->all_userdata();
			$serial = $serial[0];
			$data = $this->get_user_data($serial->id);
			$data = $data[0];
			$data->page_id='mnbly-profile';
			$this->load->view("includes/header", $data);		
			$this->load->view("profile", $data);
			$this->load->view("includes/footer");
		}
		else{
			$url = base_url("logout");
			redirect($url);
		}
	}

	public function get_user_data($serial){
		$this->load->model('user_helper_model');
		$data = $this->user_helper_model->get_user_data($serial);
		return $data;
	}

	public function upload_image() {
		if($this->session->userdata('session_check') == "true"){
			$serial = $this->session->all_userdata();
			$serial = $serial[0];
			$serial = $serial->id;
			$config['upload_path'] = FCPATH."/assets/img/users";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '0';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()) {
				echo "hhhhghhgdfghfdg";
				$error = array('error' => $this->upload->display_errors());
				var_dump ($error);
			}
			else {
				$data = array('upload_data' => $this->upload->data());
				$imgName=$data['upload_data']['file_name'];
				$user_img="/assets/img/users/".$imgName;
				
				$this->load->model('profile_model');
				$done = $this->profile_model->edit_img_logo_path($user_img, $serial);
				if($done) {
					echo "true";
					$url = base_url("profile");
					
				}
				else {
					echo "false";
					//$url = base_url("profile");
					//redirect($url);
				}
			}
		}
		else {
			echo "hamada";
			$url = base_url("profile");
			//redirect($url);
		}
	}
}