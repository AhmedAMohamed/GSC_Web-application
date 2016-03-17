<?

class Home extends CI_Controller {
	public function index() {
		$data = $this->session->all_userdata();
		$data = $data[0];
		$this->load->view("includes/header",$data);
		$this->load->view("home_view",$data);
		$this->load->view("includes/footer",$data);
	}
}