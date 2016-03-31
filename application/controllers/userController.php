<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	var $data;

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('userModel');
	}

	public function index()
	{
		
	}

	public function login()
	{
		if ($this->userModel->isLoggedIn()) { redirect('admin'); }
	
		$this->form_validation->set_rules('username', 'usuário', 'required');
		$this->form_validation->set_rules('password', 'senha', 'required');
		
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($user = $this->userModel->getByUsername($username)) 
			{
				if ($this->userModel->checkPassword( $password, $user['password'] )) 
				{
					$this->userModel->allowPass($user);
					redirect('admin');
					
				} 
				else { $this->data['login_error'] = 'Senha incorreta.'; }
			} 
			else { $this->data['login_error'] = 'Usuário não encontrado.'; }
		}
		$this->load->view('user/loginView', $this->data);
	}

	public function register()
	{
		if ($this->userModel->isLoggedIn()) { redirect('admin'); }

		$this->form_validation->set_rules('fullname', 'nome', 'required');
		$this->form_validation->set_rules('username', 'usuário', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'e-mail', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'senha', 'required');
		$this->form_validation->set_rules('cpassword', 'confirmação de senha', 'required|matches[password]');
		
		if ($this->form_validation->run()) {
			$user = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'fullname' => $this->input->post('fullname'),
				'password' => $this->userModel->hashPassword( $this->input->post('password') )
			);
			if ($this->userModel->save($user)) {
				$this->data['register_success'] = 'Cadastro completo. <a href="'.base_url('login').'">Faça login</a>.';
			} 
			else { $this->data['register_error'] = 'Ocorreu algum erro. Tente novamente mais tarde.'; }
		}
		$this->load->view('user/registerView', $this->data);
	}

	public function delete()
	{
		$this->form_validation->set_rules('password', 'senha', 'required');
		
		if ($this->form_validation->run()) {
			$user = $this->session->userdata('user');
			$password = $this->input->post('password');

			if ($this->userModel->checkPassword($password, $user['password'] )) {
				if($this->userModel->delete($user)) {
					$this->data['update_success'] = 'Conta apagada. Lamentamos o ocorrido.';
					session_destroy();
				}
				else { $this->data['update_error'] = 'Ocorreu algum erro. Tente novamente mais tarde.'; }
			} 
			else { $this->data['update_error'] = 'Senha incorreta.'; }
		}
		$this->load->view('user/deleteView', $this->data); 
	}

	public function updatePassword()
	{
		$this->form_validation->set_rules('password', 'senha atual', 'required');
		$this->form_validation->set_rules('new_password', 'nova senha', 'required');
		$this->form_validation->set_rules('cnew_password', 'confirmação de nova senha', 'required|matches[new_password]');

		if ($this->form_validation->run()) {
			$user = $this->session->userdata('user');
			if ($this->userModel->checkPassword($this->input->post('password'), $user['password']) ) {
				$password = array(
					'password' => $this->userModel->hashPassword($this->input->post('new_password') ));
			
				if ($this->userModel->update($password)) {
					$this->data['update_success'] = 'Senha alterada com êxito. <a href="'.base_url('admin').'">Voltar ao seu perfil</a>';
				}
				else { $this->data['update_error'] = 'Ocorreu algum erro. Tente novamente mais tarde.'; }
			} 
			else { $this->data['update_error'] = 'Senha atual incorreta.'; }
		}
		$this->load->view('user/updatePasswordView', $this->data);
	}

	public function updateData()
	{
		$this->form_validation->set_rules('fullname', 'nome', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'usuário', 'required|is_unique[users.username]');

		if ($this->form_validation->run()) {
			$user_data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'));

			if($this->userModel->update($user_data)) {
				$this->data['update_success'] = 'Dados alterados com êxito.';
			}
			else { $this->data['update_error'] = 'Ocorreu algum erro. Tente novamente mais tarde.'; }
		}
		$this->load->view('user/updateDataView', $this->data); 
	}

	public function logout() {
		session_destroy();
		$this->data['login_success'] = 'Você foi desconectado. Volte logo!';
		$this->load->view('user/loginView', $this->data);
	}

	public function noAccess() {
		$this->data['login_error'] = 'Você ficou muito tempo inativo. Entre novamente.';
		$this->load->view('user/loginView', $this->data);
	}

}

/* End of file userController.php */
/* Location: ./application/controllers/userController.php */