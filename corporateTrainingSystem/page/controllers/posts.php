<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include '../db.php';
include_once(dirname(__FILE__) . '../../../path.php');
$driver = 'mysql';
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "curser";
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
$errMsg = '';
$id = '';
$s_name = '';
$f_name = '';
$t_name = '';
$id_position = '';
$email = '';

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

$posts = selectAll('staff');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
	$s_name = trim($_POST['s_name']);
	$f_name = trim($_POST['f_name']);
	$t_name = trim($_POST['t_name']);
	$id_position = trim($_POST['id_position']);
	$email = trim($_POST['email']);
	if ($s_name === '' || $f_name === '' || $t_name === '') {
		$errMsg = "Заполните пустые поля";
	} else if (mb_strlen($s_name, 'UTF8') < 1) {
		$errMsg = "Неккоректное имя";
	} else if (mb_strlen($f_name, 'UTF8') < 2) {
		$errMsg = "Неккоректная фамилия";
	} else if (mb_strlen($t_name, 'UTF8') < 2) {
		$errMsg = "Неккоректное отчетство";
	} else if ($existence = selectOne('staff', ['f_name' => $f_name])) {
		if ($existence['f_name'] === $f_name) {
			$errMsg = "Такой сотрудник уже существует";
		}
	} else {
		//  массив каталог
		$post = [
			's_name' => $s_name,
			'f_name' => $f_name,
			't_name' => $t_name,
			'id_position' => $id_position,
			'email' => $email
		];

		$post = insert('staff', $post);
		$post = selectOne('staff', ['id' => $id]);


	}
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$post = selectOne('staff', ['id' => $id]);
	$id = $post['id'];
	$s_name = $post['s_name'];
	$f_name = $post['f_name'];
	$t_name = $post['t_name'];
	$id_position = $post['id_position'];
	$email = $post['email'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
	$s_name = trim($_POST['s_name']);
	$f_name = trim($_POST['f_name']);
	$t_name = trim($_POST['t_name']);
	$id_position = trim($_POST['id_position']);
	$email = trim($_POST['email']);

	if ($s_name === '' || $f_name === '') {
		$errMsg = "Не все поля заполнены";
	} else if (mb_strlen($s_name, 'UTF8') < 1) {
		$errMsg = "Неккоректная фамилия";
	} else if (mb_strlen($f_name, 'UTF8') < 2) {
		$errMsg = "Неккоректное имя";
	} else if ($existence = selectOne('staff', ['email' => $email])) {
		if ($existence['email'] === $email) {
			$errMsg = "Такой пользователь уже существует";
		} else {
			$post = [
				's_name' => $s_name,
				'f_name' => $f_name,
				't_name' => $t_name,
				'id_position' => $id_position,
				'email' => $email
			];

			$id = insert('staff', $post);
			$post = selectOne('staff', ['id' => $id]);
		}
		header('location: index.php');
	}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-edit'])) {
	$id = $_POST['id'];
	$s_name = trim($_POST['s_name']);
	$f_name = trim($_POST['f_name']);
	$t_name = trim($_POST['t_name']);
	$id_position = trim($_POST['id_position']);
	$email = trim($_POST['email']);

	if ($s_name === '' || $f_name === '') {
		$errMsg = "Не все поля заполнены";
	} else if (mb_strlen($s_name, 'UTF8') < 1) {
		$errMsg = "Неккоректная фамилия";
	} else if (mb_strlen($f_name, 'UTF8') < 2) {
		$errMsg = "Неккоректное имя";
	}
	//    //  else if ($existence=selectOne('catalogtest', ['title'=>$title])){
//    //    if($existence['title']===$title){
//    //       $errMsg="Такой товар уже существует"; 
//    //    }
	else {
		$post = [
			's_name' => $s_name,
			'f_name' => $f_name,
			't_name' => $t_name,
			'id_position' => $id_position,
			'email' => $email

		];
		$id = $_POST['id'];
		$post_id = update('staff', $id, $post);

	}
	header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
	$id = $_GET['del_id'];
	delete('staff', $id);
	$errMsg = "Сотрудник $name удалена";
	header('location: index.php');
}