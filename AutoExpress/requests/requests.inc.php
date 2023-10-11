<?php
if (isset($_POST['request-submit'])) {
	include_once '../login/includes/dbh.inc.php';
	$first = mysqli_real_escape_string($conn, $_POST['fName']);
	$last = mysqli_real_escape_string($conn, $_POST['sName']);
	$phone = mysqli_real_escape_string($conn, $_POST['userPhone']);
	$comm = mysqli_real_escape_string($conn, $_POST['comment']);
	if (empty($first) || empty($last) || empty($phone)) {
		header("Location: ../index.php?error=empty");
		//остановит выполнение скрипта, скрипт далее не будет выполняться
		exit();
	} else {
		$sqlInsert = "INSERT INTO requests (fname, sname, phoneUsers, msgUsers) VALUES ('$first', '$last', '$phone', '$comm');";
		mysqli_query($conn, $sqlInsert);
		setcookie('TestCookie', $first, time() + 3600 * 24, '/', 'localhost', 0, 1);

		header("Location: ../index.php?request=success");
		exit();
	}
}
// $token = $_POST['token'] ?? '';

// function getToken()
// {
// 	if (empty($_SESSION['token'])) {
// 		$_SESSION['token'] = uniqid('', true);
// 	}
// 	return password_hash($_SESSION['token'], PASSWORD_DEFAULT);
// }
// function checkToken($token)
// {
// 	return password_verify($_SESSION['token'], $token);
// }
// if (!checkToken($token)) {
// 	$_SESSION['error'] = 'Ошибка безопасности';
// 	header("Location:{$_SERVER['PHP_SELF']}");
// 	die;
// }