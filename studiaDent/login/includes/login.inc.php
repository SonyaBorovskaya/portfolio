<?php
if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';
	$mailphone = $_POST['mailphone'];
	$password = $_POST['pwd'];

	//проверяем все ли поля заполнены
	if (empty($mailphone) || empty($password)) {

		header("Location: ../signup.php?error=emptyfields");
		// header("Location: ../indexL.php?error=emptyfields");
		exit();
	} else {
		//проверяем есть ли такие логин и парольы

		$sql = "SELECT * FROM users WHERE userPhone=? OR emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		//если возникла ошибка в выполнении запроса, НО он не учитывает ситуацию, если запрос возвращает пустой результат
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $mailphone, $mailphone);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				//получаем пароль из базы данных в виде строки $row['pwdUsers']
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == false) {
					header("Location: ../signup.php?error=wrongpassword");
					exit();
				}
				//используем else if, чтобы написать конкретное условие проверки
				else if ($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					// $_SESSION['userUid'] = $row['uidUsers'];
					$_SESSION['mailphone'] = $row['emailUsers'];
					header("Location: ../signup.php?login=success");
					exit();
				}
				//в случае, если проверка пароля не дала ни ложного, ни верного результата проверки
				else {
					header("Location: ../signup.php?error=wrongpassword");
					exit();
				}
			}
			//Пользователя не существует
			else {
				header("Location: ../signup.php?error=noUser");
				exit();
			}
			//проверяем, пришел ли ответ из базы данных или пришло пустое значение. Это исключение, его нужно обрабатывать как ошибку
		}
	}
} else {
	header("Location:../signup.php.html");
	exit();
}