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
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Популярность курсов
	</title>
</head>

<body>
	<div class="container">
		<h1>Табель успеваемости сотрудников</h1>
		<div class="returnOtchets">
			<a class="returnOtchetsBtn" href="../index.php">На страницу отчетов</a>
		</div>
		<!-- Формы для поиска записи -->
		<div class="form">
			<div class="searchForm">
				<form method="post" action="">
					<input class="search__form" type="text" name="search" class="search" placeholder="Введите оценку...">
					<input class="searchBtn" type="submit" name="submit" value="Поиск">
				</form>
			</div>
		</div>
		<!-- Конец форм для поиска записи -->
		<!-- Поиск записи -->
		<?php
		if (isset($_POST['submit'])) {
			$search = $_POST['search'];
			$searchZapros = mysqli_query($connection, "SELECT `s_name`,`f_name`, `t_name`, `date_akt`, `name`, `id_course`  
         FROM staff s, testing t, courses c, questions q WHERE t.id_staff=s.id AND q.id = t.id_question AND c.id = q.id_course AND t.id_grade 
         LIKE '%$search%' ");
			echo "<table class='rtable'>";
			echo "<thead>";
			echo "<tr><th>ФИО сотрудника</th><th>Наименование курса</th><th>Дата сдачи</th></tr>";
			echo "</thead>";
			echo "<tbody>";
			while ($item = mysqli_fetch_assoc($searchZapros)) {
				echo "<tr>";
				echo "<td>" . $item["s_name"] . " " . $item["f_name"] . " " . $item["t_name"] . "</td>";
				echo "<td>" . $item["name"] . "</td>";
				echo "<td>" . $item["date_akt"] . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
		?>
		<!-- Конец поиска записи -->
		<?php
		$query = "SELECT concat(s.s_name,' ',LEFT(s.f_name,1), '.',LEFT(s.t_name,1),'.') AS fio
,c.name AS 'Курс'
,q.question AS 'вопрос'
,g.name AS 'оценка'
,date_akt AS 'дата сдачи'
FROM testing t
INNER JOIN staff s ON s.id = t.id_staff
INNER JOIN questions q ON q.id = t.id_question
INNER JOIN courses c ON c.id = q.id_course
INNER JOIN grade g ON g.id = t.id_grade
ORDER BY s.id,c.id";
		if ($result = $connection->query($query)) {
			echo "<table class='rtable'>";
			echo "<thead>";
			echo "<tr><th>ФИО сотрудника</th><th>Наименование курса</th><th>Оценка</th><th>Дата сдачи</th></tr>";
			echo "</thead>";
			echo "<tbody>";

			foreach ($result as $row) {
				echo "<tr>";
				// echo "<td>" . $row[`fio`] . "</td>";
				// $userid = $row["fio"];
				echo "<td>" . $row["fio"] . "</td>";
				echo "<td>" . $row["Курс"] . "</td>";
				echo "<td>" . $row["оценка"] . "</td>";
				echo "<td>" . $row["дата сдачи"] . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		} else {
			echo "Ошибка: " . $connection->error;
		}
		mysqli_free_result($result);
		$connection->close();
		?>



</body>
</div>

</html>