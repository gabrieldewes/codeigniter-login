<?php $this->load->view('template/view_header.php'); ?>

<div class="container col-md-3">

<?php 
	echo (isset($update_error)) ? "<div class=\"alert alert-error\"><strong>$update_error</strong></div>" : '';
	echo (isset($update_success)) ? "<div class=\"alert alert-success\"><strong>$update_success</strong></div>" : '';
	
	if (!isset($update_success)) {
		echo form_open('alter');

		echo form_label('Nome completo', 'fullname');
		echo form_input( array("name" => "fullname", "id" => "fullname", "class" => "form-control"));
		echo form_error('fullname', '<p>', '</p>'); 

		echo form_label('E-mail', 'email');
		echo form_input(array("name" => "email", "id" => "email", "class" => "form-control"));
		echo form_error('email', '<p>', '</p>');

		echo form_label("Usuário", "username");
		echo form_input(array("name" => "username", "id" => "username", "class" => "form-control"));
		echo form_error('username', '<p>', '</p>'); 

		echo form_button(array("class" => "btn btn-primary", "content" => "Alterar", "type" => "submit"));

		echo form_close();
	}
?>

</div>

<?php $this->load->view('template/view_footer.php'); ?>