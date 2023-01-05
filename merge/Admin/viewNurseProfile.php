<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
session_start();
$NurseID = $_SESSION['NurseID'];

if(!isset($NurseID)){
   header('location:doctorHome.php');
};

if(isset($_GET['logout'])){
   unset($NurseID);
   session_destroy();
   header('location:logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nurse Profile</title>
	<link rel="stylesheet" href="CSS/addUser.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include 'header.php'; ?> 
<div class="album py-5 bg-light">
	<div class="container">
		<div class="row">
			<br><br>							 
		</div>
			<tr>
				<table class="table">
					<thead class="thead-light">
						<tr class='text-center'>						
						  <?php
							 $select = mysqli_query($conn, "SELECT * FROM `nurse` WHERE id = '$NurseID'") or die('query failed');
							 if(mysqli_num_rows($select) > 0){
								$fetch = mysqli_fetch_assoc($select);
							 }
							 if($fetch['image'] == ''){
								echo '<img src="images/default-avatar.png">';
							 }else{
								echo '<img src="uploaded_img/'.$fetch['image'].'">';
							 }
						  ?>
						  <th <h3>Name: &nbsp;<?php echo $fetch['name']; ?></h3></th>
						  <th <h3>Surname: &nbsp;<?php echo $fetch['surname']; ?></h3></th>
						  <th <h3>NRIC: &nbsp;<?php echo $fetch['nric']; ?></h3></th>
						  <th <h3>DOB: &nbsp;<?php echo $fetch['dob']; ?></h3></th>
						  <th <h3>Age: &nbsp;<?php echo $fetch['age']; ?></h3></th>
						  <tr>
						  <th <h3>Email: &nbsp;<?php echo $fetch['email']; ?></h3></th>
						  <th <h3>Phone: &nbsp;<?php echo $fetch['phone']; ?></h3></th>
						  <th <h3>Address: &nbsp;<?php echo $fetch['address']; ?></h3></th>
						  <th <h3>Bloodgroup: &nbsp;<?php echo $fetch['bloodgroup']; ?></h3></th>
						  <th <h3>Gender: &nbsp;<?php echo $fetch['gender']; ?></h3></th>					  
						  </tr>
						  
						  <!--<a href="update_profile.php" class="btn">update profile</a>-->
						</tr>
					</thead>
				</table>
			</tr>
		</div>
	</div>
</div>

</body>
</html>