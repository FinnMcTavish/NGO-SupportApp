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

$uname = $_POST["Username"];
$email = $_POST["Email"];
$pass = $_POST["Password"];
$rpass = $_POST["Pass"];
$num = 0;

if($pass != $rpass)
{
    echo '<script>window.alert("Password mismatch!")</script>';
    header("Location: ../registration.html");
    
}
else
{

    $sql = "INSERT INTO login (uname, email , pass , active) VALUES ('$uname' , '$email' , '$pass' , '$num')";
    $conn->query($sql);
    $sql0 = "UPDATE active SET user = '$uname' WHERE Now = 'Now'";
    $conn->query($sql0);
    header("Location: ../indexCopy.html");
}

?>