<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/common/header.php';

if (isset($_GET["error"]) && $_GET["error"] == "incorrect")
{
	$error = "Incorrect username or password";
	echo '<script>clearError();</script>';
}

include_once $_SERVER['DOCUMENT_ROOT'] . '//WebStudio/common/footer.php';
?>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/common/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/view/login/login.view.php';
?>
</body>
</html>
