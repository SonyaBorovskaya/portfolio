<?php
include_once "../db.php";
// счетчик просмотров статьи
view_update($_GET['id']);
?>
<?php

$single = get_single_by_id($_GET['id']);
?>
<?php $category = get_category_by_id($single["category_id"]); ?>
<!-- <%?php $author_name = get_author_by_id($single["author_id"]); ?> -->
<?php $author_name = get_author_by_id($single["staff_id"]); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../../../css/main.css">
	<title>Статья</title>
</head>

<body>
	<section class="single">
		<div class="my-container">
			<div class="single-title">
				<h5 class="ui header ">
					<?php
					echo $category["category_name"];
					?>
				</h5>
				<h1 class="ui header">
					<?php echo $single["title"]; ?>
				</h1>
				<button class="ui labeled icon button" onclick="location.href='./curser_content.php'">
					<i class="left chevron icon"></i>
					Вернуться к списку статей
				</button>
			</div>
			<div class="single-item">
				<div class="ui card">
					<div class="image">
						<img src="<?php echo $single["img"]; ?>">
					</div>
					<div class="content">
						<a class="header">
							<?php echo $author_name; ?>
						</a>
						<div class="meta">
							<span class="date">
								<?php echo date("d.m.Y в H:i", strtotime($single["date"])); ?>
							</span>
							<span class="views"><i class="eye icon"></i>
								<?php echo $single["views"] ?>
							</span>
						</div>
					</div>
				</div>
				<div class="single-text">
					<p>
						<?php echo $single["text"]; ?>
					</p>
				</div>
			</div>
		</div>
	</section>
</body>

</html>