<?php

class Prescribe {
    public $prescribeID;
    public $doctorID;
    public $patientID;
    public $medname;
    public $dose;
    public $route;
    public $sideEffect;
    public $frequency;
    public $duration;

    public function __construct($prescribeID, $doctorID, $patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration) {
        $this->prescribeID = $prescribeID;
        $this->doctorID = $doctorID;
        $this->patientID = $patientID;
        $this->medname = $medname;
        $this->dose = $dose;
        $this->route = $route;
        $this->sideEffect = $sideEffect;
        $this->frequency = $frequency;
        $this->duration = $duration;
    }

    public function insertMed($conn, $doctorID, $patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration) {
        $stmt = $conn->prepare("INSERT INTO prescribe (doctorID, patientID, medname, dose, route, sideEffect, frequency, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssss", $doctorID, $patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration);
        return $stmt->execute();
    }

    public static function deleteMed($medname) {
        $medname = $conn->real_escape_string($medname);

        $stmt = $conn->prepare("DELETE FROM Medicine WHERE medname = ?");
        $stmt->bind_param("i", $medname);
        return $stmt->execute();
    }
}
?>

<?php
session_start();
// $conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");
//
// if (!$conn) {
//   die("econnection failed " . mysqli_connect_error());
// }

//get patient information from the URL
$patientID  = $_GET["ID"];
$patientGender  = $_GET["gender"];
$patientName  = $_GET["name"];
$patientBlood  = $_GET["blood"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");

if (!$conn) {
	die("Connection has failed: " . mysqli_connect_error());
}

  //first field
	$medname = stripslashes($_POST['medname']);
	$dose = stripslashes($_POST['dose']);
	$route = stripslashes($_POST['route']);
	$sideEffect = stripslashes($_POST['sideEffect']);
  $frequency = stripslashes($_POST['frequency']);
  $duration = stripslashes($_POST['duration']);

  //second field
	$medname2 = stripslashes($_POST['medname2']);
	$dose2 = stripslashes($_POST['dose2']);
	$route2 = stripslashes($_POST['route2']);
	$sideEffect2 = stripslashes($_POST['sideEffect2']);
  $frequency2 = stripslashes($_POST['frequency2']);
  $duration2 = stripslashes($_POST['duration2']);

  //third field
	$medname3 = stripslashes($_POST['medname3']);
	$dose3 = stripslashes($_POST['dose3']);
	$route3 = stripslashes($_POST['route3']);
	$sideEffect3 = stripslashes($_POST['sideEffect3']);
  $frequency3 = stripslashes($_POST['frequency3']);
  $duration3 = stripslashes($_POST['duration3']);


  if(isset($_POST['submit'])){
    echo $medname2;
    echo var_dump($medname2);
    echo "<br>";
    echo var_dump($_POST['medname2']);
    echo $dose;
    echo $route;
    echo $sideEffect;
    echo $frequency;
    echo $duration;
    echo $patientID;

    // create object for the first prescribe table
    if ($medname != "" && $dose != "" && $route != "" && $sideEffect != "" && $frequency != "" && $duration != "") {
      $prescribe1 = new Prescribe(null ,1 ,$patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration);
      $result1 = $prescribe1->insertMed($conn, 1, $patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration);
    }
    else {
      echo "false";
    }
    // $prescribe1 = new Prescribe(null ,1 ,$patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration);
    // $result1 = $prescribe1->insertMed($conn, 1, $patientID, $medname, $dose, $route, $sideEffect, $frequency, $duration);

    // create object for the second prescribe table
    if ($medname2 != "" && $dose2 != "" && $route2 != "" && $sideEffect2 != "" && $frequency2 != "" && $duration2 != "") {
        $prescribe2 = new Prescribe(null ,1 ,$patientID, $medname2, $dose2, $route2, $sideEffect2, $frequency2, $duration2);
        $result2 = $prescribe2->insertMed($conn, 1, $patientID, $medname2, $dose2, $route2, $sideEffect2, $frequency2, $duration2);
        	// echo "<script>
      		// alert('Medicine Added Successfully.');
      		// window.location.href='prescribe.php';
      		// </script>";
    }
    else {
      echo "false";
    }

    // create object for the third prescribe table
    if ($medname3 != "" && $dose3 != "" && $route3 != "" && $sideEffect3 != "" && $frequency3 != "" && $duration3 != "") {
        $prescribe3 = new Prescribe(null ,1 ,$patientID, $medname3, $dose3, $route3, $sideEffect3, $frequency3, $duration3);
        $result3 = $prescribe3->insertMed($conn, 1, $patientID, $medname3, $dose3, $route3, $sideEffect3, $frequency3, $duration3);
    }
    else {
      echo "false";
    }

  }

	// if ($prescribe->insertMed($conn, 1, 1, $medname, $dose, $route, $sideEffect, $frequency, $duration)) {
	// 	echo "<script>
	// 	alert('Medicine Added Successfully.');
	// 	window.location.href='Add_Med.php';
	// 	</script>";
	// }
	// else {
	// 	$errorMsg = "Registration error: " .$SQLstring. "\n" .mysqli_error($conn);
	// 	echo "<script>alert($errorMsg)</script>";
	// }
  mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient</title>
    <link type="text/css" rel="stylesheet" href="./CSS/adminHome.css">
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
                <a class="nav-item nav-link" href="doctorLogin.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h1>Prescription</h1>
                <table class="table">
                    <tr>
                        <th>Personal Information
                            <tr>
                                <th>Name</th>
                                <th>Patient ID</th>
                                <th>Blood Group</th>
                                <th>Gender</th>
                            </tr>
                            <tr>
                                <td><?php echo $patientName; ?></td>
                                <td><?php echo $patientID; ?></td>
                                <td><?php echo $patientBlood; ?></td>
                                <td><?php echo $patientGender; ?></td>
                            </tr>
                            <br>
                            <tr>
                              <th>Diagnosis :</th>
                            </tr>
                            <tr>
                              <td>
                                <ul>
                                  <li>fever</li>
                                  <li>Cough</li>
                                </ul>
                              </td>
                            </tr>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h4>Medication
                    <a href="javascript:void(0)" class ="add-more-form float-end btn btn-primary">Add More</a>
                </h4>
                <form class="form-inline" method="POST">
                    <br>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Medicine Name</th>
                                <th scope="col">Dose</th>
                                <th scope="col">Route</th>
                                <th scope="col">Side Effects</th>
                                <th scope="col">frequency</th>
                                <th scope="col">duration</th>
                            </tr>
                        </thead>
                        <tbody id="searchTable">
                            <tr>
                                <td><input type="text" name="medname" value=""></td>
                                <td><input type="text" name="dose" value=""></td>
                                <td><input type="text" name="route" value=""></td>
                                <td><input type="text" name="sideEffect" value=""></td>
                                <td><input type="text" name="frequency" value=""></td>
                                <td><input type="text" name="duration" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="medname2" value=""></td>
                                <td><input type="text" name="dose2" value=""></td>
                                <td><input type="text" name="route2" value=""></td>
                                <td><input type="text" name="sideEffect2" value=""></td>
                                <td><input type="text" name="frequency2" value=""></td>
                                <td><input type="text" name="duration2" value=""></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="medname3" value=""></td>
                                <td><input type="text" name="dose3" value=""></td>
                                <td><input type="text" name="route3" value=""></td>
                                <td><input type="text" name="sideEffect3" value=""></td>
                                <td><input type="text" name="frequency3" value=""></td>
                                <td><input type="text" name="duration3" value=""></td>
                            </tr>

                        </tbody>

                    </table>

                    <div class="paste-new-forms">
                      Notes : <br><br>
                      <textarea id="w3review" name="w3review" rows="4" cols="50">
                      more exercise
                      </textarea>
                      <br><br>
                      <input type="submit" name="submit" class="btn btn-primary" value="Add Medication">
                      <input type="reset" class="btn btn-primary" value="Clear">
                    </div>
                    <br><br>

                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.remove-btn',function(){
                $(this).closest('.container').remove();
            });

            $(document).on('click','.add-more-form',function(){
                $('.paste-new-forms')
                .append('<div class="container">\
                            <div class="row">\
                                <table class="table">\
                                     <thead class="thead-light">\
                                        <tr>\
                                            <th scope="col">Medicine Name</th>\
                                            <th scope="col">Dose</th>\
                                            <th scope="col">Route</th>\
                                            <th scope="col">Side Effects</th>\
                                            <th scope="col">Exp Date</th>\
                                        </tr>\
                                    </thead>\
                                    <tbody id="searchTable">\
                                        <tr>\
                                            <td><input type="text" name="medname" value="" required></td>\
                                            <td><input type="text" name="dose" value=""  required></td>\
                                            <td><input type="text" name="route" value="" required></td>\
                                            <td><input type="text" name="sideEffect" value="" required></td>\
                                            <td><input type="text" name="expdate" value="" required></td>\
                                        </tr>\
                                    </tbody>\
                                </table>\
                                <button type="button" class="remove-btn btn btn-danger">Remove</button><br><br>\
                            </div>\
                        </div>\
                    </div>');
                 })
               });
    </script>
</body>
</html>
