<?php 

spl_autoload_register(function ($class_name) {
	include 'Classes/' . $class_name . '.php';
});

if (isset($_POST['submit'])) {

	$db = new Database('login');

	$new_user = new User($db);
	$new_user->register($_POST);

	header('Location: login.php');

}




?>




<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
</head>
<body>
	<form action="register.php" method="post">
		<h3>Register your account:</h3><br>
		<label>Username</label>
		<input type="text" name="username">
		<br>
		<label>E-mail</label>
		<input type="text" name="email">
		<br>
		<label>Password</label>
		<input type="password" name="password">
		<br>
		<button type="submit" name="submit">Register</button>
		<button><a href="login.php">Go back to login page</a></button>
	</form>

</body>
</html>