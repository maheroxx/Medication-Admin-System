<?php
session_start();
include 'function.php';
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
                <form class="form-inline">
                    <input type="search" class="form-control" id="searchField" placeholder="Search..">
                </form>
                <br><br>
                <?php
                //sql script to get all available patient
                $sql = "SELECT * FROM patient";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $resultCheck = mysqli_num_rows($result);

                 ?>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="searchTable">
                      <?php
                      //ki
                      while ($row = mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td>";
                        echo "<img src='Assets/patientIcon.png' alt='doctor profile pic' style='width:100px; height:100px;'>";
                        //echo "<a href='profilePage.php'>" . $row['name'] . " " . $row['surname'] . "</a>";
                        // put information to url
                        echo "<a href = \"profilePage.php?ID=" . $row['id'] . "\">" . $row['name'] . " " . $row['surname'] . "</a>";
                        echo "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>";
                        //echo "<a href = \"editPage.php?ID=" . $row['id'] . "\" class='btn btn-primary'>Edit</a>";
                        echo "<a href = \"prescribe.php?ID=" . $row['id'] . "&name=" . $row['name'] . "&gender=" . $row['gender'] . "&blood=" . $row['bloodgroup']  . "\" class='btn btn-primary'>Prescribe</a>";
                        echo "</td>";

                        //get all other patient information
                        // $sql1 = "SELECT * FROM patient WHERE id = '" . $row['id'] . "'";
                        // $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                        // $row1 = mysqli_fetch_array($result1);
                        //
                        // $_SESSION['patientName']=$row1['name'];
                        // $_SESSION['patientGender']=$row1['gender'];
                        // $_SESSION['patientBloodGroup']=$row1['bloodgroup'];

                      }


                       ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#searchField").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
