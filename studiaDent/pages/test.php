<?php
include_once '../login/includes/dbh.inc.php';
$id = $GET['id'];
$select = "SELECT * FROM `articles` WHERE `id`='$id'";
$article = $mysql->query($select)->fetch_assoc();
$select_2 = "SELECT * FROM `categories`";
$categories = $mysql->query($select_2)->fetch_assoc();
?>
<form action="" method="post"></form>
<select name="category_id" id="">
	<?php while (($category = $categories->fetch_assoc()) > 0): ?>
		<?php if ($category['id'] == $article['category_id']): ?>
			<option selected="" value="<?= $category['id']; ?>">
				<?= $category['name']; ?>
			</option>
		<?php else: ?>
			<option selected="" value="<?= $category['id']; ?>">
				<?= $category['name']; ?>
			</option>
		<?php endif; ?>
	<?php endwhile; ?>
</select>
<button type="submit"></button>
</form>