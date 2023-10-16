<?php
session_start();
$idUser = $_SESSION['userId'];
include_once "db.php";
include_once "../login/includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../SemanticUI/semantic.min.css">
	<link rel="stylesheet" href="../../css/main.css">
	<title>Личный профиль</title>
</head>

<body>
	<div class="ui sidebar menu left vertical inverted">
		<a href="#" class="item ui header">Личный кабинет</a>
		<a href="curse/index.php" class="item subitem">Доступные курсы</a>
		<a href="single/curser_content.php" class="item subitem">Статьи</a>
		<?php
		if ($_SESSION['userUid'] == "admin") {
			echo '
		<a href="testing/admin.php" class="item subitem">Тестовые задания</a>';

		} else if (isset($_SESSION['userId'])) {
			echo '
<a href="testing/inc/list_staff.php" class="item subitem">Тестовые задания</a>';

		}
		?>
		<a href="../login/includes/logout.inc.php" class="item subitem" style="">
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
	<section class="user-profile">
		<div class="my-container">
			<div class="items" style="display: flex;column-gap: 600px;">
				<div class="flex-el">
					<h2 class="ui header" style="text-align: center;">Информация о пользователе</h2>
					<div class='ui list'>
						<?php
						$sql = "SELECT  s_name, f_name, t_name, id_position AS 'Должность', email, userPhone, uidUsers, position.name AS 'Название_должности' FROM staff LEFT JOIN position ON (position.id=staff.id_position) WHERE staff.id=$idUser";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "
									<div class='item' style='text-align:center'>
									<div class='header'>Логин</div>";
								echo htmlspecialchars($_SESSION['userUid']);
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header'>Имя</div>";
								echo $row['f_name'];
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header'>Фамилия</div>";
								echo $row['s_name'];
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header'>отчество</div>";
								echo $row['t_name'];
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header'>Должность</div>";
								echo $row['Название_должности'];
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header' >Адрес электронной почты</div>";
								echo $row['email'];
								echo "</div>
									<div class='item' style='text-align:center'>
									<div class='header'>Номер телефона</div>";
								echo $row['userPhone'];
								"</div>
							</div>";
							}
						}
						?>
					</div>
				</div>
			</div>

			<div class="flex-el">
				<h2 class="ui header" style="color: #0A855C;">Список опубликованных статей</h2>
				<?php
				$user = $_SESSION['userId'];
				$sql = "SELECT title FROM singles WHERE staff_id=$user GROUP BY title; ";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)): ?>
					<div class="ui middle aligned animated list">
						<div class="item">
							<div class="content">
								<div class="header" style="text-align: left;margin-bottom: 10px;">
									<?= $row['title'] ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

				<a href="single/insert/insert_single.php" class="ui positive basic button"
					style="margin-top: 20px;text-align: center;display;display: block;">Создать новую
					статью</a>

			</div>

		</div>
		</div>
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