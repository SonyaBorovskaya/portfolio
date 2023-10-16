<!DOCTYPE html>
<html lang="ru">

<head>

	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

	</style>
	<title>МоноПлюс.Отчеты
	</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="" class="item ui header">
			<i class="file outline icon"></i>
			Отчеты</a>
		<a href="./fallTest/index.php" class="item subitem">Сложность тестирования</a>
		<a href="./popularitySingle/index.php" class="item subitem">Просмотры статей</a>
		<a href="./singleCategory/index.php" class="item subitem">Статьи по категориям</a>
		<a href="./singleS_name/index.php" class="item subitem">Авторы статей</a>
		<a href="./staffSingle/index.php" class="item subitem">Количество статей авторов</a>
		<a href="" class="item ui header">
			<i class="table icon"></i>
			Справочники</a>
		<a href="./otchetSotrudniki/index.php" class="item subitem">Сотрудники организации</a>

		<a href="../curser/testing/admin.php" class="item ui header">
			<i class="tasks icon"></i>
			Тестовые задание</a>
		<a href="../login/includes/logout.inc.php" class="item subitem" style="margin-top: 235px;">
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
	<div style="margin-top:50px;"> </div>
	</section>
	<script src="../../js/jquery-3.6.4.min.js"></script>
	<script src="../../SemanticUI/semantic.min.js"></script>
	<script>
		$('#toggle').click(function () {
			$('.ui.sidebar')
				.sidebar('toggle');
		});
	</script>

</body>


</html>