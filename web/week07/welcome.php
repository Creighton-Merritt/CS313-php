<?php
session_start();
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
	}
	else
	{
		header("Location: signIn.php");
		die(); // we always include a die after redirects.
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