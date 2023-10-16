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
	<a class="item" href="./reviews.php">Отзывы</a>
	<a class="item active" href="#">Специализация персонала</a>
	<a class="item" href="./serviceAdm.php">Услуги</a>
	<a class="item" href="./reports.html">Отчеты</a>
</div>

<body>
	<h2 class="ui header" style="margin-left: 10px;">Журнал персонала</h2>
	<table class="ui celled table">
		<?php
		$sql = "SELECT  staff.staffSname AS 'Фамилия', staff.staffName AS 'Имя', staff.staffTname AS 'Отчество', specialty.name_specialty AS 'Специальность' 
FROM staff_specalty LEFT JOIN staff ON (staff.staffID=staff_specalty.id_staff) 
LEFT JOIN specialty ON (specialty.id=staff_specalty.id_cpecialty) ORDER BY staff.staffSname ;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			echo '<thead>
			<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Специальность</th>
				
			</tr>
		</thead>
		<tbody>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo
					'
			<tr>
				<td>' . ($row['Фамилия']) . '</td>
				<td>' . ($row['Имя']) . '</td>
				<td>' . ($row['Отчество']) . '</td>
				<td>' . ($row['Специальность']) . '</td>
			</tr>';
			}
			echo '</tbody>
		</table>';
		}
		?>



	</table>