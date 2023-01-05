<?php include 'validateAdminSession.php' ?>

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
                <div class="col-md-4">
                    <a href="viewUsers.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="viewUsers.png" style="height:225px; width:230px; display:block;" src="../Assets/viewUsers.png">
                            <div class="card-body">
                                <p class="card-text text-center">View Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="addUsers.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="addUsers.png" style="height:225px; width:250px; display:block;" src="../Assets/addUsers.png">
                            <div class="card-body">
                                <p class="card-text text-center">Add Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="updateUsers.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="updateUsers.png" style="height:225px; width:250px; display:block;" src="../Assets/updateUsers.png">
                            <div class="card-body">
                                <p class="card-text text-center">Update Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="delUsers.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="delUser.png" style="height:225px; width:210px; display:block;" src="../Assets/delUser.png">
                            <div class="card-body">
                                <p class="card-text text-center">Delete Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="changePassword.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="changePassword.jpg" style="height:225px; width:230px; display:block;" src="../Assets/changePassword.jpg">
                            <div class="card-body">
                                <p class="card-text text-center">Change Password</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="patientPage.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="patientIcon.png" style="height:225px; width:220px; display:block;" src="../Assets/patientIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">Patient Page</p>
                            </div>
                        </div>
                    </a>
                </div>				
            </div>
        </div>
    </div>
</body>
</html>