<div class="container col-md-3">
	<?php if (isset($user['username']) && ($user['username'] != '')) { ?>
		<ul class="">
			<label><p>Bem-vindo <?php echo $user['fullname']; ?>!</p></label>
			<li>@<?php echo $user['username']; ?></li>
			<li><?php echo $user['email']; ?></li>
		</ul>
	<?php } else { ?>
		<ul>
			<label><p>Bem-vindo visitante!</p></label>
			<li><?php echo anchor('login', 'Faça login', ''); ?></li>
			<li><?php echo anchor('register', 'Registre-se', ''); ?></li>
		</ul>
	<?php } ?>
</div>

