<?php
session_start();
include '../../controllers/posts.php';

//-------------------- УДАЛЕНИЕ УСЛУГИ-----------------
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
	$id = $_GET['del_id'];
	deleteEdit('services', $id);
	$errMsg = "Услуга $name удалена";
	header('location: index.php');
}
//УДАЛЕНИЕ УСЛУГИ-----------------
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
		<?php
		include "../../include/sidebar.admin.php"; ?>
		<div class="posts col-9">
			<div class="button row">
				<a class="col-2 btn btn-warning" style="margin-left: 45px;" href="index.php">Список сотрудников</a>
			</div>
			<div class=" row title-table">
				<h2>Обновить информацию</h2>
			</div>
			<div class="row add-post">
				<div class="mb-3 col-12 col-md-4 err">
					<p>
						<?= $errMsg ?>
					</p>
				</div>
				<form action="edit.php" method="post">

					<div class="input-group">
						<span class="input-group-text">ФИО</span>
						<input name="id" type="hidden" value=" <?= $id; ?>">
						<input name="s_name" value="<?= $s_name; ?>" id=" s_name" type="text" class="form-control"
							placeholder="Фамилия" aria-label="Фамилия">
						<input class="form-control" id="f_name" name="f_name" value="<?= $f_name; ?>">
						<input class="form-control" id="t_name" name="t_name" value="<?= $t_name; ?>">
					</div>

					<div class="input-group mb-3">
						<label class="input-group-text" for="id_position">Должность</label>
						<input class="form-control" id="id_position" name="id_position" rows="4"
							value="Специалист по кадрам"></input>
						<select class="form-select" id="id_position" name="id_position">
							<option selected>Выберите...</option>
							<option value="1">Менеджер по персоналу</option>
							<option value="2">Менеджер по рекламе</option>
							<option value="3">Инженер по организации труда</option>
							<option value="4">Специалист по кадрам</option>
							<option value="5">Экономист по сбыту</option>
							<option value="6">Экономист по планированию</option>
							<option value="7">Менеджер по закупкам</option>
							<option value="8">Менеджер по маркетингу</option>
							<option value="9">Системный администратор</option>
						</select>
					</div>

					<div class="col mb-2">
						<label for="price" class="form-label">Адрес электронной почты</label>
						<input name="email" value="<?= $email; ?>" class=" form-control" type="text" id="email"
							placeholder="Адрес электронной почты" aria-label="default input example">
					</div>
					<div class="col mb-2">
						<label for="price" class="form-label">Номер мобильного телефона пользователя</label>
						<input name="email" value="+7 (432) 63-53-642" class=" form-control" type="text" id="email"
							placeholder="Адрес электронной почты" aria-label="default input example">
					</div>
					<div class="col mb-2">
						<label for="price" class="form-label">Логин пользователя</label>
						<input name="email" value="LukinSA" class=" form-control" type="text" id="email"
							placeholder="Адрес электронной почты" aria-label="default input example">
					</div>
					<div class="col mb-4">
						<button class="btn btn-primary" name="post-edit" type="submit">Обновить запись</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>

</html>