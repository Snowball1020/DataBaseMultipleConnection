<?php 
$page_title = null;
$page_title = 'User Registration';
require_once('header.php'); ?>

<main class="container">
	<h1>User Registration</h1>
	<form method="post" action="save-registration.php">
		<fieldset class="form-group">
			<label for="username" class="col-sm-2">Email:</label>
			<input name="username" required type="email" />
		</fieldset>
		<fieldset class="form-group">
			<label for="password" class="col-sm-2">Password:</label>
			<input name="password" required type="password" />
		</fieldset>
		<fieldset class="form-group">
			<label for="confirm" class="col-sm-2">Confirm Password:</label>
			<input name="confirm" required type="password" />
		</fieldset>
		<button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
	</form>
</main>

<?php require_once('footer.php'); ?>
