<?php

if (isset($_POST["submit"]))
{
	include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CDBCommunicator.php';

	$communicator = new CDBCommunicator();

	$login = $_POST["login"];
	$password = $_POST["pwd"];

	$user = $communicator->getUserByLoginAndPwd($login, $password);
	if ($user)
	{
		session_start();
		$_SESSION['login'] = $user["login"];
		$_SESSION['pwd'] = $user["password"];
		$_SESSION['idUser'] = $user["ID"];
		header("location: /");
	} else
	{
		header("location: /WebStudio/login?error=incorrect");
	}
}

