<?php
include_once '../includes/dbh.inc.php';
// include_once '../includes/logout.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div class="container">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarScroll">
				<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page"
							href="http://localhost/AutoExpress/login/admin/users.php">Пользователи</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/AutoExpress/login/admin/index.php">Список заявок</a>
					</li>
				</ul>
				<form action="../includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit" class="header__login-btn btn btn-secondary">Выйти</button>
				</form>
			</div>
		</div>
	</nav>

	<!-- <div class="container">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/AutoExpress/login/admin/users.php">Пользователи</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/AutoExpress/login/admin/index.php">Список заявок</a>
					</li>

					<li class="nav-item nav-item-btn">
						<form action="../includes/logout.inc.php" method="post">
							<button type="submit" name="logout-submit"
								class="header__login-btn btn btn-secondary">Выйти</button>
						</form>
					</li>
				</ul>
			</div>
		</div> -->
	</nav>
	<div class="fw-bolder text-center fs-3">Список заявок</div>
	<table class="table">

		<?php
		// если существует GEt-запрос с именем del
		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			$query = "DELETE FROM requests WHERE idRequests=$id";
			mysqli_query($conn, $query) or die(mysqli_error($conn));
			// echo $query;
		}


		$sql = "SELECT * FROM requests;";
		$result = mysqli_query($conn, $sql);
		// проверяем, существуют ли строки, которые нужно вывести
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			echo '<thead>
		<tr>
			<th scope="col">№</th>
			<th class="col-md-2 col-sm-3 col-xs-6">Имя</th>
			<th class="col-md-2 col-sm-3 col-xs-6">Фамилия</th>
			<th >Номер телефона</th>
			<th>Сообщение</th>
			<th></th>
		</tr>
	</thead>
	<tbody class="table-group-divider">';
			while ($row = mysqli_fetch_assoc($result)) {
				echo
					'
				<tr>
					<th scope="row"> ' . $row['idRequests'] . '</th>
					<td>' . h(($row['fname'])) . '</td>
					<td>' . h(($row['sname'])) . '</td>
					<td>' . h(($row['phoneUsers'])) . '</td>
					<td>' . h($row['msgUsers']) . '</td>
					<td><a class="btn btn-danger" href="index.php?del=' . $row['idRequests'] . '">Удалить</a></td>
				</tr>';
			}
			echo '</tbody>
			</table>';
		}
		// функция specialchars
		function h($str)
		{
			// удалим ненужные символы (лишние пробелы, табуляции, переходы на новую строку)
			$str = trim($str);
			// удалим обратную косую черту
			$str = stripslashes($str);
			$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
			return $str;
		}
		?>


</div>
</div>