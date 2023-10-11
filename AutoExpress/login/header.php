<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@300;400&family=Raleway:wght@100;300;400&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="../style/reset.css">
	<link rel="stylesheet" href="../style/style.css">
</head>

<header class="header">
	<div class="container">
		<div class="header__top">
			<ul class="header__top-lists">
				<li class="header__lists-item">
					<a class="logo" href="http://localhost/AutoExpress/index.php">
						<img class="logo__img" src="http://localhost/AutoExpress/img/main/logo2.svg" alt="№">
					</a>
				</li>
				<li class="header__lists-item">
					<a class="phone" href="tel:+79156397350">+7 (951) 555 66 77</a>
				</li>
				<li class="header__lists-item">
					<a class="phone" href="http://localhost/AutoExpress/login/signup.php">Регистрация</a>
				</li>
				<li class="header__lists-item">
					<a class="phone" href="http://localhost/AutoExpress/index.php">Главная страница</a>
				</li>
			</ul>
			<div class="login-hidden__block">
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "wrongpassword") {
						echo '<span class="login-allertMessage">Неправильный пароль</span>';
					} else if ($_GET['error'] == "noUser") {
						echo '<span class="login-allertMessage">
      					Такого пользователя не существует! <br>Введите правильный логин или email для входа
     						 </span>';
					} else if ($_GET['error'] == "emptyfields") {
						echo ' <span class="login-allertMessage">Пожалуйста, заполните все поля</span>';
					}
				} ?>
			</div>
			<?php
			if (isset($_SESSION['userId'])) {
				echo
					'<span class="card-text">Здравствуйте, ' . htmlspecialchars($_SESSION['userUid']) . ' </span>
			<form action="login/includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit" class="header__login-btn">Выйти</button>
			</form>';
				if ($_SESSION['userUid'] == "admin") {
					header("Location: http://localhost/AutoExpress/login/admin");
				}

			} // echo
			// 	'<span class="card-text">Здравствуйте, ' . htmlspecialchars($_SESSION['userUid']) . ' </span>
			// <form action="login/includes/logout.inc.php" method="post">
			// 	<button type="submit" name="logout-submit" class="header__login-btn">Выйти</button>
			// </form>';
			// }
			else {
				echo '<form class="header__form-login" action="http://localhost/AutoExpress/login/includes/login.inc.php" method="post">
					
					<input class="login-input" type="text" name="mailuid" placeholder="Логин/Email">
					<input class="login-input" type="password" name="pwd" id="pwd" placeholder="Пароль">
					<button class="header__login-btn" type="submit" name="login-submit">Войти</button>
				</form>';
			}
			?>
		</div>
	</div>
	<!-- <?php
	// <input type="hidden" name="token" value="' . getToken() . '">
	// $token = $_POST['token'] ?? '';
	// if (!checkToken($token)) {
	// $_SESSION['error'] = 'Ошибка безопасности';
	// header("Location:{$_SERVER['PHP_SELF']}");
	// die;
	// }
	// function getToken()
	// {
	// if (empty($_SESSION['token'])) {
	// $_SESSION['token'] = uniqid('', true);
	// }
	// return password_hash($_SESSION['token'], PASSWORD_DEFAULT);
	// }
	// function checkToken($token)
	// {
	// return password_verify($_SESSION['token'], $token);
	// }
	?> -->
</header>

</html>