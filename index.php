<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CDBCommunicator.php';
$communicator = new CDBCommunicator();
$sqlComments = $communicator->getAllComments();
$comments = array();
while ($comment = mysqli_fetch_array($sqlComments))
{
	$comments[] = $comment;
}
$sqlComments = NULL;

include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/common/header.php'; ?>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/common/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/view/home/home.view.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '//WebStudio/common/footer.php';

?>

</body>
</html>
<!--include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/model/CDBCommunicator.php';-->
<!--//-->
<!--$communicator = new CDBCommunicator();-->
<!--$users = $communicator->getAllUsers();-->
<!--$comments = $communicator->getAllComments();-->
<!--var_dump(mysqli_fetch_array($comments));-->
<!--//-->
<!--//$disciplines = [];-->
<!--//-->
<!--//if(isset($_GET["group-id"]))-->
<!--//{-->
<!--//	$idGroup = $_GET["group-id"];-->
<!--//-->
<!--//	if (!ctype_digit($idGroup))-->
<!--//	{-->
<!--//		die("the id of the group for which should be shown rating is not an integer and the only reason is that you made-->
<!--//		a change to the url");-->
<!--//	}-->
<!--//-->
<!--//	// get all disciplines for specific group-->
<!--//	$disciplinesResult = $communicator->getDisciplinesInGroup($idGroup);-->
<!--//-->
<!--//	// build the student rating for specific group-->
<!--//	$studentRating = $communicator->getStudentRatingByGroupID($idGroup);-->
<!--//}-->
<!--//-->
<!--//// select all groups-->
<!--//$groups = $communicator->getAllGroups();-->
<!--//-->
<!--//require_once $_SERVER['DOCUMENT_ROOT'] . '/studentRating.view.php';-->