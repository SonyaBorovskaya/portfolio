<?php
// session_start();
include '../../controllers/posts.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../bootstrap/css/css/bootstrap.css">
	<link rel="stylesheet" href="../../../bootstrap/css/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style/style.css">
	<title>Document</title>
</head>

<body>
	<div class="container">
		<?php include "../../include/sidebar.admin.php"; ?>
		<div class="posts col-9">
			<div class="button row">
				<a class="col-2 btn btn-warning" href="index.php">Список сотрудников</a>
			</div>
			<div class="row title-table">
				<h1>Добавление нового сотрудника</h1>
			</div>
			<div class="row add-post">
				<form action="create.php" method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-text">ФИО</span>
						<input type="text" aria-label="First name" class="form-control" name="s_name" id="s_name"
							placeholder="Фамилия" aria-label="Фамилия">
						<input type="text" aria-label="First name" class="form-control" id="f_name" name="f_name"
							placeholder="Имя" aria-label="Имя">
						<input type="text" aria-label="Last name" class="form-control" id="t_name" name="t_name"
							placeholder="Отчество" aria-label="Отчество">
					</div>
					<div class="input-group mb-3">
						<label class="input-group-text" for="id_position">Должность</label>
						<select class="form-select" id="id_position" name="id_position">
							<option selected>Выберите...</option>
							<option value="1">Студент</option>
							<option value="2">Лаборант</option>
							<option value="3">Абитуриент</option>
						</select>
					</div>
					<div class="col mb-2">
						<label for="email" class="form-label">Адрес электронной почты</label>
						<input name="email" class="form-control" type="text" id="email" placeholder="Адрес электронной почты"
							aria-label="default input example">
					</div>
					<div class="col mb-2">
						<label for="price" class="form-label">Номер мобильного телефона пользователя</label>
						<input name="email" class=" form-control" type="text" id="email" placeholder="+7 (000) 00-00-000"
							aria-label="default input example">
					</div>
					<div class="col mb-2">
						<label for="price" class="form-label">Логин пользователя</label>
						<input name="email" class=" form-control" type="text" id="email" placeholder="Логин"
							aria-label="default input example">
					</div>
					<div class="col mb-4">
						<button name="add_post" class="btn btn-primary" type="submit">Сохранить запись</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>

</html>