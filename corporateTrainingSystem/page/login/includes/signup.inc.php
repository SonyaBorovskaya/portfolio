<?php error_reporting(E_ALL ^ E_NOTICE);
function h($str)
{
	$str = trim($str);
	$str = stripslashes($str);
	$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	return $str;
}
if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';
	$username = h($_POST['uid']);
	$first_name = h($_POST['fName']);
	$soName = h($_POST['sName']);
	$tName = h($_POST['tName']);
	$posit = h($_POST['position']);
	$phone = h($_POST['userPhone']);
	$email = h($_POST['mail']);
	$password = h($_POST['pwd']);
	$passwordRepeat = h($_POST['pwd-repeat']);
	if (empty($username) || empty($first_name) || empty($soName) || empty($posit) || empty($phone) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../../index.php?error=emptyfields&uid=" . $username . "&mail" . $email);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../../index.php?error=invaliduid");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../../index.php?error=invalidmail&uid=" . $username);
		exit();
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../../index.php?error=invaliduid&mail=" . $email);
		exit();
	} else if ($password !== $passwordRepeat) {
		header("Location: ../../index.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
		exit();
	} else {
		$sql = "SELECT uidUsers FROM staff WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../../index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../../index.php?error=usertaken&mail=" . $email);
				exit();
			} else {
				$sql = "INSERT INTO staff (s_name, f_name, t_name, id_position, email, userPhone, uidUsers, pwdUsers) VALUES (?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../../index.php?error=sqlerror");
					exit();
				} else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $soName, $tName, $posit, $email, $phone, $username, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../../index.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
} else {
	header("Location: ../index.php");
	exit();
}