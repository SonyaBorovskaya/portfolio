<?php
include_once "../db.php";
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); ?>
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../../../css/main.css">
	<title>Document</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="" class="item ui header">
			<i class="file outline icon"></i>
			Отчеты</a>
		<a href="../reportCard/index.php" class="item subitem">Табель успеваемости</a>
		<a href="../popularitySingle/index.php" class="item subitem">Просмотры статей</a>
		<a href="../singleCategory/index.php" class="item subitem">Статьи по категориям</a>
		<a href="" class="item ui header">
			<i class="table icon"></i>
			Справочники</a>
		<a href="../otchetSotrudniki/index.php" class="item subitem">Сотрудники организации</a>
		<a href="../courseComp/index.php" class="item subitem">Курсы и развиваемые компетенции</a>
		<a href="../../curser/testing/admin.php" class="item ui header">
			<i class="tasks icon"></i>
			Тестовые задание</a>
		<a href="../../login/includes/logout.inc.php" class="item subitem">
			<i class=" sign out alternate icon"></i>
			Выйти</a>

	</div>
	<div class="ui basic icon menu fixed">
		<div id="toggle" class="item">
			<i class="chevron left icon"></i>
			<i class="sidebar icon"></i>
			Меню
		</div>
	</div>
	<div class="container" style="padding: 64px 15px 0px 15px;">
		<h1 class=" ui header" style="text-align: center;">Результаты прохождения тестирования</h1>
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
			<div class="ui input inputs">
				<label for="">Идентификатор теста</label>
				<input type="text" name="id_test">
			</div>
			<select name="grade" class="ui dropdown" id="select" style="font-size:15px; margin-top: 25px;">
				<option value="1">Отлично</option>
				<option value="2">Удовлетворительно</option>
				<option value="3">Не пройдено</option>
			</select>
			<button class="ui labeled icon button olive btn" style="margin-top: 26px;" type="submit" name="submit">
				<i class="loading spinner icon"></i>
				Сформировать отчет
			</button>

		</form>
	</div>
	<?php

	$n_date = mysqli_real_escape_string($connection, $_GET['n_date']);
	$k_date = mysqli_real_escape_string($connection, $_GET['k_date']);
	$id_test = mysqli_real_escape_string($connection, $_GET['id_test']);
	$grade = mysqli_real_escape_string($connection, $_GET['grade']);

	$sql = mysqli_query(
		$connection,
		"SELECT concat(staff.s_name,' ',LEFT(staff.f_name,1), '.',LEFT(staff.t_name,1),'.') AS fio, tests.title AS 'Тест', test_staff.result_id, grade.name, test_staff.date_test AS 'Дата'
FROM test_staff 
INNER JOIN staff ON staff.id = test_staff.staff_id 
INNER JOIN tests ON tests.id=test_staff.test_id 
INNER JOIN grade ON grade.id=test_staff.result_id 
WHERE date_test 
BETWEEN CAST('$n_date' AS DATE) AND CAST('$k_date' AS DATE)
AND test_staff.result_id=$grade 
AND test_staff.test_id=$id_test; "
	);
	echo "<table class='ui celled table' id='table'> ";
	echo " <thead>
	<tr>
	<th>ФИО</th>
	<th>Идентификатор тестирования</th>
	<th>Результат</th>
	<th>Дата прохождения</th>
	</tr>
	</thead>
	<tbody>";
	while ($item = mysqli_fetch_assoc($sql)) {
		echo "<tr>";
		echo "<td>" . $item["fio"] . "</td>";
		echo "<td>" . $item["Тест"] . "</td>";
		echo "<td>" . $item["name"] . "</td>";
		echo "<td>" . $item["Дата"] . "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	?>
	<button class="ui green button" style="float: right; margin-top:20px" id="exportBtn"
		onclick="table_xlsx(this)">Экспортировать в
		XLSX</button>

	<script src="../../../js/jquery-3.6.4.min.js"></script>
	<script src="../../../SemanticUI/semantic.min.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>
	<script>
		$('#select')
			.dropdown()
			;
	</script>
	<script type="text/javascript" src="../../../js/tableToExcel/dist/tableToExcel.js"></script>
	<script>function table_xlsx() {
			TableToExcel.convert(document.getElementById("table"), {
				name: "table.xlsx",
				sheet: {
					name: "Marks Sheet"
				}
			});
		}</script>

</body>