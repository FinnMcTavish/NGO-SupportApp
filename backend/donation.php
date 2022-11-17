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

$cash = $_POST["amount"];

$res = "SELECT * FROM active WHERE Now = 'Now'";

$uname1 = $conn->query($res);
$uname2 = $uname1->fetch_assoc();

$uname = $uname2["user"];


$sql = "SELECT * FROM donation WHERE uname = '$uname' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      if($row["uname"]==$uname)
      {
          $sql0 = "UPDATE donation SET cash = (SELECT cash from donation where uname='$uname')+'$cash' WHERE uname = '$uname' ";
          $conn->query($sql0);

          echo '<script>window.alert("Amount donated")</script>';
          header("Location: ../donation.html"); 
      }
      else {
          echo '<script>window.alert("Error")</script>';
          header("Location: ../donation.html");
      }
    }
  }

  else {

    $sql1 = "INSERT INTO donation (cash , clothes , utility , uname) VALUES ('$cash' , 0 , 0 , '$uname')";
    $conn->query($sql1);
    echo '<script>window.alert("Amount donated")</script>';
      header("Location: ../donation.html");
  }

?>