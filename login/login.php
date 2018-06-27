<?php 
	include '../classes/Databases.php';
	$db = new Databases();
	session_start();
	if(isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($db->conn, $_POST['username']);
		$password = mysqli_real_escape_string($db->conn, $_POST['password']);
		$sql = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($db->conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			echo "successfull logedin";
		}
		else {
			echo "failed to login";
		}
	}

	if(isset($_POST['logout'])) {
		session_destroy();
		session_unset();
	}
 ?>