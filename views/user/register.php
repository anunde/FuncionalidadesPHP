<section class="content">
	<div id="form">
		<h4>Registrate</h4>

		<form method="POST" action="<?=base_url?>?action=save">

			<h1><?=$_SESSION['register']?></h1>
			<?php Utils::deleteSession('register'); ?>

			<input type="hidden" name="token" value="<?=Utils::generate()?>">

			<div class="<?= isset($_SESSION['name']) ? 'no-valid' : 'camp' ?>">
				<label for="name">Nombre</label>
				<input type="text" name="name" autofocus>
			</div>
			<?php if(isset($_SESSION['name'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['name']?></span>
			<?php endif; ?>

			<div class="<?= isset($_SESSION['surname']) ? 'no-valid' : 'camp' ?>">
				<label for="surname">Apellidos</label>
				<input type="text" name="surname">
			</div>
			<?php if(isset($_SESSION['surname'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['surname']?></span>
			<?php endif; ?>

			<div class="<?= isset($_SESSION['nick']) ? 'no-valid' : 'camp' ?>">
				<label for="nick">Alias</label>
				<input type="text" name="nick">
			</div>
			<?php if(isset($_SESSION['nick'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['nick']?></span>
			<?php endif; ?>

			<div class="<?= isset($_SESSION['email']) ? 'no-valid' : 'camp' ?>">
				<label for="email">Correo electrónico</label>
				<input type="text" name="email">
			</div>
			<?php if(isset($_SESSION['email'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['email']?></span>
			<?php endif; ?>

			<div class="<?= isset($_SESSION['password']) ? 'no-valid' : 'camp' ?>">
				<label for="password">Contraseña</label>
				<input type="password" name="password">
			</div>
			<?php if(isset($_SESSION['password'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['password']?></span>
			<?php endif; ?>

			<div class="<?= isset($_SESSION['password_confirm']) ? 'no-valid' : 'camp' ?>">
				<label for="password">Confirmar contraseña</label>
				<input type="password" name="password_confirm">
			</div>
			<?php if(isset($_SESSION['password_confirm'])): ?>
				<span class="invalid-feedback"><?=$_SESSION['password_confirm']?></span>
			<?php endif; ?>

			<div class="camp">
				<label>&nbsp;</label>
				<input class="button" type="submit" value="Registrate">
			</div>
		</form>
		<?php
			Utils::deleteSession('name');
			Utils::deleteSession('surname');
			Utils::deleteSession('nick');
			Utils::deleteSession('email');
			Utils::deleteSession('password');
			Utils::deleteSession('password_confirm');
		?>
	</div>
</section>