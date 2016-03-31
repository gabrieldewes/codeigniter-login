<?php $this->load->view('template/view_header'); ?>
<div class="container col-md-3">
<?php 
	echo (isset($register_success)) ? "<div class=\"alert alert-success\"><strong>$register_success</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';
	echo (isset($register_error)) ? "<div class=\"alert alert-error\"><strong>$register_error</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';

	if (!isset($register_success)){

		$this->load->helper('form'); 

		echo form_open("register");

		echo form_label('Nome completo', 'fullname');
		echo form_input( array("name" => "fullname", "id" => "fullname", "class" => "form-control"));
		echo form_error('fullname', '<p>', '</p>'); 

		echo form_label('E-mail', 'email');
		echo form_input(array("name" => "email", "id" => "email", "class" => "form-control"));
		echo form_error('email', '<p>', '</p>'); 

		echo form_label("Usuário", "username");
		echo form_input(array("name" => "username", "id" => "username", "class" => "form-control"));
		echo form_error('username', '<p>', '</p>'); 

		echo form_label("Senha", "password");
		echo form_password(array("name" => "password", "id" => "password", "class" => "form-control"));
		echo form_error('password', '<p>', '</p>');

		echo form_label("Confirme sua senha", "cpassword");
		echo form_password(array("name" => "cpassword", "id" => "cpassword", "class" => "form-control"));
		echo form_error('cpassword', '<p>', '</p>');
		
		echo form_button(array("class" => "btn btn-primary", "content" => "Registre-se", "type" => "submit")); 
		echo anchor("login", 'ou faça login', 'btn');

		echo form_close();
	}
?>

</div>

<?php $this->load->view('template/view_footer'); ?>