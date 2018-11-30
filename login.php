<?php

spl_autoload_register(function ($class_name) {
	include 'Classes/' . $class_name . '.php';
});

if (isset($_POST['submit'])) {

	$db = new Database('login');

	$user = new User($db);

	if ($user->login($_POST)) {
		header('Location: index.php');
	}


	header('Location: login.php');

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Prisijunkite</title>
</head>
<body>
	<form method="post" action="login.php">
		<label>Username</label>
		<input type="text" name="username">
		<br>
		<label>Password</label>
		<input type="password" name="password">
		<br>
		<button type="submit">Login</button>
		<button><a href="register.php">Register new account</a></button>
	</form>
</body>
</html>