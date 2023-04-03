<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<title><?= $title ?> </title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Custom styles for Login -->
	<link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">

</head>

<body>
	<form class="form-signin" method="post" action="<?php echo site_url('Admin/masuk'); ?>">
		<div class="text-center mb-4">
			<img src="<?= base_url() ?>assets/favicon.png" alt="logo" height="72">
			<h1 class="h3 mb-3 font-weight-normal">Login</h1>
		</div>

		<div class="form-label-group">
			<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
			<label for="username">Username</label>
		</div>

		<div class="form-label-group">
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			<label for="inputPassword">Password</label>
		</div>

		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<p class="mt-5 mb-3 text-muted text-center">&copy; Pandam Adiwastra Janaloka <?php echo date("Y"); ?></p>
	</form>
</body>

</html>