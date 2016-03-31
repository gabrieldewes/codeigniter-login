<?php 
	$this->load->view('template/view_header'); 
	$this->load->helper('form'); 
?>

<div class="container col-md-3">

<?php 
	echo (isset($update_success)) ? "<div class=\"alert alert-success\"><strong>$update_success</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';
	echo (isset($update_error)) ? "<div class=\"alert alert-error\"><strong>$update_error</strong><a class=\"close\" data-dismiss=\"alert\">×</a></div>" : '';

	if (!isset($update_success)) {
		echo form_open('delete');

		echo form_label("Informe sua senha para continuar", "password");
		echo form_password(array("name" => "password", "id" => "password", "class" => "form-control"));
		echo form_error('password', '<p>', '</p>');

		echo form_button(array("class" => "btn btn-danger", "content" => "Apagar sua conta", "type" => "submit")); 
		echo anchor("admin", 'ou volte', 'btn');

		echo form_close();
	}

?>

</div>

<?php $this->load->view('template/view_footer'); ?>