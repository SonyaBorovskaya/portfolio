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
	<a class="item active" href="">Услуги клиники</a>
	<a class="item" href="./reports.html">Отчеты</a>
</div>

<body>
	<h2 class="ui header" style="margin-left: 10px;">Услуги</h2>

	<a href="./includes/serviceAdm-serviceInsertIndex.php" class="ui teal basic button"
		style="margin-left: 10px;">Добавить услугу</a>

	<table class="ui celled table">
		<?php
		$sql = "SELECT * FROM services;";

		$sql = "SELECT services.id AS 'id',  nameServices, price, services.speciality, specialty.name_specialty AS 'Специальность' FROM services LEFT JOIN specialty ON (specialty.id=services.speciality);";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			echo '<thead>
			<tr>
			<th>ID</th>
				<th>Специальность</th>
				<th>Название услуги</th>
				<th>Стоимость</th>
				<th></th>
				<th></th>
			</tr>
		</thead>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo
					'
				<tr>
				<td>' . ($row['id']) . '</td>
					<td>' . ($row['Специальность']) . '</td>
					<td>' . ($row['nameServices']) . '</td>
					<td>' . ($row['price']) . '</td>
					<td><a class="ui red basic button" href="serviceAdm.php?del=' . $row['id'] . '">Удалить</a></td>
					<td><a class="ui yellow basic button" href="includes/serviceAdmUpdate.php?id=' . $row['id'] . '">Изменить</a></td>
				</tr>';
			}
			echo '</tbody>
			</table>';
		}
		?>
		</tbody>
	</table>
</body>
<!-- Удаление услуги -->
<?php
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$query = "DELETE FROM services WHERE id=$id";
	mysqli_query($conn, $query) or die(mysqli_error($conn));

}
?>
<!-- //Удаление услуги -->





</html>