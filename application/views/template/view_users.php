<div class="container col-md-5">
	<table class="table">
	<label>Essas feras</label>
	<?php foreach($users as $user) : ?>
		<tr>
			<td style="text-align: center"><?= $user['fullname'] ?></td>
			<td>@<?= $user['username']?></td>
			<td><?= $user['email']?></td>
		</tr>
	<?php endforeach ?>
</table>
</div>