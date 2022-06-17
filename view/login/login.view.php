<div class="login-container">
	<?php
	if (isset($_SESSION["login"]))
	{ ?>
		<h5>You are already logged in</h5>
		<?php
	} else
	{
		?>
		<div class="container">
			<div class="row">
				<h4 class="mb-5">LOGIN</h4>
				<form action="/WebStudio/model/actions/login.act.php" method="post">
					<input class="form-control" type="text" name="login"
					       placeholder="Username" required
					       pattern="\S(.*\S)?">
					<input class="form-control my-3" type="password" name="pwd"
					       placeholder="Password" required pattern="\S(.*\S)?">
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<p class="text-danger mt-3"><?= $error ?? ""; ?></p>
		</div>
		<?php
	} ?>
</div>