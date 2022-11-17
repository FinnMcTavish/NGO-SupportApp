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


$sql = "SELECT * FROM ngologin WHERE name = '$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    if($row["password"]==$pass && $row["name"]==$uname)
    {
        header("Location: ../indexCopy.html"); 
    }
    else {
        echo '<script>window.alert("Invalid Password")</script>';
        header("Location: ../NGOlogin.html");
    }
  }
} else {
    echo '<script>window.alert("Invalid UserName")</script>';
    header("Location: ../NGOlogin.html");
}

?>