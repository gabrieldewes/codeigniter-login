<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeController extends CI_Controller {

	var $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model('userModel');
		 
		if ($this->userModel->isLoggedIn())
			$this->data['user'] = $this->session->userdata('user');

	}

	public function index()
	{
		$this->load->view('template/view_header', $this->data);
		$this->load->view('template/view_sidebar', $this->data);
		if ($this->userModel->isLoggedIn()){
			$users_data['users'] = $this->userModel->getAll();
			$this->load->view('template/view_users', $users_data);
		}
		$this->load->view('template/view_footer');
	}

}

/* End of file homeController.php */
/* Location: ./application/controllers/homeController.php */