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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link type="text/css" rel="stylesheet" href="./CSS/adminHome.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<?php include '../header.php'; ?>
   
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
							 $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$AdministratorId'") or die('query failed');
							 if(mysqli_num_rows($select) > 0){
								$fetch = mysqli_fetch_assoc($select);
							 }
						  ?>
						  <th <h3>Name: &nbsp;<?php echo $fetch['name']; ?></h3></th>
						  <th <h3>Surname: &nbsp;<?php echo $fetch['surname']; ?></h3></th>
						  <th <h3>NRIC: &nbsp;<?php echo $fetch['nric']; ?></h3></th>
						  <th <h3>Email: &nbsp;<?php echo $fetch['email']; ?></h3></th>
						  <th <h3>Phone: &nbsp;<?php echo $fetch['phone']; ?></h3></th>		
      <a href="updateAdminProfile.php" class="btn">update profile</a>
						</tr>
					</thead>				
				</table>
			</tr>
		</div>	
</div>

</body>
</html>


