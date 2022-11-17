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

$name = $_POST["Name"];
$event = $_POST["Event"];
$date = $_POST["DATE"];
$venue = $_POST["VENUE"];


$sql1 = "INSERT INTO ngoevent (name , event , date , venue) VALUES ('$name' , '$event' , '$date' , '$venue')";
$conn->query($sql1);
header("Location: ../NGOevent.html");

?>