<?php

$dbhost = "localhost";
$dbname = "curser";
$username = "root";
$password = "";
global $db;
$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);
?>
<?php
$link = mysqli_connect('localhost', 'root', '', 'curser');
?>
<?php
if (mysqli_connect_errno()) {
	echo 'Ошибка в подключении к базе данных (' . mysqli_connect_errno() . '): ' . mysqli_connect_error();
	exit();
}
// Функция получения статей
function get_singles_all()
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	// $db-объект, который имеет свои методы
	$singles = $db->query("SELECT * FROM singles");
	return $singles;
}
function get_categories()
{
	global $link;
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($link, $sql);
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $categories;
}
// Функция получения названия категории по ее id
function get_category_by_id($id)
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	// $db-объект, который имеет свои методы
	$categories = $db->query("SELECT * FROM categories WHERE id=$id");
	foreach ($categories as $category) {
		return $category;
	}
}

// Функция получения имени автора по его id

function get_author_by_id($id)
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	// $db-объект, который имеет свои методы
	$authors = $db->query("SELECT s_name, f_name, t_name FROM staff WHERE id=$id");
	foreach ($authors as $author) {
		array($author['s_name'], $author['f_name'], $author['t_name']);
		$str = $author['s_name'] . " " . $author['f_name'] . " " . $author['t_name'];
		return $str;
	}
}
// function get_author_by_id($id)
// { // передаем переменную $db, чтобы не было ошибки
// 	global $db;
// 	// $db-объект, который имеет свои методы
// 	$authors = $db->query("SELECT * FROM authors WHERE id=$id");
// 	foreach ($authors as $author) {
// 		return $author["author_name"];
// 	}
// }

// Функция получения статьи по ее id
function get_single_by_id($id)
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	$singles = $db->query("SELECT * FROM singles WHERE id=$id");
	foreach ($singles as $single) {
		// на выходе получаем массив, который состоит из одной статьи
		return $single;
	}
}

// Апдейт кол-ва просмотров статьи по ее id
function view_update($id)
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	$db->query("UPDATE singles SET views = views+1 WHERE id=$id");

}

// Получение категории статьи по ее id
function get_posts_by_category($category_id)
{ // передаем переменную $db, чтобы не было ошибки
	global $link;
	$category_id = mysqli_real_escape_string($link, $category_id);
	$sql = 'SELECT * FROM singles WHERE category_id="' . $category_id . '"';
	$result = mysqli_query($link, $sql);
	$singles = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $singles;
}

// ----------------------КУРСЫ
// Функция получения курса
function get_curse_all()
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	// $db-объект, который имеет свои методы
	$curses = $db->query("SELECT r.id, r.id_comp, t.name AS 'Компетенции', c.name AS 'Курс', c.description 'Описание', c.img 'Картинка' FROM course r INNER JOIN courses c ON c.id = r.id_course INNER JOIN competency t ON t.id=r.id_comp");
	return $curses;
}

function get_curse_by_id($id)
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	$curses = $db->query("SELECT * FROM courses WHERE id=$id");
	foreach ($curses as $curse) {
		// на выходе получаем массив, который состоит из одной статьи
		return $curse;
	}
}
// function get_name_by_id($id)
// { // передаем переменную $db, чтобы не было ошибки
// 	global $db;
// 	// $db-объект, который имеет свои методы
// 	$courses = $db->query("SELECT * FROM courses WHERE id=$id");
// 	foreach ($courses as $course) {
// 		return $course;
// 	}
// }

function get_competency_by_id()
{ // передаем переменную $db, чтобы не было ошибки
	global $db;
	// $db-объект, который имеет свои методы
	$courses = $db->query("SELECT c.name AS 'Курс'	,t.name AS 'Компитенция'
	FROM course r
	INNER JOIN competency t ON t.id = r.id_comp
	INNER JOIN courses c ON c.id = r.id_course
	ORDER BY c.name, t.name");
	foreach ($courses as $course) {
		return $course;
	}
}


// ----------Функция получения тем курса
