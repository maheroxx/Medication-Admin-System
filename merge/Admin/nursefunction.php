<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "masdatabase");

if(isset($_POST["action"])){
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];

  $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nurse WHERE id = $id"));
  if($rows["gender"] == "Female"){
    echo 0;
    exit;
  }

  mysqli_query($conn, "DELETE FROM nurse WHERE id = $id");
  echo 1;
}

?>