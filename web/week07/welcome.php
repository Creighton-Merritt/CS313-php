<?php
session+_start();
	if (!$_SESSION['loggedin'] = TRUE) {
	header("Location:signIn.php");
	die();
} else {
	$username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>

<body>
<div>

	<h1>Welcome <?=$username?></h1>

	<a href="signOut.php">Sign Out</a>
</div>

</body>
</html>