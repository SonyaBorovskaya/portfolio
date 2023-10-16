<?php
include_once '../../login/includes/dbh.inc.php';
if (isset($_POST['review-submit'])) {
	if (!empty($_POST['agree'])) {
		$fname = mysqli_real_escape_string($conn, $_POST['userName']);
		$sname = mysqli_real_escape_string($conn, $_POST['userSname']);
		$tname = mysqli_real_escape_string($conn, $_POST['userTname']);
		$phone = mysqli_real_escape_string($conn, $_POST['userPhone']);
		$email = mysqli_real_escape_string($conn, $_POST['userEmail']);
		$comm = mysqli_real_escape_string($conn, $_POST['user_review']);
		$date = mysqli_real_escape_string($conn, $_POST['dateReview']);
		$agreeCheck = $_POST['agree'];

		if (empty($comm)) {
			header("Location: ../index.php?error=empty");
			//остановит выполнение скрипта, скрипт далее не будет выполняться
			exit();
		} else {
			$sqlInsert = "INSERT INTO reviews (userFname, userSname, userTname, userEmail, userPhone, review_text, date_review, agree) VALUES ('$fname', '$sname', '$tname','$email','$phone', '$comm', '$date', '$agreeCheck');";
			mysqli_query($conn, $sqlInsert);
			header("Location: ../index.php?request=success");
			exit();
		}
	}
}