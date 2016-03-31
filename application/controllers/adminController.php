<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminController extends CI_Controller {

	var $data = array();
	var $users_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model('userModel');
		
		if ($this->userModel->isLoggedIn())
			$this->data['user'] = $this->session->userdata('user'); 
		else
			redirect('noaccess');
	}

	public function index()
	{
		$users_data['users'] = $this->userModel->getAll();
		
		$this->load->view('template/view_header', $this->data);
		$this->load->view('admin/adminSidebarView', $this->data);
		$this->load->view('template/view_users', $users_data);
		$this->load->view('template/view_footer.php');
	}

}

/* End of file adminController.php */
/* Location: ./application/controllers/adminController.php */