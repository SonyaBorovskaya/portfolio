<?php
include_once '../login/includes/dbh.inc.php';
$driver = 'mysql';
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "studiadent";
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
try {
	$pdo = new PDO(
		"$driver:host=$servername;dbname=$dBName;charset=$charset",
		$dBUsername,
		$dBPassword,
		$options
	);
} catch (PDOException $i) {
	die("Ошибка подключения к базе данных");
}
// -------------ЗАПРОСЫ----------------------
// ---------- ВЫВОД------
function tt($value)
{
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	exit();
}

// проверка выполнения запроса к БД
function dbCheckError($query)
{
	$errInfo = $query->errorInfo();
	if ($errInfo[0] !== PDO::ERR_NONE) {
		echo $errInfo[2];
		exit();
	}
	return true;
}
// Заппрс на получение данных из одной таблицы
function selectAll($table, $params = [])
{
	global $pdo;
	$sql = "SELECT * FROM $table";
	// если есть хотя бы одно значение
	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			// если переменая $value не является числом
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$sql = $sql . " WHERE $key=$value";
			} else {
				$sql = $sql . " AND $key=$value";
			}
			$i++;
		}
	}

	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetchAll();
}

// -------------------------------------------------------------------------------------------
// Заппрс на получение одной строки c выбранной таблицы
function selectOne($table, $params = [])
{
	global $pdo;
	$sql = "SELECT * FROM $table";

	// если есть хотя бы одно значение
	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			// если переменая $value не является числом
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$sql = $sql . " WHERE $key=$value";
			} else {
				$sql = $sql . " AND $key=$value";
			}
			$i++;
		}
	}
	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetch();
}