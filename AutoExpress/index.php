<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
	session_start();
}
// require_once __DIR__ . '/include/data.php';
// require_once __DIR__ . '/include/functions.php';
include_once './login/includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="gif/ueber.gif">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@300;400&family=Raleway:wght@100;300;400&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="carousel/files/slick-1.8.1/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/modal-popup.css">
	<title>AutoExpress</title>
</head>

<body>

	<?php
	require "login/header.php";
	?>
	<div class="header__content">
		<h1 class="header__title">авто из сша “под ключ”</h1>
		<h2 class="header__subtitle">ЗАКАЖИ СЕБЕ АВТО ИЗ США С ВЫГОДОЙ ДО 40%</h2>
		<p class="header__text">
			Подбор, покупка, доставка, растаможка, ремонт, оформление по договору
		</p>
		<button class="button button-popup" href="#" type="submit">КОНСУЛЬТАЦИЯ ЭКСПЕРТА</button>
		<div class="social header__social">
			<a class="social__link" href="#">
				<img class="social__image" src="img/icons/instagram.svg" alt="Instagram">
			</a>
			<a class="social__link" href="#">
				<img class="social__image" src="img/icons/telegram.svg" alt="Telegram">
			</a>
			<a class="social__link" href="#">
				<img class="social__image" src="img/icons/whatsapp.svg" alt="WhatsApp">
			</a>
			<a class="social__link" href="#">
				<img class="social__image" src="img/icons/facebook.svg" alt="Facebook">
			</a>
		</div>
		<img class="header__images" src="img/main/car.png" alt="">
	</div>

	<div class="modal">
		<div class="modal__main">
			<div class="modal__container">
				<form action="requests/requests.inc.php" method="POST" class="contacts__form" id="add-form">
					<h2 class="contacts__title title modal__title">Оставить заявку</h2>
					<?php
					if (isset($_SESSION['userId'])) {
						echo
							"
							<div class='input-box'>
						<input class='contacts__input' type='text' name='fName' id='fName' placeholder='Ваше имя'>
					</div>
					<div class='input-box'>
						<input class='contacts__input' type='text' name='sName' id='fName' placeholder='Ваша фамилия'>
					</div>
					<div class='input-box'>
						<input class='contacts__input' type='phone' name='userPhone' id='phone'
							placeholder='Ваш номер телефона'>
					</div>
					<textarea class='contacts__input contacts__input-textarea' type='text' name='comment' id='comment'
						placeholder='Комментарий'></textarea>
					<div class='agree-text-btn'>
						<div class='squaredFour'>
							<input class='agree' type='checkbox' value='None' id='squaredFour' name='agree' /><label
								for='squaredFour'></label>
						</div>
						<p>Я согласен с обработкой персональных данных</p>
					</div>
					<input type='hidden' name='token' value='" . getToken() . "'>
					<button class='contacts__btn button btn-success' type='submit' name='request-submit'
						disabled>Отправить</button>
				</form>";
						$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						if (strpos($fullUrl, "error=empty") == true) {
							echo "<p class='error-label'>Не все поля заполнены</p>";
						}
					} else if (!checkToken($token)) {
						$_SESSION['error'] = 'Ошибка безопасности';
						header("Location:{$_SERVER['PHP_SELF']}");
						die;
					} else {
						echo '<p>Для подачи заявки необходимо авторизироваться</p>';
					}
					?>
			</div>
			<a class="modal__close">&#10006;</a>
		</div>
	</div>
	</header>


	<section class="services">
		<div class="container">
			<h2 class="title">НАШИ УСЛУГИ</h2>
			<div class="services__inner">
				<div class="services__content">
					<div class="services__content-box">
						<h6 class="services__content-title">Почему ввоз авто из США?</h6>
						<div class="services__content-textbox">
							<p class="services__content-text">Мы сравнили рынки США с Европейскими и поняли, что покупка
								автомобиля в Америке выгоднее в несколько раз, как бы парадоксально это не звучало. Это вызвано
								продуманной логистикой, уровнем развития сервисов по оцениванию состояния авто и самим процессом
								покупки автомобиля.
							</p>
							<p class="services__content-text">Большинство граждан США берут автомобиль в лизинг на несколько
								лет и все время эксплуатации сама лизинговая компания занимается постоянным ТО автомобиля,
								вследствие чего, машины из США – один из лучших выборов для автолюбителей России.</p>
						</div>
					</div>
					<div class="services__content-box">
						<h6 class="services__content-title">Из-за чего такая низкая цена?</h6>
						<div class="services__content-textbox">
							<p class="services__content-text">Битые автомобили из США выкупаются с аукционов страховых
								компаний.
								На этих аукционах машина теряет половину цены даже из-за минимальных повреждений. Если учитывать
								денежные затраты, а именно выкуп, доставку, таможню и ремонт, то цена аналогичного по состоянию
								автомобиля в России будет выше на 35-50%, а новые будут стоить космических денег.</p>
						</div>
					</div>
					<a class="button button--decor button-popup" type="submit" href="#">КОНСУЛЬТАЦИЯ ЭКСПЕРТА</a>
				</div>

				<ol class="services__list">
					<li class="services__item">
						<p class="services__item-title">Покупка авто</p>
						<p class="services__item-text">Подбор автомобиля и экспертная проверка</p>
					</li>
					<li class="services__item">
						<p class="services__item-title">Доставка морем</p>
						<p class="services__item-text">Расчет оптимальной стоимости доставки авто</p>
					</li>
					<li class="services__item">
						<p class="services__item-title">Растаможка авто</p>
						<p class="services__item-text">Прохождение таможенного оформления (2-3 дня)</p>
					</li>
					<li class="services__item">
						<p class="services__item-title">Ремонт авто</p>
						<p class="services__item-text">Комплексный ремонт автомобиля на СТО</p>
					</li>
					<li class="services__item">
						<p class="services__item-title">Сертификация</p>
						<p class="services__item-text">Услуга предоставляется по желанию</p>
					</li>
					<li class="services__item">
						<p class="services__item-title">Постановка на учет</p>
						<p class="services__item-text">Оформление автомобиля в России</p>
					</li>
				</ol>
			</div>
		</div>
	</section>
	<section class="benefits">
		<div class="container">
			<div class="benefits__inner">
				<img class="benefits__images" src="img/benefits/benefits_car.png" alt="car">
				<div class="benefits__content">
					<h2 class="title benefits__title">ПОЧЕМУ МЫ?</h2>
					<div class="benefits__list-box">
						<ul class="benefits__list">
							<li class="benefits__item">
								<p class="benefits__item-num">650</p>
								<p class="benefits__item-title">успешно доставленных авто</p>
								<p class="benefits__item-text">большой опыт пригона автомобилей из США под ключ, все клиенты
									остались довольны на 100%</p>
							</li>
							<li class="benefits__item">
								<p class="benefits__item-num">5</p>
								<p class="benefits__item-title">лет на рынке России</p>
								<p class="benefits__item-text">Работаем по всей территории России, работаем по договору с
									клиентами</p>
							</li>
							<li class="benefits__item">
								<p class="benefits__item-num">100 %</p>
								<p class="benefits__item-title">доверия клиентов</p>
								<p class="benefits__item-text">Онлайн отчетность. Вы всегда в курсе статуса подбора вашего авто.
									Фото и видео отчет</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="carousel">
		<div class="container">
			<h1 class="title  carousel__title"> Пригнанные нами авто</h1>
			<!--СОЗДАНИЕ КАРУСЕЛИ-->
			<div class="carousel__inner">
				<div class="carousel__item">
					<!--НА ЭТОТ КЛАСС БУДУТ ПОВЕШАНЫ НАШИ СТИЛИ-->
					<div class="carousel__item-box">
						<img class="carousel__item-img" src="img/carousel/second_car.jpg" alt="">
						<h4 class="carousel__item-title">INFINITI QX50 2016 г.</h4>
						<p class="carousel__item-text">Экономия 5500 $</p>
					</div>
				</div>
				<div class="carousel__item">
					<!--НА ЭТОТ КЛАСС БУДУТ ПОВЕШАНЫ НАШИ СТИЛИ-->
					<div class="carousel__item-box">
						<img class="carousel__item-img" src="img/carousel/third_car.jpg" alt="">
						<h4 class="carousel__item-title"> TESLA MODEL 3 2018 г.</h4>
						<p class="carousel__item-text">Экономия 5500 $</p>
					</div>
				</div>
				<div class="carousel__item">
					<!--НА ЭТОТ КЛАСС БУДУТ ПОВЕШАЫ НАШИ СТИЛИ-->
					<div class="carousel__item-box">
						<img class="carousel__item-img" src="img/carousel/first_car.jpg" alt="">
						<h4 class="carousel__item-title">INFINITI QX50 2016 г.</h4>
						<p class="carousel__item-text">Экономия 4500 $</p>
					</div>
				</div>
				<div class="carousel__item">
					<div class="carousel__item-box">
						<img class="carousel__item-img" src="img/carousel/first_car.jpg" alt="">
						<h4 class="carousel__item-title">INFINITI QX50 2016 г.</h4>
						<p class="carousel__item-text">Экономия 4500 $</p>
					</div>
				</div>
				<div class="carousel__item">
					<div class="carousel__item-box">
						<img class="carousel__item-img" src="img/carousel/second_car.jpg" alt="">
						<h4 class="carousel__item-title">INFINITI QX50 2016 г.</h4>
						<p class="carousel__item-text">Экономия 4500 $</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts">
		<div class="container">
			<div class="contacts__inner">
				<div class="contacts__info">
					<h2 class="contacts__title title">КОНТАКТЫ</h2>
					<ul class="contacts__list">
						<li class="contacts__item">
							<p class="contacts__item-title">Адрес</p>
							<p class="contacts__item-text">
								Киев, Подол
								<br>ул. Константиновская, д.71
							</p>
						</li>
						<li class="contacts__item">
							<p class="contacts__item-title">
								Время работы
							</p>
							<p class="contacts__item-text">
								Пн-Сб: с 9:00 до 19:00,
								<br>Вс: выходной
							</p>
						</li>
						<li class="contacts__item">
							<p class="contacts__item-title">Телефон</p>
							<p class="contacts__item-text">+38 (050) 555 66 77</p>
						</li>
					</ul>
				</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="footer__inner">
				<a class="logo" href="#">
					<img class="logo__img" src="http://localhost/AutoExpress/img/main/logo2.svg" alt="#">
				</a>
				<div class="social footer__social">
					<a class="social__link" href="#">
						<img class="social__image" src="img/icons/instagram.svg" alt="Instagram">
					</a>
					<a class="social__link" href="#">
						<img class="social__image" src="img/icons/telegram.svg" alt="Telegram">
					</a>
					<a class="social__link" href="#">
						<img class="social__image" src="img/icons/whatsapp.svg" alt="WhatsApp">
					</a>
					<a class="social__link" href="#">
						<img class="social__image" src="img/icons/facebook.svg" alt="Facebook">
					</a>
				</div>
				<a class="footer__copy" href="#">Политика конфиденциальности</a>
			</div>
		</div>
	</footer>
	<?php
	// проверяем авторизован ли пользователь, тк атака может быть совершена только учетной записью авторизованного пользователя
	if (!empty($_POST['post'])) {
		$token = $_POST['token'] ?? '';
		if (!checkToken($token)) {
			$_SESSION['error'] = 'Ошибка безопасности';
			// если определен поддельный токен, то выход из сессии. Удаляем сессию и старый токен, пользователю нужно снова авторизироваться
			unset($_SESSION['token']);
			unset($_SESSION['userId']);
			header("Location:{$_SERVER['PHP_SELF']}");
			die;
		}
	}

	// функция, которая проверяет существует ли токен - если нет, то генерирует 
	function getToken()
	{
		if (empty($_SESSION['token'])) {
			$_SESSION['token'] = uniqid('', true);
		}
		return password_hash($_SESSION['token'], PASSWORD_DEFAULT);
	}
	// проверяем токены
	function checkToken($token)
	{
		return password_verify($_SESSION['token'], $token);
	}

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/mask/jquery.maskedinput.js"></script>
	<script defer src="js/main.js"></script>

	<!-- атрибут defer - чтобы скрипт запускался после того, как загрузится вся верстка -->
	<script src="js/modal-popup" defer></script>
	<script src="carousel/files/slick-1.8.1/slick/slick.min.js"></script>

</body>

</html>