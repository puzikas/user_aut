<?php 

session_start();

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
	header('Location: login.php');
}




?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Sveiki atvykę!</title>
</head>
<body>

	<h1>Hello, <?= $_SESSION['user']; ?>!</h1>

</body>
</html>