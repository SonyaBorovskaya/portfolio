<?php
include_once "../../login/includes/dbh.inc.php";
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
	<a class="item" href="./adminPanel.php">Список заявок</a>
	<a class="item active" href="#">Отзывы</a>
	<a class="item" href="./spec_staff.php">Специализация персонала</a>
	<a class="item" href="./serviceAdm.php">Услуги</a>
	<a class="item" href="./reports.html">Отчеты</a>
</div>

<body>
	<h2 class="ui header" style="margin-left: 10px;">Отзывы</h2>
	<table class="ui celled table">


		<?php
		$sql = "SELECT * FROM reviews;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);


		if ($resultCheck > 0) {
			echo '<thead>
			<tr>
				<th>ID отзыва</th>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Отчество</th>
				<th>Адрес эл.почты</th>
				<th>Моб. ном. тел.</th>
				<th>Отзыв</th>
				<th>Дата</th>
				<th>Согласие на обратную связь</th>
			</tr>
		</thead>
		<tbody>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo
					'
				<tr>
					<td>' . ($row['reviewID']) . '</td>
					<td>' . ($row['userFname']) . '</td>
					<td>' . ($row['userSname']) . '</td>
					<td>' . ($row['userTname']) . '</td>
					<td>' . ($row['userEmail']) . '</td>
					<td>' . ($row['userPhone']) . '</td>
					<td>' . ($row['review_text']) . '</td>
					<td>' . ($row['date_review']) . '</td>
					<td>' . ($row['agree']) . '</td>
					<td><a class="ui red basic button"" href="reviews.php?del=' . $row['reviewID'] . '">Удалить</a></td>

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
	$query = "DELETE FROM reviews WHERE reviewID=$id";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	// echo $query;
}
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="../../SemanticUI/semantic.min.js"></script>

</html>