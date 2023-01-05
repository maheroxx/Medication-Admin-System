<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
$DoctorID = $_GET["ID"];

if(isset($_POST['update_doctor'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_surname = mysqli_real_escape_string($conn, $_POST['update_surname']);
   $update_nric = mysqli_real_escape_string($conn, $_POST['update_nric']);
   $update_dob = mysqli_real_escape_string($conn, $_POST['update_dob']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   //$update_bloodgroup = mysqli_real_escape_string($conn, $_POST['update_bloodgroup']);
   //$update_gender = mysqli_real_escape_string($conn, $_POST['update_gender']);

   mysqli_query($conn, "UPDATE `doctor` SET name = '$update_name', surname = '$update_surname', nric = '$update_nric', dob = '$update_dob', email = '$update_email', phone = '$update_phone', address = '$update_address' WHERE id = '$DoctorID'") or die('query failed');
   //bloodgroup = '$update_bloodgroup', gender = '$update_gender' 
   
   $old_password = $_POST['old_password'];
   $update_password = mysqli_real_escape_string($conn, md5($_POST['update_password']));
   $new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
   $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

   if(!empty($update_password) || !empty($new_password) || !empty($confirm_password)){
      if($update_password != $old_password){
         $message[] = 'Old Password Does Not Match.';
      }elseif($new_password != $confirm_password){
         $message[] = 'Confirm Password Does Not Match.';
      }else{
         mysqli_query($conn, "UPDATE `doctor` SET password = '$confirm_password' WHERE id = '$DoctorID'") or die('query failed');
         $message[] = 'Password Updated Successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 30000){
         $message[] = 'Image Uploaded Too Large.';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `doctor` SET image = '$update_image' WHERE id = '$DoctorID'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Image Successfully Updated.';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Doctor Profile</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>    
<div class="update-profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `doctor` WHERE id = '$DoctorID'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <br></br>
   <form action="" method="post" enctype="multipart/form-data">
      <span>Profile Picture:</span>
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Upload New Photo:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
			<br></br>
            <span>Given Name:</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
			<br></br>
            <span>Surname:</span>
            <input type="text" name="update_surname" value="<?php echo $fetch['surname']; ?>" class="box">
			<br></br>
            <span>NRIC:</span>
            <input type="text" name="update_nric" value="<?php echo $fetch['nric']; ?>" class="box">
			<br></br>
            <span>Date of Birth:</span>
            <input type="date" name="update_dob" value="<?php echo $fetch['dob']; ?>" class="box">
			<br></br>
            <span>Email:</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
			<br></br>
            <span>Phone:</span>
            <input type="number" name="update_phone" value="<?php echo $fetch['phone']; ?>" class="box">
			<br></br>
            <span>Address:</span>
            <input type="text" name="update_address" value="<?php echo $fetch['address']; ?>" class="box">
			<br></br>
            <!-- <span>Bloodgroup:</span>
				<select id='select' class='select' name='update_bloodgroup' value="<?php echo $fetch['bloodgroup']; ?>">

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
			<br></br>
            <span>Gender:</span>
				<select id='select' class='select' name='update_gender' value="<?php echo $fetch['gender']; ?>">

					<option value='Male'>Male</option>
					<option value='Female'>Female</option>
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
			<br></br>-->
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_password" value="<?php echo $fetch['password']; ?>">
            <span>Old Password:</span>
            <input type="password" name="update_password" placeholder="Old Password" class="box" minlength="8">
			<br></br>
            <span>New Password:</span>
            <input type="password" name="new_password" placeholder="New Password" class="box" minlength="8">
			<br></br>
            <span>Confirm Password:</span>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="box" minlength="8">
			<br></br>
         </div>
      </div>
      <input type="submit" value="update profile" name="update_doctor" class="btn">
      <a href="viewDoctor.php" class="btn">Back</a>
   </form>
</div>
</body>
</html>