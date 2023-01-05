<?php include 'validateNurseSession.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Home</title>
    <link type="text/css" rel="stylesheet" href="./CSS/adminHome.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="nurseHome.php">MAS.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="adminHome.php">Home</a>
                <a class="nav-item nav-link" href="viewNurse.php">View Nurse</a>
                <a class="nav-item nav-link" href="viewDoctor.php">View Doctor</a>
                <a class="nav-item nav-link" href="viewPatient.php">View Patient</a>			
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="viewNurseProfile.php">Profile</a>
                <a class="nav-item nav-link" href="nurseLogin.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="viewNurse.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="nurseIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/nurseIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">View Nurse</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="viewDoctor.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="doctorIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/doctorIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">View Doctor</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="viewPatient.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="patientIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/patientIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">View Patient</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="addUsers.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="addUsers.png" style="height:225px; width:230px; display:block;" src="../Assets/addUsers.png">
                            <div class="card-body">
                                <p class="card-text text-center">Add User</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="delUser.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="delUser.png" style="height:225px; width:210px; display:block;" src="../Assets/delUser.png">
                            <div class="card-body">
                                <p class="card-text text-center">Delete User</p>
                            </div>
                        </div>
                    </a>
                </div>				
                <div class="col-md-4">
                    <a href="nurseLogin.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="logout.png" style="height:225px; width:200px; display:block;" src="../Assets/logout.png">
                            <div class="card-body">
                                <p class="card-text text-center">Logout</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>