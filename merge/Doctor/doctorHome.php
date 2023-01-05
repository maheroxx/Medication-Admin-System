<?php include 'validateDoctorSession.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home</title>
    <link type="text/css" rel="stylesheet" href="../CSS/adminHome.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="doctorHome.php">MAS.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="adminHome.php">Home</a>
                <a class="nav-item nav-link" href="prescribe.php">Prescribe</a>
                <a class="nav-item nav-link" href="patientList.php">View Patient</a>				
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="viewDoctorProfile.php">Profile</a>
                <a class="nav-item nav-link" href="doctorLogin.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="prescribe.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="prescribe.png" style="height:225px; width:230px; display:block;" src="../Assets/prescribe.png">
                            <div class="card-body">
                                <p class="card-text text-center">Prescribe Medication</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="patientList.php">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top mx-auto d-block" alt="patientIcon.png" style="height:225px; width:250px; display:block;" src="../Assets/patientIcon.png">
                            <div class="card-body">
                                <p class="card-text text-center">View Patient</p>
                            </div>
                        </div>
                    </a>
                </div>			
                <div class="col-md-4">
                    <a href="doctorLogin.php">
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