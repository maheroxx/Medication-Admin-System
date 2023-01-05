<?php include "../classes.php" ?>

<?php 
    session_start();

    if(!isset($_SESSION["DoctorID"])) {
        header("Location: doctorLogin.php");
        die();
    }

    $searchName = null;
    $searchSurname = null;
    $searchEmail = null;
    $searchAcctype = null;
    $searchGender = null;
    $searchID = null;

    $conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['name'])) 
            $searchName = $_GET['name'];
        if (isset($_GET['surname'])) 
            $searchSurname = $_GET['surname'];
        if (isset($_GET['email'])) 
            $searchEmail = $_GET['email'];
        if (isset($_GET['acctype'])) 
            $searchAcctype = $_GET['acctype'];
        if (isset($_GET['gender'])) 
            $searchAcctype = $_GET['gender'];
        if (isset($_GET['id'])) 
            $searchID = $_GET['id'];
    }
?>