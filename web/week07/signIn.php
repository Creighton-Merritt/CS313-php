<?php
session_start();

if (isset($_POST['username']) && isset($_POST['userpass'])) {
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'userpass', FILTER_SANITIZE_STRING);
	
	require("dbConnect.php");
	$db = get_db();

	$stmt = $db->prepare("SELECT user_password FROM login WHERE username = :username";);
	$stmt->bindValue(':username', $usernam, PDO::PARAM_STR);
	$stmt->execute();

	$row = $stmt->fetch();
	$dbPassword = $row['user_password'];
	
	$hashcheck = password_verify($dbPassword, $password);
	if (!$hashcheck) {
		header("Location:signIn.php");
		die();
	} else {
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $username;
	}
	
	


?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>

<body>
<div>

<h1>Sign in</h1>

<form action="signIn.php" method="POST">

    Username:
	<input type="text" id="username" name="username" placeholder="Username" required><br><br>

    Password:
	<input type="password" id="userpass" name="userpass" placeholder="Password" required><br><br>

	<input type="submit" value="Sign In" />

</form>
<br><br>
No Account? <a href="signUp.php">Sign up here.</a><br><br>

</div>

</body>
</html>