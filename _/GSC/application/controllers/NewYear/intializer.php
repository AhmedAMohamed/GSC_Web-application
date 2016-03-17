<?php
class Intializer extends CI_Controller {
	public function index() {
		insert_serials();
	}
	private function insert_serials() {
		$this->load->Model('initializer_model');
		$serials = $this->initializer_model->get_all_serials();
		$this->initializer_model->insert_into_users($serials);
	}
}
