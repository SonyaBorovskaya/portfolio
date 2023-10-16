<?php
include_once "../db.php";
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="../../../../bootstrap/css/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../../../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="../../index.php" class="item ui header">Личный кабинет</a>
		<a href="../../curse/index.php" class="item subitem">Доступные курсы</a>
		<a href="../../single" class="item subitem">Статьи</a>
		<a href="../../../login/includes/logout.inc.php" class="item subitem" style="margin-top:180%;">
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
	<div class="col-md-6" style=" margin: 0 auto;padding-top: 80px;">
		<div class="card mt-4">
			<div class="card-header">
				<h2 class="text-center">Список тестов</h2>
			</div>

			<div class="card-body">
				<ul class="list">
					<?php
					$res = $db->query("SELECT * FROM tests");
					while ($row = $res->fetch()) {
						?>
						<li><a href="../index.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<script src="../../../../js/jquery-3.6.4.min.js"></script>
	<script src="../../../../SemanticUI/semantic.min.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>
</body>