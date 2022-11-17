<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ngoDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST["Name"];
$pass = $_POST["Password"];
$rpass = $_POST["Pass"];
$web = $_POST["Web"];

if($pass != $rpass)
{
    echo '<script>window.alert("Password mismatch!")</script>';
    header("Location: ../NGOreg.html");
    
}
else
{

    $sql = "INSERT INTO ngologin (name, password , web) VALUES ('$uname' , '$pass' , '$web')";
    $conn->query($sql);
    header("Location: ../indexCopy.html");
}

?>