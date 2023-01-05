<?php include 'validateAdminSession.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
				<div class="col-md-4">
					<a href="doctorPassword.php">
						<div class="card mb-4 box-shadow">
							<img class="card-img-top mx-auto d-block" alt="doctorIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/doctorIcon.png">
							<div class="card-body">
								<p class="card-text text-center">Change Doctor Password</p>
							</div>
						</div>
					</a>
				</div>	
                <div class="col-md-4">
                    <a href="nursePassword.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="nurseIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/nurseIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">Change Nurse Password</p>
                            </div>
                        </div>
                    </a>
                </div>	
                <div class="col-md-4">
                    <a href="adminHome.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="back.png" style="height:220px; width:230px; display:block;" src="../Assets/back.png">
                            <div class="card-body">
                                <p class="card-text text-center">Back</p>
                            </div>
                        </div>
                    </a>
                </div>				
            </div>
        </div>
    </div>
</body>
</html>