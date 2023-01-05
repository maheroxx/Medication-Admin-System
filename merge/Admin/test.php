<?php include 'validateAdminSession.php' ?>

<?php
$_SESSION["viewStatus"] = true;

$result = Doctor::getFilterDoctor($conn, $searchName, $searchSurname, $searchEmail, $searchAcctype, $searchGender, $searchID);
$i = 0;
$html = "";

if ($result != null) {
	while ($row = $result->fetch_array()) { 
		$i++;
		$name = $row["name"];
		$surname = $row["surname"];
		$email = $row["email"];
		$acctype = $row["acctype"];
		$gender = $row["gender"];
		$id = $row["id"];
		
		$html .= "<tr class='text-center'>";
		$html .= "<td>$name</td>";
		$html .= "<td>$surname</td>";
		$html .= "<td>$email</td>";
		$html .= "<td>$acctype</td>";
		$html .= "<td>$gender</td>";
		$html .= "<td>$id</td>";
		$html .= "<td><a href = \"doctorProfile.php?ID=" . $row['id'] . "\" class='btn btn-primary'>Profile</a></td>";
      
		
	}
} else {
	$html .= "<tr class='text-center fw-bold'><td colspan=8>No records found</td></tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctor List</title>
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
                <form class="form-inline">
                    <input type="search" class="form-control" id="searchField" placeholder="Search..">
                </form>
                <br><br>
                <table class="table">
                    <thead class="thead-light">
                        <tr class='text-center'>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="searchTable">
						<tr>
						<?php echo $html ?>
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