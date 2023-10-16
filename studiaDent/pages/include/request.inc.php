<?php
include_once 'dbh.inc.php';
if (isset($_POST['request-submit'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['PFname']);
	$sname = mysqli_real_escape_string($conn, $_POST['PSname']);
	$tname = mysqli_real_escape_string($conn, $_POST['PTname']);
	$phone = mysqli_real_escape_string($conn, $_POST['PPhone']);
	$spec = mysqli_real_escape_string($conn, $_POST['speciality_p']);
	$PStaff = mysqli_real_escape_string($conn, $_POST['staff_p']);
	$date = $_POST['Pdate'];
	if (empty($fname) || empty($sname) || empty($tname) || empty($phone) || empty($spec) || empty($date) || empty($PStaff)) {
		header("Location: ../index.php?error=empty");
		//остановит выполнение скрипта, скрипт далее не будет выполняться
		exit();
	} else {
		$sqlInsert = "INSERT INTO requests (PFname, PSname, PTname, PPhone,speciality_p, staff_p, PDate) VALUES ('$fname', '$sname', '$tname', '$phone', '$spec', '$PStaff', '$date' );";
		mysqli_query($conn, $sqlInsert);
		header("Location: ../index.php?request=success");
		exit();
	}
}