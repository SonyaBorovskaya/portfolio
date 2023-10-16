<?php
session_start();
include_once '../login/includes/dbh.inc.php';
include_once 'include/request.inc.php';
include_once '../functions/db.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="ru">


<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<title>СтудияДент</title>
</head>

<body>
	<div class="bodyWrapper">
		<header class="header" id="header">
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
							<div class="menu-items" id="menu">
								<ul class="menu-lists">
									<li class="menu-list__item">
										<a href="#spec">Специалисты</a>
									</li>
									<li class="menu-list__item">
										<a href="#news">Новости</a>
									</li>
									<li class="menu-list__item">
										<a href="#reviews">Отзывы</a>
									</li>
									<li class="menu-list__item">
										<a href="./services.php">Услуги</a>
									</li>

									<?php
									if (isset($_SESSION['userId'])) {
										echo "
										<form class='menu-list__item' action='../login/includes/logout.inc.php' method='post'>
										<li class='menu-list__item' style='margin-left: 35px;'>
										<button class='menu-list__item' type='submit' name='logout-submit'>Выйти</a>
									</li>
									</form>";
										if ($_SESSION['userId'] == "5") {
											echo "
										<li class='menu-list__item' style='margin-left: 35px;'>
										<a href='admin/adminPanel.php' style='color:#2E3093;font-weight:600'>Админ.панель</a>
									</li>";
										}
									} else {
										echo "
										<li class='menu-list__item'>
										<a href='../login/signup.php'>Регистрация/Вход</a>
									</li>";
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
		<main>
			<section class="home lockPadding">
				<div class="container">
					<div class="home-text">
						<div class="text__before">Стоматология в Смоленске
							<span class="line-before"></span>
						</div>
						<div class="home-title">СтудияДент</div>
						<div class="home-subtitle">Мы проведем полную консультацию, профессиональную гигиену полости рта,
							лечение зубов и десен</div>
						<div class="btn-block">
							<div class="btn-wrapper">
								<a href="#popup" class="popup-link btn" style="padding-top:11px;">Записаться онлайн</a>
							</div>
							<?php
							if (isset($_GET['request'])) {
								if ($_GET['request'] == "success") {
									echo '<span class="login-allertMessage" style="color: green;
									font-weight: 600;
									margin-top: 10px;
									display: block;
									font-size: 18px;">Ваша заявка успешно отправлена!</span>';
								}
							}
							?>
						</div>
						<!-- POPUP для подачи заявки -->
						<form action="include/request.inc.php" method="POST">
							<div class="popup" id="popup">
								<div class="popup__body">
									<div class="popup__content">
										<a href="#header" class="popup__close close-popup">
											<img class="popup-close__btn" src="../img/popup/close.svg" alt="">
										</a>
										<div class="popup__title">Запись on-line</div>
										<?php if (isset($_GET['error'])) {
											if ($_GET['error'] == "empty") {
												echo '<span class="login-allertMessage" style="color: red;
									font-weight: 600;
									margin-top: 10px;
									display: block;
									font-size: 18px;">Заполните все поля!</span>';
											}
										}
										?>
										<div class="popup__box">

											<form class="popup__form" action="">
												<div class="popup__form-item">
													<label for="fName">Имя</label>
													<input type="text" id="fName" name="PFname" placeholder="Имя"><br>
												</div>
												<div class="popup__form-item">
													<label for="sname">Фамилия</label>
													<input type="text" id="sName" name="PSname" placeholder="Фамилия"><br>
												</div>
												<div class="popup__form-item">
													<label for="name">Отчество</label>
													<input type="tel" id="tName" name="PTname" placeholder="Отчество"> <br>
												</div>
												<div class="popup__form-item">
													<label for="userPhone">Мобильный номер телефона</label>
													<input type="phone" id="userPhone" placeholder="+7(___)__-__-___"
														name="PPhone"><br>
												</div>
												<div class="popup__form-item">
													<label for="fname">Выберите специализацию</label>
													<select name="speciality_p" id="selectA" onchange="my_fun(this.value);">
														<option disabled>Специализация врача</option>
														<option value="1">Ортодонтия</option>
														<option value="3">Терапия</option>
														<option value="5">Хирургия</option>
														<option value="9">Ортопедия</option>
													</select>
												</div>
												<div class="popup__form-item">
													<label for="fname">Выберите врача</label>
													<div id="poll">
														<select name="staff_p" id="">
															<option value="">Выберите врача</option>

															</option>
														</select>
													</div>
												</div>
												<br>
												<div class="popup__form-item">
													<label for="date">Дата и время посещения</label>
													<input type="date" id="date" name="Pdate"><br>
												</div>
											</form>
											<div class="popup-subtext">
												<div class="popup-subtext__content">
													<p>Нажимая “Запись on-line” Вы даете согласие на обработку персональных данных
													</p>
													<button type="submit" class="btn-popup requestSend-btn" name="request-submit">
														<p>Записаться</p>
													</button>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- //POPUP для подачи заявки -->
					</div>
					<div class="home-bottom">
						<div class="home-bottom__wrapper">
							<div class="home-bottom__items">
								<div class="home-bottom__item">
									<div class="home-bottom__box">
										<div class="bottom-box__img">
											<img src="../img/home-bottom/1.svg" alt="">
										</div>
										<div class="bottom-box__text">
											<p>Команда квалифицированных специалистов </p>
										</div>
									</div>

								</div>
								<div class="home-bottom__item">
									<div class="home-bottom__box">
										<div class="bottom-box__img">
											<img src="../img/home-bottom/2.svg" alt="">
										</div>
										<div class="bottom-box__text">
											<p>3 стоматологических кабинета </p>
										</div>
									</div>
								</div>
								<div class="home-bottom__item">
									<div class="home-bottom__box">
										<div class="bottom-box__img">
											<img src="../img/home-bottom/3.svg" alt="">
										</div>
										<div class="bottom-box__text">
											<p>Удобное расположение </p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="home-bg-img">
					<img src="../img//main/bcg1.png" alt="background">
				</div>
			</section>

			<section class="workers" id="spec">
				<div class="container">
					<div class="workers-title">
						<div class="title__img">
							<img src="../img/logo/logo-title.svg" alt="logo">
						</div>
						<p class=" title title-text">
							Специалисты
						</p>
						<p class="title-subtext">
							Просто и безболезненно, с предоставлением всего спектра стоматологических услуг
						</p>
					</div>
					<div class="workers-cards">
						<div class="worker-card">
							<div class="worker-card__item">
								<div class="worker-img">
									<img src="../img/team/11.jpg" alt="Therapy">
								</div>
								<div class="worker-description">
									<div class="worker-title worker-title-center">
										<p>Терапия</p>
									</div>
									<div class="worker-name">
										<p>Лосев Дмитрий Давидович</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>

						<div class="worker-card">
							<div class="worker-card__item">
								<div class="worker-img">
									<img src="../img/team/2.jpg" alt="Orthopedics">
								</div>
								<div class="worker-description ">
									<div class="worker-title worker-title-center">
										<p>Ортопедия</p>
									</div>
									<div class="worker-name">
										<p>Елисеева Полина Богданова</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>

						<div class="worker-card">
							<div class="worker-card__item">
								<div class="worker-img">
									<img src="../img/team/3.jpg" alt="Surgery">
								</div>
								<div class="worker-description">
									<div class="worker-title worker-title-center">
										<p>Хирургия</p>
									</div>
									<div class="worker-name">
										<p>Вячеслав Сергей Александрович</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>

						<div class="worker-card">
							<div class="worker-card__item">
								<div class="worker-img">
									<img src="../img/team/4.jpg" alt="Implantstion">
								</div>
								<div class="worker-description r">
									<div class="worker-title worker-title-center">
										<p>Имплантация</p>
									</div>
									<div class="worker-name">
										<p>Климова Ирина Александровна</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>

						<div class="worker-card">
							<div class="worker-card__item">

								<div class="worker-img">
									<img src="../img/team/5.jpg" alt="Tomography">
								</div>

								<div class="worker-description">
									<div class="worker-title">
										<p>Компьютерная томография</p>
									</div>
									<div class="worker-name">
										<p>Павлова Елизавета Кирилловна</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>

						<div class="worker-card">
							<div class="worker-card__item">
								<div class="worker-img">
									<img class="worker-img" src="../img/team/6.jpg" alt="Dentistry">
								</div>
								<div class="worker-description">
									<div class="worker-title">
										<p>Детская стоматология</p>
									</div>
									<div class="worker-name">
										<p>Савина Варвара Александрован</p>
									</div>
									<div class="worker-exp">
										<p>Опыт работы: 11 лет</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="news" id="news">
				<div class="container">
					<div class="title news-title">
						<div class="title__img">
							<img src="../img/logo/logo-title.svg" alt="logo">
						</div>
						<p class="title-text">
							Новости клиники
						</p>
					</div>
					<div class="news-column-wrapper">
						<div class="news-grid-box">
							<div class="news-item1">
								<div class="new-item-1">
									<div class="new-item-1__img">
										<img src="../img/news/certificate.jpg" alt="certificate">
									</div>
									<div class="new-item-text">
										<div class="new-item-title">
											Подарочный сертификат
										</div>
										<div class="new-item-time">
											19.04.2020г.
										</div>
										<span class="new-item-description">
											В стоматологии ДенталЭлит вы можете приобрести подарочный сертификат на сумму или
											услугу. Сделайте полезный подарок своему близкому человеку, напомните ему о важности
											заботы о своих зубах.
										</span>
									</div>
								</div>
								<div class="new-item-1">
									<div class="new-item-1__img">
										<img src="../img/news/incurance.jpg" alt="certificate">
									</div>
									<div class="new-item-text">
										<div class="new-item-title">
											Подарочный сертификат
										</div>
										<div class="new-item-time">
											19.04.2020г.
										</div>
										<span class="new-item-description">
											В стоматологии ДенталЭлит вы можете приобрести подарочный сертификат на сумму или
											услугу. Сделайте полезный подарок своему близкому человеку, напомните ему о важности
											заботы о своих зубах.
										</span>
									</div>
								</div>
							</div>
							<div class="news-item2">
								<div class="item2">
									<div class="item2-wrapper">
										<img src="../img/news/big.jpg" alt="background">
										<div class="item2__text">
											<div class="news-text__title">
												<p>Что важно знать
													перед визитом к стоматологу?</p>
											</div>
											<div class="news-text__subtitle">
												<p>Важные и полезные советы от проффесиональных стоматологов о правилах и этических
													нормах прима пацентов в любой стоматологии. </p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="news-item3">
								<div class="item3">
									<div class="new-item3-img">
										<img src="../img/news/child.png" alt="child">
									</div>
									<div class="new-item3-text">
										<div class="new-item-title">
											Адаптация ребенка к стоматологическому приему
										</div>
										<div class="new-item-time">
											19.04.2020г.
										</div>
										<span class="new-item-description">
											Ваш малыш идет первый раз на прием к стоматологу или возможно у него остались
											неприятные воспоминания от предыдущего лечения?
										</span>
									</div>
								</div>
								<div class="item3">
									<div class="new-item3-img">
										<img src="../img/news/corporate.png" alt="corporate">
									</div>
									<div class="new-item3-text">
										<div class="new-item-title">
											Корпоративным клиентам
										</div>
										<div class="new-item-time">
											19.04.2020г.
										</div>
										<span class="new-item-description">
											Стоматологическая клиника «ДенталЭлит» предлагает Корпоративную программу для
											сотрудников компаний, которая предусматривает специальные условия обслуживания и
											персональную заботу о стоматологическом здоровье вашего коллектива.
											Стоматологическая клиника «ДенталЭлит» предлагает Корпоративную программу для
											сотрудников компаний, которая предусматривает специальные условия обслуживания и
											персональную заботу о стоматологическом
										</span>
									</div>
								</div>
								<div class="item3">
									<div class="new-item3-img">
										<img src="../img/news/sale.png" alt="sale">
									</div>
									<div class="new-item3-text">
										<div class="new-item-title">
											Продажа средств по уходу за полостью рта
										</div>
										<div class="new-item-time">
											19.04.2020г.
										</div>
										<span class="new-item-description">
											В клинике ДенталЭлит можно приобрести профессиональные средства по уходу за полостью
											рта немецкой фирмы Miradent.
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="advantages">
				<div class="container">
					<div class="title">
						<div class="title__img">
							<img src="../img/logo/logo-title.svg" alt="logo">
						</div>
						<p class="title-text">
							Почему выбирают нас?
						</p>
					</div>
					<div class="advantages-grid">
						<div class="advantages-item">
							<img src="../img/advantages/2.svg" alt="">
							<div class="advantages-item__text">
								<p> Современное оборудование и материалы</p>
							</div>
						</div>
						<div class="advantages-item">
							<img src="../img/advantages/3.svg" alt="">
							<div class="advantages-item__text">
								<p>Команда опытных специалистов</p>
							</div>
						</div>
						<div class="advantages-item">
							<img src="../img/advantages/4.svg" alt="">
							<div class="advantages-item__text">
								<p>Все виды стоматологического лечения в одной клинике</p>
							</div>
						</div>

					</div>
				</div>
			</section>

			<section class="reviews" id="reviews">
				<div class="container">
					<div class="reviews-top">
						<div class="title">
							<div class="title__img">
								<img src="../img/logo/logo-title.svg" alt="logo">
							</div>
							<p class="title-text">
								Отзывы наших клиентов
							</p>
						</div>

						<!-- POPUP для отзывов -->
						<button class="popup-review btn-review btn" id="popup-review-link" name="review_button">Оставить
							отзыв</button>
						<div id="element_popup-reviews">
							<div class="popup-review__title">Оставьте свой отзыв!</div>
							<?php
							// if (isset($_POST['review_button'])) {
							if (isset($_SESSION['userId'])) {
								$sql = "SELECT `fname`, `sname`,`tname`, `userPhone`, `emailUsers` FROM `users` WHERE idUsers=" . $_SESSION['userId'];
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo
											'<form action="include/reviews.inc.php" class="popup-review__form" method="POST">
							<input type="hidden" name="userName" value="' . $row['fname'] . '" />
							<input type="hidden" name="userSname" value="' . $row['sname'] . '" />
							<input type="hidden" name="userTname" value="' . $row['tname'] . '" />
							<input type="hidden" name="userPhone" value="' . $row['userPhone'] . '" />
							<input type="hidden" name="userEmail" value="' . $row['emailUsers'] . '" />
							<input type="hidden" name="dateReview" value="' . date('Y-m-d') . '" />
										<textarea class="review_textarea" name="user_review" id="" cols="30" rows="10"></textarea>
										<p>Вы хотите, чтобы мы с Вами связались?</p>
										<label for="agree">Нет</label>
										<input class="check_disagree" type="radio" name="agree" value="нет" />
										<label for="agree">Да</label>
										<input class="check_agree" type="radio" name="agree" value="да" />
										
										<button onClick="document.location.href="include/reviews.inc.php"" class="btn-review btn-review--form btn" type="submit" name="review-submit">Отправить</button>
						</form>';
									}
								}
							} else {
								echo '
						<h2 class="review-error">Для оставления отзыва необходимо авторизироваться!</h2>
						';
							}
							// }
							?>
						</div>
					</div>
					<!-- POPUP для отзывов -->
					<!-- **Слайдер -->
					<div class="reviews-wrapper">
						<!-- окно слайдера -->
						<div class="slider-container">
							<!-- полоска с элементами, которая перемещается внутри окна -->
							<div class="slider-track">
								<?php
								$reviews = selectAll('reviews');
								foreach ($reviews as $key => $review): ?>
									<div class="slider-item">
										<div class="slider-item__wrapper">
											<div class="slider-item__name">
												<p>
													<?= htmlspecialchars($review['userFname'] . " " . $review['userTname'] . " " . $review['userSname']); ?>
												</p>
											</div>

											<div class="slider-item__date">
												<?= htmlspecialchars($review['date_review']); ?>

											</div>
											<div class="slider-item__text">
												<p>
													<?= htmlspecialchars($review['review_text']); ?>
												</p>
											</div>
										</div>
									</div>
									<?php
								endforeach;
								?>

							</div>
						</div>
						<div class="slider-buttons">
							<button class="btn-prev"></button>
							<button class="btn-next"></button>
						</div>
					</div>
			</section>
			<!-- Отзывы -->



			<footer class="footer">
				<div class="container">
					<div class="footer__box">
						<div class="footer-box__item footer-box__item--links">
							<a class="footer-box__link" href="">
								<img src="../img/footer-socialNetwork/google.svg" alt="google">
							</a>
							<a class="footer-box__link" href="">
								<img src="../img/footer-socialNetwork/invision.svg" alt="invision">
							</a>
							<a class="footer-box__link" href="">
								<img src="../img/footer-socialNetwork/Mail.svg" alt="Mail">
							</a>
						</div>
						<div class="footer-box__item">
							<p>ООО «СтудияДент», лицензия №ЛО-86-8681-01868686047 от 13.02.2099
								© 2018-2023</p>
						</div>
						<div class="footer-box__item">
							<img src="../img/logo/big-logo.svg" alt="">
						</div>
					</div>
				</div>
			</footer>
	</div>
</body>


<script src="../js/jquery-3.6.4.min.js"></script>
<script src="../js/jquery.maskedinput.js"></script>
<script src="../js/jquery.bpopup.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
<script src="../js/main.js"></script>
<script src="../js/slider.js"></script>
<script src="../js/popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../js/popup_request.js"></script>
<script src="../js/navigation.js"></script>
<!-- Скрипт для выбора даты и времени в форме подачи заявки -->
<script>
	config =
	{
		enableTime: true,
		altInput: true,
		time_24hr: true,
		altFormat: "d-m-Y H:i",
		dateFormat: "d-m-Y H:i",
		minDate: "today",
		minTime: "7:00",
		maxTime: "23:00",
		defaultHour: 7,
		minuteIncrement: 5
	}
	const updateTrigger = (selectedDates, dateStr, instance) => {
		if (selectedDates.length === 2) {
			$emit('update:filter', selectedDates);
		}
	};
	flatpickr("#date", config);
	function my_fun(str) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHHTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('poll').innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "helper.php?value=" + str, true);
		xmlhttp.send();
	}
</script>
<!-- //Скрипт для выбора даты и времени в форме подачи заявки -->

</html>