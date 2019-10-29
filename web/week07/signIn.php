<?php
session_start();

if (isset($_POST['username']) && isset($_POST['userpass'])) {
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'userpass', FILTER_SANITIZE_STRING);
	
	require("dbConnect.php");
	$db = get_db();

	$stmt = $db->prepare("SELECT user_password FROM userlogin WHERE username = :username");
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$result = $stmt->execute();

	if ($result) {
		$row = $stmt->fetch();
		$dbPassword = $row['user_password'];
	
		if (password_verify($password, $dbPassword)) {
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['username'] = $username;
			header("Location:welcome.php");
		} else {
			header("Location:signIn.php");
			die();
		}
	
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign In</title>
</head>
<body>
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
</body>
</html>