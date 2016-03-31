<?php $this->load->view('template/view_header.php'); ?>

<div class="container col-md-3">

<?php
	echo (isset($update_error)) ? "<div class=\"alert alert-error\"><strong>$update_error</strong></div>" : '';
	echo (isset($update_success)) ? "<div class=\"alert alert-success\"><strong>$update_success</strong></div>" : ''; 

	if (!isset($update_success)) {
		echo form_open('update');

		echo form_label("Senha atual", "password");
		echo form_password(array("name" => "password", "id" => "password", "class" => "form-control"));
		echo form_error('password', '<p>', '</p>');

		echo form_label("Nova senha", "new_password");
		echo form_password(array("name" => "new_password", "id" => "new_password", "class" => "form-control"));
		echo form_error('new_password', '<p>', '</p>');

		echo form_label("Confirme sua senha", "cnew_password");
		echo form_password(array("name" => "cnew_password", "id" => "cnew_password", "class" => "form-control"));
		echo form_error('cnew_password', '<p>', '</p>');

		echo form_button(array("class" => "btn btn-primary", "content" => "Alterar", "type" => "submit")); 

		echo form_close();
	}

?>
</div>

<?php $this->load->view('template/view_footer.php'); ?>		