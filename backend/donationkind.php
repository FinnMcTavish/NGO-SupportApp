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

$cloth = $_POST["Clothes"];
$util = $_POST["Utility"];


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
          $sql0 = "UPDATE donation SET clothes = (SELECT clothes from donation where uname='$uname')+'$cloth' WHERE uname = '$uname' ";
          $sql2 = "UPDATE donation SET utility = (SELECT utility from donation where uname='$uname')+'$util' WHERE uname = '$uname' ";
          $conn->query($sql0);
          $conn->query($sql2);

          echo '<script>window.alert("Amount donated")</script>';
          header("Location: ../donation in kind.html"); 
      }
      else {
          echo '<script>window.alert("Error")</script>';
          header("Location: ../donation in kind.html");
      }
    }
  }

  



  else {

    $sql1 = "INSERT INTO donation (cash , clothes , utility , uname) VALUES (0 , '$cloth' , '$util' , '$uname')";
    $conn->query($sql1);
    echo '<script>window.alert("Amount donated")</script>';
      header("Location: ../donation in kind.html");
  }

?>