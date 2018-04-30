<?php

if (isset($_POST['submit'])) 
{
	
	include_once 'dbh.inc.php';

	$serial = mysqli_real_escape_string($conn, $_POST['serial']);
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pword = mysqli_real_escape_string($conn, $_POST['pword']);

	//Error handle
	//check for empty fields
	if (empty($serial) || empty($first) || empty($last) || empty($email) || empty($uname) || empty($pword)) {
		header("Location: ../register.php?register=empty");
		exit();
	} else 
	 	{
			//Check if input characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) 
			{
			header("Location: ../register.php?register=invalid");
			exit();
			} else 
				{
					//Check if email is valid
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
					{
						header("Location: ../register.php?register=email");
						exit();
					} else 
						{
							$sql = "SELECT * FROM users WHERE user_uname='$uname'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);

							if ($resultCheck > 0) 
							{
								header("Location: ../register.php?register=usertaken");
								exit();
							} else 
								{
									//Hash password
									$hashedPword = password_hash($pword, PASSWORD_DEFAULT);
									//Insert user into database
									$sql = "INSERT INTO users (user_serial, user_first, user_last, user_email, user_uname, user_pword) VALUES ($serial, '$first', '$last', '$email', '$uname', '$hashedPword')";
									$result = mysqli_query($conn, $sql);
									header("Location: ../register.php?register=success");
									exit();
								}
						}
				}
		}

} else {
	header("Location: ../register.php");
	exit();
}