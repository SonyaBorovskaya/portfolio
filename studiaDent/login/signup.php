<?php
session_start();
include_once 'includes/dbh.inc.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>

<head>
	<html lang="ru">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../SemanticUI/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<header class="header header--login" id="header">
	<div class="header-line"></div>
	<div class="container">
		<div class="header-wrapper">
			<div class="header-items">
				<div class="header-item">
					<div class="logo logo-big">
						<img src="../img/logo/big-logo.svg" alt="logo">
						<p>СтудияДент</p>
					</div>
				</div>
				<nav class="menu-header menu header-item">
					<div class="menu-items">
						<ul class="menu-lists">
							<li class="menu-list__item">
								<a href="../pages/index.php">Главная страница</a>
							</li>
							<li class="menu-list__item">
								<a href="../pages/index.php#spec">Специалисты</a>
							</li>
							<li class="menu-list__item">
								<a href="../pages/index.php#news">Новости</a>
							</li>
							<li class="menu-list__item">
								<a href="../pages/index.php#reviews">Отзывы</a>
							</li>
							<li class="menu-list__item">
								<a href="../pages/services.php">Услуги</a>
							</li>
							<?php if (isset($_SESSION['userId'])) {
								if ($_SESSION['userId'] == "5") {
									echo "
										<li class='menu-list__item' style='margin-left: 35px;'>
										<a href='../pages/admin/adminPanel.php' style='color:#2E3093;font-weight:600'>Админ.панель</a>
									</li>";
								}
							}
							?>
						</ul>
					</div>
				</nav>

				<ul class="contact-items">
					<li class="contact-item loc">
						<div class="contact-item__img">
							<img src="../img/head/location.svg" alt="location">
						</div>
						<p class="contact-item__text">г. Смоленск,
							<br> ул.Николаева 12в</br>
					</li>
					<li class="contact-item ph">
						<div class="contact-item__img">
							<img src="../img/head/phone.svg" alt="phone">
						</div>
						<p class="contact-item__text">+375 (29) 142-42-33</br>
							studiadent@mail.ru</p>
					</li>
					<li class="contact-item cl">
						<div class="contact-item__img">
							<img src="../img/head/calendar.svg" alt="calendar">
						</div>
						<p class="contact-item__text">с 09:00 - 20:00
							<span class="contact-item__subtext"><br>пн-сб</span>
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>

<body>
	<section class="signup">
		<div class="container">
			<div class="signup__wrapper">


				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<p class="signuparror alert alert-warning">Не все поля заполнены!</p>';
					} else if ($_GET['error'] == "invalidmail") {
						echo '<p class="signuparror alert alert-warning">Введите корректный адрес электронной почты</p>';
					}
					// else if ($_GET['error'] == "invaliduid") {
					// 	echo '<p class="signuparror alert alert-warning">Некорректный логин!</p>';
					// } 
					else if ($_GET['error'] == "passwordcheck") {
						echo '<p class="signuparror alert alert-warning">Пароли не совпадают!</p>';
					} else if ($_GET['error'] == 'invaliduidmail') {
						echo '<p class="signuparror alert alert-warning">Неккоректный логин или электронная почта!</p>';
					} else if ($_GET['error'] == 'usertaken') {
						echo '<p class="signuparror alert alert-warning"  >Пользователь с таким логином уже есть.</br> Пожалуйста, выберите другой или войдите</p>';

					} else if ($_GET['error'] == 'noUser') {
						echo '<p class="signuparror alert alert-warning">Пользователя не существует! Необходимо создать учетную запись</p>';

					} else if ($_GET['error'] == 'wrongpassword') {
						echo '<p class="signuparror alert alert-warning">Неправильно введен логин или пароль!</p>';

					}
				} else {
					echo '<p class="signupsuccess alert alert-success" id="success-alert">Регистрация прошла успешно!</p>';
				}
				?>



				<?php
				if (isset($_SESSION['userId'])) {
					$sql = "SELECT * FROM `users` WHERE idUsers=" . $_SESSION['userId'];
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						while ($row = mysqli_fetch_assoc($result))
							echo
								'
								<div class="signup-hello">
								<span class="ui header">Здравствуйте, ' . $row['fname'] . " " . $row['sname'] . '</span>
								<form action="includes/logout.inc.php" method="post">
								<button type="submit" name="logout-submit" class="ui primary button">Выйти</button>
								</form>
								</div>';

					}
				} else {
					echo '
	<div class="login-box">
		<div class="lb-header">
			<a href="#" class="active" id="login-box-link" >Войти</a>
			<a href="#" id="signup-box-link" >Зарегистрироваться</a>
		</div>
		<form class="email-login" action="includes/login.inc.php" method="post">
			<div class="u-form-group">
				<input type="text" name="mailphone" placeholder="Email" />
			</div>
			<div class="u-form-group">
				<input type="password" name="pwd" placeholder="Пароль" />
			</div>
			<div class="u-form-group">
				<button type="submit" name="login-submit">Войти</button>
			</div>
			<div class="u-form-group">
				<a href="#" class="forgot-password">Забыли пароль?</a>
			</div>
		</form>
		<form class="email-signup registration-form" action="includes/signup.inc.php" method="post">
			<div class="u-form-group">
				<input type="text" name="sname" placeholder="Имя">
			</div>
			<div class="u-form-group">
				<input type="text" name="fname" placeholder="Фамилия">
			</div>
			<div class="u-form-group">
				<input type="text" name="tname" placeholder="Отчество">
			</div>
			<div class="u-form-group">
				<input type="phone" name="userPhone" placeholder="+7(___)__-__-___">
			</div>
			<div class="u-form-group">
				<input type="text" name="mail" placeholder="Адрес электронной почты">
			</div>
			<div class="u-form-group">
				<input type="password" name="pwd" placeholder="Пароль">
			</div>
			<div class="u-form-group">
				<input type="password" name="pwd-repeat" placeholder="Повторите пароль">
			</div>
			<div class="u-form-group">
				<button class="registration__button" type="submit" name="signup-submit">Зарегистрироваться</button>
			</div>
		</form>';
				}
				?>

			</div>
		</div>
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="../SemanticUI/semantic.min.js"></script>
	<script src="../js/jquery-3.6.4.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/sign-login.js"></script>


	<script src="../js/mask/jquery.maskedinput.js"></script>

	<script>
		setTimeout(function () {
			$('#success-alert').fadeOut('fast');
		}, 1000);
	</script>



</body>

</html>
<?php

// require "../include/footer.php";
?>