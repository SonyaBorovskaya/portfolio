<?php
include_once "../../../login/includes/dbh.inc.php";
if (isset($_POST['submit_single'])) {
	// $staff_uid = mysqli_real_escape_string($conn, $_POST['staff_uid']);
	$views = h(mysqli_real_escape_string($conn, $_POST['views']));
	$title = h(mysqli_real_escape_string($conn, $_POST['title']));
	$date = h(mysqli_real_escape_string($conn, $_POST['date']));
	$category = h(mysqli_real_escape_string($conn, $_POST['category']));
	$staff_id = h(mysqli_real_escape_string($conn, $_POST['staff_id']));
	$text_single = h(mysqli_real_escape_string($conn, $_POST['text_single']));
	$img = h($_POST['img']);
	$sqlInsert = "INSERT INTO singles (title, text, img, date,views, category_id, staff_id) VALUES ('$title', '$text_single', '$img', '$date', '$views', '$category', '$staff_id' );";
	mysqli_query($conn, $sqlInsert);
	header("Location: insert_single.php?insert=success");
	exit();
}
function h($str)
{
	$str = trim($str);
	$str = stripslashes($str);
	$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	return $str;
}