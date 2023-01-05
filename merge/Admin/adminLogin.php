<?php include "../classes.php" ?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
	
if (!$conn) {
	die("Connection has failed: " . mysqli_connect_error());
}	
	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	
	$user = User::login($conn, 'ADMINISTRATOR', $username, $password);

	if ($user) {
		$_SESSION["AdministratorId"] = $user->id;
		$_SESSION["AdministratorName"] = $user->name;
		header("Location: adminHome.php");
	}
	else
		echo "<script>alert('Invalid login details.')</script>";
	mysqli_close($conn);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAS. Admin Login Page</title>
	<link rel="stylesheet" href="CSS/login.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<h2>MAS.</h2>
			<p><b>Administrator Platform</b></p>
			<form action="adminLogin.php" method="POST">
				<input type="text" id="username" class="fadeIn one" name="username" placeholder="Username" required>
				<input type="password" id="password" class="fadeIn second" name="password" placeholder="Password" required>
				<br><br>
				<input type="submit" class="fadeIn third" value="Log In">
				<input type="button" class="fadeIn fourth" onclick="location.href='adminRegister.php'" value="Register">
				<input type="button" class="fadeIn fourth" onclick="location.href='../home.php'" value="Homepage">
			</form>
		</div>
	</div>
</body>
</html>