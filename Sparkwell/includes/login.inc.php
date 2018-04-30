<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pword = mysqli_real_escape_string($conn, $_POST['pword']);

	//error handling
	//check if input are empty
	if (empty($uname) || empty($pword)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_uname='$uname' OR user_email='$uname'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//de hash password
				$hashedPwordCheck = password_verify($pword, $row['user_pword']);
				if ($hashedPwordCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} else if ($hashedPwordCheck == true) {
					//log in user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_serial'] = $row['user_serial'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uname'] = $row['user_uname'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}