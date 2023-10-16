<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
include_once 'dbh.inc.php';
//проверяем, нажал ли пользователь кнопку со страницы signup.php для перехода на эту страницу 
if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$sname = mysqli_real_escape_string($conn, $_POST['sname']);
	$tname = mysqli_real_escape_string($conn, $_POST['tname']);
	$userPhone = mysqli_real_escape_string($conn, $_POST['userPhone']);
	// $username = mysqli_real_escape_string($conn, $_POST['uid']);
	$email = mysqli_real_escape_string($conn, $_POST['mail']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);
	$passwordRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
	//Проверяем правильность заполнения полей формы
	if (empty($fname) || empty($sname) || empty($tname) || empty($userPhone) || empty($email) || empty($password) || empty($passwordRepeat)) {

		header("Location: ../signup.php?error=emptyfields&uid=" . "&mail" . $email);
		//остановит выполнение скрипта, скрипт далее не будет выполняться
		exit();

	}
	//в случае, если пользователь не заполнил ни пароль, ни имя, возвращается это исключение, которое НЕ ВОЗВРАЩАЕТ введенные пользователем раннее данные
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid");
		exit();
	}
	//проверка email
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=" . $username);
		//остановит выполнение скрипта, скрипт далее не будет выполняться
		exit();
	}
	//проверка username
	// else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	// 	header("Location: ../signup.php?error=invaliduid&mail=" . $email);
	// 	exit();
	// } 
	else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
		exit();
	} else {
		$sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
			//кол-во "s" равно кол-ву вопроосительных знаков в $sql uidUsers=?
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			//выполняем $stmt в базе данных
			mysqli_stmt_store_result($stmt);
			//показывает, сколько строк вернулись после выполнения запрос. Если 1, то пользователь с таким ником уже есть в бд, если 0, то пользователей с таким ником не существует
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				//Такой ник уже занят: error=usertaken
				header("Location: ../signup.php?error=usertaken&mail=" . $email);
				exit();
			} else {
				$sql = "INSERT INTO users (fname, sname, tname, userPhone, emailUsers, pwdUsers) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				} else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//порядок переменных & должен быть такой же как в $sql:  (uidUsers, emailUsers, pwdUsers )
					mysqli_stmt_bind_param($stmt, "ssssss", $fname, $sname, $tname, $userPhone, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
	//закрываем соединение с базой данных
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
//перенаправляем пользователя на другую страницу, если он получил доступ к этой не нажимая кнопки
else {
	header("Location:../../pages/index.php");
	// header("Location: ../signup.php");
	exit();
}