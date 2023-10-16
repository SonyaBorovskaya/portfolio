<?php
include_once "../db.php";
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../css/main.css">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">
	<title>Document</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="" class="item ui header">
			<i class="file outline icon"></i>
			Отчеты</a>
		<a href="#" class="item subitem">Сложность тестирования</a>
		<a href="../popularitySingle/index.php" class="item subitem">Просмотры статей</a>
		<a href="../singleCategory/index.php" class="item subitem">Статьи по категориям</a>
		<a href="../singleS_name/index.php" class="item subitem">Авторы статей</a>
		<a href="../staffSingle/index.php" class="item subitem">Количество статей авторов</a>
		<a href="../testsResult/index.php" class="item subitem">Результаты тестирования</a>
		<a href="../otsutsvTests/index.php" class="item subitem">Не проходившие тестирование</a>
		<a href="#" class="item ui header">
			<i class="table icon"></i>
			Справочники</a>
		<a href="../otchetSotrudniki/index.php" class="item subitem">Сотрудники организации</a>
		<!-- <a href="../courseComp/index.php" class="item subitem">Курсы и развиваемые компетенции</a> -->

		<a href="../curser/testing/admin.php" class="item ui header">
			<i class="tasks icon"></i>
			Тестовые задание</a>
		<a href="../../login/includes/logout.inc.php" class="item subitem" style="margin-top: 212px;">
			<i class=" sign out alternate icon"></i>
			Выйти</a>
	</div>
	<div class="ui basic icon menu fixed">
		<div id="toggle" class="item">
			<i class="chevron left icon"></i>
			<i class="sidebar icon"></i>
			Menu
		</div>
	</div>
	<div class="container" style="padding: 64px 15px 0px 15px;">
		<h1 class=" ui header" style="text-align: center;">Сложность тестирования</h1>
		<form class="otch_form" action="index.php" method="GET"
			style="display: flex;flex: row;align-items: flex-start;column-gap: 15px;">
			<div class="ui input inputs">
				<label for="">Начальная дата</label>
				<input type="text" name="n_date" placeholder="0000-00-00">
			</div>
			<div class="ui input inputs">
				<label for="">Конечная дата</label>
				<input type="text" name="k_date" placeholder="0000-00-00">
			</div>
			<button class="ui labeled icon button olive btn" style="margin-top: 26px;" type="submit" name="submit">
				<i class="loading spinner icon"></i>
				Сформировать отчет
			</button>
		</form>
	</div>
	<?php
	$n_date = mysqli_real_escape_string($connection, $_GET['n_date']);
	$k_date = mysqli_real_escape_string($connection, $_GET['k_date']);
	$sql = mysqli_query(
		$connection,
		"SELECT test_staff.test_id, tests.title AS 'Название', test_staff.id AS 'id', COUNT(*) FROM test_staff INNER JOIN tests ON test_staff.test_id=tests.id WHERE test_staff.result_id=3 = (SELECT MAX(result_id=3) FROM test_staff) AND test_staff.date_test BETWEEN CAST('$n_date' AS DATE) AND CAST('$k_date' AS DATE);"
	);
	echo "<table class='ui celled table'>";
	echo " <thead>
		<tr>
		<th>ID</th>
		<th>Наименование</th>
		<th>Количество не сдавших</th>
		</tr>
		</thead>
		<tbody>";
	while ($item = mysqli_fetch_assoc($sql)) {
		echo "<tr>";
		echo "<td>" . $item["test_id"] . "</td>";
		echo "<td>" . $item["Название"] . "</td>";
		echo "<td>" . $item["COUNT(*)"] . "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	?>

	<script src="../../../js/jquery-3.6.4.min.js"></script>
	<script src="../../../SemanticUI/semantic.min.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>
</body>

</html>