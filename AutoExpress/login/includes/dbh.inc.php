<?php
//обработчик базы данных
$driver = 'mysql';
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "autoexpress";
$charset = 'utf8';
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
	die("Connection to DB failed: " . mysqli_connect_error());
}