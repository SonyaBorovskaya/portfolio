<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include_once 'db.php';

$do = trim(strip_tags($_GET['do']));
if ($do == 'save') {
	$title = trim($_POST['title']);
	$curse_id = trim($_POST['curse_id']);
	$res = $db->prepare("INSERT IGNORE INTO tests (`title`, `curse_id`) VALUES (:title, :curse_id)");
	$res->execute([
		':title' => $title,
		':curse_id' => $curse_id,
	]);
	$testId = $db->lastInsertId();

	$questionNum = 1;
	while (isset($_POST['question_' . $questionNum])) {
		$question = trim($_POST['question_' . $questionNum]);
		if (empty($question)) {
			continue;
		}

		$res = $db->prepare("INSERT IGNORE INTO questionss (`test_id`, `question`) VALUES (:test_id, :question)");
		$res->execute([
			':test_id' => $testId,
			':question' => $question,
		]);
		$questionId = $db->lastInsertId();

		$answerNum = 1;
		while (isset($_POST['answer_text_' . $questionNum . '_' . $answerNum])) {
			$answer = trim($_POST['answer_text_' . $questionNum . '_' . $answerNum]);
			$score = trim($_POST['answer_score_' . $questionNum . '_' . $answerNum]);
			if (empty($answer)) {
				continue;
			}

			$res = $db->prepare("INSERT IGNORE INTO answers (`question_id`, `answer`, `score`) 
                                    VALUES (:question_id, :answer, :score)");
			$res->execute([
				':question_id' => $questionId,
				':answer' => $answer,
				':score' => $score,
			]);

			$answerNum++;
		}
		$questionNum++;
	}

	$resultNum = 1;
	while (isset($_POST['result_' . $resultNum])) {
		$result = trim($_POST['result_' . $resultNum]);
		$scoreMin = trim($_POST['result_score_min_' . $resultNum]);
		$scoreMax = trim($_POST['result_score_max_' . $resultNum]);

		$res = $db->prepare("INSERT IGNORE INTO results (`test_id`, `score_min`, `score_max`, `result`) 
                                    VALUES (:test_id, :score_min, :score_max, :result)");
		$res->execute([
			':test_id' => $testId,
			':score_min' => $scoreMin,
			':score_max' => $scoreMax,
			':result' => $result,
		]);

		$resultNum++;
	}

	header('Location: admin.php?do=list');
}

if ($do != 'add') {
	$do = 'list';
}
?>

<!doctype html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Система тестирования</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.css">
	<link rel="stylesheet" href="css/app.css">
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="" class="item ui header">Личный кабинет</a>
		<a href="" class="item subitem">Доступные курсы</a>
		<a href="" class="item subitem">Статьи</a>
		<a href="" class="item subitem">Тестовые задания</a>
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
	<div class="container">
		<div class="row justify-content-center">
			<?php include_once 'inc/' . $do . '.php'; ?>

		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../../SemanticUI/semantic.min.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>
	<script src="js/app.js"></script>
</body>

</html>