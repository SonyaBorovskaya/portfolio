<?php
include_once "../../login/includes/dbh.inc.php";
$result = "";
$resultCheck = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../SemanticUI/semantic.min.css">
	<title>Административная панель</title>
</head>
<div class="ui six item menu">
	<a class="item" href="../index.php">На главную страницу</a>
	<a class="item active" href="#">Список заявок</a>
	<a class="item" href="./reviews.php">Отзывы</a>
	<a class="item" href="./spec_staff.php">Специализация персонала</a>
	<a class="item" href="./serviceAdm.php">Услуги</a>
</div>

<body>
	<h2 class="ui header">Список заявок</h2>
	<!-- Формы для поиска записи по фамилии-->
	<form method="post" action="" style="margin-bottom: 12px;">
		<div class="ui icon input">
			<input class="search__form" type="text" name="search" class="search" placeholder="Фамилия врача..."
				style="margin-right: 8px;">
			<i class="circular search link icon"></i>
			<input type="submit" name="submit" value="Поиск">
		</div>
	</form>
	<!-- Конец форм для поиска записи по фамилии -->
	<?php
	if (isset($_POST['submit'])) {
		$search = $_POST['search'];
		$searchZapros = mysqli_query($conn, "SELECT `id_p`,`PFname`, `PSname`, `PTname`, `PPhone`, `speciality_p`,  `staff_p`, `PDate`  
         FROM requests WHERE staff_p 
         LIKE '%$search%' ");
		echo "
		<h2 class='ui header'>Результаты поиска по персоналу</h2>
		<table class='ui celled table'>
		<thead>
		<tr>
				<th>ID заявки</th>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Отчество</th>
				<th>Номер телефона</th>
				<th>Врач</th>
				<th>Дата и время</th>
			</tr>
		</thead>
		<tbody>";
		while ($item = mysqli_fetch_assoc($searchZapros)) {
			echo "<tr>
			<td><i class='attention icon'></i>"
				. ($item['id_p']) . '</td>
			<td>' . ($item['PFname']) . '</td>
			<td>' . ($item['PSname']) . '</td>
			<td>' . ($item['PTname']) . '</td>
			<td>' . ($item['PPhone']) . '</td>
			<td>' . ($item['staff_p']) . '</td>
			<td>' . ($item['PDate']) . '</td>';
		}
		echo "</tbody>";
		echo "</table>";
	}
	?>


	<!-- Форма для поиска записи по дате -->
	<form method="post" action="">
		<div class="ui icon input">
			<input class="search__form" type="text" name="searchDate" class="search" placeholder="Дата записи..."
				style="margin-right: 8px;">
			<i class=" circular search link icon"></i>
			<input type="submit" name="submitDate" value="Поиск">
		</div>
	</form>
	<!-- Конец форм для поиска записи по дате -->

	<?php
	if (isset($_POST['submitDate'])) {
		$search = $_POST['searchDate'];
		$searchZapros = mysqli_query($conn, "SELECT `id_p`,`PFname`, `PSname`, `PTname`, `PPhone`, `speciality_p`,  `staff_p`, `PDate`  
         FROM requests WHERE PDate 
         LIKE '%$search%' ");
		echo "
		<h2 class='ui header'>Результаты поиска по дате</h2>
		<table class='ui celled table'>
		<thead>
		<tr>
				<th>ID заявки</th>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Отчество</th>
				<th>Номер телефона</th>
				<th>Врач</th>
				<th>Дата и время</th>
			</tr>
		</thead>
		<tbody>";
		while ($item = mysqli_fetch_assoc($searchZapros)) {
			echo "<tr>
			<td><i class='attention icon'></i>"
				. ($item['id_p']) . '</td>
			<td>' . ($item['PFname']) . '</td>
			<td>' . ($item['PSname']) . '</td>
			<td>' . ($item['PTname']) . '</td>
			<td>' . ($item['PPhone']) . '</td>
			<td>' . ($item['staff_p']) . '</td>
			<td>' . ($item['PDate']) . '</td>';
		}
		echo "</tbody>";
		echo "</table>";
	}
	?>



	<table class="ui celled table">
		<?php
		$sql = "SELECT id_p,PFname, PSname, PTname, PPhone, speciality_p, specialty.name_specialty AS 'Специальность', staff_p, PDate FROM requests LEFT JOIN specialty ON (specialty.id=requests.speciality_p);";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);


		if ($resultCheck > 0) {
			echo '<thead>
			<tr>
				<th>ID заявки</th>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Отчество</th>
				<th>Номер телефона</th>
				<th>Специальность</th>
				<th>Врач</th>
				<th>Дата и время</th>
			</tr>
		</thead>
		<tbody>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo
					'
				<tr>
					<td>' . ($row['id_p']) . '</td>
					<td>' . ($row['PFname']) . '</td>
					<td>' . ($row['PSname']) . '</td>
					<td>' . ($row['PTname']) . '</td>
					<td>' . ($row['PPhone']) . '</td>
					<td>' . ($row['Специальность']) . '</td>
					<td>' . ($row['staff_p']) . '</td>
					<td>' . ($row['PDate']) . '</td>
					<td><a class="ui red basic button"" href="adminPanel.php?del=' . $row['id_p'] . '">Удалить</a></td>

				</tr>';
			}
			echo '</tbody>
			</table>';
		}
		?>
		</tbody>
	</table>
</body>

<!-- Удаление заявки -->
<?php
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$query = "DELETE FROM requests WHERE id_p=$id";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return true;
	// echo $query;
}
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="../../SemanticUI/semantic.min.js"></script>

</html>