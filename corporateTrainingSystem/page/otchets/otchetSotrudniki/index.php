<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'curser';
$charset = 'utf8';
$connection = mysqli_connect($server, $username, $password, $dbname);
if ($connection->connect_error) {
	die("Ошибка соединение" . $connection->connect_error);
}
if (!$connection->set_charset($charset)) {
	echo "Ошибка установки кодировки";
}
include '../../login/includes/dbh.inc.php';
// $posts = selectAll('staff');
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.css">
	<link rel="stylesheet" href="../style/style.css">
	<title>Document</title>
</head>

<body>
	<div class="container" style="padding:20px 15px;">
		<a class="ui labeled icon button" href="../index.php">
			<i class="left chevron icon"></i>
			Вернуться назад
		</a>
		<h1 class="ui header">Управление сведениями о сотрудниках организации</h1>
		<a class="ui basic button" href="create.php" style="margin-bottom: 5px; margin-top: 20px;">
			<i class="icon user"></i>
			Добавить запись в каталог</a>
		<table class="ui single line table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
					<th>Должность</th>
					<th>Адрес электронной почты</th>
					<th>Номер рабочего телефона</th>
					<th>Логин пользователя</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					// $sql = "SELECT * FROM staff;";
					$sql = "SELECT staff.id AS 'id', s_name, f_name, t_name, email,userPhone, uidUsers, staff.id_position, position.name AS 'Должность' FROM staff LEFT JOIN position ON (position.id=staff.id_position);";
					$results = mysqli_query($conn, $sql);
					foreach ($results as $key => $result): ?>
						<td>
							<?= $key + 1; ?>
						</td>
						<td>
							<?= $result['s_name']; ?>
						</td>
						<td>
							<?= $result['f_name']; ?>
						</td>
						<td>
							<?= $result['t_name']; ?>
						</td>
						<td>
							<?= $result['Должность']; ?>
						</td>
						<td>
							<?= $result['email']; ?>
						</td>
						<td>
							<?= $result['userPhone']; ?>
						</td>
						<td>
							<?= $result['uidUsers']; ?>
						</td>
						<td>

							<a class="circular ui icon button" href="edit.php?id=<?= $result['id']; ?>">
								<i class="edit icon"></i></a>
						</td>
						<td>
							<a class="ui negative basic button" href="edit.php?del_id=<?= $result['id']; ?>">
								<i class="trash icon"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
	</div>

</body>

</html>