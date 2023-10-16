<?php
include_once "../db.php";
$curse = get_curse_by_id($_GET['id']);
// $theme = get_theme_by_id($_GET['id']);
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">
	<title>Document</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="../index.php" class="item ui header">Личный кабинет</a>
		<a href="index.php" class="item subitem">Доступные курсы</a>
		<a href="../single/curser_content.php" class="item subitem">Статьи</a>
		<a href="../testing/inc/list_staff.php" class="item subitem">Тестирование</a>
		<a href="../../login/includes/logout.inc.php" class="item subitem" style="">
			<i class="sign out alternate icon"></i>
			Выйти</a>
		</a>
	</div>
	<div class="ui basic icon menu fixed">
		<div id="toggle" class="item">
			<i class="chevron left icon"></i>
			<i class="sidebar icon"></i>
			Меню
		</div>
	</div>
	<div class="container" style="padding:60px; 15px;">
		<h1 class="ui header">
			<?php echo $curse["name"]; ?>
		</h1>
		<h3 class="ui header" style="display: block;width: 600px;margin-top: -5px;margin-left: 24px;">
			<?php echo $curse["description"]; ?>
		</h3>

		<div class="ui segment">
			<h2 class="ui right floated header">Список тем курса: <span>
					<?php echo $curse["name"]; ?>
				</span></h2>
			<div class="ui clearing divider"></div>
			<?php
			$themes = $db->query("SELECT theme.name AS 'Название', theme.text,theme.id FROM course_theme INNER JOIN theme ON theme.id = course_theme.id_theme INNER JOIN courses ON courses.id = course_theme.id_course WHERE course_theme.id_course=$id;");
			foreach ($themes as $theme): ?>
				<p>
					<a class="" style="font-size: 20px;color: #0E6EB8;"
						href="./curse_theme?id=<?= $id ?>&&theme_id=<?= $theme['id'] ?>">
						<?= $theme['id']; ?>
						<?= $theme['Название']; ?>

					</a>
				</p>
			<?php endforeach; ?>
		</div>
	</div>
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