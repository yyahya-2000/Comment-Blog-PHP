<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CQueryBuilder.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CDB.php';

const COMMENTS_LOAD_LIMIT = 3;

/**
 * this class is the door for communication between the controller and the model
 *
 * NOTE: The method name shows the behavior and intent of it,
 * so read the names carefully to understand the methods
 */
class CDBCommunicator
{
	private $db;
	private $queryBuilder;

	public function __construct()
	{
		$this->db = new CDB();
		$this->queryBuilder = new CQueryBuilder();
		$this->db->connect();
	}

	public function __destruct()
	{
		$this->db->disconnect();
	}

	public function getAllUsers()
	{
		$query = $this->queryBuilder->select('*')->from('users')->fetchQuery();
		return $this->db->executeQuery($query);
	}

	public function getUserByLogin($login): bool|array|null
	{
		$query = $this->queryBuilder->select('*')->from('users')->where("login LIKE '$login%'")
			->fetchQuery();
		$result = $this->db->executeQuery($query);
		return mysqli_fetch_array($result);
	}

	public function getUserByLoginAndPwd($login, $pwd): bool|array|null
	{
		$query = $this->queryBuilder->select('*')->from('users')->where("login = '$login'", "password = '$pwd'")
			->fetchQuery();
		$result = $this->db->executeQuery($query);
		return mysqli_fetch_array($result);
	}

	public function getAllComments()
	{
		$query = $this->queryBuilder->select("t1.ID comment_id", "t1.body body", "t1.date date", "t2.login login",
			"t2.ID user_id")->from("comments", "t1")
			->join("users", "t2")->on("t1.user_id = t2.id")->orderBy("date desc")->fetchQuery();
		return $this->db->executeQuery($query);
	}

	public function getNComments($page)
	{
		$query = $this->queryBuilder->select("t1.ID comment_id", "t1.body body", "t1.date date", "t2.login login",
			"t2.ID user_id")->from("comments", "t1")
			->join("users", "t2")->on("t1.user_id = t2.id")->orderBy("date desc")
			->limit("{$page}," . COMMENTS_LOAD_LIMIT)->fetchQuery();
		return $this->db->executeQuery($query);
	}

	public function getCommentByUser($login)
	{
		$query = $this->queryBuilder->select("t1.ID comment_id", "t1.body body", "t1.date date", "t2.login login",
			"t2.ID user_id")->from("comments", "t1")
			->join("comments", "t2")->on("t1.user_id = t2.id")
			->where("t2.login LIKE '$login%'")->fetchQuery();
		$result = $this->db->executeQuery($query);
		return mysqli_fetch_array($result);
	}

	public function addComment($user_id, $body, $date)
	{
		$query = $this->queryBuilder->insertInto("comments")->columns("body", "date", "user_id")
			->values("'$body'", "'$date'", "'$user_id'")->fetchQuery();
		$this->db->executeQuery($query);
	}

}