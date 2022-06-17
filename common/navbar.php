<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand mr-auto" href="/"><h4 class="m-0" style="color: #0d6efd">YANAL YAHYA</h4></a>
		<div class="collapse navbar-collapse" id="Navbar">
			<ul class="navbar-nav me-auto">
				<li class="nav-item <?= $_SERVER["REQUEST_URI"] == "/" ? "active" : "" ?>">
					<a class="nav-link" href="/">Home</a>
				</li>
			</ul>
			<ul class="m-0" style="list-style: none;">
				<?php session_start();
				if (!isset($_SESSION["login"]))
				{ ?>
					<li>
						<a class="btn btn-primary" role="button" href="#">SIGN IN</a>
						<a class="btn btn-primary" role="button" href="/WebStudio/login">LOGIN</a>
					</li>
					<?php
				} else
				{ ?>
					<li class="d-flex align-items-center">
						<h5 class="text-light me-3"><?= $_SESSION["login"] ?></h5>
						<a class="btn btn-primary" role="button"
						   href="/WebStudio/model/actions/logout.act.php">LOGOUT</a>
					</li>
					<?php
				} ?>

			</ul>
		</div>
	</div>
</nav>