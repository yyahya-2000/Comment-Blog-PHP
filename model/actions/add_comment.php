<?php
if ($_GET['ajax']) {
	session_start();
	$user_id = $_SESSION["idUser"];
	$body = $_GET["body"];
	$date = $_GET["date"];

	include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CDBCommunicator.php';
	$communicator = new CDBCommunicator();
	$communicator->addComment($user_id, $body, $date);

	echo json_encode(array("author" => $_SESSION["login"])) ;
}