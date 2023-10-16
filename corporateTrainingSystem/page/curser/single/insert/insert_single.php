<?php
include_once "../../../login/includes/dbh.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../../SemanticUI/semantic.min.css">
	<title>Document</title>
</head>

<body>
	<!-- <div class=""> -->
	<div class="ui sidebar menu left vertical inverted">
		<a href="../../index.php" class="item ui header">Личный кабинет</a>
		<a href="../../curse/curse_content.php" class="item subitem">Доступные курсы</a>
		<a href="../curser_content.php" class="item subitem">Статьи</a>
		<a href="../../../login/includes/logout.inc.php" class="item subitem">
			<i class="sign out alternate icon"></i>
			Выйти</a>
		</a>
	</div>
	<div class="ui basic icon menu fixed">
		<div id="toggle" class="item">
			<i class="chevron left icon"></i>
			<i class="sidebar icon"></i>
			Меню
		</div>
	</div>
	<a href="../../index.php" class="ui labeled icon button" style="margin-top: 50px; margin-left:10px;">
		<i class="left chevron icon"></i>
		Вернуться назад
	</a>
	<div class="">
		<div class="container" style="width: 1200px; margin: 0 auto; padding: 0 15px;">
			<h1 class="ui header" style="padding-top: 60px; padding-bottom: 20px;text-align: center;">Для добавления
				статьи
				заполните все поля</h1>
			<form class="ui form" method="POST" action="insert_single.inc.php">
				<h4 class="ui dividing header">Информация об авторе статьи</h4>
				<div class="field">
					<label>Логин</label>
					<div class="two fields">
						<div class="field">
							<input type="text" placeholder="Автор статьи" value="<?= $_SESSION['userUid']; ?>">
							<? echo $_SESSION['userUid']; ?>
							<input type="hidden" name="staff_id" placeholder="Автор статьи"
								value="<?= $_SESSION['userId']; ?>">
							<? echo $_SESSION['userId']; ?>
						</div>
						<div class="field">
							<input type="hidden" name="views" value="0">
						</div>
					</div>
				</div>
				<h4 class="ui dividing header">Информация о статье</h4>
				<div class="fields">
					<div class="seven wide field">
						<label>Заголовок статьи</label>
						<input type="text" name="title" placeholder="Заголовок статьи">
					</div>
					<div class="three wide field">
						<label>Дата публикации</label>
						<input type="text" name="date" placeholder="Дата публикации" value="<?= date('Y-m-d H:i:s'); ?>">
					</div>
					<div class="six wide field">
						<label>Категория</label>
						<div class="two fields">
							<div class="field">
								<select class="ui fluid search dropdown" name="category">
									<option value="">Категория</option>
									<option value="1">Маркетинг</option>
									<option value="2">Экономика</option>
									<option value="3">Реклама</option>
									<option value="4">Производственные бизнес-процессы</option>
									<option value="5">Работа с персоналом</option>
									<option value="6">Новости ООО "МоноПлюс"</option>
								</select>
							</div>
							<div class="field">
								<input type="text" name="img" placeholder="Изображение">
							</div>
						</div>
					</div>
				</div>
				<h4 class="ui dividing header">Текст статьи</h4>
				<div class="field">
					<label>Разместите здесь текст статьи:</label>
					<div class="ui form">
						<div class="field">
							<textarea type="text" name="text_single"></textarea>
						</div>
					</div>
					<button type="submit" class="ui button" name="submit_single"
						style="margin-top: 15px;s">Сохранить</button>
			</form>
		</div>
	</div>
	</div>

	<script src="../../../../js/jquery-3.6.4.min.js"></script>
	<script src="../../../../SemanticUI/semantic.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>
</body>

</html>