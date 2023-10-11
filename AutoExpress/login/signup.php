<?php
session_start()
	?>
<!DOCTYPE html>
<html lang="en" style="background-color:none">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./css/style.css">

<?php error_reporting(E_ALL ^ E_NOTICE); ?>


<body class="signup-body" style="overflow-y: hidden">
</body>
<?php
require "header.php" ?>
<section>
	<main>
		<div class="registration__page-elements">
			<div class="container--mini">
				<div class="registration-form__column">
					<form class="registration-form" action="includes/signup.inc.php" method="post">
						<input class="signap-input" type="text" name="uid" placeholder="Логин">
						<input class="signap-input" type="text" name="mail" placeholder="Адрес электронной почты">
						<input class="signap-input" type="password" name="pwd" placeholder="Пароль">
						<input class="signap-input" type="password" name="pwd-repeat" placeholder="Повторите пароль">

						<button class="registration__button" type="submit" name="signup-submit">Зарегистрироваться</button>
						<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == "emptyfields") {
								echo '<p class="signuparror alert alert-warning">Не все поля заполнены!</p>';
							} else if ($_GET['error'] == "invalidmail") {
								echo '<p class="signuparror alert alert-warning">Введите корректный адрес электронной почты</p>';
							} else if ($_GET['error'] == "invaliduid") {
								echo '<p class="signuparror alert alert-warning">Некорректный логин!</p>';
							} else if ($_GET['error'] == "passwordcheck") {
								echo '<p class="signuparror alert alert-warning">Пароли не совпадают!</p>';
							} else if ($_GET['error'] == 'invaliduidmail') {
								echo '<p class="signuparror alert alert-warning">Неккоректный логин или электронная почта!</p>';
							} else if ($_GET['error'] == 'usertaken') {
								echo '<p class="signuparror alert alert-warning"  >Пользователь с таким логином уже есть.</br> Пожалуйста, выберите другой или войдите</p>';

							}
						} else {
							echo '<p class="signupsuccess alert alert-success" id="success-alert">Регистрация прошла успешно!</p>';
						}
						?>
					</form>
				</div>
			</div>

		</div>
	</main>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	setTimeout(function () {
		$('#success-alert').fadeOut('fast');
	}, 1000);
</script>
</body>
<!-- <footer class="footer"> -->
</footer>

</html>
<?php

// require "../include/footer.php";
?>