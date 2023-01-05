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
	$name = ($_POST['name']);
	$surname = ($_POST['surname']);
	$nric = ($_POST['nric']);
	$dob = ($_POST['dob']);
	$age = ($_POST['age']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);	
	$address = ($_POST['address']);	
	$bloodgroup = ($_POST['bloodgroup']);
	$gender = ($_POST['gender']);		
           
   $query = "UPDATE `nurse` SET `name`='".$name."',`surname`='".$surname."',`nric`='".$nric."',`dob`='".$dob."',`age`='".$age."',`email`='".$email."',`phone`='".$phone."',`address`='".$address."',`bloodgroup`='".$bloodgroup."',`gender`='".$gender."' WHERE `id` = $id";
    
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
	echo '<script type="text/javascript">';
	echo ' alert("Updated Nurse Successfully")';
	echo '</script>';
   }else{
	echo '<script type="text/javascript">';
	echo ' alert("Update Nurse Failed")';
	echo '</script>';
   }
   mysqli_close($connect);
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Nurse</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<h2>Update Nurse</h2>
			<p>All details are required</p>
        <form action="updateNurse.php" method="post">
                <input type="text" name="id" placeholder="ID to Update" required>
				<input type="text" id="name" class="fadeIn one" placeholder="Given Name" name="name" required>
				<input type="text" id="surname" class="fadeIn one" placeholder="Surname" name="surname" required>
				<input type="text" id="nric" class="fadeIn one" placeholder="NRIC" name="nric" required>
				<input type="text" id="dob" class="fadeIn one" placeholder="Date of Birth" name="dob" required>
				<input type="text" id="age" class="fadeIn one" placeholder="Age" name="age" required>
				<input type="text" id="email" class="fadeIn one" placeholder="Email" name="email" required>
				<input type="text" id="phone" class="fadeIn one" placeholder="Phone Number" name="phone" required>
				<input type="text" id="address" class="fadeIn one" placeholder="Address" name="address" required>
				<select id='select' class='select' name='bloodgroup' required>
					<option value='' disabled selected hidden>Bloodgroup</option>
					<option value='A-'>A+</option>
					<option value='A-'>A-</option>
					<option value='B+'>B+</option>
					<option value='B-'>B-</option>
					<option value='O+'>O+</option>	
					<option value='O-'>O-</option>
					<option value='AB+'>AB+</option>
					<option value='AB-'>AB-</option>
				<script> 
				  document.getElementById("select").addEventListener("click",setColor)
				  function setColor()
				  {
					var combo = document.getElementById("select");
					combo.style.color = 'black';
					combo.removeEventListener("click", setColor);
				  }
				</script>					
				</select>
				<select id='select2' class='select' name='gender' required>
					<option value='' disabled selected hidden>Gender</option>
					<option value='Male'>Male</option>
					<option value='Female'>Female</option>
				<script> 
				  document.getElementById("select2").addEventListener("click",setColor)
				  function setColor()
				  {
					var combo = document.getElementById("select2");
					combo.style.color = 'black';
					combo.removeEventListener("click", setColor);
				  }
				</script>
        <div class="form-footer">
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
		  <input type="reset" class="fadeIn second" value="Clear">
		  <input type="button" class="fadeIn fourth" onclick="location.href='updateUsers.php'" value="Back">
        </div>
		</form>
		</div>
	</div>
</body>
</html>

