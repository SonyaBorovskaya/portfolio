<?php
session_start();
include_once '../login/includes/dbh.inc.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="popup-review__title">Оставьте свой отзыв!</div>
<?php
// if (isset($_POST['review_button'])) {
if (isset($_SESSION['userId'])) {
	$sql = "SELECT `fname`, `sname`,`tname`, `userPhone`, `emailUsers` FROM `users` WHERE idUsers=" . $_SESSION['userId'];
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo
				'<form action="include/reviews.inc.php" class="popup-review__form" method="POST">
							<input type="text" name="userName" value="' . $row['fname'] . '" />
							<input type="text" name="userSname" value="' . $row['sname'] . '" />
							<input type="text" name="userTname" value="' . $row['tname'] . '" />
							<input type="text" name="userEmail" value="' . $row['emailUsers'] . '" />
							<input type="text" name="userPhone" value="' . $row['userPhone'] . '" />
										<textarea type="text" name="user_review" id="" cols="30" rows="10">kkkkk</textarea>
							<button class="review__button" type="submit" name="review-submit">Отправить</button>
						</form>';
		}
	}
} else {
	echo '
						<h2>Для оставления отзыва необходимо авторизироваться!</h2>
						';
}

?>
</div>