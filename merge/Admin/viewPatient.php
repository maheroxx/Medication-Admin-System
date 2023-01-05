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
<?php include 'header.php'; ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <form class="form-inline">
                    <input type="search" class="form-control" id="searchField" placeholder="Search..">
                </form>
                <br><br>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="searchTable">
                        <tr>
                            <td>
                                <img src="Assets/patientIcon.png" alt="doctor profile pic" style="width:100px; height:100px;">
                                <a href="profilePage.php">Alfreds Futterkiste</a>
                            </td>
                            <td>alfredsf@mas.com</td>
                            <td>Nurse</td>
                            <td>200000001</td>
                            <td>
                                <input type="button" class="btn btn-primary" onclick="location.href='editPage.php'" value="Edit">
                                <input type="button" class="btn btn-danger" value="Delete" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="Assets/patientIcon.png" alt="doctor profile pic" style="width:100px; height:100px;">
                                <a href="profilePage.php">Ana Trujillo</a>
                            </td>
                            <td>anatrujillo@mas.com</td>
                            <td>Nurse</td>
                            <td>200000002</td>
                            <td>
                                <input type="button" class="btn btn-primary" onclick="location.href='editPage.php'" value="Edit">
                                <input type="button" class="btn btn-danger" value="Delete" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="Assets/patientIcon.png" alt="doctor profile pic" style="width:100px; height:100px;">
                                <a href="profilePage.php">Antonio Moreno</a>
                            </td>
                            <td>antoniom@mas.com</td>
                            <td>Nurse</td>
                            <td>200000003</td>
                            <td>
                                <input type="button" class="btn btn-primary" onclick="location.href='editPage.php'" value="Edit">
                                <input type="button" class="btn btn-danger" value="Delete" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="Assets/patientIcon.png" alt="doctor profile pic" style="width:100px; height:100px;">
                                <a href="profilePage.php">Thomas Hardy</a>
                            </td>
                            <td>thomash@mas.com</td>
                            <td>Nurse</td>
                            <td>200000004</td>
                            <td>
                                <input type="button" class="btn btn-primary" onclick="location.href='editPage.php'" value="Edit">
                                <input type="button" class="btn btn-danger" value="Delete" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="Assets/patientIcon.png" alt="doctor profile pic" style="width:100px; height:100px;">
                                <a href="profilePage.php">Christina Berglund</a>
                            </td>
                            <td>christinab@mas.com</td>
                            <td>Nurse</td>
                            <td>200000005</td>
                            <td>
                                <input type="button" class="btn btn-primary" onclick="location.href='editPage.php'" value="Edit">
                                <input type="button" class="btn btn-danger" value="Delete" disabled>
                            </td>
                        </tr>
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