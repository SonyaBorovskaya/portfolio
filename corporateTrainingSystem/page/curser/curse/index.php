<?php
include_once "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../SemanticUI/semantic.min.css">

	<link rel="stylesheet" href="../../../css/main.css">
	<title>Document</title>
</head>

<body style="background: #C4CBE10A;">

	<div class="container" style="display: flex; flex-direction: column;">
		<div class="">
			<div class="ui sidebar menu left vertical inverted">
				<a href="../index.php" class="item ui header">Личный кабинет</a>
				<a href="#" class="item subitem">Доступные курсы</a>
				<a href="../single/curser_content.php" class="item subitem">Статьи</a>
				<a href="../testing/inc/list_staff.php" class="item subitem">Тестирование</a>
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
			<h1 style="padding-top: 44px;
text-align: center;
font-weight: 700;
font-size: 26px;">Доступные курсы</h1>

		</div>


		<div class="cards_box" style="margin-top: -46px;">
			<div class="cards" style="display: flex; flex-wrap: wrap;">
				<?php
				$curses = get_curse_all(); // записали в переменную $singles массив, который возвращает функция
				foreach ($curses as $curse): ?>
					<div class="card">

						<div class="card__image-holder">
							<a href="curse_content.php?id=<?php echo $curse["id"]; ?>">
								<img class="card__image" src="<?= $curse['Картинка'] ?>" alt="wave" />
							</a>
						</div>
						<div class="card-title">
							<a href="#" class="toggle-info btn">
								<span class="left"></span>
								<span class="right"></span>
							</a>
							<p style="font-size: 19px;
						font-weight: 600;width: 230px;">
								<?php echo $curse['Курс']; ?>
								</br>
							<p style="font-size: 14px;line-height: 1em;font-weight: 300;color: #0A855C;width: 200px;">
								<span style="font-weight:500">Компетенции: </span>
								<span>
									<?php echo $curse['Компетенции']; ?>
								</span>

							</p>
							</p>
						</div>
						<div class="card-flap flap1">
							<div class="card-description">
								<?php echo $curse['Описание']; ?>
							</div>
							<div class="card-flap flap2">
								<div class="card-actions">
									<a href="curse_content.php?id=<?php echo $curse["id"]; ?>">Читать</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<script src="../../../js/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function () {
			var zindex = 10;
			$("div.card").click(function (e) {
				e.preventDefault();
				var isShowing = false;
				if ($(this).hasClass("show")) {
					isShowing = true
				}
				if ($("div.cards").hasClass("showing")) {
					$("div.card.show")
						.removeClass("show");
					if (isShowing) {
						$("div.cards")
							.removeClass("showing");
					} else {
						$(this)
							.css({ zIndex: zindex })
							.addClass("show");
					}
					zindex++;
				} else {
					$("div.cards")
						.addClass("showing");
					$(this)
						.css({ zIndex: zindex })
						.addClass("show");
					zindex++;
				}
			});
		});

	</script>
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