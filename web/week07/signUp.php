<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>New Account</title>
</head>
<body>
<h1>Create New Account</h1>

<form action="newUser.php" method="POST">

    Username:
	<input type="text" id="username" name="username" placeholder="Username" required><br><br>

    Password:
	<input type="text" id="userpass" name="userpass" placeholder="Password" required><br><br>

	<input type="submit" value="Create Account" />

</form>

</body>
</html>