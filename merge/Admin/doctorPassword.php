<?php include 'validateAdminSession.php' ?>

<?php 
 if(isset($_POST['update']))
{
   $hostname = "127.0.0.1";
   $username = "root";
   $password = "";
   $databaseName = "masdatabase";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
    $id = $_POST['id'];
	$password = ($_POST['password']);	
           
   $query = "UPDATE `doctor` SET `password`='".$password."' WHERE `id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
	echo '<script type="text/javascript">';
	echo ' alert("Password Changed")';
	echo '</script>';
   }else{
	echo '<script type="text/javascript">';
	echo ' alert("Failed to Change Password")';
	echo '</script>';
   }
   mysqli_close($connect);
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Doctor</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<h2>Change Doctor Password</h2>
			<p>All details are required</p>
        <form action="doctorPassword.php" method="post">
                <input type="text" name="id" placeholder="ID" required>
				<input type="password" id="password" class="fadeIn one" placeholder="New Password" name="password" required>
        <div class="form-footer">
          <input class="btn btn-primary" type="submit" name="update" value="Change Password">
		  <input type="reset" class="fadeIn second" value="Clear">
		  <input type="button" class="fadeIn fourth" onclick="location.href='updateUsers.php'" value="Back">
        </div>
		</form>
		</div>
	</div>
</body>
</html>

