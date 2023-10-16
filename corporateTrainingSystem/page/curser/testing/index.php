<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include_once 'db.php';
session_start();

$id = (int) $_GET['id'];
if ($id < 1) {
	header('location: admin.php');
}

$testId = $id;
if (!isset($_SESSION['test_id']) || $_SESSION['test_id'] != $testId) {
	$_SESSION['test_id'] = $testId;
	$_SESSION['test_score'] = 0;
}

$res = $db->query("SELECT * FROM tests WHERE id = {$testId}");
$row = $res->fetch();
$testTitle = $row['title'];

$questionNum = (int) $_POST['q'];
if (empty($questionNum)) {
	$questionNum = 0;
}
$questionNum++;
$questionStart = $questionNum - 1;

$res = $db->query("SELECT count(*) AS count FROM questionss WHERE test_id = {$testId}");
$row = $res->fetch();
$questionCount = $row['count'];

$answerId = (int) $_POST['answer_id'];
if (!empty($answerId)) {
	$res = $db->query("SELECT * FROM answers WHERE id = {$answerId}");
	$row = $res->fetch();
	$score = $row['score'];
	$_SESSION['test_score'] += $score;
}

$showForm = 0;
if ($questionCount >= $questionNum) {
	$showForm = 1;

	$res = $db->query("SELECT * FROM questionss WHERE test_id = {$testId} LIMIT {$questionStart}, 1");
	$row = $res->fetch();
	$question = $row['question'];
	$questionId = $row['id'];

	$res = $db->query("SELECT * FROM answers WHERE question_id = {$questionId}");
	$answers = $res->fetchAll();
} else {
	$score = $_SESSION['test_score'];

	$res = $db->query("SELECT * FROM results WHERE test_id = {$testId} AND score_min <= {$score} AND score_max >= {$score}");
	$row = $res->fetch();
	$result = $row['result'];
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
	<link rel="stylesheet" href="css/app.css">
</head>

<body>

	<div class="container">
		<?php if ($showForm) { ?>
			<form action="index.php?id=<?php echo $testId; ?>" method="post">
				<input type="hidden" name="q" value="<?php echo $questionNum; ?>">

				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="text-center mt-5">
							<p>Вопрос
								<?php echo $questionNum . ' из ' . $questionCount; ?>
							</p>
						</div>
						<div class="card mt-3">
							<div class="card-header">
								<h3>
									<?php echo $question; ?>
								</h3>
							</div>
							<div class="card-body">
								<?php foreach ($answers as $answer) { ?>
									<div>
										<input type="radio" name="answer_id" required value="<?php echo $answer['id']; ?>"> <?php echo $answer['answer']; ?>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="text-center mt-3">
							<?php if ($questionCount == $questionNum) { ?>
								<button type="submit" class="btn btn-success">Получить результат</button>
							<?php } else { ?>
								<button type="submit" class="btn btn-primary">Дальше</button>
							<?php } ?>
						</div>
					</div>
				</div>
			</form>
		<?php } else { ?>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card mt-3">
						<div class="card-header">
							<h3>Ваш результат</h3>
						</div>
						<div class="card-body">
							<div class="result-print">
								<?php $sql = $db->query("SELECT grade.id, name FROM grade LEFT JOIN results ON
									(grade.id=results.result) WHERE test_id=$testId AND grade.id=$result");
								$res = $sql->fetch();
								$grade = $res['name'];
								$res = $db->query("SELECT grade.id, name AS 'Результат' FROM grade LEFT JOIN results ON
									(grade.id=results.result) WHERE test_id=$testId AND grade.id=$result; ");
								$rows = $res->fetch();
								$row = $rows['Результат'];
								?>

								<!-- <%?php echo $result; ?> -->
								<?php echo $row; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="inc/save_results.php" method="POST">
				<input class="test" type="hidden" name="test_id" value="<?= $_SESSION['test_id']; ?>" />
				<input class="user" type="hidden" name="staff_id" value="<?= $_SESSION['userId']; ?>">
				<input class="res" type="hidden" name="result_id" value="<?= $result ?>">
				<input class="date" type="hidden" name="test_date" value="<?= date("Y-m-d") ?>">
				<button type="submit" name="save_result" class="btn btn-outline-info"
					style="margin: 0 auto;display: block;margin-top: 25px;">Отправить результаты</button>
			</form>
		<?php } ?>


	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
</body>

</html>