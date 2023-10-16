<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<title>Document</title>
</head>

<body class="home-body">
	<div class="modal position">
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "invalidmail") {
				echo '<div class="ui negative message transition warning-message ">
  									<i class="close icon"></i>
  									<div class="header">
  									Введите корректный адрес электронной почты
  									</div>
									</div>';

			} else if ($_GET['error'] == "invaliduid") {
				echo '<div class="ui negative message transition warning-message ">
				<i class="close icon"></i>
				<div class="header">
				Неккоректный логин!
				</div>
			 </div>';
			} else if ($_GET['error'] == "passwordcheck") {
				echo '<div class="ui negative message transition warning-message">
							<i class="close icon"></i>
							<div class="header">
							Пароли не совпадают
							</div>
						 </div>';

			} else if ($_GET['error'] == 'invaliduidmail') {

				echo '<div class="ui negative message transition warning-message">
				<i class="close icon"></i>
				<div class="header">
				Неккоректный логин или электронная почта!
				</div>
			 </div>';

			} else if ($_GET['error'] == 'usertaken') {

				echo '<div class="ui negative message transition warning-message">
				<i class="close icon"></i>
				<div class="header">
				Пользователь с таким логином уже существует. Пожалуйста, выберите другой или авторизируйтесь
				</div>
			 </div>';
			}
		} else if ($_GET['signup'] == "success") {
			echo '<div class="ui positive  message transition warning-message">
				<i class="close icon"></i>
				<div class="header">
				Регистрация прошла успешно!
				</div>
			 </div>';

		}
		//  else if ($_GET['signup'] == "success") {
		// 	echo '<p class="signupsuccess alert alert-success">Успешно!</p>';
		// }
		
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "wrongpassword") {
				echo '<div class="ui negative message transition warning-message">
				<i class="close icon"></i>
				<div class="header">
				Неправильный пароль
				</div>
			 </div>';
			} else if ($_GET['error'] == "noUser") {
				echo '<div class="ui negative message transition warning-message">
				<i class="close icon"></i>
				<div class="header">
				Такого пользователя не существует! Введите правильный логин или email для входа
			 </div>
			</div>';
			}
		} else {
			if ($_SESSION['userUid'] == "admin") {
				header("Location:otchets/index.php");
			} else if (isset($_SESSION['userId'])) {
				header("Location:curser/index.php");
			}
		}
		?>
		<div class="logo">МоноПлюс</div>
		<div class="brand login-text">
			Авторизируйтесь с помошью логина или адреса электронной почты<br><br>
			<strong style="font-weight:600;">Для входа в систему необходимо получить данные для авторизации в ИТ-отдел
				организации </strong>
		</div>

		<div class="form position">
			<div class="form-inner">
				<div class="tabs">
					<ul class="tabs">
						<li class="current" data-tab="member">
							<a id="memberr" href="#member">Войти</a>
						</li>
						<li data-tab="new">
							<a id="neww" href="#new">Зарегистрироваться</a>
						</li>
					</ul>

					<!--Login Form -->
					<div class="form-content current" id="member">
						<form id="sign-in" action="login/includes/login.inc.php" method="post">
							<input type="text" name="mailuid" id="user" placeholder="ЛОГИН / EMAIL" class="field" required>
							<input type="password" name="pwd" placeholder="ПАРОЛЬ" class="field" required>
							<div class="clear"></div>

							<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
							<label class="check-label secondary-text" for="styled-checkbox-1">Запомнить меня</label>
							<a href="">
								<span class="forgot secondary-text">Забыли пароль?</span></a>
							<button id="submit" name="login-submit" class="flat-button signin">Войти</button>
							<label class="polyticIB" href="">Перед входом в систему, пожалуйста, ознакомьтесь с <a href=""
									style="font-style:italic;">Политикой обработки
									персональных данных</a></label>
						</form>
					</div>
					<!--Registration form-->
					<div class="form-content" id="new">
						<form class="reg-form" id="reg" action="login/includes/signup.inc.php" method="post">
							<input type="text" name="uid" id="user" placeholder="ЛОГИН" class="field" required>
							<select type="text" name="position" placeholder="ДОЛЖНОСТЬ" class="field" placeholder="ДОЛЖНОСТЬ"
								style="background:white;">
								<option value="1">Менеджер по персоналу</option>
								<option value="2">Менеджер по рекламе</option>
								<option value="3">Инженер по организации труда</option>
								<option value="4">Специалист по кадрам</option>
								<option value="5">Экономист по сбыту</option>
								<option value="6">Экономист по планированию</option>
								<option value="7">Менеджер по закупкам</option>
								<option value="8">Менеджер по маркетингу</option>
								<input type="text" name="fName" placeholder="ИМЯ" class="field" placeholder="ИМЯ">
								<input type="phone" id="userPhone" name="userPhone" class="field"
									placeholder="НОМЕР МОБИЛЬНОГО ТЕЛЕФОНА">
								<input type="text" name="sName" placeholder="ФАМИЛИЯ" class="field" placeholder="ФАМИЛИЯ">
								<input type="text" name="mail" id="usremail" placeholder="EMAIL" class="field">
								<input type="text" name="tName" placeholder="ОТЧЕСТВО" class="field" placeholder="ОТЧЕСТВО">
								<input type="password" name="pwd" placeholder="ПАРОЛЬ" class="field" placeholder="ПАРОЛЬ">
								<div class="field" style="color: transparent;
border: none;
visibility: hidden;"></div>
								<input class="field" type="password" name="pwd-repeat" placeholder="ПОВТОРИТЕ ПАРОЛЬ">
								</br>
								<button id="submit" name="signup-submit" class="flat-button signin"
									style="margin-left: -177px;">Зарегистрироваться</button>
								<a class="polyticIB" style="margin-right: -344px;">Политика обработки персональных данных</a>
								<div class="clear"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/jquery-3.6.4.min.js"></script>
		<script src="../js/LoginFormSwipe.js"></script>
		<script src="../SemanticUI/semantic.min.js"></script>
		<script src="../js/mask/jquery.maskedinput.js"></script>
		<script src="../js/main.js"></script>
		<script>
			$('.message .close')
				.on('click', function () {
					$(this)
						.closest('.message')
						.transition('fade')
						;
				})
				;
		</script>
		<script>
			jQuery(function ($) {
				$("input[type='phone']").mask("+7 (999) 99-99-999");
			});
		</script>

</body>

</html>