<?php 

class Community extends CI_Controller {
	
	public function index () {
		$this->load->model('user_helper_model');
		$users = $this->user_helper_model->get_all_users_data();
		$data = new stdClass();
		$data->users = $users;
		//var_dump($data);

		
		if($this->session->userdata('session_check') == "true") {

			// get user data for the header
			$user_serial = $this->session->all_userdata();
			$user_serial = $user_serial[0];
			$user_data = $this->get_theuser_data($user_serial->id);
			$user_data = $user_data[0];
			$user_data->page_id='mnbly-community';
			$this->load->view("includes/header", $user_data);



			$this->load->view('users_view', $data);

			$this->load->view("includes/footer");
		}
		else {
			//$this->load->view('visitor_view', $data);
			redirect(base_url("/login"));
		}
	}
	
	public function get_all_users_data_for_mobile(){
		$this->load->model('user_helper_model');
		$users = $this->user_helper_model->get_all_users_data();
		$data = new stdClass();
		$data->users = $users;
		
		//*******PROBLEM HAS TO FIXED THEN THIS LINE SHOULD BE REMOVED********
		//problem is first_name of user with id = "140008" is not escaped like that "Sa'eed"
		//Strings that are not escaped probably could not be recognized as Json object with ' in there
		//Strings has to be escaped before but into the database 
		$data->users[10]->first_name = addslashes( $data->users[10]->first_name);		
	
		$data = json_encode($data->users);
		
		echo "{'message' : 'success', 'users' : {$data}}";
		//echo "<pre>";
		//var_dump($data);
		//echo "</pre>";
		
	} 
	
	public function get_user_data ($serial) {
		$data = $this->find_user_by_id($serial);
		$data=$data[0];
		$all = new StdClass();
		$all->data = $data;
		$this->load->model('user_helper_model');
		$admin_id = $this->session->all_userdata();
		$admin_id = $admin_id[0];
		$id = $admin_id->id;
		$admin = $this->user_helper_model->check_admin($id);
		if($admin) {
			if($this->user_helper_model->is_layer_member($serial, $id)) {
				$this->load->view("includes/header", $admin_id);
				$this->load->view('Admins/member_admin_profile_view',$all);
				$this->load->view("includes/footer");
			}
			else {
				$user_serial = $this->session->all_userdata();
				$user_serial = $user_serial[0];
				$user_data = $this->get_theuser_data($user_serial->id);
				$user_data=$user_data[0];
				$user_data->page_id='mnbly-community';
				$this->load->view("includes/header", $user_data);
				$this->load->view('member_profile_view', $data);
				$this->load->view("includes/footer");
			}
		}
		else{
				$user_serial = $this->session->all_userdata();
				$user_serial = $user_serial[0];
				$user_data = $this->get_theuser_data($user_serial->id);
				$user_data=$user_data[0];
				$this->load->view("includes/header", $user_data);
				$this->load->view('member_profile_view', $data);
				$this->load->view("includes/footer");
		}
	}
	
	public function find_user_by_id($serial) {
		$this->load->model('user_helper_model');
		return $this->user_helper_model->get_user_data($serial);
	}

	// helper function
	public function get_theuser_data($serial){
		$this->load->model('user_helper_model');
		$data = $this->user_helper_model->get_user_data($serial);
		return $data;
	}
}