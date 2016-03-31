<div class="container col-md-3">
	<ul class="">
	<label><p>Bem-vindo <?php echo $user['fullname']?>!</p></label>
		<li><?php echo anchor('update', 'Mude sua senha', ''); ?></li>
		<li><?php echo anchor('alter', 'Altere seus dados', ''); ?></li>
		<li><?php echo anchor('delete', 'Apagar sua conta', ''); ?></li>
		<li><?php echo anchor('logout', 'Sair', ''); ?></li>
	</ul>
</div>

