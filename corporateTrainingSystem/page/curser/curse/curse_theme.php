<?php
include_once "../db.php";
$curse = get_curse_by_id($_GET['id']);
$id = $_GET['id'];
$theme_id = $_GET['theme_id'];

?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../../../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<div class="ui icon olive message">
		<i class="pencil alternate icon"></i>
		<div class="content">
			<div class="header">
				<?php
				echo $curse["name"]; ?>
			</div>
			<p>
				<?php echo $curse["description"]; ?>
			</p>
		</div>
	</div>

	<?php
	$themes = $db->query("SELECT theme.name AS 'Название', theme.text AS 'Текст',theme.id FROM course_theme INNER JOIN theme ON theme.id = course_theme.id_theme INNER JOIN courses ON courses.id = course_theme.id_course WHERE course_theme.id_course=$id AND course_theme.id_theme=$theme_id;");
	foreach ($themes as $theme): ?>
		<a class="" href="./curse_theme?id=<?= $id ?>&&theme_id=<?= $curse['id'] ?>">
			<div class="ui piled segment" style="padding-top: 28px;margin-top: 35px;">
				<h4 class="ui header">
					<?= $theme['Название']; ?>
				</h4>
				<p>
					<?= $theme['Текст']; ?>
				</p>
			</div>
		</a>

	<?php endforeach; ?>
	<a href="curse_content.php?id=<?= $id ?>" class="ui labeled icon button" style="margin-top: 30px; margin-left:10px;">
		<i class="left chevron icon"></i>
		Вернуться назад
	</a>
	<script src="../../../js/jquery-3.6.4.min.js"></script>
	<script src="../../../SemanticUI/semantic.min.js"></script>
</body>