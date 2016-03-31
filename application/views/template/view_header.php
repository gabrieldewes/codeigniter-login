<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Home</title>

	<meta name="keywords" content="">
	<meta name="description" content="Faça login ou cadastre-se.">
	<meta name="author" content="Gabriel Dewes">

	<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" ></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-static-top">
			<a class="btn-lg btn-group" href="<?php echo base_url('home'); ?>" >Home</a>
				<?php if (isset($user['username']) && ($user['username'] != '')) { ?>
					<div class="dropdown btn-group pull-right">
						<a class="btn dropdown-toggle" type="button" id="menu" data-toggle="dropdown">
							<?php echo $user['fullname']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="menu">
							<li role="presentation"><a role="menuitem" tabindex="-1">Logado como <?php echo $user['username']; ?></a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin'); ?>">Configurações</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('logout'); ?>">Sair</a></li>
						</ul>
					</div>
				<?php } ?>
			</nav>
		</div>
	<div class="container">
