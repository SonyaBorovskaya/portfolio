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