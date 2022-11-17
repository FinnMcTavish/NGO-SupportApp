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
$email = $_POST["Email"];
$pass = $_POST["Password"];


$sql = "SELECT * FROM login WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    if($row["pass"]==$pass && $row["uname"]==$uname)
    {
        $sql0 = "UPDATE active SET user = '$uname' WHERE Now = 'Now'";
        $conn->query($sql0);
        header("Location: ../indexCopy.html"); 
    }
    else {
        echo '<script>window.alert("Invalid Password")</script>';
        header("Location: ../login.html");
    }
  }
} else {
    echo '<script>window.alert("Invalid UserName")</script>';
    header("Location: ../login.html");
}

?>