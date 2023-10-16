<?php
include_once '../../../login/includes/dbh.inc.php';
if (isset($_POST['save_result'])) {
	$test_id = mysqli_real_escape_string($conn, $_POST['test_id']);
	$staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
	$result_id = mysqli_real_escape_string($conn, $_POST['result_id']);
	$test_date = mysqli_real_escape_string($conn, $_POST['test_date']);
	$sqlInsert = "INSERT INTO test_staff (test_id, staff_id, result_id, date_test) VALUES ('$test_id', '$staff_id', '$result_id', '$test_date');";
	mysqli_query($conn, $sqlInsert);
	header("Location: ../../index.php");

}