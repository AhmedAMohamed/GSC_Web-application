<?php
/*
developer:Bassell
*/

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guide extends CI_Controller 
{
	public function index()
	{
		$data = $this->get_user_data($this->session->userData('serial'));
			$data = $data[0];
	
			$this->load->view("includes/header", $data);		
			$this->load->view('pdf/guidepdf_view');
			$this->load->view("includes/footer");
		
	}
	public function get_user_data($serial){
		$this->load->model('user_helper_model');
		$data = $this->user_helper_model->get_user_data($serial);
		return $data;
	}
}
