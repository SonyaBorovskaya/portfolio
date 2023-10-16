<?php
include_once 'include/dbh.inc.php';
$val = $_GET['value'];
$val_M = mysqli_real_escape_string($conn, $val);
$sql = "SELECT staff_specalty.id, staff_specalty.id_cpecialty,staff_specalty.id_staff,  staff.staffSname AS 'fNAME' FROM staff_specalty  INNER JOIN staff ON (staff.staffID=staff_specalty.id_staff) WHERE id_cpecialty='$val_M'";



$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<select name='staff_p'>";
	while ($rows = mysqli_fetch_assoc($result)) {
		echo "<option value=" . $rows["fNAME"] . ">" . $rows["fNAME"] . "</option>";
	}
	echo "</select>";
} else {
	echo "<select>
	<option>Выберите врача</option>
	</select>";
}