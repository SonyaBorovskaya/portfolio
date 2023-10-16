<?php
include_once '../login/includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="ru">


<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../SemanticUI/semantic.min.css">
	<!-- иконки в отзывах -->
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
										<a href="./index.php">На главную страницу</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
				<section class="price">
					<div class="price-title">
						<p class="ui huge header">Стоимость услуг</p>
					</div>
					<div class="price-items">


						<div class="price-item">
							<div class="price-item__title">
								<img class="price-item__title-img" src="../img/logo/logo-servic.svg" alt="">
								<p>Ортодонтия</p>
							</div>
							<div class="price-service">
								<?php
								$sql = "SELECT speciality ,nameServices, price  FROM services WHERE speciality='1' ;";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '
										<div class="price-service__item">
									<div class="price-service__name">' . $row['nameServices'] . '</div>
									<div class="price-service__price">от ' . $row['price'] . " руб." . '</div>
									</div>'
										;
									}
								}
								?>
							</div>
						</div>





						<div class="price-item">
							<div class="price-item__title">
								<img class="price-item__title-img" src="../img/logo/logo-servic.svg" alt="">
								<p>Терапия</p>
							</div>
							<div class="price-service">
								<?php
								$sql = "SELECT speciality ,nameServices, price  FROM services WHERE speciality='3' ;";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);


								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '
										<div class="price-service__item">
									<div class="price-service__name">' . $row['nameServices'] . '</div>
									<div class="price-service__price">от ' . $row['price'] . " руб." . '</div>
									</div>'
										;
									}

								}
								?>
							</div>
						</div>

						<!-- ---------------------------------------- -->
						<div class="price-item">
							<div class="price-item__title">
								<img class="price-item__title-img" src="../img/logo/logo-servic.svg" alt="">
								<p>Хирургия</p>
							</div>
							<div class="price-service">
								<?php
								$sql = "SELECT speciality ,nameServices, price  FROM services WHERE speciality='5' ;";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '
										<div class="price-service__item">
									<div class="price-service__name">' . $row['nameServices'] . '</div>
									<div class="price-service__price">от ' . $row['price'] . " руб." . '</div>
									</div>'
										;
									}
								}
								?>
							</div>
						</div>
						<!-- ------------------------------------------------------------- -->
						<div class="price-item">
							<div class="price-item__title">
								<img class="price-item__title-img" src="../img/logo/logo-servic.svg" alt="">
								<p>Ортопедия</p>
							</div>
							<div class="price-service">
								<?php
								$sql = "SELECT speciality ,nameServices, price  FROM services WHERE speciality='9' ;";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '
										<div class="price-service__item">
									<div class="price-service__name">' . $row['nameServices'] . '</div>
									<div class="price-service__price">от ' . $row['price'] . " руб." . '</div>
									</div>'
										;
									}
								}
								?>
							</div>
						</div>




					</div>
				</section>