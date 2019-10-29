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