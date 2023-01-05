<?php include "../classes.php" ?>

<?php
if(isset($_POST['submit'])){
		$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
	
if (!$conn) {
	die("Connection has failed: " . mysqli_connect_error());
}

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $surname = mysqli_real_escape_string($conn, $_POST['surname']);
   $nric = mysqli_real_escape_string($conn, $_POST['nric']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `doctor` WHERE username = '$username' AND password = '$password'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
		echo "<script>
		alert('Username already exist');
		window.location.href='addDoctor.php';
		</script>";
   }else{
      if($password != $cpassword){
		echo "<script>
		alert('Password Does Not Match!');
		window.location.href='addDoctor.php';
		</script>";
      }elseif($image_size > 2000000){
		echo "<script>
		alert('Image is too large.');
		window.location.href='addDoctor.php';
		</script>";
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `doctor`(name, surname, nric, dob, age, email, phone, address, bloodgroup, gender, username, password, image, date_created) VALUES('$name', '$surname', '$nric', '$dob', '$age', '$email', '$phone', '$address', '$bloodgroup', '$gender', '$username', '$password', '$image', NOW())") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
		echo "<script>
		alert('Doctor Added Successfully.');
		window.location.href='addDoctor.php';
		</script>";
         }else{
		echo "<script>
		alert('Failed to Add Doctor.');
		window.location.href='addDoctor.php';
		</script>";
         }
      }
   }
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New Doctor</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<h2>Add New Doctor</h2>
			<form method="POST" enctype="multipart/form-data">
				<input type="text" id="name" class="fadeIn one" placeholder="Given Name" name="name" required>
				<input type="text" id="surname" class="fadeIn one" placeholder="Surname" name="surname" required>
				<input type="text" id="nric" class="fadeIn one" placeholder="NRIC" name="nric" required>
				<input type="date" id="dob" class="fadeIn one" placeholder="Date of Birth" name="dob" required>
				<input type="number" id="age" class="fadeIn one" placeholder="Age" name="age" required>
				<input type="email" id="email" class="fadeIn one" placeholder="Email" name="email" required>
				<input type="number" id="phone" class="fadeIn one" placeholder="Phone Number" name="phone" minlength="8" required>
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
				</select>
				
				<h2>Login Details</h2>
				<input type="text" id="username" class="fadeIn one" placeholder="Username" name="username" minlength="4" required>
                <input type="password" name="password" placeholder="Password" class="fadeIn one" minlength="8" required>
                <input type="password" name="cpassword" placeholder="Confirm Password" class="fadeIn one" minlength="8" required>
                <input type="file" name="image" class="fadeIn one" accept="image/jpg, image/jpeg, image/png">
				<br><br>
                <input type="submit" name="submit" value="register now" class="btn">
				<input type="reset" class="fadeIn second" value="Clear">
			</form>
		</div>
	</div>
</body>
</html>