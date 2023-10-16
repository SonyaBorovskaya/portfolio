<?php
include_once "../db.php";
?>
<!DOCTYPE html>
<div lang="en">

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
		<div class="ui sidebar menu left vertical inverted">
			<a href="../index.php" class="item ui header">Личный кабинет</a>
			<a href="../curse/index.php" class="item subitem">Доступные курсы</a>
			<a href="#" class="item subitem">Статьи</a>
			<a href="../testing/inc/list" class="item subitem">Тестовые задания</a>
			<a href="../../login/includes/logout.inc.php" class="item subitem" style="margin-top:180%;">
				<i class="sign out alternate icon"></i>
				Выйти</a>
		</div>
		<div class="ui basic icon menu fixed">
			<div id="toggle" class="item">
				<i class="chevron left icon"></i>
				<i class="sidebar icon"></i>
				Меню
			</div>
		</div>
		<div class="ui tabular menu" style="margin-top: 63px;">
			<?php
			$categories = get_categories();
			foreach ($categories as $category): ?>
				<a class="item active" href="./category.php?id=<?= $category["id"] ?>">
					<?= $category["category_name"] ?>
				</a>
			<?php endforeach; ?>
		</div>
		<!-- //Меню -->
		<!-- статья -->
		<div class="my-container">
			<h1 class="ui header">Статьи и новости нашей компании</h1>


			<?php

			$singles = get_singles_all(); // записали в переменную $singles массив, который возвращает функция
			foreach ($singles as $single): ?>
				<?php $category = get_category_by_id($single["category_id"]); ?>
				<?php $author_name = get_author_by_id($single["staff_id"]); ?>
				<!-- <$?php $author_name = get_author_by_id($single["author_id"]); ?> -->
				<div class="ui unstackable items">
					<div class="item single-anons">
						<a href="single_content.php?id=<?php echo $single["id"]; ?>" class="image">
							<img src="<?php echo $single["img"]; ?>"></a>
						<div class="content">
							<a class="header" href="single_content.php?id=<?php echo $single["id"]; ?>">
								<?php echo $single["title"]; ?>
							</a>
							<div class="meta category">
								<a>
									<?php echo $category["category_name"]; ?>
								</a>
							</div>
							<div class="description">
								<p>
									<?php echo $string = mb_substr($single["text"], 0, 440, 'UTF-8') . '...'; ?>
								</p>
							</div>
							<div class="extra descript-wrap">
								<a class="author" href=""><i class="address book outline icon"></i>
									<?php echo $author_name; ?>
								</a>
								<span class="date">
									<i class="calendar alternate outline icon"></i>
									<?php echo date("d.m.Y в H:i", strtotime($single["date"])); ?>
								</span>
								<span class="views"><i class="eye icon"></i>
									<?php echo $single["views"] ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;
			// ob_end_flush(); 
			?>
			<div class="btn-downoload-singles">Загрузить еще</div>
		</div>

		<script src="../../../js/jquery-3.6.4.min.js"></script>
		<script src="../../../SemanticUI/semantic.min.js"></script>
		<script>
			$('#toggle').click(function () {
				$('.ui.sidebar')
					.sidebar('toggle');
			});
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
			crossorigin="anonymous"></script>
	</body>

	</html>