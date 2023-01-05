<?php include "../classes.php" ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
	
if (!$conn) {
	die("Connection has failed: " . mysqli_connect_error());
}

	$name = stripslashes($_POST['name']);
	$surname = stripslashes($_POST['surname']);
	$phone = stripslashes($_POST['phone']);
	$nric = stripslashes($_POST['nric']);	
	$email = stripslashes($_POST['email']);
	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	
	$user = new User(null, $name, $surname, $phone, $nric, $email, $username, 'ADMINISTRATOR', $password);

	if ($user->insertUser($conn)) {
		echo "<script>
		alert('Administrator account registered successfully.');
		window.location.href='adminLogin.php';
		</script>";

	}
	else {
		$errorMsg = "Registration error: " .$SQLstring. "\n" .mysqli_error($conn);
		echo "<script>alert($errorMsg)</script>";
	}
	mysqli_close($conn);
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator Registration</title>
	<link rel="stylesheet" href="CSS/register.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<br><br>
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<h2>Administrator Registration Form</h2>
			<br>
			<form method="POST">
				<input type="text" id="name" class="fadeIn one" placeholder="Given Name" name="name" required>
				<input type="text" id="surname" class="fadeIn one" placeholder="Surname" name="surname" required>
				<input type="text" id="phone" class="fadeIn one" placeholder="Phone Number" name="phone" required>
				<input type="text" id="nric" class="fadeIn one" placeholder="NRIC" name="nric" required>
				<input type="text" id="email" class="fadeIn one" placeholder="Email" name="email" required>
				<input type="text" id="username" class="fadeIn one" placeholder="Username" name="username" required>
				<input type="password" id="password" class="fadeIn one" placeholder="Password" name="password" required>
				<br><br>
				<input type="submit" class="fadeIn second" value="Register">
				<input type="reset" class="fadeIn second" value="Clear">
				<input type="button" class="fadeIn third" onclick="location.href='adminLogin.php'" value="Login">
			</form>
		</div>
	</div>
</body>
</html>