<?php include 'validateAdminSession.php' ?>
<?php include '../confirmModal.php' ?>

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
        $html .= "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#confirmModal' value='$id'>Delete</button></td>";		
        $html .= "</tr>";
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
    <title>Delete Doctor</title>
    <link type="text/css" rel="stylesheet" href="./CSS/adminHome.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
                        <?php echo $html ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#searchField").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
			
            $("button").on("click", function() {
                var empId = $(this).val()
                var text = "Are you sure you want to delete employee id " + empId + "?";
                $(".modal-body").html(text);
                $("#confirmModal").modal("show");

                $(document).ready(function() {
                    $("#confirmDeleteBtn").on("click", function() {
                        $("#confirmModal").modal("hide");
                        deletedata(empId);
                    })
                });
            });
		});
		
		 function deletedata(id){
			$(document).ready(function(){
			  $.ajax({
				url: 'doctorfunction.php',
				type: 'POST',
				data: {
				  id: id,
				  action: "delete"
				},
				success:function(response){
				  if(response == 1){
					alert("User Deleted Successfully");
					location.reload();
				  }
				  else if(response == 0){
					alert("User Cannot Be Deleted");
				  }
				}
			  });
			});
		}		

        /*    $("button").on("click", function() {
                var empId = $(this).val()
                var text = "Are you sure you want to delete employee id " + empId + "?";
                $(".modal-body").html(text);
                $("#confirmModal").modal("show");

                $(document).ready(function() {
                    $("#confirmDeleteBtn").on("click", function() {
                        $("#confirmModal").modal("hide");
                        deleteDoc(empId);
                    })
                });
            });
		
		function deleteDoc(empId) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        alert('Record deleted.');
                    } else {
                        alert("Unable to delete, please try again later.");
                    }
                }
            };
            xhr.open("POST", "", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("empId=" + empId);
            $.post("delDoctor.php", {empId: empId}, function(response) {
                console.log("php");
            }, 'json')
            .fail(function(error) {
                console.log("error");
            });
        }*/		
    </script>
</body>
</html>