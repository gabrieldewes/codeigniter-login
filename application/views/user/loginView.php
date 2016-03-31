<?php $this->load->view('template/view_header'); ?>

<div class="container col-md-3">

<?php 
	echo (isset($login_success)) ? "<div class=\"alert alert-success\"><strong>$login_success</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';
	echo (isset($login_error)) ? "<div class=\"alert alert-error\"><strong>$login_error</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';

	$this->load->helper('form'); 

	echo form_open("login");

	echo form_label("Usuário", "username");
	echo form_input(array("name" => "username", "id" => "username", "class" => "form-control"));
	echo form_error('username', '<p>', '</p>'); 

	echo form_label("Senha", "password");
	echo form_password(array("name" => "password", "id" => "password", "class" => "form-control"));
	echo form_error('password', '<p>', '</p>');

	echo form_button(array("class" => "btn btn-primary", "content" => "Login", "type" => "submit")); 
	echo anchor("register", 'ou registre-se', 'btn');

	echo form_close();
?>

</div>

<?php $this->load->view('template/view_footer'); ?>

