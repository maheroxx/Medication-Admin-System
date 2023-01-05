<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
session_start();
$AdministratorId = $_SESSION['AdministratorId'];

if(!isset($AdministratorId)){
   header('location:adminHome.php');
};

if(isset($_GET['logout'])){
   unset($AdministratorId);
   session_destroy();
   header('location:adminHome.php');
}

if(isset($_POST['update_nurse'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_surname = mysqli_real_escape_string($conn, $_POST['update_surname']);
   $update_nric = mysqli_real_escape_string($conn, $_POST['update_nric']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);

   mysqli_query($conn, "UPDATE `user` SET name = '$update_name', surname = '$update_surname', nric = '$update_nric', email = '$update_email', phone = '$update_phone', WHERE id = '$AdministratorID'") or die('query failed');
   
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
         mysqli_query($conn, "UPDATE `user` SET password = '$confirm_password' WHERE id = '$AdministratorID'") or die('query failed');
         $message[] = 'Password Updated Successfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Admin Profile</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>    
<div class="update-profile">
   <br></br>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Given Name:</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
			<br></br>
            <span>Surname:</span>
            <input type="text" name="update_surname" value="<?php echo $fetch['surname']; ?>" class="box">
			<br></br>
            <span>NRIC:</span>
            <input type="text" name="update_nric" value="<?php echo $fetch['nric']; ?>" class="box">
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
      <input type="submit" value="update profile" name="update_nurse" class="btn">
      <a href="viewNurse.php" class="btn">Back</a>
   </form>
</div>
</body>
</html>